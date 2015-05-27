<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Allocation extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('pagination');
        ini_set('max_execution_time', '0');
        date_default_timezone_set('PRC');
    }
    
    public function allocationList() {
    	$this->timeOut();
    	
    	//1.查询所有分配式项目
    	$array=array('patternId' => '3');
    	$this->load->model('m_ncourse');
    	
    	
    	$num = $this->m_ncourse->getNum($array);
    	$offset = $this->uri->segment(4);
    	$course=$this->getCourses($array,$offset);
    
    	$config['base_url'] = base_url() . 'index.php/admin/allocation/allocationList';
    	$config['total_rows'] = $num;
    	$config['uri_segment'] = 4;
    	$this->pagination->initialize($config);
    	$data['page'] = $this->pagination->create_links();
    	
    	$allo=array();
    	//2.查询项目已分配班级
    	for($i=0;$i<count($course);$i++){
    		$array1=array('courseId'=>$course[$i]['courseId'],'courseNum'=>$course[$i]['courseNum']);
    		$allo[$i]=$this->getAllo($array1);
    		
    	}
    	
    	$data['course']=$course;
    	$data['allo']=$allo;
    
    	$this->load->view('common/header3');
    	$this->load->view('admin/allocation/allocation', $data);
    	$this->load->view('common/footer');
    }
    
    // 分页获取全部实验任务信息
    public function getCourses($array,$offset) {
    	$this->timeOut();
    	$this->load->model('m_ncourse');
    	$data = array();
    	$result = $this->m_ncourse->getNcourses_ws($array, PER_PAGE, $offset);
    
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
    
    // 获取全部班级
    public function getClass($array) {
    	$this->timeOut();
    	$this->load->model('m_nvariable');
    	 
    	$result = $this->m_nvariable->getClass($array);
    	$data = array();
    	foreach ($result as $r) {
    		$arr = array(
    				'class' => $r->stuClass,
    				'major'=>$r->stuMajor,
    		);
    		array_push($data, $arr);
    	}
    	return $data;
    }
    
    // 获取全部
    public function getAllo($array) {
    	$this->timeOut();
    	$this->load->model('m_allocation');
    
    	$result = $this->m_allocation->getAllo($array);
    	$data = array();
    	foreach ($result as $r) {
    		$arr = array(
    				'class' => $r->stuClass,
    				'comName'=>$r->comName,
    				'c_id'=>$r->c_id
    		);
    		array_push($data, $arr);
    	}
    	return $data;
    }
    
    // 获取全部基地
    public function getCompany($array) {
    	$this->timeOut();
    	$this->load->model('m_ncomcou');
    
    	$result = $this->m_ncomcou->getNcomcou_ws($array);
    	$data = array();
    	foreach ($result as $r) {
    		$arr = array(
    				'id'=>$r->id,
    				'comId' => $r->comId,
    				'comName' => $r->comName,
    		);
    		array_push($data, $arr);
    	}
    	return $data;
    }
    
    public function allocationNew() {
    	$this->timeOut();
    	
    	$courseId=$this->input->post('courseId');
    	$courseNum=$this->input->post('courseNum');
    	
    	$array1=array('courseId'=>$courseId,'courseNum'=>$courseNum);
    	$class=$this->getClass($array1);
    	$company=$this->getCompany($array1);
    	
    
    	@$baoming->b_id = 0;
    	$baoming->u_id = '';
    	$baoming->c_id = '';
    	$baoming->stateId = 3;
    	$baoming->pstateId = 1;
    	$baoming->ystateId = 1;
    
    	$data['allocation'] = $baoming;
    	$data['company'] = $company;
    	$data['class'] = $class;
    
    	$data['show'] = 'display:none';
    	$data['showActive'] = 'display:none';
    	$data['showUnactive'] = 'display:none';
    	$data['courseId']=$courseId;
    	$data['courseNum']=$courseNum;
    
    	$this->load->view('common/header3');
    	$this->load->view('admin/allocation/allocationEdit', $data);
    	$this->load->view('common/footer');
    }
    
    // 保存实验任务信息
    public function save() {
    	$this->timeOut();
    
    	$this->load->model('m_allocation');
    	$i = $this->m_allocation->saveInfo();   	

    	echo '<script language="JavaScript">alert("该班选课人数为'.$i.'人");</script>';
    	$this->allocationList();
    }
    public function allocationDelete() {
    	$this->timeOut();
    	$c_id = $this->uri->segment(4);
    	$this->load->model('m_allocation');
    	$this->m_allocation->delete($c_id);
    	
    	//1.查询所有分配式项目
    	$array=array('patternId' => '3');
    	$this->load->model('m_ncourse');
    	 
    	 
    	$num = $this->m_ncourse->getNum($array);
    	$offset = 0;
    	$course=$this->getCourses($array,$offset);
    	
    	$config['base_url'] = base_url() . 'index.php/admin/allocation/allocationList';
    	$config['total_rows'] = $num;
    	$config['uri_segment'] = 4;
    	$this->pagination->initialize($config);
    	$data['page'] = $this->pagination->create_links();
    	 
    	//2.查询项目已分配班级
    	for($i=0;$i<count($course);$i++){
    		$array1=array('courseId'=>$course[$i]['courseId'],'courseNum'=>$course[$i]['courseNum']);
    		$allo[$i]=$this->getAllo($array1);
    	
    	}
    	 
    	$data['course']=$course;
    	$data['allo']=$allo;
    	
    	$this->load->view('common/header3');
    	$this->load->view('admin/allocation/allocation', $data);
    	$this->load->view('common/footer');
    }
    
    public function allocationList1() {
    	$this->timeOut();
    
    	$this->load->model('m_allocation');
    	$num = $this->m_allocation->getAllo1_Num(array());
    	$offset = $this->uri->segment(4);
    
    	$data['allocation'] = $this->getAllocations1($offset);
    	$config['base_url'] = base_url() . 'index.php/admin/allocation/allocationList1';
    	$config['total_rows'] = $num;
    	$config['uri_segment'] = 4;
    	$this->pagination->initialize($config);
    	$data['page'] = $this->pagination->create_links();
    
    	$this->load->view('common/header3');
    	$this->load->view('admin/allocation/allocation1', $data);
    	$this->load->view('common/footer');
    }
    
    public function getAllocations1($offset) {
    	$this->timeOut();
    	$this->load->model('m_allocation');
    	$data = array();
    	$result = $this->m_allocation->getAllo1($data, PER_PAGE, $offset);
    
    	foreach ($result as $r) {
    		$arr = array( 
    				'b_id' => $r->b_id,
    				'c_id' => $r->c_id, 
    				'stuId'=>$r->stuId,
    				'stuName'=>$r->stuName,
    				'stuClass'=>$r->stuClass,
    				'comId' => $r->comId,
    				'comName' => $r->comName,
    				'courseName' =>$r->courseName,
    				'courseId' =>$r->courseId,
    				'courseNum' =>$r->courseNum,
    				'college' => $r->college
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