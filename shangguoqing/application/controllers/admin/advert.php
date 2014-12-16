<?php
class advert extends MY_Controller{
	public function __construct(){
		parent::__construct();
		$this->class = __ClASS__;
		$this->table_name = "ad";
		$this->load->model("ad_model");
	}
	public function index(){
		$data = $this->ad_model->get_list();
		$data['position_list'] =$this->ad_model->position_list();
		$this->load->view("admin/ad_list",$data);
	}
	public function _insert(&$post){
		$post['admin_id'] = $this->session->userdata('user_id');
	}
	public function edit($id){
		$data['info'] = $this->get_info($id);
		$data['position_list'] =$this->ad_model->position_list();
		$this->load->view("/admin/ad_edit",$data);
	}
	public function add(){
		$this->edit(0);
	}
	public function del_(){
		$this->natabId = 'advert';
		$this->callbackType = 1;
		$this->rel = 'advert';
		$this->forwardUrl = '/admin/advert';
	}
	public function update_(){
		$this->rel = 'advert';
		$this->forwardUrl = '/admin/advert';
		$this->callbackType = 1;
	}
}