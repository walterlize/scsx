<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ncourse extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('pagination');
        ini_set('max_execution_time', '0');
        date_default_timezone_set('PRC');
    }
    
    public function ncourseList(){
    	$this->timeOut();
    	
    	$array=array();
    	$this->load->model('m_ncourse');
    	$num = $this->m_ncourse->getNum_ws($array);
    	$offset = $this->uri->segment(4);
    	
    	$data['course'] = $this->getCourses($offset);
    	$config['base_url'] = base_url() . 'index.php/admin/ncourse/ncourseList';
    	$config['total_rows'] = $num;
    	$config['uri_segment'] = 4;
    	$this->pagination->initialize($config);
    	$data['page'] = $this->pagination->create_links();
    	
    	$this->load->view('common/header3');
    	$this->load->view('admin/course/course', $data);
    	$this->load->view('common/footer');
    }
    
    // 分页获取全部实验任务信息
    public function getCourses($offset) {
    	$this->timeOut();
    	$this->load->model('m_ncourse');
    	$data = array();
    	$result = $this->m_ncourse->getNcourses_ws($data, PER_PAGE, $offset);
    
    	foreach ($result as $r) {
    		$arr = array(
    				'id' => $r->id,
				    'courseId' => $r->courseId,
				    'courseNum' => $r->courseNum,
				    'courseName' => $r->courseName,
				    'courseNameEn' => $r->courseNameEn,
				    'courseCredit' => $r->courseCredit,
				    'courseHour' => $r->courseHour,
				    'courseTeaId' => $r->courseTeaId,
				    'courseTeaName' => $r->courseTeaName,
				    'courseClass' => $r->courseClass,
				    'courseType' => $r->courseType,
				    'courseTime' => $r->courseTime,
				    'coursePlace' => $r->coursePlace,
				    'courseWeekly' => $r->courseWeekly,
				    'college' => $r->college,
				    'term' => $r->term,
    				'patternId'=> $r->patternId,
    				'pattern'=> $r->pattern,
    				'content'=>$r->content
    				);
    		array_push($data, $arr);
    	}
    	return $data;
    }
    
    public function ncourseEdit(){
    	$this->timeOut();
    	
    	$id = $this->uri->segment(4);
    	//获取单个信息
    	$course = $this->getCourse($id);
    	//获取实习模式
    	$this->load->model('m_pattern');
    	//$pattern = $this->m_pattern->getPattern(array());
    	
    	   	
    	$data['course'] = $course;
    	//$data['pattern'] = $pattern;
    	$this->load->view('common/header3');
    	$this->load->view('admin/course/courseEdit', $data);
    	$this->load->view('common/footer');
    }
    
    // 获取单个信息
    function getCourse($id) {
    	$this->load->model('m_ncourse');
    	$result = $this->m_ncourse->getNcourseById_ws($id);
    	$data = array();
    	foreach ($result as $r) {
    		$data = $r;
    	}
    	return $data;
    }
    
    //保存信息
    public function save(){
    	$this->timeOut();
    	$id=$this->input->post("id");
    	$this->load->model('m_ncourse');
    	$array=array('patternId'=>$this->input->post("patternId"));
    	$r = $this->m_ncourse->updateNcourse($id,$array);
    	if($r>0){
    		echo '<script language="JavaScript">alert("设置成功");</script>';
    	}
    	
    	//获取单个信息
    	$course = $this->getCourse($id);  	
    	$data['course'] = $course;
    	
    	$this->load->view('common/header3');
    	$this->load->view('admin/course/courseEdit', $data);
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