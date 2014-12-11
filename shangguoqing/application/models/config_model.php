<?php
class config_model extends MY_Model{
	public function __construct(){
		parent::__construct();
		$this->load->library("data");
	}
	public function get_list(){
		$post = $this->input->post();
		$sql = "select * from config where is_delete=0";
		$post['total'] = $this->data->getNums($sql);
		$this->page($post);
		$sql .=" limit {$post['limit']},{$post['page_size']}";
		$post['list'] = $this->data->getAll($sql);
		return $post;
	}
	public function update(){
		$post = $this->input->post();
		if($post['id']>0){
			$udata = array(
			'key'=>$post['key'],
			'value'=>$post['value'],
			'key_name'=>$post['key_name']
			);
			$this->data->update('config',$udata,array('id'=>$post['id']));
		}else{
			$udata = array(
			'key'=>$post['key'],
			'value'=>$post['value'],
			'create_time'=>date('Y-m-d H:i:s'),
			'key_name'=>$post['kay_name']
			);
			$this->data->insert('config',$udata);
		}
		$this->tojson(200,'操作成功','/admin/config');
	}
}