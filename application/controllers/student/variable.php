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
    
    //查看选课列表
    public function variableList(){
    	$this->timeOut();
    	
    	$stuId = $this->session->userdata('u_num');
    	//$term = $this->session->userdata('term');
    	
    	$term = "2014-2015-2-2";
    	$array=array('XH'=>$stuId,'ZXJXJHH'=>$term);
    	
    	$this->load->model('m_nvariable');
    	$num = $this->m_nvariable->getNum($array);
    	
    	$offset = $this->uri->segment(4);
    	
    	$data['variable'] = $this->getVariables($array,$offset);
    	$config['base_url'] = base_url() . 'index.php/student/variable/variableList';
    	$config['total_rows'] = $num;
    	$config['uri_segment'] = 4;
    	$this->pagination->initialize($config);
    	$data['page'] = $this->pagination->create_links();
    	
    	$this->load->view('common/header3');
    	$this->load->view('student/variable/variable', $data);
    	$this->load->view('common/footer');
    }
    
    // 分页获取全部实验任务信息
    public function getVariables($array,$offset) {
    	$this->timeOut();
    	$this->load->model('m_nvariable');
    	$result = $this->m_nvariable->getNvariables($array, PER_PAGE, $offset);
        //var_dump($result);echo "<br>";
    	$data = array();
    	foreach ($result as $r) {
    		
    		$arrCourse = array('cour_no'=>$r->KCH,'cour_num'=>$r->KXH,'cour_term'=>$r->ZXJXJHH);
    		//var_dump($arrCourse);echo "<br>";
    		$resCourse = $this->getCoursep($arrCourse);
    		//var_dump($resCourse);echo "<br>";
    		//----------------
        	if($resCourse){
	    		$arr = array(
	    				
					    'courseId' => $r->KCH,
					    'courseNum' => $r->KXH,
					    'courseName' => $r->KCM,
	    				'coursePattern' => $resCourse->patt_type,
		            	'coursePublish' => $resCourse->cour_publish
	    				);
        	}else{
        		$arr = array(
        				
        				'courseId' => $r->KCH,
        				'courseNum' => $r->KXH,
        				'courseName' => $r->KCM,
        				'coursePattern' => "未分配",
        				'coursePublish' => "未发布"
        		);
        	}
    		array_push($data, $arr);
    	}
    	return $data;
    }
    
    
    
    public function variableDetail(){
    	$this->timeOut();
    	
    	$cour_no = $this->uri->segment(4);
    	$cour_num = $this->uri->segment(5);
    	$term = $this->session->userdata("term");
    	//获取单个选课信息
    	
    	//获取单个信息
    	$arrCourse = array('KCH'=>$cour_no,'KXH'=>$cour_num,'ZXJXJHH'=>$term);
    	$course = $this->getNCourse($arrCourse);
    	$arrCoursep = array('cour_no'=>$cour_no,'cour_num'=>$cour_num,'cour_term'=>$term);
    	$coursep = $this->getCoursep($arrCoursep);
    	if(!$coursep){
    		$coursep = $this->getEmptyCoursep();
    	}
    	$data['course'] = $course;
    	$data['coursep'] = $coursep;
    	
    	$this->load->view('common/header3');
    	$this->load->view('student/variable/variableDetail', $data);
    	$this->load->view('common/footer');
    }
    
    
    // 获取单个选课信息
    function getVariable($array) {
    	$this->load->model('m_nvariable');
    	$result = $this->m_nvariable->getNvariable($array);
    	$data = array();
    	foreach ($result as $r) {
    		$data = $r;
    	}
    	return $data;
    }
    
    // 获取单个
    function getCoursep($array) {
    	$this->load->model('m_course');
    	$result = $this->m_course->getCourse_ws($array);
    	$data = array();
    	foreach ($result as $r) {
    		$data = $r;
    	}
    	return $data;
    }
    
    // 获取单个
    function getNCourse($array) {
    	$this->load->model('m_ncourse');
    	$result = $this->m_ncourse->getNcourse($array);
    	$data = array();
    	foreach ($result as $r) {
    		$data = $r;
    	}
    	return $data;
    }
    
    function getEmptyCoursep(){
    	@$coursep->cour_id = 0;
    	$coursep->cour_no = '';
    	$coursep->cour_num = '';
    	$coursep->cour_term = '';
    	$coursep->cour_coll_id = '';
    	$coursep->cour_coll_name = '';
    	$coursep->cour_name = '';
    	$coursep->cour_name_en = '';
    	$coursep->cour_credit = '';
    	$coursep->cour_hours = '';
    	$coursep->cour_class = '';
    	$coursep->cour_teac_num = '';
    	$coursep->cour_teac_name = '';
    	$coursep->cour_mode = '';
    	$coursep->cour_time = '';
    	$coursep->cour_place = '';
    	$coursep->cour_week = '';
    	$coursep->cour_pattern_id = '';
    	$coursep->cour_publish = 0;
    	$coursep->patt_type = "未分配";
    	 
    	return $coursep;
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