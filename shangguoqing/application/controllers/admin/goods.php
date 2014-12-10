<?php
class goods extends CI_Controller{
	public function index(){
		$this->load->view("admin/goods_list");
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
}