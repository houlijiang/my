<?php
class upload extends MY_Controller{
	public function index(){
		$this->load->view('admin/upload');
	}
	public function do_upload(){
		  $config['upload_path'] = './images/upload/';
		  $config['allowed_types'] = 'gif|jpg|png';
		  $config['max_size'] = '3000';
		  $config['max_width']  = '1024';
		  $config['max_height']  = '2000';
		  $this->load->library('upload', $config);
		  
		  if ( ! $this->upload->do_upload('upfile'))
		  {
		  	$res = json_encode(array('success'=>0,'result'=>$this->upload->display_errors()));
		  } 
		  else
		  {
		   $res = json_encode(array('success'=>1,'result'=>$this->upload->data()));
		  }
		die($res);  
		
	}
}