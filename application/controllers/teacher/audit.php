<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Audit extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('pagination');
        date_default_timezone_set('PRC');
    }

    public function courseList() {
        $this->timeOut();
        //教师工号
        $teaNum = $this->session->userdata('u_num');
        $this->load->model('m_ncourse');
        $array=array('courseTeaId'=>$teaNum.'*');
        $offset = $this->uri->segment(4);
        $data1 = $this->getCourses($array,$offset);
        $num1 = $data1['num'];
        $num = $this->m_ncourse->getNum($array);
        $num = $num - $num1;

        $data['course'] = $data1['data'];
        
        $config['base_url'] = base_url() . 'index.php/teacher/audit/courseList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('teacher/audit/course', $data);
        $this->load->view('common/footer');
    }
    
    /*
     * 学生列表
     * 查看选课学生列表
     * 自选式：学生是否提交基地
     * 志愿式：学生报名信息审核
     * 分配式：查看所有报名学生及基地
     */
    public function auditList() {
    	$this->timeOut();
    	//查找课程号
    	$cour_id=$this->uri->segment(4);
    	$coursep = $this->getCoursepById($cour_id);
    	$array1 = array('courseId'=>$coursep->cour_no,'courseNum'=>$coursep->cour_num,'courseTerm'=>$coursep->cour_term);
    	$array2 = array('elco_cour_no'=>$coursep->cour_no,'elco_cour_num'=>$coursep->cour_num,'elco_cour_term'=>$coursep->cour_term);
    	
    	$audit = $this->getAudit($array1);
    	//$audit1 = $audit;
    	//
    	$auditt = $this->getAuditt($array2);
    	$auditf = $this->myArrDiff($audit,$auditt,'stu_num');
    	
    	$audit =array_merge($auditt,$auditf);
    	
    	$offset = $this->uri->segment(5);  	
    	$num = count($audit);
    
    	$config['base_url'] = base_url() . 'index.php/teacher/audit/auditList/'.$cour_id;
    	$config['total_rows'] = $num;
    	$config['uri_segment'] = 5;
        $config['num_links'] = 4;

    	$this->pagination->initialize($config);
    	$data['page'] = $this->pagination->create_links();
    	
    	$data['audit'] = array_slice($audit,$offset,PER_PAGE);
        $data['cour_id'] = $cour_id;
        switch($coursep->cour_pattern_id){
        	case 1:
        		$this->load->view('common/header3');
        		$this->load->view('teacher/audit/audit', $data);
        		$this->load->view('common/footer');
        		break;
        	case 2:
        		$this->load->view('common/header3');
        		$this->load->view('teacher/audit/audit2', $data);
        		$this->load->view('common/footer');
        		break;
        	case 3:
        		$this->load->view('common/header3');
        		$this->load->view('teacher/audit/audit3', $data);
        		$this->load->view('common/footer');
        		break;
        }
    	
    }
    
    

    // 实验任务详细信息页面
    public function auditDetail() {
        $this->timeOut();
        $cour_id = $this->uri->segment(4);
        $elco_id = $this->uri->segment(5);
        $elecom = $this->getElecom($elco_id);
        
        $data['elco'] = $elecom;
        $data['cour_id'] = $cour_id;
        $this->load->view('common/header3');
        $this->load->view('teacher/audit/auditDetail', $data);
        $this->load->view('common/footer');
    }
    
    // 审核通过
    public function auditPass() {
    	$this->timeOut();
    	$tea_num = $this->session->userdata("u_num");
    	$cour_id = $this->uri->segment(4);
    	$elco_id = $this->uri->segment(5);
    	$this->load->model('m_elecom');
    	$elecom = $this->getElecom($elco_id);
    	//1.elco状态5=>6
		$this->m_elecom->updateElecom($elco_id, array('elco_state'=>6));
    	//2.用户状态2=>1
    	$this->load->model('m_user');
    	$this->m_user->updateUser($elecom->comp_user_id, array('user_stat_id'=>1));
    	//3.公司状态5=>6
    	$this->load->model('m_company');
    	$this->m_company->updateCompany($elecom->elco_comp_id, array('comp_stat_id'=>6,'comp_audit_num'=>$tea_num));
    	   	
    	$elecom = $this->getElecom($elco_id);
    	$data['elco'] = $elecom;
    	$data['cour_id'] = $cour_id;
    	$this->load->view('common/header3');
    	$this->load->view('teacher/audit/auditDetail', $data);
    	$this->load->view('common/footer');
    }
    
    
    // 审核失败
    public function auditFail() {
    	$this->timeOut();
    	$tea_num = $this->session->userdata("u_num");
    	$cour_id = $this->uri->segment(4);
    	$elco_id = $this->uri->segment(5);
    	$this->load->model('m_elecom');
    	$elecom = $this->getElecom($elco_id);
    	//1.elco状态5=>7
		$this->m_elecom->updateElecom($elco_id, array('elco_state'=>7));
		if($elecom->elco_stu_num == $elecom->comp_add_num){
	    	//2.公司状态5=>7
	    	$this->load->model('m_company');
	    	$this->m_company->updateCompany($elecom->elco_comp_id, array('comp_stat_id'=>7,'comp_audit_num'=>$tea_num));
		}
    	$elecom = $this->getElecom($elco_id);
    	$data['elco'] = $elecom;
    	$data['cour_id'] = $cour_id;
    	$this->load->view('common/header3');
    	$this->load->view('teacher/audit/auditDetail', $data);
    	$this->load->view('common/footer');
    }
    
    
    //审核通过
    public function auditPassa() {
    	$this->timeOut();
    	$tea_num = $this->session->userdata("u_num");
    	$cour_id = $this->uri->segment(4);
    	$elco_id = $this->uri->segment(5);
    	$this->load->model('m_elecom');
    	$elecom = $this->getElecom($elco_id);
    	var_dump($elecom);
    	
    	//1.elco状态5=>6
    	$this->m_elecom->updateElecom($elco_id, array('elco_state'=>6));
    	//2.用户状态2=>1
    	$this->load->model('m_user');
    	$this->m_user->updateUser($elecom->comp_user_id, array('user_stat_id'=>1));
    	//3.公司状态5=>6
    	$this->load->model('m_company');
    	$this->m_company->updateCompany($elecom->elco_comp_id, array('comp_stat_id'=>6,'comp_audit_num'=>$tea_num));

    	redirect('teacher/audit/auditList/'.$cour_id);
    	
    }
    
    // 审核失败
    public function auditFaila() {
    	$this->timeOut();
    	$tea_num = $this->session->userdata("u_num");
    	$cour_id = $this->uri->segment(4);
    	$elco_id = $this->uri->segment(5);
    	$this->load->model('m_elecom');
    	$elecom = $this->getElecom($elco_id);
    	//1.elco状态5=>7
    	$this->m_elecom->updateElecom($elco_id, array('elco_state'=>7));
    	if($elecom->elco_stu_num == $elecom->comp_add_num){
    		//2.公司状态5=>7
    		$this->load->model('m_company');
    		$this->m_company->updateCompany($elecom->elco_comp_id, array('comp_stat_id'=>7,'comp_audit_num'=>$tea_num));
    	}
    	redirect('teacher/audit/auditList/'.$cour_id);
    }
    
    // 实验任务详细信息页面
    public function auditDetail2() {
    	$this->timeOut();
    	$cour_id = $this->uri->segment(4);
    	$elco_id = $this->uri->segment(5);
    	$elecom = $this->getElecom($elco_id);
    
    	$data['elco'] = $elecom;
    	$data['cour_id'] = $cour_id;
    	$this->load->view('common/header3');
    	$this->load->view('teacher/audit/auditDetail2', $data);
    	$this->load->view('common/footer');
    }
    
    // 实验任务详细信息页面
    public function auditDetail3() {
    	$this->timeOut();
    	$cour_id = $this->uri->segment(4);
    	$elco_id = $this->uri->segment(5);
    	$elecom = $this->getElecom($elco_id);
    
    	$data['elco'] = $elecom;
    	$data['cour_id'] = $cour_id;
    	$this->load->view('common/header3');
    	$this->load->view('teacher/audit/auditDetail3', $data);
    	$this->load->view('common/footer');
    }
    
    // 志愿式审核通过
    public function auditPass2() {
    	$this->timeOut();
    	$cour_id = $this->uri->segment(4);
    	$elco_id = $this->uri->segment(5);
    	$this->load->model('m_elecom');
    	$elecom = $this->getElecom($elco_id);
    	$stu_num = $elecom->elco_stu_num;
    	//elco状态全部设为7
    	$this->m_elecom->updateElecomByArr(array('elco_stu_num'=>$stu_num,'elco_cour_id'=>$cour_id), array('elco_state'=>7));
    	//1.elco状态5=>6
    	$this->m_elecom->updateElecom($elco_id, array('elco_state'=>6));
    		
    	$elecom = $this->getElecom($elco_id);
    	$data['elco'] = $elecom;
    	$data['cour_id'] = $cour_id;
    	$this->load->view('common/header3');
    	$this->load->view('teacher/audit/auditDetail', $data);
    	$this->load->view('common/footer');
    }
    
   
    // 志愿式审核失败
    public function auditFail2() {
    	$this->timeOut();
    	$cour_id = $this->uri->segment(4);
    	$elco_id = $this->uri->segment(5);
    	$this->load->model('m_elecom');
    	$elecom = $this->getElecom($elco_id);
    	//1.elco状态5=>7
    	$this->m_elecom->updateElecom($elco_id, array('elco_state'=>7));
    	
    	$elecom = $this->getElecom($elco_id);
    	$data['elco'] = $elecom;
    	$data['cour_id'] = $cour_id;
    	$this->load->view('common/header3');
    	$this->load->view('teacher/audit/auditDetail', $data);
    	$this->load->view('common/footer');
    }
    // 志愿式审核通过
    public function auditPass2a() {
    	$this->timeOut();
    	$cour_id = $this->uri->segment(4);
    	$elco_id = $this->uri->segment(5);
    	$this->load->model('m_elecom');
    	$elecom = $this->getElecom($elco_id);
    	$stu_num = $elecom->elco_stu_num;
    	//elco状态全部设为7
    	$this->m_elecom->updateElecomByArr(array('elco_stu_num'=>$stu_num,'elco_cour_id'=>$cour_id), array('elco_state'=>7));
    	//1.elco状态5=>6
    	$this->m_elecom->updateElecom($elco_id, array('elco_state'=>6));
    
    	redirect('teacher/audit/auditList/'.$cour_id);
    }
    // 志愿式审核失败
    public function auditFail2a() {
    	$this->timeOut();
    	$cour_id = $this->uri->segment(4);
    	$elco_id = $this->uri->segment(5);
    	$this->load->model('m_elecom');
    	$elecom = $this->getElecom($elco_id);
    	//1.elco状态5=>7
    	$this->m_elecom->updateElecom($elco_id, array('elco_state'=>7));
    	 
    	redirect('teacher/audit/auditList/'.$cour_id);
    }
    
    
    
    // 分页获取全部实验任务信息
    public function getCourses($array,$offset) {
        $this->timeOut();
        $this->load->model('m_ncourse');
        $data = array();
        $result = $this->m_ncourse->getNcourses($array, PER_PAGE, $offset);

        $this->load->model('m_course');
        $i = 0;
        foreach ($result as $r) {
        	$arrCourse = array('cour_no'=>$r->courseId,'cour_num'=>$r->courseNum,'cour_term'=>$r->term,'cour_publish'=>1);
        	$resCourse = $this->getCoursep($arrCourse);
        	if($resCourse){
	            $arr = array( 
	            		'id'=>$r->id,
	            		'courseId' => $r->courseId,
	            		'courseNum' => $r->courseNum,
	            		'courseName' => $r->courseName,
	            		'coursePattern' => $resCourse->patt_type,
	            		'coursePublish' => $resCourse->cour_publish,
	            		'cour_id' => $resCourse->cour_id
	                );
	            array_push($data, $arr);
        	}else{
        		$i++;
        	}
            
        }
        $data1['num']=$i;
        $data1['data']=$data;
        return $data1;
    }
    
    function getAudit($array){
    	//暂时不考虑分页
    	$data  = array();//全部学生
    	$this->load->model('m_nvariable');
    	$result = $this->m_nvariable->getNvariable($array);
    	foreach ($result as $r) {
    		$arr = array(
    				'stu_num'=>$r->stuId,
    				'stu_name' => $r->stuName,
    				'stu_class' => $r->stuClass,
    				'elco_name' => "未提交",
    				'elco_id' => 0,
    				'elco_state' => '无信息'
    		);
    		array_push($data, $arr);	
    	}
    	
    	return $data;
    }
    
    //已提交基地学生
    function getAuditt($array){
    	$data = array();
    	$this->load->model('m_elecom');
    	$result = $this->m_elecom->getElecom_ws($array);
    	foreach ($result as $r) {
    		$arr = array(
    				'stu_num'=>$r->elco_stu_num,
    				'stu_name' => $r->elco_stu_name,
    				'stu_class' => $r->elco_stu_class,
    				'elco_name' => $r->comp_name,
    				'elco_id' => $r->elco_id,
    				'elco_state' => $r->usta_type
    		);
    		array_push($data, $arr);
    	}
    	
    	return $data;
    }
    /*
    //志愿式全部选课学生
    function getAuditz($array){
    	//暂时不考虑分页
    	$data  = array();//全部学生
    	$this->load->model('m_nvariable');
    	$result = $this->m_nvariable->getNvariable($array);
    	foreach ($result as $r) {
    		$arr = array(
    				'stu_num'=>$r->stuId,
    				'stu_name' => $r->stuName,
    				'stu_class' => $r->stuClass,
    				'elco_name' => "未提交",
    				'elco_id' => 0,
    				'elco_state' => '无信息'
    		);
    		array_push($data, $arr);
    	}
    	 
    	return $data;
    }
    
    //志愿式已提交基地学生
    //志愿式学生提交多个基地 显示学生名
    function getAudittz($array){
    	$data = array();
    	$this->load->model('m_elecom');
    	$result = $this->m_elecom->getElecom_ws($array);
    	foreach ($result as $r) {
    		$arr = array(
    				'stu_num'=>$r->elco_stu_num,
    				'stu_name' => $r->elco_stu_name,
    				'stu_class' => $r->elco_stu_class,
    				'elco_name' => $r->comp_name,
    				'elco_id' => $r->elco_id,
    				'elco_state' => $r->usta_type
    		);
    		array_push($data, $arr);
    	}
    	 
    	return $data;
    }
    */

    // 获取单个oracle数据
    function getCourse($id) {
        $this->load->model('m_ncourse');
        $result = $this->m_ncourse->getNcourseById($id);
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
    function getCoursepById($id) {
    	$this->load->model('m_course');
    	$result = $this->m_course->getCourseById_ws($id);
    	$data = array();
    	foreach ($result as $r) {
    		$data = $r;
    	}
    	return $data;
    }
    
    // 获取单个
    function getElecom($id) {
    	$this->load->model('m_elecom');
    	$result = $this->m_elecom->getElecomById_ws($id);
    	$data = array();
    	foreach ($result as $r) {
    		$data = $r;
    	}
    	return $data;
    }
    

	//返回两数组差集（按指定键值）
	function myArrDiff($array1,$array2,$key){
		if(count($array1) != count($array2)){
			foreach ($array1 as $i=>$p){				
				foreach($array2 as $q){
						if($p[$key] == $q[$key]){
							unset($array1[$i]);
						}				
				}
			}
			$array1 = array_values($array1);
		}else{
			$array1=array();
		}
		return $array1;
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
