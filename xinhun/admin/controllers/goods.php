<?php
class goods extends MY_Controller{
	public function __construct(){
		parent::__construct();
		$this->class = __ClASS__;
		$this->table_name = "cms_goods";
		$this->load->model("goods_model");
		$this->load->model("category_model");
	}
	public function _index(&$data){
		$data['cat_list'] =$this->category_model->data_list(1);
	}
	public function _edit(&$data){
		$data['cat_list'] =$this->category_model->data_list(1);
	}
}