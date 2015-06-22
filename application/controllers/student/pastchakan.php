<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Chakan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('pagination');
        ini_set('max_execution_time', '0');
        date_default_timezone_set('PRC');
    }
    
    
    public function chakanList() {
    	$this->timeOut();
    	
    	$array=array('patternId'=>'1');
    
    	$this->load->model('m_chakan');
    	$num = $this->m_chakan->getNum($array);
    	$offset = $this->uri->segment(4);
    	
    	$data['chakan'] = $this->getChakans($array,$offset);
    	$config['base_url'] = base_url() . 'index.php/student/chakan/chakanList';
    	$config['total_rows'] = $num;
    	$config['uri_segment'] = 4;
    	$this->pagination->initialize($config);
    	$data['page'] = $this->pagination->create_links();
    	
    	$this->load->view('common/header3');
    	$this->load->view('student/chakan/chakan', $data);
    	$this->load->view('common/footer');
    }
    
    // 分页获取全部实验任务信息
    public function getChakans($array,$offset) {
    	$this->timeOut();
    	$this->load->model('m_chakan');
    	$data = array();
    	$result = $this->m_chakan->getChakans($array, PER_PAGE, $offset);
    
    	foreach ($result as $r) {
    		$arr = array( 
    				'b_id' => $r->b_id,
    				'c_id' => $r->c_id, 
    				'stuId' => $r->stuId,
    				'state'=>$r->state,
    				'courseTeaName'=>$r->courseTeaName,
    				'courseName'=>$r->courseName,
    				'comName'=>$r->comName
    				
    		);
    		array_push($data, $arr);
    	}
    	return $data;
    }
    
    public function chakanDetail(){
    	$this->timeOut();
    	$this->load->model('m_baoming');
    	$id = $this->uri->segment(4);
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
    
    
    
   
    // session中的role不存在的时候退出系统
    function timeOut() {
        $role = $this->session->userdata('roleId');

        if ($role != 5) {
            $this->load->view('logout');
        }
    }

}

?>