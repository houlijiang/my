<?php
class user extends CI_Controller{
	public function index(){
		$this->load->view("admin/home");
	}
	public function logout(){
		
		redirect("/admin/user/login");
	}
	public function add(){
		$this->load->view("admin/user_add");
	}
}