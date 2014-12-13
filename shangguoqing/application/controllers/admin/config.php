<?php
class config extends MY_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('config_model');
	}
	public function index(){
		$data = $this->config_model->get_list();
		$this->load->view("admin/config_list",$data);
	}
	public function edit($id=0){
		$data['info'] = $this->config_model->get_info('config',$id);
		$this->load->view("admin/config_edit",$data);
	}
	public function add(){
		$this->edit(0);
	}
	public function update(){
		$this->config_model->update('config');
		$this->tojson($this->config_model,'config');
		
	}
}