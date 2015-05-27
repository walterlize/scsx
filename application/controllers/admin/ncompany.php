<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ncompany extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('pagination');
        ini_set('max_execution_time', '0');
        date_default_timezone_set('PRC');
    }
    
    
    
    public function ncompanyList() {
    	$this->timeOut();
    	$array=array();
    
    	$this->load->model('m_ncompany');
    	$num = $this->m_ncompany->getNum_a($array);
    	$offset = $this->uri->segment(4);
    
    	$data['company'] = $this->getCompanys($array,$offset);
    	$config['base_url'] = base_url() . 'index.php/admin/ncompany/ncompanyList';
    	$config['total_rows'] = $num;
    	$config['uri_segment'] = 4;
    	$this->pagination->initialize($config);
    	$data['page'] = $this->pagination->create_links();
    
    	$this->load->view('common/header3');
    	$this->load->view('admin/ncompany/ncompany', $data);
    	$this->load->view('common/footer');
    }
    
    // 分页获取全部实验任务信息
    public function getCompanys($array,$offset) {
    	$this->timeOut();
    	$this->load->model('m_ncompany');
    	$data = array();
    	$result = $this->m_ncompany->getNCompanys_a($array, PER_PAGE, $offset);
    
    	foreach ($result as $r) {
    		$arr = array(
    				'comId' => $r->comId, 
    				'comName' => $r->comName, 
    				'u_id'=>$r->u_id,
    				'u_name' =>$r->u_name,
    				'address' => $r->address,
    			    'url'=>$r->url,	
    				'content' => $r->content, 
    				'plan' => $r->plan,
    				'stateId' => $r->stateId, 
    				'p_id' => $r->p_id,
    				'collegeId' => $r->collegeId,
    				'addId' => $r->addId,
    				'addType' => $r->addType,
    		);
    		array_push($data, $arr);
    	}
    	return $data;
    }
    
    
    
    //基地详情
    public function ncompanyDetail(){
    	$this->timeOut();
    	$id = $this->uri->segment(4);
    	//按id获取基地信息
    	$company= $this->getCompany($id);
    	//获取基地用户信息
    	$compuser = $this->getCompUser($company->u_id);
    	//获取上传人信息
    
    	$add = $this->getAddInfo($company->addType,$company->addId);
    	if(!$add){
    		$add=$this->getAddEmpty($company->addType);
    	}
    	//获取实习基地状态
    	$state = $this->getState($company->stateId);
    	
    	$data['company']=$company;
    	$data['compuser']=$compuser;
    	$data['state']=$state;
    	$data['add']=$add;
    	$this->load->view('common/header3');
    	$this->load->view('admin/ncompany/ncompanyDetail', $data);
    	$this->load->view('common/footer');
    }
    
    //获取单个基地
    function getCompany($id){
    	$this->load->model('m_ncompany');
    	$result = $this->m_ncompany->getNCompanyById($id);
    	$data = array();
    	foreach ($result as $r) {
    		$data = $r;
    	}
    	return $data;
    }
    
    //获取单个基地用户
    function getCompUser($id){
    	$this->load->model('m_ncompanyuser');
    	$result = $this->m_ncompanyuser->getNCompUserById($id);
    	$data = array();
    	foreach ($result as $r) {
    		$data = $r;
    	}
    	return $data;
    }
    
    //获取单个基地用户
    function getState($id){
    	$this->load->model('m_state');
    	$result = $this->m_state->getStatebyId($id);
    	$data = array();
    	foreach ($result as $r) {
    		$data = $r;
    	}
    	return $data;
    }
    
    //获取单个上传用户信息
    /*
    function getCompUser($id){
    	$this->load->model('m_ncompanyuser');
    	$result = $this->m_ncompanyuser->getNCompUserById($id);
    	$data = array();
    	foreach ($result as $r) {
    		$data = $r;
    	}
    	return $data;
    }*/
    
    public function ncompanyEdit(){
    	$this->timeOut();
    	$id = $this->uri->segment(4);
    	$data['company'] = $this->getCompany($id);
    	//获取用户列表
    	$data['comuser'] = $this->getCompUsers(array());
    	$data['show']="";
   	
    	$this->load->view('common/header3');
    	$this->load->view('admin/ncompany/ncompanyEdit', $data);
    	$this->load->view('common/footer');
    }
    
    public function ncompanyNew(){
    	$this->timeOut();
    	@$com->comId = 0;
    	$com->comName = '';
    	$com->address = '';
    	$com->url = '';
    	$com->content = '';
    	$com->plan = '';
    	$com->u_id='';
    	$com->u_name='';
    	$com->stateId='';
    	$com->p_id='';
    	$com->collegeId = '';
    	$com->addId = '';
    	$com->addType =$this->session->userdata('roleId');
    	
    	$data['company']= $com;
    	$data['b_id']=0;
    	 
    	//获取用户列表
    	$data['comuser']= $this->getCompUsers(array());
    	$data['show']="display:none";
    
    	$this->load->view('common/header3');
    	$this->load->view('admin/ncompany/ncompanyEdit', $data);
    	$this->load->view('common/footer');
    }
    
    //获取基地用户列表
    public function getCompUsers($array){
    	$this->timeOut();
    	$this->load->model('m_ncompanyuser');
    	 
    	$result = $this->m_ncompanyuser->getNCompUser($array);
    	$data = array();
    	foreach ($result as $r) {
    		$arr = array(
    				'u_id' => $r->u_id,
    				'u_name' => $r->u_name,
    				'password' => $r->password,
    				'realname' => $r->realname,
    				'phone' => $r->phone,
    				'email' => $r->email,
    				'address' => $r->address,
    				'sex' => $r->sex,
    				'ustateId' => $r->ustateId,
    				'collegeId' => $r->collegeId,
    		);
    		array_push($data, $arr);
    	}
    	return $data;
    }
    
    // 保存信息
    public function save() {
    	$this->timeOut();
    
    	$this->load->model('m_ncompany');
    	$id = $this->m_ncompany->saveInfo();
    	//按id获取基地信息
    	$company= $this->getCompany($id);
    	//获取基地用户信息
    	$compuser = $this->getCompUser($company->u_id);
    	//获取上传人信息
    	$add = $this->getAddInfo($company->addType,$company->addId);
    	if(!$add){
    		$add=$this->getAddEmpty($company->addType);
    	}
    	//获取实习基地状态
    	$state = $this->getState($company->stateId);
    	
    	$data['company']=$company;
    	$data['compuser']=$compuser;
    	$data['state']=$state;
    	$data['add']=$add;
    	
    	$this->load->view('common/header3');
    	$this->load->view('admin/ncompany/ncompanyDetail', $data);
    	$this->load->view('common/footer');
    }
    
    
    //删除
    public function ncompanyDelete(){
    	$this->timeOut();
    	$id = $this->uri->segment(4);
    
    	$array=array();
    	$this->load->model('m_ncompany');
    	$this->m_ncompany->delete($id);

    	$num = $this->m_ncompany->getNum_a($array);
    	$offset = 0;
    	
    	$data['company'] = $this->getCompanys($array,$offset);
    	
    	$config['base_url'] = base_url() . 'index.php/admin/ncompany/ncompanyList';
    	$config['total_rows'] = $num;
    	$config['uri_segment'] = 4;
    	$this->pagination->initialize($config);
    	$data['page'] = $this->pagination->create_links();
    	
    	$this->load->view('common/header3');
    	$this->load->view('admin/ncompany/ncompany', $data);
    	$this->load->view('common/footer');
    	
    	
    	
    }
    
    
    //学生提交基地审核
    public function ncompanyListf() {
    	$this->timeOut();
    	$array=array();
    
    	$this->load->model('m_ncompanys');
    	$num = $this->m_ncompanys->getNum_f($array);
    	$offset = $this->uri->segment(4);
    
    	$data['company'] = $this->getCompanysf($array,$offset);
    	$config['base_url'] = base_url() . 'index.php/admin/ncompany/ncompanyListf';
    	$config['total_rows'] = $num;
    	$config['uri_segment'] = 4;
    	$this->pagination->initialize($config);
    	$data['page'] = $this->pagination->create_links();
    
    	$this->load->view('common/header3');
    	$this->load->view('admin/ncompany/ncompanyf', $data);
    	$this->load->view('common/footer');
    }
    
    // 分页获取全部未审核基地
    public function getCompanysf($array,$offset) {
    	$this->timeOut();
    	$this->load->model('m_ncompanys');
    	$data = array();
    	$result = $this->m_ncompanys->getNCompanys_f($array, PER_PAGE, $offset);
    
    	foreach ($result as $r) {
    		$arr = array(
    				'comId' => $r->comId,
    				'comName' => $r->comName,
    				'u_id'=>$r->u_id,
    				'u_name' =>$r->u_name,
    				'address' => $r->address,
    				'url'=>$r->url,
    				'content' => $r->content,
    				'plan' => $r->plan,
    				'stateId' => $r->stateId,
    				
    				'collegeId' => $r->collegeId,
    				'addId' => $r->addId,
    				'addType' => $r->addType,
    				'course_id' => $r->course_id,
    				'courseId' => $r->courseId,
    				'courseNum' => $r->courseNum,
    				'courseName' => $r->courseName,
    				'c_id'=>$r->c_id
    		);
    		array_push($data, $arr);
    	}
    	return $data;
    }
    
  
    
    //获取课程信息
    function getCourse($id){
    	$this->load->model('m_ncourse');
    	$course = $this->m_ncourse->getNcourseById_ws($id);
    	$result = array();
    	foreach($course as $r){
    		$result = $r;
    	}
    	return $result;
    }
    function getBaoming($array){
    	$this->load->model('m_baoming');
    	$baoming = $this->m_baoming->getBaoming($array);
    	$result = array();
    	foreach($baoming as $r){
    		$result = $r;
    	}
    	return $result;
    }
    
    public function ncompanyEditf(){
    	$this->timeOut();
    	$id = $this->uri->segment(4);
    	$b_id=$this->uri->segment(5);
    	$c_id=$this->uri->segment(6);
    	$data['company'] = $this->getCompany($id);
    	//获取用户列表
    	$data['comuser'] = $this->getCompUsers(array());
    	$data['show']="";
    	$data['b_id']=$b_id;
    	$data['c_id']=$c_id;
    
    	$this->load->view('common/header3');
    	$this->load->view('admin/ncompany/ncompanyEditf', $data);
    	$this->load->view('common/footer');
    }
    
    //基地详情
    public function ncompanyDetailf(){
    	$this->timeOut();
    	$id = $this->uri->segment(4);
    	 
    	$course_id =  $this->uri->segment(6);
    	//按id获取基地信息
    	$company= $this->getCompany($id);
    	//获取基地用户信息
    	$compuser = $this->getCompUser($company->u_id);
    	//获取上传人信息
    	$add = $this->getAddInfo($company->addType,$company->addId);
    	if(!$add){
    		$add=$this->getAddEmpty($company->addType);
    	}
    	//获取课程信息
    	$course = $this->getCourse($course_id);
    	//获取实习基地状态
    	$state = $this->getState($company->stateId);
    	//报名信息
    	$stuId=$company->addId;
    	$c_id = $this->uri->segment(5);
    	$arrayb=array('u_id'=>$stuId,'c_id'=>$c_id);
    	$baoming = $this->getBaoming($arrayb);
    
    	$data['company']=$company;
    	$data['compuser']=$compuser;
    	$data['state']=$state;
    	$data['add']=$add;
    	$data['course']=$course;
    	$data['baoming'] = $baoming;
    	 
    	$this->load->view('common/header3');
    	$this->load->view('admin/ncompany/ncompanyDetailf', $data);
    	$this->load->view('common/footer');
    }
    
    // 保存信息
    public function update() {
    	$this->timeOut();
    
    	$this->load->model('m_ncompany');
    	$id=$this->input->post('comId');
    	$stateId = $this->input->post('stateId');
    	$array=array('stateId'=>$stateId);
    	$this->m_ncompany->updateNCompany($id, $array);
    	if($stateId == 5){
    		$stuState = 3;
    		$jdState = 1;
    	}else{
    		$stuState = 4;
    		$jdState = 2;
    	}   	 
    	$array2=array('stateId'=>$stuState);
    	$b_id=$this->input->post('b_id');
    	$this->load->model('m_baoming');
    	$this->m_baoming->updateBaoming($b_id,$array2);
    	//
    	
    	
    	//updateCompany($id, $array)
    	//按id获取基地信息
    	$company= $this->getCompany($id);
    	$jdId = $company->u_id;
    	$this->load->model('m_ncompanyuser');
    	$this->m_ncompanyuser->updateNCompUser($jdId, array('ustateId'=>$jdState));
    	//获取基地用户信息
    	$compuser = $this->getCompUser($jdId);
    	//获取上传人信息
    	$add = $this->getAddInfo($company->addType,$company->addId);
    	if(!$add){
    		$add=$this->getAddEmpty($company->addType);
    	}
    	//获取实习基地状态
    	$state = $this->getState($company->stateId);
    	
    	//报名信息
    	$stuId=$company->addId;
    	$c_id = $this->input->post('c_id');
    	$arrayb=array('u_id'=>$stuId,'c_id'=>$c_id);
    	$baoming = $this->getBaoming($arrayb);
    	
    
    	$data['company']=$company;
    	$data['compuser']=$compuser;
    	$data['state']=$state;
    	$data['add']=$add;
    	$data['baoming'] = $baoming;
    	
    	
    	
    	 
    	$this->load->view('common/header3');
    	$this->load->view('admin/ncompany/ncompanyDetailf', $data);
    	$this->load->view('common/footer');
    }
    //获取上传人信息
    function getAddInfo($roleId,$id){
    	//上传人角色
    	switch ($roleId){
    		//管理员
    		case 2:
    			$this->load->model('m_nteacher');
    			$result = $this->m_nteacher->getTeaById($id);
    			break;
    			//学生
    		case 5:
    			$this->load->model('m_nstudent');
    			$result = $this->m_nstudent->getStuById($id);
    			break;
    	}
    	//获取单个
    	$user=array();
    	foreach ($result as $r){
    		$user = $r;
    	}
    	return $user;
    }
    
    //上传人信息置空
    function getAddEmpty($role){
    	//上传人角色
    	switch ($role){
    		//管理员
    		case 2:
    			@$add->id = 0;
    			$add -> teaId = '';
    			$add -> teaName = '';
    			break;
    			//学生
    		case 5:
    			@$add->id = 0;
    			$add -> stuId = '';
    			$add -> stuName = '';
    			break;
    	}
    	return $add;
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