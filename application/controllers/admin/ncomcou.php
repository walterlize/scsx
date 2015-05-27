<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ncomcou extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('pagination');
        ini_set('max_execution_time', '0');
        date_default_timezone_set('PRC');
    }
    
    public function ncomcouList(){
    	$this->timeOut();
    	
    	//1.查找所有志愿式与分配式课程
    	$where = "(patternId = '1' or patternId = '3')" ;

    	$this->load->model('m_ncomcou');
    	$num = $this->m_ncomcou->getNum_ws($where);
    	$offset = $this->uri->segment(4);
    	
    	$data['course'] = $this->getCourses($where,$offset);
    	
        $data['comcou'] = $this->getComcous($where,$offset);
        
    	$config['base_url'] = base_url() . 'index.php/admin/ncomcou/ncomcouList';
    	$config['total_rows'] = $num;
    	$config['uri_segment'] = 4;
    	$this->pagination->initialize($config);
    	$data['page'] = $this->pagination->create_links();
    	
    	$this->load->view('common/header3');
    	$this->load->view('admin/comcou/comcou', $data);
    	$this->load->view('common/footer');
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
    
    
    // 分页获取全部实验任务信息
    public function getComcous($array,$offset) {
    	$this->timeOut();
    	$this->load->model('m_ncomcou');
    	$data = array();
    	$result = $this->m_ncomcou->getNcomcous_ws($array, PER_PAGE, $offset);
    
    	foreach ($result as $r) {
    		$arr = array(
    				'id' => $r->id,
    				'comId'=>$r->comId,
    				'comName'=>$r->comName,
    				'course_id' => $r->course_id,
    				'courseId' => $r->courseId,
    				'courseNum' => $r->courseNum,
    				'courseName' => $r->courseName,
    				'courseNameEn' => $r->courseNameEn,
    				'patternId'=> $r->patternId,
    				'pattern' => $r->pattern,
    				'u_id'=>$r->u_id,
    				'realname'=>$r->realname
    		);
    		array_push($data, $arr);
    	}
    	return $data;
    }
    
    public function ncomcouNew(){
    	$this->timeOut();
    	
    	@$comc->id = 0;
    	$comc->comId='';
    	$comc->course_id='';
    	$comc->courseId='';
    	$comc->courseNum='';
    	
    	//实习基地列表
    	$this->load->model('m_ncompany');
    	$company=$this->m_ncompany->getNCompany_ao(array());
    	//实习项目列表分配式志愿式
    	$this->load->model('m_ncourse');
    	$course = $this->m_ncourse->getNcourse1_ws(array());
    	
    	$data['comc']=$comc;
    	$data['company']=$company;
    	$data['course']=$course;
    	$data['show']="display:none";
    	
    	$this->load->view('common/header3');
    	$this->load->view('admin/comcou/comcouEdit', $data);
    	$this->load->view('common/footer');
    	
    }
    
    public function getAjaxId(){
    	$this->timeOut();
		//获取课程号
		$courseId= $this->uri->segment(4);
		
		//在数据库中查找课程号为$courseId的课序号
		$this->load->model('m_ncourse');
		$select = array("courseId"=>$courseId);
		//$indi2 = $this->m_indicator->getIndicator($select);
		$courseNum = $this->m_ncourse->getNcourse1_ws($select);

		//处理JSON数据
		$arr = array(
				'courseNum'=>$courseNum,
		);
		echo json_encode($arr);
    }
    
    public function getAjaxNum(){
    	$this->timeOut();
    	//获取课程号
    	$courseId= $this->uri->segment(4);
    	$courseNum= $this->uri->segment(5);
    
    	//在数据库中查找课程号为$courseId的课序号
    	$this->load->model('m_ncourse');
    	$select = array("courseId"=>$courseId,'courseNum'=>$courseNum);
    	//$indi2 = $this->m_indicator->getIndicator($select);
    	$courseName = $this->m_ncourse->getNcourse1_ws($select);
    
    	//处理JSON数据
    	$arr = array(
    		'courseName'=>$courseName,
    	);
    	echo json_encode($arr);
    }
    
	//保存信息
    public function save(){
    	$this->timeOut();
    	
    	$this->load->model('m_ncomcou');
    	$id = $this->m_ncomcou->saveInfo();

    	
    	
    	//1.查找所有志愿式与分配式课程
    	$array = "(patternId = '1' or patternId = '3')" ;

    	$this->load->model('m_ncomcou');
    	$num = $this->m_ncomcou->getNum_ws($array);
    	$offset = $this->uri->segment(4);
    	
    	$data['course'] = $this->getCourses($array,$offset);
    	
        $data['comcou'] = $this->getComcous($array,$offset);
        
    	$config['base_url'] = base_url() . 'index.php/admin/ncomcou/ncomcouList';
    	$config['total_rows'] = $num;
    	$config['uri_segment'] = 4;
    	$this->pagination->initialize($config);
    	$data['page'] = $this->pagination->create_links();
    	
    	$this->load->view('common/header3');
    	$this->load->view('admin/comcou/comcou', $data);
    	$this->load->view('common/footer');
    }
    
    public function ncomcouEdit(){
    	$id = $this->uri->segment(4);

    	//查找信息
   
    	$comcou= $this->getComcou($id);
    	
    	//实习基地列表
    	$this->load->model('m_ncompany');
    	$company=$this->m_ncompany->getNCompany_ao(array());
    	$data['comc']=$comcou;
    	$data['company']=$company;
    	$data['show']='';
    	$this->load->view('common/header3');
    	$this->load->view('admin/comcou/comcouEdit2', $data);
    	$this->load->view('common/footer');
    }

    // 获取单个信息
    function getComcou($id) {
    	$this->load->model('m_ncomcou');
    	$result = $this->m_ncomcou->getNcomcouById_ws($id);
    	$data = array();
    	foreach ($result as $r) {
    		$data = $r;
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