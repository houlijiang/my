<?php
class article_model extends MY_Model{
	public $state = array('编辑中','上架','下架');
	public function get_list(){
		$post = $this->input->post();
		$where = "where a.is_delete=0";
		if(isset($post['cat_id']) && $post['cat_id']>0){
			$where .= " and a.cat_id=".$post['cat_id'];
		}
		if(isset($post['state']) && $post['state']>=0){
			$where .= " and a.state=".$post['state'];
		}
		if(isset($post['start_time']) && !empty($post['start_time'])){
			$where .= " and a.create_time>='{$post['start_time']}'";
		}
		if(isset($post['end_time']) && !empty($post['end_time'])){
			$where .= " and a.create_time<'{$post['end_time']}'";
		}
		if(!empty($post['keyword'])){
			$where .= " and goods_name like '%{$post['keyword']}%'";
		}
		$sql = "select a.*,b.cat_name,c.user_name from cms_article a left join cms_category b on a.cat_id=b.id left join cms_admin_user c on a.admin_id=c.id $where";
		$post['total'] = $this->data->getNums($sql);
		$this->page($post);
		$sql .=" order by a.id desc limit {$post['limit']},{$post['page_size']}";
		$post['list'] = $this->data->getAll($sql);
		return $post;
	}
}