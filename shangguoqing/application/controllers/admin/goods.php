<?php
class goods extends MY_Controller{
	public function __construct(){
		parent::__construct();
		$this->class = __ClASS__;
		$this->table_name = "goods";
		$this->load->model("goods_model");
		$this->load->model("category_model");
		
		$this->natabId = 'goods';
		$this->callbackType = 1;
		$this->rel = 'goods';
		$this->forwardUrl = '/admin/goods';
	}
	public function index(){
		$data = $this->goods_model->get_list();
		$data['cat_list'] =$this->category_model->data_list(1);
		$this->load->view("admin/goods_list",$data);
	}
	public function edit($id){
		$data['info'] = $this->get_info($id);
		
		$data['cat_list'] =$this->category_model->data_list(1);
		$this->load->view("/admin/goods_edit",$data);
	}
	public function add(){
		$this->edit(0);
	}
	public function del_(){
		$this->natabId = 'goods';
		$this->callbackType = 1;
		$this->rel = 'goods';
		$this->forwardUrl = '/admin/goods';
	}
	public function update_(){
		$this->callbackType = 0;
	}
}