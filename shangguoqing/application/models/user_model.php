<?php
class user_model extends MY_Model{
	//验证登录
	public function check_login(){
		$post = $this->input->post();
		$user_name = !empty($post['username'])?trim($post['username']):'';
		$password = !empty($post['password'])?trim($post['password']):'';
		if(empty($user_name)){
			tojson(300,'用户名不能为空');
		}
		if(empty($password)){
			tojson(300,'密码不能为空');
		}
		$password = md5($password);
		$sql = "select * from cms_admin_user where user_name='$user_name' and password='$password'";
		$row = $this->data->getRow($sql);
		if(empty($row)){
			tojson(300,'密码有误');
		}
		$arr = array(
		'user_id'=>$row['id'],
		'user_name'=>$row['user_name']
		);
		$this->session->set_userdata($arr);
		tojson(200,'登录成功');
	}
}