<?php
class MY_Controller extends CI_Controller{
	public $table_name;
	public $class;
	public $model='';
	public $statusCode = 200;
	public $message = '操作成功';
	public $list_fields=array();
	public $natabId = '';
	public $callbackType = 'closeCurrent';
	public $rel = '';
	public $forwardUrl = '';
	public function __construct(){
		parent::__construct();
		$user_id = $this->session->userdata("user_id");
		$m = $this->uri->segment(1);
		$f = $this->uri->segment(2);
		if(empty($user_id) && $m!='user' && $f!='login'){
			echo '<script>location.href="/admin.php/user/login"</script>';
			exit;
		}
		$this->load->library('data');
		
	}
	public function index(){
		if(empty($this->model)){
			$this->load->model($this->class.'_model','m');
		}else{
			$this->load->model($this->model,'m');
		}
		$data = $this->m->get_list();
		$fun = get_class_methods($this->class);
		if(in_array('_index', $fun)){
			$this->_index($data);
		}
		$this->load->view('admin/'.$this->class.'_list',$data);
	}
	public function add(){
		$this->edit(0);
	}
	public function edit($id=0){
		$data['info'] = $this->get_info($id);
		$fun = get_class_methods($this->class);
		if(in_array('_edit', $fun)){
			$this->_edit($data);
		}
		$this->load->view('admin/'.$this->class.'_edit',$data);
	}
	public function update(){
		$this->natabId = $this->class;
		$this->rel = $this->class;
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
				$post['create_time'] = date("Y-m-d H:i:s");
			}
			$otype = 1;
			$res = $this->data->insert($this->table_name,$post);
			if(in_array('insert_', $fun)){
				$temp['id'] = $res;
				$this->insert_($temp);
			}
		}
		admin_log($otype, $temp); //记录操作日志
		tojson($this->statusCode,$this->message,$this->natabId,$this->rel,$this->forwardUrl);
	}
	
	//删除
    function del($id){
    	$this->natabId = $this->class;
		$this->rel = $this->class;
		$this->forwardUrl = "/admin/".$this->class;
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
		admin_log(3, $id); //记录操作日志
		tojson($this->statusCode,$this->message,$this->natabId,$this->rel,$this->forwardUrl);
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
		admin_log(2, $id); //记录操作日志
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