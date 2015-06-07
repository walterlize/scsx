<?php
//选课报名
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Variablebm extends CI_Controller {

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
    public function variableList(){
    	$this->timeOut();
    	
    	$stuId = $this->session->userdata('u_name');
    	$array=array('stuId'=>$stuId);
    	$this->load->model('m_nvariable');
    	
    	$offset = $this->uri->segment(4);
    	$num = $this->m_nvariable->getNum($array);
    	$data1 = $this->getVariables($array,$offset);
    	$num1 = $data1['num'];
    	$num = $num - $num1;
    	
    	$data['variable'] = $data1['data'];
    	$config['base_url'] = base_url() . 'index.php/student/variable/variableList';
    	$config['total_rows'] = $num;
    	$config['uri_segment'] = 4;
    	$this->pagination->initialize($config);
    	$data['page'] = $this->pagination->create_links();
    	
    	$this->load->view('common/header3');
    	$this->load->view('student/variablebm/variable', $data);
    	$this->load->view('common/footer');
    }
    
    // 分页获取全部实验任务信息
    public function getVariables($array,$offset) {
    	$this->timeOut();
    	$this->load->model('m_nvariable');
    	$result = $this->m_nvariable->getNvariables($array, PER_PAGE, $offset);
    	$stu_num = $this->session->userdata('u_num');
    
    	$data = array();
    	$i = 0;
    	foreach ($result as $r) {
    		//查看课程是否发布
    		$arrCourse = array('cour_no'=>$r->courseId,'cour_num'=>$r->courseNum,'cour_term'=>$r->courseTerm);
        	$resCourse = $this->getCoursep($arrCourse);
        	//查看是否提交基地
        	$arrElco = array('elco_cour_no'=>$r->courseId,'elco_cour_num'=>$r->courseNum,'elco_cour_term'=>$r->courseTerm,'elco_stu_num'=>$stu_num);
        	$resElco = $this->getElecom($arrElco);
        	if($resCourse){
        		if($resCourse->cour_publish == 1){
        			if($resElco){
        				switch ($resElco->elco_state){
        					case 5:
					    		$arr = array(
					    				'id' => $r->id,
									    'courseId' => $r->courseId,
									    'courseNum' => $r->courseNum,
									    'courseName' => $r->courseName,
					    				'coursePattern' => $resCourse->patt_type,
						            	'coursePublish' => $resCourse->cour_publish,
						            	'courseCompany' => "已提交基地",
						            	'courseState' => "审核中"
					    				);
					    		break;
        					case 6:
        						$arr = array(
        								'id' => $r->id,
        								'courseId' => $r->courseId,
        								'courseNum' => $r->courseNum,
        								'courseName' => $r->courseName,
        								'coursePattern' => $resCourse->patt_type,
        								'coursePublish' => $resCourse->cour_publish,
        								'courseCompany' => "已提交基地",
        								'courseState' => "审核成功"
        						);
        						break;
        					case 7:
        						$arr = array(
					    				'id' => $r->id,
									    'courseId' => $r->courseId,
									    'courseNum' => $r->courseNum,
									    'courseName' => $r->courseName,
					    				'coursePattern' => $resCourse->patt_type,
						            	'coursePublish' => $resCourse->cour_publish,
						            	'courseCompany' => "已提交基地",
						            	'courseState' => "审核失败"
					    				);
					    		break;
        				}
			    		
        			}else{
        				$arr = array(
        						'id' => $r->id,
        						'courseId' => $r->courseId,
        						'courseNum' => $r->courseNum,
        						'courseName' => $r->courseName,
        						'coursePattern' => $resCourse->patt_type,
        						'coursePublish' => $resCourse->cour_publish,
        						'courseCompany' => "未提交基地",
        						'courseState' => ""
        				);
        			}
        			array_push($data, $arr);
        		}else{
        			$i++;
        		}
        	}else{
        		$i++;
        	}
    	}
    	$data1['num']=$i;
    	$data1['data']=$data;
    	return $data1;
    }
    
    
    
    public function variableDetail(){
    	$this->timeOut();
    	
    	$id = $this->uri->segment(4);
    	//获取单个选课信息
    	//oracle
    	$variable = $this->getVariable($id);
    	//获取单个信息
    	//oracle
    	$arrCourse = array('courseId'=>$variable->courseId,'courseNum'=>$variable->courseNum,'term'=>$variable->courseTerm);
    	$course = $this->getNCourse($arrCourse);
    	//mysql
    	$arrCoursep = array('cour_no'=>$variable->courseId,'cour_num'=>$variable->courseNum,'cour_term'=>$variable->courseTerm);
    	$coursep = $this->getCoursep($arrCoursep);
    	if(!$coursep){
    		$coursep = $this->getEmptyCoursep();
    	}
    	//查看是否报名
    	$stu_num = $this->session->userdata('u_num');
    	$arrElco = array('elco_cour_no'=>$variable->courseId,'elco_cour_num'=>$variable->courseNum,'elco_cour_term'=>$variable->courseTerm,'elco_stu_num'=>$stu_num);
    	$elecom = $this->getElecom($arrElco);
    	
    	$data['course'] = $course;
    	$data['coursep'] = $coursep;
    	$data['variable'] = $variable;
    	$data['elecom'] = $elecom;
    	$data['stu_num'] = $this->session->userdata('u_num');
    	
    	switch($coursep->cour_pattern_id){
    		case 1 :
    			//自选式
    			$this->load->view('common/header3');
    			$this->load->view('student/variablebm/variableDetail1', $data);
    			$this->load->view('common/footer');
    			break;
    		case 2 :
    			//志愿式
    			$this->load->view('common/header3');
    			$this->load->view('student/variablebm/variableDetail2', $data);
    			$this->load->view('common/footer');
    			break;
    		case 3 :
    			//分配式
    			$this->load->view('common/header3');
    			$this->load->view('student/variablebm/variableDetail3', $data);
    			$this->load->view('common/footer');
    			break;
    	}
    }
    
    
    // 获取单个选课信息
    function getVariable($id) {
    	$this->load->model('m_nvariable');
    	$result = $this->m_nvariable->getNvariableById($id);
    	$data = array();
    	foreach ($result as $r) {
    		$data = $r;
    	}
    	return $data;
    }
    
    // 获取单个
    function getCoursep($array) {
    	$this->load->model('m_course');
    	$result = $this->m_course->getCourse_ws($array);
    	$data = array();
    	foreach ($result as $r) {
    		$data = $r;
    	}
    	return $data;
    }
    
    // 获取单个
    function getElecom($array) {
    	$this->load->model('m_elecom');
    	$result = $this->m_elecom->getElecom_ws($array);
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
    
    function getEmptyCoursep(){
    	@$coursep->cour_id = 0;
    	$coursep->cour_no = '';
    	$coursep->cour_num = '';
    	$coursep->cour_term = '';
    	$coursep->cour_coll_id = '';
    	$coursep->cour_coll_name = '';
    	$coursep->cour_name = '';
    	$coursep->cour_name_en = '';
    	$coursep->cour_credit = '';
    	$coursep->cour_hours = '';
    	$coursep->cour_class = '';
    	$coursep->cour_teac_num = '';
    	$coursep->cour_teac_name = '';
    	$coursep->cour_mode = '';
    	$coursep->cour_time = '';
    	$coursep->cour_place = '';
    	$coursep->cour_week = '';
    	$coursep->cour_pattern_id = '';
    	$coursep->cour_publish = 0;
    	$coursep->patt_type = "未分配";
    	 
    	return $coursep;
    }
    
    public function variableDelete(){
    	$this->timeOut();
    	$elco_id = $this->uri->segment(4);
    	$this->load->model('m_elecom');
    	$this->m_elecom->deleteElecom($elco_id); 
    	
    	$stuId = $this->session->userdata('u_name');
    	$array=array('stuId'=>$stuId);
    	$this->load->model('m_nvariable');
    	 
    	$offset = 0;
    	$num = $this->m_nvariable->getNum($array);
    	$data1 = $this->getVariables($array,$offset);
    	$num1 = $data1['num'];
    	$num = $num - $num1;
    	 
    	$data['variable'] = $data1['data'];
    	$config['base_url'] = base_url() . 'index.php/student/variable/variableList';
    	$config['total_rows'] = $num;
    	$config['uri_segment'] = 4;
    	$this->pagination->initialize($config);
    	$data['page'] = $this->pagination->create_links();
    	 
    	$this->load->view('common/header3');
    	$this->load->view('student/variablebm/variable', $data);
    	$this->load->view('common/footer');
    }
    
    public function variableDeleteALL(){
    	$this->timeOut();
    	$this->timeOut();
    	//print_r($this->session->all_userdata());
    
    	$cour_id=$this->uri->segment(4);
    	$comp_id=$this->uri->segment(5);
    	$elco_id=$this->uri->segment(6);
    	
    	//2.删除公司信息
    	$this->load->model('m_company');
    	$company = $this->getCompanyById($comp_id);
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
    	$this->m_elecom->deleteElecom($elco_id);
    	 
    	$stuId = $this->session->userdata('u_name');
    	$array=array('stuId'=>$stuId);
    	$this->load->model('m_nvariable');
    
    	$offset = 0;
    	$num = $this->m_nvariable->getNum($array);
    	$data1 = $this->getVariables($array,$offset);
    	$num1 = $data1['num'];
    	$num = $num - $num1;
    
    	$data['variable'] = $data1['data'];
    	$config['base_url'] = base_url() . 'index.php/student/variable/variableList';
    	$config['total_rows'] = $num;
    	$config['uri_segment'] = 4;
    	$this->pagination->initialize($config);
    	$data['page'] = $this->pagination->create_links();
    
    	$this->load->view('common/header3');
    	$this->load->view('student/variablebm/variable', $data);
    	$this->load->view('common/footer');
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


    
    // session中的role不存在的时候退出系统
    function timeOut() {
        $role = $this->session->userdata('roleId');

        if ($role != 5) {
            $this->load->view('logout');
        }
    }

}

?>