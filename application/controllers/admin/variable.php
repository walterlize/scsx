<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Variable extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('pagination');
        ini_set('max_execution_time', '0');
        date_default_timezone_set('PRC');
    }

    public function variableList() {
        $this->timeOut();

        $this->load->model('m_nvariable');
        $num = $this->m_nvariable->getNum_ws1(array());
        $offset = $this->uri->segment(4);

        $data['var'] = $this->getVariable(array(),$offset);
        $config['base_url'] = base_url() . 'index.php/admin/variable/variableList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('admin/var/var', $data);
        $this->load->view('common/footer');
    }
    
    
    
    public function getVariable($array,$offset) {
    	$this->timeOut();
    	$this->load->model('m_nvariable');
    	$data = array();
    
    	$result = $this->m_nvariable->getNvariables_ws1($array, PER_PAGE, $offset);
    
    	foreach ($result as $r) {
    		$arr = array(
    				'stuId' => $r->stuId,
    				'id' => $r->id,
    				'courseId' => $r->courseId,
    				'courseNum' => $r->courseNum,
    				'stuName' => $r->stuName,
    				'courseName'=>$r->courseName
    				);
    		array_push($data, $arr);
    	}
    	return $data;
    }
    
    public function searchVariable(){
    	$courseId=$this->input->post('courseId');
    	$courseNum=$this->input->post('courseNum');
    	$array=array('courseId'=>$courseId);
    	if($courseNum != ''){
    		$array=array('courseId'=>$courseId,'courseNum'=>$courseNum);
    	}
    	
    	$this->load->model('m_nvariable');
    	$num = $this->m_nvariable->getNum_ws1($array);
    	$offset = $this->uri->segment(4);
    	
    	$data['var'] = $this->getVariable($array,$offset);
    	$config['base_url'] = base_url() . 'index.php/admin/variable/variableList';
    	$config['total_rows'] = $num;
    	$config['uri_segment'] = 4;
    	$this->pagination->initialize($config);
    	$data['page'] = $this->pagination->create_links();
    	
    	$this->load->view('common/header3');
    	$this->load->view('admin/var/var', $data);
    	$this->load->view('common/footer');
    	
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