<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sum extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('pagination');
        ini_set('max_execution_time', '0');
        date_default_timezone_set('PRC');
    }

    public function sumList1() {
        $this->timeOut();
        //院列表
        
        //1.学院名
        $college = $this->session->userdata("college");
        //2.查找该学院课程的基地
        $this->load->model("m_coucom");
        $res = $this->m_coucom->countCompanyByCol($college);
        
        //处理
        $comp = array();
        foreach ($res as $r){
        	$comp[$r->cour_id]['cour_id']=$r->cour_id;
        	$comp[$r->cour_id]['cour_name']=$r->cour_name;
        	$comp[$r->cour_id]['cour_no']=$r->cour_no;
        	$comp[$r->cour_id]['cour_num']=$r->cour_num;
        	$comp[$r->cour_id]['cour_term']=$r->cour_term;
        	if($r->comp_add_type == 3)
        		$comp[$r->cour_id][0]=$r->c_comp;
        	elseif($r->comp_add_type == 5)
        		$comp[$r->cour_id][1]=$r->c_comp;
        }
        
        foreach ($comp as $key=>$val){
        
        	if(!isset($val[0]))$comp[$key][0]=0;
        	if(!isset($val[1]))$comp[$key][1]=0;
        	//$r[3]=$r[0]+$r[1];
        	$comp[$key][2]=$comp[$key][0]+$comp[$key][1];
        
        }
                 
        $data['comp']=$comp;       
        $this->load->view('common/header3');
        $this->load->view('admin/count/colCourCompany',$data);
        $this->load->view('common/footer');
    }
	public function courcomp(){
    	$this->timeOut();
    	$cour_id = $this->uri->segment(4);
    	//课程详情
    	$this->load->model("m_course");
    	$coursep = $this->getCoursepById($cour_id);
    	
    	$array = array('cour_id'=>$cour_id);
    	$this->load->model('m_coucom');
    	
    	$num = $this->m_coucom->getNum_ws($array);
        $offset = $this->uri->segment(5);

        $data['coco'] = $this->getCoucoms($array,$offset);
        $config['base_url'] = base_url() . 'index.php/admin/sum/courcomp/'.$cour_id;
        $config['total_rows'] = $num;
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
  
        $data['cour']=$coursep;
        $this->load->view('common/header3');
        $this->load->view('admin/count/courcomp',$data);
        $this->load->view('common/footer');
    }
    
    public function sumList3() {
    	$this->timeOut();
    	//
    	$this->load->model("m_elecom");
    	$res = $this->m_elecom->countCompStuNum();
    	//print_r($res);
    	/*
    	//处理
    	$comp = array();
    	foreach ($res as $r){
    		if($r->comp_add_type == 3)
    		$comp[$r->comp_coll_name][0]=$r->c_comp;
    		elseif($r->comp_add_type == 5)
    		$comp[$r->comp_coll_name][1]=$r->c_comp;
    	}
    	//print_r($comp);
    	
    	foreach ($comp as $key=>$val){
    		
    		if(!isset($val[0]))$comp[$key][0]=0;
    		if(!isset($val[1]))$comp[$key][1]=0;
    		//$r[3]=$r[0]+$r[1];
    		$comp[$key][2]=$comp[$key][0]+$comp[$key][1];
    		
    	}
    	
*/
    	$data['comp']=$res;
    
    	$this->load->view('common/header3');
    	$this->load->view('admin/count/sumCompany',$data);
    	$this->load->view('common/footer');
    }
    
	// 获取单个
    function getCoursepById($id) {
    	$this->load->model('m_course');
    	$result = $this->m_course->getCourseById_ws($id);
    	$data = array();
    	foreach ($result as $r) {
    		$data = $r;
    	}
    	return $data;
    }
    
    function getCoucoms($array,$offset) {
    	$this->load->model('m_coucom');
    	$result = $this->m_coucom->getCoucoms_ws($array, PER_PAGE, $offset);
    	$data = array();
    	foreach ($result as $r) {
    		array_push($data,$r);
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