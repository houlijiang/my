<?php
class article extends MY_Controller{
	public function __construct(){
		parent::__construct();
		$this->class = __ClASS__;
		$this->table_name = "article";
		$this->load->model("article_model");
		$this->load->model("category_model");
	}
	public function index(){
		$data = $this->article_model->get_list();
		$data['cat_list'] =$this->category_model->data_list(2);
		$this->load->view("admin/article_list",$data);
	}
	public function _insert(&$post){
		$post['admin_id'] = $this->session->userdata('user_id');
	}
	public function edit($id){
		$data['info'] = $this->get_info($id);
		$data['cat_list'] =$this->category_model->data_list(2);
		$this->load->view("/admin/article_edit",$data);
	}
	public function add(){
		$this->edit(0);
	}
	public function del_(){
		$this->natabId = 'article';
		$this->callbackType = 1;
		$this->rel = 'article';
		$this->forwardUrl = '/admin/article';
	}
	public function update_(){
		$this->callbackType = 0;
	}
}