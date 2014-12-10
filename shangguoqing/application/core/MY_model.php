<?php
class MY_model extends CI_Model{
	public $statusCode = 200;
	public $message = '操作成功';
	public function tojson($code=100,$message='',$url=''){
		$arr = array(
			'statusCode'=>$code,
			'message'=>$message,
			'navTabId'=>'',
			'rel'=>'',
			'callbackType'=>'forward', //forward  closeCurrent
			'forwardUrl'=>$url
		);
		die(json_encode($arr,JSON_UNESCAPED_UNICODE));
	}
}