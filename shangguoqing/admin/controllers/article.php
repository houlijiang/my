<?php
class article extends MY_Controller{
	public function __construct(){
		parent::__construct();
		$this->class = __ClASS__;
		$this->table_name = "article";
		$this->load->model("article_model");
		$this->load->model("category_model");
	}
	public function _index(&$data){
		$data['cat_list'] =$this->category_model->data_list(2);
	}
	public function _insert(&$post){
		$post['admin_id'] = $this->session->userdata('user_id');
	}
	public function _edit(&$data){
		$data['cat_list'] =$this->category_model->data_list(2);
	}
}