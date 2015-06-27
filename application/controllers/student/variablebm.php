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
    	
    	$stuId = $this->session->userdata('u_num');
    	$term = $this->session->userdata('term');
    	$array=array('XH'=>$stuId,'ZXJXJHH'=>$term);
    	$this->load->model('m_nvariable');
    	
    	$offset = $this->uri->segment(4);
    	$num = $this->m_nvariable->getNum($array);
    	$data1 = $this->getVariables($array,$offset);
    	$num1 = $data1['num'];
    	$num = $num - $num1;
    	
    	$data['variable'] = $data1['data'];
    	$config['base_url'] = base_url() . 'index.php/student/variablebm/variableList';
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
    		$arrCourse = array('cour_no'=>$r->KCH,'cour_num'=>$r->KXH,'cour_term'=>$r->ZXJXJHH);
        	$resCourse = $this->getCoursep($arrCourse);
        	//查看是否提交基地
        	$arrElco = array('elco_cour_no'=>$r->KCH,'elco_cour_num'=>$r->KXH,'elco_cour_term'=>$r->ZXJXJHH,'elco_stu_num'=>$stu_num);
        	$resElco = $this->getElecom($arrElco);
        	if($resCourse){
        		if($resCourse->cour_publish == 1){//课程发布
        			if($resElco){//已提交基地
        				if($resCourse->cour_pattern_id == 1){//自选式课程
	        				switch ($resElco->elco_state){
	        					case 5:
						    		$arr = array(
						    				
										    'courseId' => $r->KCH,
										    'courseNum' => $r->KXH,
										    'courseName' => $r->KCM,
						    				'coursePattern' => $resCourse->patt_type,
							            	'coursePublish' => $resCourse->cour_publish,
							            	'courseCompany' => "已提交基地",
							            	'courseState' => "审核中"
						    				);
						    		break;
	        					case 6:
	        						$arr = array(
	        								
	        								'courseId' => $r->KCH,
	        								'courseNum' => $r->KXH,
	        								'courseName' => $r->KCM,
	        								'coursePattern' => $resCourse->patt_type,
	        								'coursePublish' => $resCourse->cour_publish,
	        								'courseCompany' => "已提交基地",
	        								'courseState' => "审核成功"
	        						);
	        						break;
	        					case 7:
	        						$arr = array(
						    				
										    'courseId' => $r->KCH,
										    'courseNum' => $r->KXH,
										    'courseName' => $r->KCM,
						    				'coursePattern' => $resCourse->patt_type,
							            	'coursePublish' => $resCourse->cour_publish,
							            	'courseCompany' => "已提交基地",
							            	'courseState' => "审核失败"
						    				);
						    		break;
	        				}
        				}elseif($resCourse->cour_pattern_id == 2){//志愿式课程
        					$arr = array(
        							
        							'courseId' => $r->KCH,
        							'courseNum' => $r->KXH,
        							'courseName' => $r->KCM,
        							'coursePattern' => $resCourse->patt_type,
        							'coursePublish' => $resCourse->cour_publish,
        							'courseCompany' => "已提交基地",
        							'courseState' => "--"
        					);
        				}elseif($resCourse->cour_pattern_id == 3){//分配式课程
        					$arr = array(
        							
        							'courseId' => $r->KCH,
        							'courseNum' => $r->KXH,
        							'courseName' => $r->KCM,
        							'coursePattern' => $resCourse->patt_type,
        							'coursePublish' => $resCourse->cour_publish,
        							'courseCompany' => "已分配基地",
        							'courseState' => "审核通过"
        					);
        				}
			    		
        			}else{
        				$arr = array(
        						
        						'courseId' => $r->KCH,
        						'courseNum' => $r->KXH,
        						'courseName' => $r->KCM,
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
    	
    	$cour_no = $this->uri->segment(4);
    	$cour_num = $this->uri->segment(5);
    	$term = $this->session->userdata("term");
    	$stu_num = $this->session->userdata("u_num");
    	//获取单个选课信息
    	//oracle
    	$arrVari = array('KCH'=>$cour_no,'KXH'=>$cour_num,'ZXJXJHH'=>$term,'XH'=>$stu_num);
    	$variable = $this->getVariable($arrVari);
    	//获取单个信息
    	//oracle
    	$arrCourse = array('KCH'=>$cour_no,'KXH'=>$cour_num,'ZXJXJHH'=>$term);
    	$course = $this->getNCourse($arrCourse);
    	//mysql
    	$arrCoursep = array('cour_no'=>$cour_no,'cour_num'=>$cour_num,'cour_term'=>$term);
    	$coursep = $this->getCoursep($arrCoursep);
    	if(!$coursep){
    		$coursep = $this->getEmptyCoursep();
    	}
    	//查看是否报名
    	$arrElco = array('elco_cour_no'=>$cour_no,'elco_cour_num'=>$cour_num,'elco_cour_term'=>$term,'elco_stu_num'=>$stu_num);
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
    function getVariable($array) {
    	$this->load->model('m_nvariable');
    	$result = $this->m_nvariable->getNvariable($array);
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
    	$term = $this->session->userdata("term");
    	
    	$this->load->model('m_elecom');
    	$this->m_elecom->deleteElecom($elco_id); 
    	
    	$stuId = $this->session->userdata('u_name');
    	$array=array('XH'=>$stuId,'ZXJXJHH'=>$term);
    	$this->load->model('m_nvariable');
    	 
    	$offset = 0;
    	$num = $this->m_nvariable->getNum($array);
    	$data1 = $this->getVariables($array,$offset);
    	$num1 = $data1['num'];
    	$num = $num - $num1;
    	 
    	$data['variable'] = $data1['data'];
    	$config['base_url'] = base_url() . 'index.php/student/variablebm/variableList';
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
    	$term = $this->session->userdata("term");
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
    	$array=array('XH'=>$stuId,'ZXJXJHH'=>$term);
    	$this->load->model('m_nvariable');
    
    	$offset = 0;
    	$num = $this->m_nvariable->getNum($array);
    	$data1 = $this->getVariables($array,$offset);
    	$num1 = $data1['num'];
    	$num = $num - $num1;
    
    	$data['variable'] = $data1['data'];
    	$config['base_url'] = base_url() . 'index.php/student/variablebm/variableList';
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