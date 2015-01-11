<?php
class home extends MY_Controller{
	public function index(){
		$this->load->view("admin/home");
	}
	public function login(){
		$this->load->view("admin/login");
	}
	public function logout(){
		
		redirect("/admin/user/login");
	}
	public function add(){
		$this->load->view("admin/user_add");
	}
	public function main(){
		$this->load->view("admin/main");
	}
}