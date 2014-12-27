<?php
class config extends MY_Controller{
	public function __construct(){
		parent::__construct();
		$this->table_name = "cms_config";
		$this->class = __CLASS__;
		$this->load->model('config_model');
	}

}