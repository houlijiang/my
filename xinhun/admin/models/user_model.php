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
		$uarr = array(
			'last_login_time'=>date("Y-m-d H:i:s"),
		);
		$this->data->update('cms_admin_user',$uarr,array('id'=>$row['id']));
		admin_log(0,$user_name);
		tojson(200,'登录成功');
	}
	//修改密码
	public function change_pwd(){
		$user_id = $this->session->userdata('user_id');
		$post = $this->input->post();
		
		if(empty($post['old_pwd']) || empty($post['new_pwd']) || empty($post['new_pwd1'])){
			tojson(300,'密码不能为空');
		};
		$password = md5($post['old_pwd']);
		$sql = "select * from cms_admin_user where id=$user_id and password='$password'";
		$row = $this->data->getRow($sql);
		if(empty($row)){
			tojson(300,'旧密码有误');	
		}
		
		$uarr = array(
			'password'=>md5($post['new_pwd']),
		);
		$this->data->update('cms_admin_user',$uarr,array('id'=>$user_id));
		tojson(200,'修改成功');
	}
}