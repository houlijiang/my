<?php
class user extends CI_Controller{
	public function index(){
		$this->load->view("admin/home");
	}
	public function login(){
		$this->load->view("admin/login");
	}
	public function add(){
		$this->load->view("admin/user_add");
	}
	public function change_pwd(){
		$this->load->view("admin/change_pwd");
	}
	public function check_login(){
		$this->load->model("user_model");
		$this->user_model->check_login();
	}
	public function logout(){
		$this->session->sess_destroy();
	}
}