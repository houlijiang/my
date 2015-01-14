<?php
class upload extends MY_Controller{
	public $path = './images/upload/';
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		$this->load->view('admin/upload');
		
	}
	public function do_upload(){
		  $config['upload_path'] = $this->path;
		  $config['allowed_types'] = 'gif|jpg|png';
		  $config['max_size'] = '3000';
		  $config['max_width']  = '1024';
		  $config['max_height']  = '2000';
		  $config['file_name']= date("YmdHis");
		  $this->load->library('upload', $config);
		  if ( ! $this->upload->do_upload('upfile'))
		  {
		  	$res = json_encode(array('success'=>0,'result'=>$this->upload->display_errors()));
		  } 
		  else
		  {
		  	$f = $this->upload->data();
		  	$f['file_name'] = "/images/upload/".$f['file_name'];
		   $res = json_encode(array('success'=>1,'result'=>$f));
		  }
		die($res);  
		
	}
	//自动创建图片目录
	public function mkdirs($dir)  {
	 if(!is_dir($dir))  {
	  if(!mkdir($dir)){ 
	   return false;  
	  } 
	  if(!mkdir($dir,0777)){ 
	   return false;  
	  } 
	 }  
	 return true;  
	}
}