<?php
function tojson($code=100,$message='',$type=0,$type_ext='',$type_ext1=''){
	$arr = array(
		'statusCode'=>$code,
		'message'=>$message,
	);
	if($type>0){
		$arr['callbackType'] = 'forward';
		$arr['forwardUrl'] = $type_ext;
		$arr['rel'] = $type_ext1;
	}else{
		$arr['callbackType'] = 'closeCurrent';
		$arr['navTabId'] = $type_ext;
	}
	die(json_encode($arr,JSON_UNESCAPED_UNICODE));
}