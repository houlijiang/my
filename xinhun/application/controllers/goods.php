<?php
class goods extends MY_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('goods_model');
	}
	public function index($cat_id=0,$page=0){
		$data = $this->goods_model->get_list($cat_id,$page);
		$this->load->view('goods',$data);
	}
	public function view($id=0){
		$data = $this->goods_model->get_info($id);
		$this->load->view('goods',$data);
	}
}