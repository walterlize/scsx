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

    //查看已分配课程
    public function courseList() {
        $this->timeOut();
        //教师工号
        $teaNum = $this->session->userdata('u_num');
        $term = $this->session->userdata('term');//学期
        
        $this->load->model('m_course');
        $array=array('cour_teac_num'=>$teaNum,'cour_term'=>$term,'cour_publish'=>1);
        $offset = $this->uri->segment(4);
        $data['course'] = $this->getCourses($array,$offset);
        
        $num = $this->m_course->getNum($array);
        
        $config['base_url'] = base_url() . 'index.php/teacher/audit/courseList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $data['num']='共有'.$num.'条记录。';
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
    	$array1 = array('KCH'=>$coursep->cour_no,'KXH'=>$coursep->cour_num,'ZXJXJHH'=>$coursep->cour_term);
    	$array2 = array('elco_cour_no'=>$coursep->cour_no,'elco_cour_num'=>$coursep->cour_num,'elco_cour_term'=>$coursep->cour_term);
    	$array3 = array('elco_cour_no'=>$coursep->cour_no,'elco_cour_num'=>$coursep->cour_num,'elco_cour_term'=>$coursep->cour_term,'elco_state'=>6);
    	$this->load->model("m_elecom");
    	$numtt = $this->m_elecom->getNum($array3);//审核通过
    	$audit = $this->getAudit($array1);
    	//$audit1 = $audit;
    	//已提交
    	$auditt = $this->getAuditt($array2);
    	$numt = count($auditt);
    	//未提交
    	$auditf = $this->myArrDiff($audit,$auditt,'stu_num');
    	$numf = count($auditf);
    	
    	$audit =array_merge($auditt,$auditf);
    	
    	$offset = $this->uri->segment(5);  	
    	$num = count($audit);
    
    	$config['base_url'] = base_url() . 'index.php/teacher/audit/auditList/'.$cour_id;
    	$config['total_rows'] = $numt;
    	$config['uri_segment'] = 5;
        $config['num_links'] = 4;

    	$this->pagination->initialize($config);
    	$data['page'] = $this->pagination->create_links();
    	
    	$data['audit'] = array_slice($auditt,$offset,PER_PAGE);//显示所有提交基地学生
        $data['cour_id'] = $cour_id;
        $data['num']=$num;//总人数
        $data['numt']=$numt;//
        $data['numtt']=$numtt;//
        $data['numf']=$numf;//未提交人数
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
        $this->load->model('m_course');
        $data = array();
        $result = $this->m_course->getCourses_ws($array, PER_PAGE, $offset);

        foreach ($result as $r) {
        	
	        $arr = array( 
	            		
	            		'courseId' => $r->cour_no,
	            		'courseNum' => $r->cour_num,
	            		'courseName' => $r->cour_name,
	            		'coursePattern' => $r->patt_type,
	            		'coursePublish' => $r->cour_publish,
	            		'cour_id' => $r->cour_id
	            );
	        array_push($data, $arr);
        	
            
        }
       
        return $data;
    }
    
    function getAudit($array){
    	//暂时不考虑分页
    	$data  = array();//全部学生
    	$this->load->model('m_nvariable');
    	$result = $this->m_nvariable->getNvariable($array);
    	foreach ($result as $r) {
    		$arr = array(
    				'stu_num'=>$r->XH,
    				'stu_name' => $r->XM,
    				'stu_class' => $r->BM,
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
