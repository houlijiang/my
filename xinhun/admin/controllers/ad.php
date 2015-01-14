<?php
class ad extends MY_Controller{
	public function __construct(){
		parent::__construct();
		$this->class = __ClASS__;
		$this->model = 'ad_model';
		$this->table_name = "cms_ad";
		$this->load->model("ad_model");
		$this->rel = "ad";
	}
	public function _index(&$data){
		$data['position_list'] =$this->ad_model->position_list();
	}
	public function _insert(&$post){
		$post['admin_id'] = $this->session->userdata('user_id');
	}
	public function _edit(&$data){
		$data['position_list'] =$this->ad_model->position_list();
	}
}