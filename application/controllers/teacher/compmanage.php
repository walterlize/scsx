<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Compmanage extends CI_Controller {

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
    	
    	$tea_num = $this->session->userdata('u_num');
    	//根据课程号查找审核成功的基地
    	$array=array('comp_add_num'=>$tea_num);
    	
    	$this->load->model('m_company');
    	
    	$company = $this->getCompanys($array);//全部基地
    	
    	$offset = $this->uri->segment(4);
    	$num = count($company);
    	
    	$config['base_url'] = base_url() . 'index.php/teacher/company/companyList/';
    	$config['total_rows'] = $num;
    	$config['uri_segment'] = 4;
    	$this->pagination->initialize($config);
    	$data['page'] = $this->pagination->create_links();

    	$data['company'] = array_slice($company,$offset,PER_PAGE);
    	$this->load->view('common/header3');
    	$this->load->view('teacher/compmanage/company', $data);
    	$this->load->view('common/footer');
    }
    
    // 实验任务详细信息页面
    public function companyDetail() {
    	//基地号
    	$show="display:none";
    	
    	$comp_id = $this->uri->segment(4);
    	$comp = $this->getCompanyById($comp_id);
    	
    	//审核成功的报名人数
    	$array1 = array('elco_state'=>6,'elco_comp_id'=>$comp_id);
    	$array2 = array('elco_comp_id'=>$comp_id);
    	$this->load->model('m_elecom');
    	$succ = $this->m_elecom->getNum($array1);
    	$all = $this->m_elecom->getNum($array2);

    	if($all == 0){
    		$show="";
    	}
    	
    	$data['comp']=$comp;
    	$data['succ']=$succ;
    	$data['all']=$all;
    	$data['show']=$show;
    	$this->load->view('common/header3');
    	$this->load->view('teacher/compmanage/companyDetail', $data);
    	$this->load->view('common/footer');
    }
    
    function companyNew(){
    	//1
    	$this->timeOut();
    	//print_r($this->session->all_userdata());
    	 
    	
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
    	$comp->comp_audit_num = '';
    	 
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
    	
    	$data['comp']=$comp;
    	$data['user']=$user;
    	 
    	$this->load->view('common/header3');
    	$this->load->view('teacher/compmanage/companyEdit', $data);
    	$this->load->view('common/footer');
    }
    
    function companyEdit(){
    	$this->timeOut();
    	//print_r($this->session->all_userdata());
    
    	$comp_id=$this->uri->segment(4);
    	
    	//1.公司信息
    	$company = $this->getCompanyById($comp_id);
    	//3.用户信息
    	$user = $this->getUserById($company->comp_user_id);
    	
    	$data['comp']=$company;
    	$data['user']=$user;
    	
    	$this->load->view('common/header3');
    	$this->load->view('teacher/compmanage/companyEdit', $data);
    	$this->load->view('common/footer');
    }
    
    function save(){

    	$this->timeOut();
    	
    	//1.user表
    	$this->load->model('m_user');
    	$user_id = $this->m_user->saveInfoByTea();
    	//2.company表
    	$this->load->model('m_company');
    	$comp_id = $this->m_company->saveInfoByTea($user_id);
    	$comp = $this->getCompanyById($comp_id);
    	
    	//审核成功的报名人数
    	$array1 = array('elco_state'=>6,'elco_comp_id'=>$comp_id);
    	$array2 = array('elco_comp_id'=>$comp_id);
    	$this->load->model('m_elecom');
    	$succ = $this->m_elecom->getNum($array1);
    	$all = $this->m_elecom->getNum($array2);
    	
    	if($all == 0){
    		$show="";
    	}
    	 
    	$data['comp']=$comp;
    	$data['succ']=$succ;
    	$data['all']=$all;
    	$data['show']=$show;
    	 
    	
    	$this->load->view('common/header3');
    	$this->load->view('teacher/compmanage/companyDetail', $data);
    	$this->load->view('common/footer');
    }
    
    function companyDelete(){
    	$this->timeOut();
    	$comp_id=$this->uri->segment(4);
    	$company = $this->getCompanyById($comp_id);
    	
    	//1.用户信息
    	$this->load->model('m_user');
    	$this->m_user->deleteUser($company->comp_user_id);
    	
    	//2.公司信息
    	$this->load->model('m_company');
    	$this->m_company->deleteCompany($comp_id);
    	
    	redirect('teacher/compmanage/companyList');
    	
    }
    
    
    
    public function getCompanys($array) {
    	$this->timeOut();
    	$this->load->model('m_company');
    	$result = $this->m_company->getCompany($array);
    
    	$data = array();
    	foreach ($result as $r) {
    		$arr = array(
    				'comp_id' => $r->comp_id,
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
    
    
    
    // session中的role不存在的时候退出系统
    function timeOut() {
        $role = $this->session->userdata('roleId');

        if ($role != 3) {
            $this->load->view('logout');
        }
    }

}

?>