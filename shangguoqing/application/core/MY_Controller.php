<?php
class MY_Controller extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$user_id = $this->session->userdata("user_id");
		$m = $this->uri->segment(2);
		$f = $this->uri->segment(3);
		if(empty($user_id) && $m!='user' && $f!='login'){
			echo '<script>location.href="/admin/user/login"</script>';
			exit;
		}
	}
	
	public function tojson($model,$natabId=''){
		$arr = array(
			'statusCode'=>$model->statusCode,
			'message'=>$model->message,
		);
		$arr['callbackType'] = 'closeCurrent';//'closeCurrent';forward
		$arr['forwardUrl'] = '';
		$arr['rel'] = '';
		$arr['navTabId'] = $natabId;
		die(json_encode($arr,JSON_UNESCAPED_UNICODE));
	}
	
}