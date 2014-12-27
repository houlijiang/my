<?php
function tojson($statusCode=200,$message='操作成功',$navTabId='',$rel='',$forwardUrl=''){
	$arr = array(
		'statusCode'=>$statusCode,
		'message'=>$message,
		'rel'=>$rel,
		'navTabId'=>$navTabId,
		'callbackType'=>!empty($forwardUrl)?'forward':'closeCurrent',
	);
	if(!empty($forwardUrl)){
		$arr['forwardUrl'] = $forwardUrl;
	}
	die(json_encode($arr,JSON_UNESCAPED_UNICODE));
}
function config_data($key){
	$ci = &get_instance();
	$ci->load->model('config_model');
	return $ci->config_model->config_data($key);
}