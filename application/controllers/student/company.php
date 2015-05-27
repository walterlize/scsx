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
    
    //查看选课列表
    public function CompanyList(){
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
    	$this->load->view('student/company/company', $data);
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
    public function companyDetail() {
        $this->timeOut();
        
        $stuId = $this->session->userdata('u_name');
        //选课号
        $course_id = $this->uri->segment(4);
        //选课数据
        $course = $this->getNvariable($course_id);
        $array=array('stuId'=>$stuId,'nvid'=>$course_id);
        $this->load->model('m_chakans');
        $result=$this->m_chakans->getExist($array);
        
        
        if(!$result){
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
        
        $data['show']="";
        if($company->stateId == '5'){
        	$data['show']="display:none";
        }

        

        $this->load->view('common/header3');
        $this->load->view('student/company/companyDetail', $data);
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
    function getNvariable($id) {
    	$this->load->model('m_nvariable');
    	$result = $this->m_nvariable->getNvariableById_ws($id);
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
    
    
    // 实验任务信息编辑页面
    public function companyEdit() {
    	
    	$stuId = $this->session->userdata('u_name');
    	
    	//选课号
    	$course_id = $this->uri->segment(4);
    	//选课数据
    	$course = $this->getNvariable($course_id);
    	$array=array('stuId'=>$stuId,'nvid'=>$course_id);
    	//学生报名数据
    	$this->load->model('m_chakans');
    	$result=$this->m_chakans->getExist($array);
    	
    	       
        
        if(!$result){
        	$company=$this->getEmptyCom();
        	$curs = $this->getEmptyCuser();
        	$comcou=$this->getEmptyComcou();
        	$b_id=0;
        	
        }else{
        	$aa = array();
        	foreach ($result as $r) {
        		$aa = $r;
        	}
        	$result=$aa;
        	
        	$company=$this->getNCompany($result->comId);
        	$curs = $this->getNCompUser($result->u_id);
        	$comcou=$this->getNComcou($result->c_id);
        	$b_id=$result->b_id;        	
        }
     
        //公司数据
        $data['company']=$company;
        //用户数据
        $data['compuser']=$curs;
        //
        $data['comcou']=$comcou;
        //
        $data['course']=$course;
        //报名id
        $data['b_id']=$b_id;

        $this->load->view('common/header3');
        $this->load->view('student/company/companyEdit', $data);
        $this->load->view('common/footer');
    }
    
    // 保存实验任务信息
    public function save() {
    	$this->timeOut();
    
    	//保存user
    	$this->load->model('m_nfcompanyuser');
    	$u_id=$this->m_nfcompanyuser->saveInfo();
    	//company
    	$this->load->model('m_nfcompany');
    	$comId=$this->m_nfcompany->saveInfo($u_id);
    	//comcou
    	$this->load->model('m_ncomcou');
    	$comcou_id=$this->m_ncomcou->saveInfo1($comId);
    	$course_id = $this->input->post('course_id');
    	
    	//报名表
    	
    	$this->load->model('m_fbaoming');
    	$comcou_id=$this->m_fbaoming->saveInfo($comcou_id);
    

    	$company=$this->getNCompany($comId);
    	$curs = $this->getNCompUser($u_id);
    	$comcou=$this->getNComcou($comcou_id);
    	$course = $this->getNvariable($course_id);
    	
    	$data['company']=$company;
    	$data['compuser']=$curs;
    	$data['comcou']=$comcou;
    	$data['course_id']=$course_id;
    	$data['show']="display:none";
    	
    	
    	$this->load->view('common/header3');
    	$this->load->view('student/company/companyDetail', $data);
    	$this->load->view('common/footer');
    	
    	
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

    
    // 设置空值
    function getEmptyData() {
        $this->timeOut();
        $this->load->model('m_free1');
        @$company->fb_id = 0;
        $company->comId = 0;
        $company->stuId = $this->session->userdata('u_name');
        $company->stuname = $this->session->userdata('realname');
        $company->u_id = 0;
        $company->comName = '';
        $company->content = '';
        $company->plan = '';
        $company->stateId = 7;
        $company->p_id = $this->m_free1->getPid();
        $company->u_name = '';
        $company->password = '';
        $company->realname = '';
        $company->phone = '';
        $company->email = '';
        $company->address = '';        
        $company->state = '';       
        $company->p_name = '';
        $company->patternId = '';
        $company->depart = '';
        $company->pattern = '';    
        $company->collegeId = $this->session->userdata('collegeId');
        $company->sex = '';

        return $company;
    }

    // 保存实验任务信息
    public function save11() {
        $this->timeOut();

        $this->load->model('m_free');
        $this->load->model('m_free1');
        $this->load->model('m_free2');
        $u_id = $this->m_free->saveInfo();
        $p_id = $this->m_free1->getPid();
        $comId = $this->m_free1->saveInfo1($u_id,$p_id);
        $stuId = $this->session->userdata('u_id');
        $fb_id = $this->m_free2->saveInfo2($comId,$stuId);
        $data['free'] = $this->getFree($fb_id);

        $this->load->view('common/header3');
        $this->load->view('student/company/companyDetail', $data);
        $this->load->view('common/footer');
    }

    // 分页获取全部实验任务信息
    public function getCompanys($offset) {
        $this->timeOut();
        $this->load->model('m_free');
        $data = array();
        $result = $this->m_free->getCompanys($data, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array('fb_id' => $r->fb_id, 'comId' => $r->comId, 'comName' => $r->comName, 'address' => $r->address,
                'phone' => $r->phone, 'email' => $r->email, 'content' => $r->content, 'plan' => $r->plan,
                'u_id' => $r->u_id, 'realname' => $r->realname, 'state' => $r->state, 'stateId' => $r->stateId, 'p_id' => $r->p_id,
                'p_name' => $r->p_name, 'patternId' => $r->patternId, 'depart' => $r->depart, 'u_name' => $r->u_name,
                'password' => $r->password, 'state' => $r->state, 'pattern' => $r->pattern, 'collegeId' => $r->collegeId,
                'stuId' => $r->stuId, 'stuname' => $r->stuname, 'sturealname' => $r->sturealname, 'sex' => $r->sex);
            array_push($data, $arr);
        }
        return $data;
    }

    public function sgetCompanys($offset) {
        $this->load->model('m_company');
        $data = array();
        $result = $this->m_company->getCompanys($data, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array('comId' => $r->comId, 'comName' => $r->comName, 'address' => $r->address,
                'phone' => $r->phone, 'email' => $r->email, 'content' => $r->content, 'plan' => $r->plan);
            array_push($data, $arr);
        }
        return $data;
    }

    // 获取单个实验任务信息
    function getfCompany($id) {
        $this->load->model('m_free');
        $data = array();
        $result = $this->m_free->getOneInfo($id);
        
        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }
    
    function getFree($fb_id) {
        $this->load->model('m_free');
        $data = array();
        $result = $this->m_free->getFree($fb_id);
        
        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }

    // 获取单个实验任务信息
    function getCompany($id) {
        $this->load->model('m_company');
        $result = $this->m_company->getOneInfo($id);
        $data = array();
        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }

    public function getUsers() {
        $this->load->model('m_user');
        $data = $this->m_user->sgetUser(array());
        return $data;
    }

    public function getStates() {
        $this->load->model('m_company');
        $data = $this->m_company->getStates(array());
        return $data;
    }

    public function getPrograms() {
        $this->load->model('m_program');
        $data = $this->m_program->getsPrograms(array());
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