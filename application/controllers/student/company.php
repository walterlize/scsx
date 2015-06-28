<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Company extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('pagination');
        ini_set('max_execution_time', '0');
        date_default_timezone_set('PRC');
    }
    
    //选择或新增基地
    public function companyList(){
    	$this->timeOut();
    	//课程在MySQL表中的id
    	$cour_id= $this->uri->segment(4); 
    	$coursep = $this->getCoursepById($cour_id);
    	$show = 'display:none';
    	if($coursep->cour_pattern_id == 1 ){
    		$show = '';
    	}
    	//根据课程号查找审核成功的基地
    	$array=array('cour_id'=>$cour_id,'comp_stat_id'=>6);
    	
    	$stuId = $this->session->userdata('u_name');
    	
    	$this->load->model('m_coucom');
    	$num = $this->m_coucom->getNum_ws($array);
    	$offset = $this->uri->segment(5);
    	 
    	$data['company'] = $this->getCompanys($array,$offset);
    	$config['base_url'] = base_url() . 'index.php/student/company/companyList/'.$cour_id;
    	$config['total_rows'] = $num;
    	$config['uri_segment'] = 5;
    	$this->pagination->initialize($config);
    	$data['page'] = $this->pagination->create_links();

    	$data['cour_id']=$cour_id;
    	$data['show']=$show;
    	$this->load->view('common/header3');
    	$this->load->view('student/company/company', $data);
    	$this->load->view('common/footer');
    }
    
    // 分页获取全部实验任务信息
    
    
    

    // 实验任务详细信息页面
    public function companyDetail() {
        $this->timeOut();
        
        $stuId = $this->session->userdata('u_name');
        //课程基地号
        $coco_id = $this->uri->segment(4);
        $comp = $this->getCompany($coco_id);
       
        $data['comp']=$comp;
        $this->load->view('common/header3');
        $this->load->view('student/company/companyDetail', $data);
        $this->load->view('common/footer');
    }
    
    
	
    
    function companyNew(){
    	$this->timeOut();
    	//print_r($this->session->all_userdata());
    	
    	$cour_id=$this->uri->segment(4);
    	$coursep = $this->getCoursepById($cour_id);
    	
    	@$comp->comp_id = 0;
    	$comp->comp_name = '';
    	$comp->comp_user_id = '';
    	$comp->comp_address = '';
    	$comp->comp_url='';
    	$comp->comp_content='';
    	$comp->comp_plan = '';
    	$comp->comp_stat_id = 5;
    	$comp->comp_coll_id='';
    	$comp->comp_coll_name='';
    	$comp->comp_teacher='';
    	$comp->comp_add_num = '';
    	$comp->comp_add_type = '';
    	
    	@$user->user_id = 0;
	    $user->user_num = '';
	    $user->user_password = '';
	    $user->user_name = '';
	    $user->user_phone = '';
	    $user->user_email = '';
	    $user->user_address = '';
	    $user->user_coll_id  = '';
	    $user->user_coll_name = '';
	    $user->user_stat_id = 2;
	    @$coco->coco_id=0;
	    @$elco->elco_id=0;
	    
    	$data['coursep']=$coursep;
    	$data['comp']=$comp;
    	$data['user']=$user;
    	$data['coco']=$coco;
    	$data['elco']=$elco;
    	
    	$this->load->view('common/header3');
    	$this->load->view('student/company/companyEdit', $data);
    	$this->load->view('common/footer');
    }
    
    function companyEdit(){
    	$this->timeOut();
    	//print_r($this->session->all_userdata());
    	 
    	$cour_id=$this->uri->segment(4);
    	$comp_id=$this->uri->segment(5);
    	$elco_id=$this->uri->segment(6);
    	//1.课程信息
    	$coursep = $this->getCoursepById($cour_id);
    	//2.公司信息
    	$company = $this->getCompanyById($comp_id);
    	//3.用户信息
    	$user = $this->getUserById($company->comp_user_id);
    	//4.coucom编号信息
    	$array = array('coco_cour_id'=>$cour_id,'coco_comp_id'=>$comp_id);
    	$coco = $this->getCocoByArr($array);
    	//5.elecom编号信息
    	$elco = $this->getElecomById($elco_id);
    	 
    	$data['coursep']=$coursep;
    	$data['comp']=$company;
    	$data['user']=$user;
    	$data['coco']=$coco;
    	$data['elco']=$elco;
    	 
    	$this->load->view('common/header3');
    	$this->load->view('student/company/companyEdit', $data);
    	$this->load->view('common/footer');
    }
    
    
    
    function save(){
    	$this->timeOut();
    	$cour_id = $this->uri->segment(4);
    	$coursep = $this->getCoursepById($cour_id);
    	//1.user表
    	$this->load->model('m_user');
    	$user_id = $this->m_user->saveInfoByStu();
    	//2.company表
    	$this->load->model('m_company');
    	$comp_id = $this->m_company->saveInfoByStu($user_id);
    	//3.coucom表
    	@$coco->coco_id = $this->input->post('coco_id');
    	$coco->coco_cour_id = $coursep->cour_id;
    	$coco->coco_cour_no = $coursep->cour_no;
    	$coco->coco_cour_num = $coursep->cour_num;
    	$coco->coco_cour_term = $coursep->cour_term;
    	$coco->coco_comp_id = $comp_id;
    	$this->load->model('m_coucom');
    	$coco_id = $this->m_coucom->saveInfoByArr($coco);
    	//4.elecom表
    	@$elco->elco_id = $this->input->post('elco_id');
    	$elco->elco_cour_id = $coursep->cour_id;
    	$elco->elco_cour_no = $coursep->cour_no;
    	$elco->elco_cour_num = $coursep->cour_num;
    	$elco->elco_cour_term = $coursep->cour_term;
    	$elco->elco_stu_num = $this->session->userdata('u_num');
    	$elco->elco_stu_name = $this->session->userdata('realname');
    	$elco->elco_stu_class = $this->session->userdata('class');
    	$elco->elco_comp_id = $comp_id;
    	$elco->elco_state = 5;
    	$this->load->model('m_elecom');
    	$elco_id = $this->m_elecom->saveInfoByArr($elco);
    	
    	//存储结束
    	echo '<script language="JavaScript">alert("报名成功");</script>';
    	$this->companyDetaile($elco_id);
    }
    
    function companySave(){
    	$cour_id = $this->uri->segment(4);
    	$comp_id = $this->uri->segment(5);
    	$coursep = $this->getCoursepById($cour_id);
    	//elecom表
    	@$elco->elco_id = 0;
    	$elco->elco_cour_id = $coursep->cour_id;
    	$elco->elco_cour_no = $coursep->cour_no;
    	$elco->elco_cour_num = $coursep->cour_num;
    	$elco->elco_cour_term = $coursep->cour_term;
    	$elco->elco_stu_num = $this->session->userdata('u_num');
    	$elco->elco_stu_name = $this->session->userdata('realname');
    	$elco->elco_stu_class = $this->session->userdata('class');
    	$elco->elco_comp_id = $comp_id;
    	$elco->elco_state = 5;
    	$this->load->model('m_elecom');
    	$elco_id = $this->m_elecom->saveInfoByArr($elco);
    	
    	//存储结束
    	
    	echo '<script language="JavaScript">alert("报名成功");</script>';
    	$this->companyDetaile($elco_id);
    }
    
function companyDetaile($elco_id){
    	$this->timeOut();
    	$elco = $this->getElecomById($elco_id);
    	
    	//获取单个课程信息
    	//oracle
    	$arrCourse = array('KCH'=>$elco->elco_cour_no,'KXH'=>$elco->elco_cour_num,'ZXJXJHH'=>$elco->elco_cour_term);
    	$course = $this->getNCourse($arrCourse);
    	
    	$data['course'] = $course;
    	$data['elecom'] = $elco;
    	$data['stu_num'] = $this->session->userdata('u_num');
    	    	
    	$this->load->view('common/header3');
    	$this->load->view('student/company/companyDetaile', $data);
    	$this->load->view('common/footer');
    			
    }
    
    
    
    /*
    function companyDelete(){
    	$this->timeOut();
    	//print_r($this->session->all_userdata());
    
    	$cour_id=$this->uri->segment(4);
    	$comp_id=$this->uri->segment(5);
    	$elco_id=$this->uri->segment(6);
    	//1.课程信息
    	$coursep = $this->getCoursepById($cour_id);
    	//2.删除公司信息
    	$this->load->model('m_company');
    	$this->m_company->deleteCompany($comp_id);
    	//3.用户信息
    	$this->load->model('m_user');
    	$this->m_user->deleteUser($company->comp_user_id);
    	//4.coucom编号信息
    	$array = array('coco_cour_id'=>$cour_id,'coco_comp_id'=>$comp_id);
    	$coco = $this->getCocoByArr($array);
    	$this->load->model('m_coucom');
    	$this->m_coucom->deleteCoucom($coco->coco_id);
    	//5.elecom编号信息
    	$this->load->model('m_elecom');
    	$this->m_elecom->deleteCoucom($elco_id);
    
    	$data['coursep']=$coursep;
    	$data['comp']=$company;
    	$data['user']=$user;
    	$data['coco']=$coco;
    	$data['elco']=$elco;
    
    	$this->load->view('common/header3');
    	$this->load->view('student/company/companyEdit', $data);
    	$this->load->view('common/footer');
    }*/
    
    
    public function getCompanys($array,$offset) {
    	$this->timeOut();
    	$this->load->model('m_coucom');
    	$result = $this->m_coucom->getCoucoms_ws($array, PER_PAGE, $offset);
    
    	$data = array();
    	foreach ($result as $r) {
    		$arr = array(
    				'coco_id' => $r->coco_id,
    				'comp_id' => $r->comp_id,
    				'cour_no' => $r->cour_no,
    				'cour_num' => $r->cour_num,
    				'cour_name' => $r->cour_name,
    				'cour_name_en' => $r->cour_name_en,
    				'cour_teac_name' => $r->cour_teac_name,
    				'comp_name' => $r->comp_name,
    				'comp_address' => $r->comp_address,
    				'comp_url' => $r->comp_url,
    				'comp_content' => $r->comp_content,
    				'comp_plan' => $r->comp_plan,
    				'comp_teacher' => $r->comp_teacher,
    				'user_name' => $r->user_name,
    				'user_phone' => $r->user_phone,
    				'user_email' => $r->user_email,
    		);
    		array_push($data, $arr);
    	}
    	return $data;
    }
       
    //获取单个基地——coco_id
    function getCompany($id){
    	$this->load->model('m_coucom');
    	$result = $this->m_coucom->getCoucomById_ws($id);
    	$data = array();
    	foreach ($result as $r) {
    		$data = $r;
    	}
    	return $data;
    }
    
    // 获取单个已分配课程
    function getCoursepById($id) {
    	$this->load->model('m_course');
    	$result = $this->m_course->getCourseById_ws($id);
    	$data = array();
    	foreach ($result as $r) {
    		$data = $r;
    	}
    	return $data;
    }
    
    //获取单个基地-comp_id
    function getCompanyById($id){
    	$this->load->model('m_company');
    	$result = $this->m_company->getCompanysById($id);
    	$data = array();
    	foreach ($result as $r) {
    		$data = $r;
    	}
    	return $data;
    }
    //获取单个用户-user_id
    function getUserById($id){
    	$this->load->model('m_user');
    	$result = $this->m_user->getUserById($id);
    	$data = array();
    	foreach ($result as $r) {
    		$data = $r;
    	}
    	return $data;
    }
    //获取单个coco
    function getCocoByArr($array){
    	$this->load->model('m_coucom');
    	$result = $this->m_coucom->getCoucom($array);
    	$data = array();
    	foreach ($result as $r) {
    		$data = $r;
    	}
    	return $data;
    }
    //获取单个elco——elco_id
    function getElecomById($id){
    	$this->load->model('m_elecom');
    	$result = $this->m_elecom->getElecomById_ws($id);
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
    
    
    // session中的role不存在的时候退出系统
    function timeOut() {
        $role = $this->session->userdata('roleId');

        if ($role != 5) {
            $this->load->view('logout');
        }
    }

}

?>