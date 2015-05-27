<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Course extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('pagination');
        ini_set('max_execution_time', '0');
        date_default_timezone_set('PRC');
    }
    
    //查看选课列表
    public function courseList(){
    	$this->timeOut();
    	
    	$stuId = $this->session->userdata('u_name');
    	$array=array('stuId'=>$stuId,'patternId'=>'2');
    	$this->load->model('m_nvariable');
    	$num = $this->m_nvariable->getNum_ws($array);
    	$offset = $this->uri->segment(4);
    	
    	$data['variable'] = $this->getVariables($array,$offset);
    	$config['base_url'] = base_url() . 'index.php/student/variable/variableList';
    	$config['total_rows'] = $num;
    	$config['uri_segment'] = 4;
    	$this->pagination->initialize($config);
    	$data['page'] = $this->pagination->create_links();
    	
    	$this->load->view('common/header3');
    	$this->load->view('student/course/course', $data);
    	$this->load->view('common/footer');
    }
    
    // 分页获取全部实验任务信息
    public function getVariables($array,$offset) {
    	$this->timeOut();
    	$this->load->model('m_nvariable');
    	$result = $this->m_nvariable->getNvariables_ws($array, PER_PAGE, $offset);
    
    	$data = array();
    	foreach ($result as $r) {
    		$arr = array(
    				'id' => $r->id,
				    'courseId' => $r->courseId,
				    'courseNum' => $r->courseNum,
				    'courseName' => $r->courseName,
				    'courseNameEn' => $r->courseNameEn,
				    'pattern' => $r->pattern,
				    
    				);
    		array_push($data, $arr);
    	}
    	return $data;
    }
    
    
    
    public function courseDetail(){
    	$this->timeOut();
    	
    	$id = $this->uri->segment(4);
    	//获取单个选课信息
    	$variable = $this->getVariable($id);
    	//获取单个信息
    	$course = $this->getCourse($variable->cid);
    	
    	$data['course'] = $course;
    	$data['variable'] = $variable;
    	//$data['pattern'] = $pattern;
    	$this->load->view('common/header3');
    	$this->load->view('student/variable/variableDetail', $data);
    	$this->load->view('common/footer');
    }
    
    // 获取单个课程信息
    function getCourse($id) {
    	$this->load->model('m_ncourse');
    	$result = $this->m_ncourse->getNcourseById_ws($id);
    	$data = array();
    	foreach ($result as $r) {
    		$data = $r;
    	}
    	return $data;
    }
    // 获取单个选课信息
    function getVariable($id) {
    	$this->load->model('m_nvariable');
    	$result = $this->m_nvariable->getNvariableById_ws($id);
    	$data = array();
    	foreach ($result as $r) {
    		$data = $r;
    	}
    	return $data;
    }
    


    
    // session中的role不存在的时候退出系统
    function timeOut() {
        $role = $this->session->userdata('roleId');

        if ($role != 5) {
            $this->load->view('logout');
        }
    }

}

?>