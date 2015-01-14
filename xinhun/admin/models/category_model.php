<?php
class category_model extends MY_Model{
	public function get_list(){
		$post = $this->input->post();
		$sql = "select a.*,b.cat_name pname from cms_category a left join cms_category b on b.id=a.parent_id where a.is_delete=0";
		$post['total'] = $this->data->getNums($sql);
		$this->page($post);
		$sql .=" limit {$post['limit']},{$post['page_size']}";
		$post['list'] = $this->data->getAll($sql);
		return $post;
	}
	
	public function data_list($parent_id=0){
		$where = " where is_delete=0";
		if($parent_id>0){
			$where .=" and parent_id=$parent_id";
		}
		$sql = "select id,cat_name from cms_category $where";
		$data = $this->data->getAll($sql);
		$list[0] = '选择分类';
		foreach ($data as $v){
			$list[$v['id']] = $v['cat_name'];
		}
		return $list;
	}
}