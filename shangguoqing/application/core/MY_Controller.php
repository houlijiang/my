<?php
class MY_Controller extends CI_Controller{
	public $table_name;
	public $class;
	public $statusCode = 200;
	public $message = '操作成功';
	public $list_fields=array();
	public $natabId;
	public $callbackType = 0;
	public $rel = '';
	public $forwardUrl = '';
	public function __construct(){
		parent::__construct();
		$user_id = $this->session->userdata("user_id");
		$m = $this->uri->segment(2);
		$f = $this->uri->segment(3);
		if(empty($user_id) && $m!='user' && $f!='login'){
			echo '<script>location.href="/admin/user/login"</script>';
			exit;
		}
		$this->load->library('data');
	}
	
	public function tojson(){
		$arr = array(
			'statusCode'=>$this->statusCode,
			'message'=>$this->message,
		);
		$arr['callbackType'] = $this->callbackType>0?'forward':'closeCurrent';
		$arr['forwardUrl'] = $this->forwardUrl;
		$arr['rel'] = $this->rel;
		$arr['navTabId'] = $this->natabId;
		die(json_encode($arr,JSON_UNESCAPED_UNICODE));
	}
	
	public function update(){
		$id = $this->input->post('id');
		$temp = $post = $this->input->post();
		
		$fun = get_class_methods($this->class);
		if(in_array('_before_update', $fun)){
			$this->_before_update($post);
		}
		foreach ($post as $k=>$v){
		if(!in_array($k, $this->get_fields()))
			unset($post[$k]);
		}
		if(intval($id)>0){
			if(in_array('_update', $fun)){
				$this->_update($post);
			}
			
			$otype = 2;
			$res = $this->data->update($this->table_name,$post,array('id'=>$id));
			if(in_array('update_', $fun)){
				$temp['id'] = $id;
				$this->update_($temp);
			}
		}else{
			if(in_array('_insert', $fun)){
				$this->_insert($post);
			}
			if(in_array("create_time", $this->get_fields())){
				if($this->get_field_type("create_time")=='int' or $this->get_field_type("create_time")=='bigint'){
					$post['create_time'] = time();
				}else{
					$post['create_time'] = date("Y-m-d H:i:s");
				}
			}
			$otype = 3;
			$res = $this->data->insert($this->table_name,$post);
			if(in_array('insert_', $fun)){
				$temp['id'] = $res;
				$this->insert_($temp);
			}
		}
		$this->tojson();
	//	$this->operation_log($otype, $temp); //记录操作日志
		//tojson($res?1:0,$this->err_code,$this->err_msg);
	}
	
	//删除
    function del($id){
    	$fun = get_class_methods($this->class);
    	if(in_array('_before_del', $fun)){
			$this->_before_del($id);
		}
   		$res = $this->data->update($this->table_name,array('is_delete'=>1),array('id'=>intval($id)));
		if($res){
			$fun = get_class_methods($this->class);
			if(in_array('del_', $fun)){
				$this->del_();
			}
			$res = true;
		}else {
			$this->statusCode = 300;
			$this->message = "删除失败!";
		}
	//	$this->operation_log(4, $id); //记录操作日志
		$this->tojson();
    }
    //还愿
    public function restore($id=0){
    	$this->get_database($this->dk);
    	$fun = get_class_methods($this->class);
    	if(in_array('_before_restore', $fun)){
			$this->_before_del($id);
		}
   		$res = $this->data->update($this->table_name,array('is_delete'=>0),array('id'=>intval($id)));
		if($res){
			$res = true;
		}else {
			$this->err_code = 1;
			$this->err_msg = "恢复失败!";
			$res = false;
		}
		$this->operation_log(5, $id); //记录操作日志
		tojson($res?1:0,$this->err_code,$this->err_msg);
    }
    
   function get_fields(){
    	$fields = $this->data->db->field_data($this->table_name);
    	foreach($fields as $f){
    		$arr[]=$f->name;
    	}
    	return $arr;
    }
    
    function get_info($id){
    	if(intval($id)>0){
    		$query = $this->data->db->get_where($this->table_name,array('id'=>intval($id)));
    		$info = $query->row_array();
    	}else{
    		$fields = $this->data->db->field_data($this->table_name);
			foreach ($fields as $field)
			{
				if($field->type=='int'){
					if($field->name=='start_time' || $field->name=='end_time'){
						$val = time();
					}else{
						$val = 0;
					}
				}else{
					$val = '';
				}
				$info[$field->name] = $val;
			} 
    		
    	}
    	return $info;
    }
    
    function get_field_type($field_name=''){
    	$type = '';
    	if(!empty($field_name)){
	    	$fields = $this->data->db->field_data($this->table_name);
			foreach ($fields as $field)
			{
				if($field_name==$field->name){
					$type = $field->type;
				}
			} 
    	}
    	return $type;
    }
}