<?php
class MY_model extends CI_Model{
	public $statusCode = 200;
	public $message = '操作成功';
	public function __construct(){
		parent::__construct();
		$user_id = $this->session->userdata("user_id");
		if(empty($user_id)){
		//	$this->tojson(301,'会话超时');
		}
	}
	public function tojson($code=100,$message='',$url=''){
		$arr = array(
			'statusCode'=>$code,
			'message'=>$message,
			'navTabId'=>'',
			'rel'=>'',
			'callbackType'=>'closeCurrent', //forward  closeCurrent
			'forwardUrl'=>$url
		);
		die(json_encode($arr,JSON_UNESCAPED_UNICODE));
	}
	
	public function page(&$post){
		$page = isset($post['pageNum'])?intval($post['pageNum']):1;
		$page_size = isset($post['numPerPage'])?intval($post['numPerPage']):20;
		$post['page_size'] = $page_size;
		$post['cur_page'] = $page;
		$page = $page<=1?1:$page;
		$post['limit'] = ($page-1)*$page_size;
	}
}