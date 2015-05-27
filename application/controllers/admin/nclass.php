<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Nclass extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('pagination');
        ini_set('max_execution_time', '0');
        date_default_timezone_set('PRC');
    }

    public function classList() {
        $this->timeOut();

        $this->load->model('m_nstudent');

        $data['class'] = $this->getMajors(array());
       

        $this->load->view('common/header3');
        $this->load->view('admin/nclass/class', $data);
        $this->load->view('common/footer');
    }
    
    // 分页获取全部实验任务信息
    public function getMajors($array) {
    	$this->timeOut();
    	$this->load->model('m_nstudent');
    	
    	$result = $this->m_nstudent->getMajor($array);
    	$data = array();
    	foreach ($result as $r) {
    		$arr = array(
    				'major' => $r->major, 
    				'class' => $r->class, 
    				);
    		array_push($data, $arr);
    	}
    	return $data;
    }
    


    // session中的role不存在的时候退出系统
    function timeOut() {
        $role = $this->session->userdata('roleId');

        if ($role != 2) {
            $this->load->view('logout');
        }
    }

}

?>