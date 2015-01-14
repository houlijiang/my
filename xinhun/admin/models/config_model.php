<?php
class config_model extends MY_Model{
	public function get_list(){
		$post = $this->input->post();
		$sql = "select * from cms_config where is_delete=0";
		$post['total'] = $this->data->getNums($sql);
		$this->page($post);
		$sql .=" limit {$post['limit']},{$post['page_size']}";
		$post['list'] = $this->data->getAll($sql);
		return $post;
	}
	
	public function config_data($key=''){
		if(empty($key)) return '';
		$data = array();
		$sql = "select config_key,config_value from cms_config where is_delete=0";
		foreach($this->data->getAll($sql) as $v){
			$data[$v['config_key']] = $v['config_value'];
		}
		return isset($data[$key])?$data[$key]:'';
	}
}