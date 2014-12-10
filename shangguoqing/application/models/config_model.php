<?php
class config_model extends MY_Model{
	public function __construct(){
		parent::__construct();
		$this->load->library("data");
	}
	public function get_list($page=1,$page_size=10){
		$post = $this->input->post();
		
		$sql = "select * from config where is_delete=0";
		$data['total'] = $this->data->getNums($sql);
		$page = $page<=1?1:$page;
		$page = ($page-1)*$page_size;
		$sql .=" limit $page,$page_size";
		$data['list'] = $this->data->getAll($sql);
		
		return $data;
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