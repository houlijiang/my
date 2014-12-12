<?php
class goods_model extends MY_Model{
	public function get_list(){
		$post = $this->input->post();
		$where = "where a.is_delete=0";
		if(isset($post['cat_id'])){
			$where .= " and a.cat_id=".$post['cat_id'];
		}
		$sql = "select a.*,b.cat_name from goods a left join category b on a.cat_id=b.id $where";
		$post['total'] = $this->data->getNums($sql);
		$this->page($post);
		$sql .=" limit {$post['limit']},{$post['page_size']}";
		$post['list'] = $this->data->getAll($sql);
		return $post;
	}
}