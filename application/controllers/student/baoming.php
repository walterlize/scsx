<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Baoming extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('pagination');
        ini_set('max_execution_time', '0');
        date_default_timezone_set('PRC');
    }

    public function baomingList() {
    	$this->timeOut();
    
    	//查看志愿式属于自己的课程
    	$stuId = $this->session->userdata('u_name');
    	$array=array('stuId'=>$stuId,'patternId'=>'1');
    	$this->load->model('m_nvariable');
    	$variable = $this->getVariables($array);
    	
    	$var_com=array();
    	//查看课程是否已分配基地com_cou
    	for($i=0;$i<count($variable);$i++){
    		$array1=array('course_id'=>$variable[$i]['cid'],'courseId'=>$variable[$i]['courseId'],'courseNum'=>$variable[$i]['courseNum']);
    		$this->load->model('m_ncomcou');
    		$var_com[$i] = $this->m_ncomcou->getNcomcou_ws($array1);
    	}
    	
    	
    	$data['variable']=$variable;
    	$data['var_com'] =$var_com;
    	   	
    	$this->load->view('common/header3');
    	$this->load->view('student/baoming/baoming', $data);
    	$this->load->view('common/footer');
    	
    	
    }
    
    // 分页获取全部实验任务信息
    public function getVariables($array) {
    	$this->timeOut();
    	$this->load->model('m_nvariable');
    	$result = $this->m_nvariable->getNvariable_ws($array);
    
    	$data = array();
    	foreach ($result as $r) {
    		$arr = array(
    				'id' => $r->id,
    				'cid'=>$r->cid,
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
    
// 分页获取全部实验任务信息
    public function getCourses($array,$offset) {
    	$this->timeOut();
    	$this->load->model('m_ncourse');
    	$data = array();
    	$result = $this->m_ncourse->getNcourses1_ws($array, PER_PAGE, $offset);
    
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

    
    // 实验任务详细信息页面
    public function baomingDetail() {
    	$this->timeOut();
    	//分配表id
    	$id = $this->uri->segment(4);
    	$comcou=$this->getComcou($id);
    	//基地信息
    	$company = $this->getCompany($comcou->comId);
    	//基地负责人信息
    	$comuser =$this->getCompanyuser($comcou->u_id);
    	//课程信息
    	$course = $this->getCourse($comcou->course_id);
    	
    	$u_id = $this->session->userdata('u_name');
    	$array = array('c_id' => $id, 'u_id' => $u_id);
    	$result = $this->getResult($array);
    	
    	$show2 = "display:none";
    	$b_id=0;
    	if ($result) {
    		$show = 'display:none';
    		$show1 = 'display';
    		$b_id=$result->b_id;
    		$stateId = $result->stateId;
    		if($result->stateId==2){
    			$show2 = "";
    		}
    	} else {
    		$show = 'display';
    		$show1 = 'display:none';
    	}
    	$data['show'] = $show;
    	$data['show1'] = $show1;
    	$data['show2'] = $show2;

    	$data['comcou']=$comcou;
    	$data['company']=$company;
    	$data['comuser']=$comuser;
    	$data['course']=$course;
    	$data['b_id']=$b_id;

    	$this->load->view('common/header3');
    	$this->load->view('student/baoming/baomingDetail', $data);
    	$this->load->view('common/footer');
    }
    
    
    //获取单个分配信息
    function getComcou($id){
    	$this->load->model('m_ncomcou');
    	$result = $this->m_ncomcou->getNcomcouById_ws($id);
    	$data = array();
    	foreach ($result as $r) {
    		$data = $r;
    	}
    	return $data;
    }
    //获取单个基地信息
    function getCompany($id){
    	$this->load->model('m_ncompany');
    	$result = $this->m_ncompany->getNCompanyById($id);
    	$data = array();
    	foreach ($result as $r) {
    		$data = $r;
    	}
    	return $data;
    }
    //获取单个课程信息
    function getCourse($id){
    	$this->load->model('m_ncourse');
    	$result = $this->m_ncourse->getNcourseById_ws($id);
    	$data = array();
    	foreach ($result as $r) {
    		$data = $r;
    	}
    	return $data;
    }
    //获取单个用户信息
    function getCompanyuser($id){
    	$this->load->model('m_ncompanyuser');
    	$result = $this->m_ncompanyuser->getNCompUserById($id);
    	$data = array();
    	foreach ($result as $r) {
    		$data = $r;
    	}
    	return $data;
    }
    //获取单个报名信息
    function getResult($array){
    	$this->load->model('m_baoming');
    	$result = $this->m_baoming->getBaoming($array);
    	$data = array();
    	foreach ($result as $r) {
    		$data = $r;
    	}
    	return $data;
    }
    //获取单个报名信息
    function getBaoming($id){
    	$this->load->model('m_baoming');
    	$result = $this->m_baoming->getBaomingById($id);
    	$data = array();
    	foreach ($result as $r) {
    		$data = $r;
    	}
    	return $data;
    }
    
    
    
    // 保存实验任务信息
    public function save() {
    	$this->timeOut();

        $this->load->model('m_baoming');
        $id = $this->m_baoming->saveInfo();
        $baoming = $this->getBaoming($id);

        //分配表id
        $id = $baoming->c_id;
        $comcou=$this->getComcou($id);
        //基地信息
        $company = $this->getCompany($comcou->comId);
        //基地负责人信息
        $comuser =$this->getCompanyuser($comcou->u_id);
        //课程信息
        $course = $this->getCourse($comcou->course_id);
         
        $u_id = $this->session->userdata('u_id');
        $array = array('c_id' => $id, 'u_id' => $u_id);
        $result = $this->getResult($array);

        $data['comcou']=$comcou;
        $data['company']=$company;
        $data['comuser']=$comuser;
        $data['course']=$course;
        $data['baoming']=$baoming;
        $this->load->view('common/header3');
        $this->load->view('student/chakan/chakanDetail', $data);
        $this->load->view('common/footer');
        
    }
    
    // 保存实验任务信息
    public function delete() {
    	$this->timeOut();
    
    	$this->load->model('m_baoming');
    	$id = $this->uri->segment(4);
    	$this->m_baoming->delete($id);
    	echo '<script language="JavaScript">alert("已取消");</script>';
    	
    	//查看志愿式属于自己的课程
    	$stuId = $this->session->userdata('u_name');
    	$array=array('stuId'=>$stuId,'patternId'=>'1');
    	$this->load->model('m_nvariable');
    	$variable = $this->getVariables($array);
    	
    	//查看课程是否已分配基地com_cou
    	for($i=0;$i<count($variable);$i++){
    		$array1=array('course_id'=>$variable[$i]['cid'],'courseId'=>$variable[$i]['courseId'],'courseNum'=>$variable[$i]['courseNum']);
    		$this->load->model('m_ncomcou');
    		$var_com[$i] = $this->m_ncomcou->getNcomcou_ws($array1);
    	}
    	
    	$data['variable']=$variable;
    	$data['var_com'] =$var_com;
    	   	
    	$this->load->view('common/header3');
    	$this->load->view('student/baoming/baoming', $data);
    	$this->load->view('common/footer');
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