<?php
class ad_model extends MY_model{
	public $state = array('编辑中','上架','下架');
	public $ad_type = array(0=>'图片广告','文字广告','代码广告');
	/**
	 * 广告位列表
	 * */
	public function position_list(){
		$sql = "select * from cms_ad_position where is_delete=0 and is_show=1";
		$res = $this->data->getAll($sql);
		$list = array();
		foreach ($res as $v){
			$list[$v['id']] = $v['position_name'];
		}
		return $list;
	}
	
	/**
	 * 广告列表
	 * */
	public function get_list(){
		$post = $this->input->post();
		$where = "where a.is_delete=0";
		if(isset($post['position_id']) && $post['position_id']>0){
			$where .= " and a.position_id=".$post['position_id'];
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
			$where .= " and ad_name like '%{$post['keyword']}%'";
		}
		$sql = "select a.*,b.position_name,c.user_name from cms_ad a left join cms_ad_position b on a.position_id=b.id left join cms_admin_user c on a.admin_id=c.id $where";
		$post['total'] = $this->data->getNums($sql);
		$this->page($post);
		$sql .=" order by a.id desc limit {$post['limit']},{$post['page_size']}";
		$post['list'] = $this->data->getAll($sql);
		return $post;
	}
}