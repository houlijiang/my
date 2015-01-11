<?php
class MY_Loader extends CI_Loader {

    function __construct()
    {
        parent::__construct();
    }
    function set_path($path=''){
    	if(!empty($path)){
    		$this->_ci_view_paths = array(APPPATH.'views/'.$path.'/'	=> TRUE);
    	}
    }
}