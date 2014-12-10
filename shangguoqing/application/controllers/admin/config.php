<?php
class config extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('config_model');
	}
	public function index($page=0){
		$data = $this->config_model->get_list();
		$this->load->view("admin/config_list",$data);
	}
	public function edit($id=0){
		$id = intval($id);
		$sql = "select * from config where id=$id";
		$data['info'] = $this->data->getRow($sql);
		$this->load->view("admin/config_edit",$data);
	}
	public function add(){
		$data['info'] = array('id'=>0,'key'=>'','value'=>'','key_name'=>'');
		$this->load->view("admin/config_edit",$data);
	}
	public function update(){
		$this->config_model->update();
		
	}
}