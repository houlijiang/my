<?php
function tojson($code=100,$message='',$url='',$navTabId=''){
	$arr = array(
		'statusCode'=>$code,
		'message'=>$message,
		'navTabId'=>$navTabId,
		'rel'=>'',
		'callbackType'=>'closeCurrent', //forward  closeCurrent
		'forwardUrl'=>$url
	);
	die(json_encode($arr,JSON_UNESCAPED_UNICODE));
}