<?php
class category extends MY_Controller{
	public function __construct(){
		parent::__construct();
		$this->table_name = "cms_category";
		$this->class = __CLASS__;
		$this->load->model('category_model');
	}
	public function _edit(&$data){
		$data['cat_list'] = $this->category_model->data_list(0);
	}
}