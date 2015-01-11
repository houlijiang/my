<?php
class user extends MY_Controller{
	public function __construct(){
		parent::__construct();
		$this->table_name = "cms_admin_user";
		$this->class = __CLASS__;
		$this->load->model("user_model");
	}
	public function index(){
		$this->load->view("admin/home");
		
	}
	public function login(){
		$post = $this->input->post();
		if(!empty($post)){
			$this->user_model->check_login();
			
		}
		$this->load->view("admin/login");
	}
	public function add(){
		$data['info'] = $this->get_info($this->session->userdata('user_id'));
		$this->load->view("admin/user_add",$data);
	}
	public function change_pwd(){
		$post = $this->input->post();
		if(!empty($post)){
			$this->user_model->change_pwd();
			
		}
		$this->load->view("admin/change_pwd");
	}
	public function check_login(){
		$this->load->model("user_model");
		$this->user_model->check_login();
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect(site_url('/user/login'));
	}
}