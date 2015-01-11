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
	die(json_encode($arr));
}
function config_data($key){
	$ci = &get_instance();
	$ci->load->model('config_model');
	return $ci->config_model->config_data($key);
}
function model_data($m,$f,$param=''){
	$ci = &get_instance();
	$m = $m.'_model';
	$ci->load->model($m);
	return $ci->$m->$f($param);
}
 /**记录操作日志
 * @param $type 操作类型  1 add 2 update 3 delete
 * */
 function admin_log($type=0,$data){
 	$ci = &get_instance();
 	$ci->load->library("data");
    $data = is_array($data)?json_encode($data):$data;
    $arr = array(
    'user_id'=>$ci->session->userdata('user_id'),
    'log_name'=>$ci->uri->segment(2),
    'log_type'=>$type,
    'log_data'=>$data,
    'ip'=>$ci->input->ip_address(),
    'create_time'=>date("Y-m-d H:i:s"),
    );
    $ci->data->insert("cms_log",$arr);
 }
/**
 * 图片地址
 * */
function img_url($url=''){
	return empty($url)?'/images/nopic.gif':$url;
}