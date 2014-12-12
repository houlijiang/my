<?php
class category_model extends MY_Model{
	public function get_list(){
		$post = $this->input->post();
		$sql = "select * from category where is_delete=0";
		$post['total'] = $this->data->getNums($sql);
		$this->page($post);
		$sql .=" limit {$post['limit']},{$post['page_size']}";
		$post['list'] = $this->data->getAll($sql);
		return $post;
	}
	
	public function data_list(){
		$sql = "select id,cat_name from category where is_delete=0";
		$data = $this->data->getAll($sql);
		$list = array();
		foreach ($data as $v){
			$list[$v['id']] = $v['cat_name'];
		}
		return $list;
	}
}