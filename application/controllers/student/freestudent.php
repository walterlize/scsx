<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Freestudent extends CI_Controller {

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
    	$this->load->view('student/freestudent/course', $data);
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
    
    
    

    // 实验任务详细信息页面
    public function freestudentDetail() {
        $this->timeOut();
        $id = $this->session->userdata('u_name');
        
        
        $stuId = $this->session->userdata('u_name');
        $course_id = $this->uri->segment(4);
        $course = $this->getNvariable($course_id);
        //获取单个信息
        $course1 = $this->getCourse($course->cid);
        $array=array('stuId'=>$stuId,'nvid'=>$course_id);
        $this->load->model('m_chakans');
        $result=$this->m_chakans->getExist($array);
        $data['msg']="";
        $data['show1']="";
        $data['show2']="display:none";
        if(!$result){
        	$data['msg']="请提交实习基地";
        	$company=$this->getEmptyCom();
        	$curs = $this->getEmptyCuser();
        	$comcou=$this->getEmptyComcou();
        }else{
        	$aa = array();
        	foreach ($result as $r) {
        		$aa = $r;
        	}
        	$result=$aa;
        	 
        	$company=$this->getNCompany($result->comId);
        	$curs = $this->getNCompUser($result->u_id);
        	$comcou=$this->getNComcou($result->c_id);
        }
        
        $data['company']=$company;
        $data['compuser']=$curs;
        $data['comcou']=$comcou;
        $data['course_id']=$course_id;
        $data['variable']=$course;
        $data['course']=$course1;
    	if($company->stateId == '5'){
        	$data['show1']="display:none";
        	$data['show2']="";
        }elseif($company->stateId == '6'){
        	$data['msg']="实习基地审核失败，请查看后重新提交";
        }elseif($company->stateId == '7'){
        	$data['msg']="实习基地审核中，请稍后";
        }
        
        
        
        
        $this->load->view('common/header3');
        $this->load->view('student/freestudent/freestudentDetail', $data);
        $this->load->view('common/footer');
    }
   

    
    //获取单个基地
    function getNCompany($id){
    	$this->load->model('m_ncompany');
    	$result = $this->m_ncompany->getNCompanyById($id);
    	$data = array();
    	foreach ($result as $r) {
    		$data = $r;
    	}
    	return $data;
    }
    
    //获取单个基地用户
    function getNCompUser($id){
    	$this->load->model('m_ncompanyuser');
    	$result = $this->m_ncompanyuser->getNCompUserById($id);
    	$data = array();
    	foreach ($result as $r) {
    		$data = $r;
    	}
    	return $data;
    }
    
    // 获取单个信息
    function getNComcou($id) {
    	$this->load->model('m_ncomcou');
    	$result = $this->m_ncomcou->getNcomcouById_ws($id);
    	$data = array();
    	foreach ($result as $r) {
    		$data = $r;
    	}
    	return $data;
    }
    
    //获取课程信息
    // 获取单个信息
    function getNvariable($id) {
    	$this->load->model('m_nvariable');
    	$result = $this->m_nvariable->getNvariableById_ws($id);
    	$data = array();
    	foreach ($result as $r) {
    		$data = $r;
    	}
    	return $data;
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
    
    function getEmptyCom(){
    	@$company->comId = 0;
    	$company->comName = '';
    	$company->address = '';
    	$company->url = '';
    	$company->content = '';
    	$company->plan = '';
    	$company->u_id='';
    	$company->u_name='';
    	$company->stateId='';
    	$company->p_id='';
    	$company->collegeId = '';
    	$company->addId = '';
    	$company->addType='';
    	return $company;
    }
    function getEmptyCuser(){
    	@$cuser->u_id = 0;
    	$cuser->u_name = '';
    	$cuser->password = '';
    	$cuser->realname = '';
    	$cuser->phone = '';
    	$cuser->email = '';
    	$cuser->address = '';
    	$cuser->sex = '';
    	$cuser->ustateId = 1;
    	$cuser->collegeId = '';
    	return $cuser;
    }
    function  getEmptyComcou(){
    	@$comcou->id = 0;
    	$comcou->comId = '';
    	$comcou->course_id = '';
    	$comcou->courseId = '';
    	$comcou->courseNum = '';
    	return $comcou;
    }
    function getEmptyCourse(){
    	@$course->id = 0;
    	$course->courseId = '';
    	$course->courseNum = '';
    	$course->courseName = '';
    	$course->courseNameEn = '';
    	$course->courseCredit = '';
    	$course->courseHour = '';
    	$course->courseTeaId = '';
    	$course->courseTeaName = '';
    	$course->courseClass = '';
    	$course->courseType = '';
    	$course->courseTime = '';
    	$course->coursePlace = '';
    	$course->courseWeekly = '';
    	$course->college = '';
    	$course->term = '';
    	$course->patternId = '';
    	 
    	return $course;
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