<?php
class goods extends MY_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model("goods_model");
		$this->load->model("category_model");
	}
	public function index(){
		$data = $this->goods_model->get_list();
		$data['cat_list'] =$this->category_model->data_list();
		$this->load->view("admin/goods_list",$data);
	}
	public function update(){
		$this->goods_model->update('goods');
		$this->tojson($this->goods_model);
	}
	public function edit($id){
		$data['info'] = $this->goods_model->get_info('goods',$id);
		
		$data['cat_list'] =$this->category_model->data_list();
		$this->load->view("/admin/goods_edit",$data);
	}
	public function add(){
		$this->edit(0);
	}
	public function del($id){
		$this->del($id);
		$this->tojson($this->goods_model);
	}
}