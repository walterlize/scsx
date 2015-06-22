<?php
//---------------------------
//oracle---------------------
//---------------------------
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Summary extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('pagination');
        ini_set('max_execution_time', '0');
        date_default_timezone_set('PRC');
        $this->load->model('m_summary');
    }

    public function summaryList() {
        $this->timeOut();
        $stu_num = $this->session->userdata('u_num');
        //$array = array('summ_stu_num'=>$stu_num);
        //1.已发布选课列表
        $array=array('stuId'=>$stu_num);
    	$this->load->model('m_nvariable');
    	$num = $this->m_nvariable->getNum($array);
    	$data1 = $this->getVariables($array);
    	$variable = $data1['data'];
    	$num = $num - $data1['num'];
        //2.课程任务
        $mission = array();
        foreach ($variable as $r){
        	$arraym = array('miss_cour_id'=>$r['cour_id']);
        	$mission[$r['cour_id']]=$this->getMission($arraym);
        }

       
		$data['variable']=$variable;
		$data['mission']=$mission;
        $this->load->view('common/header3');
        $this->load->view('student/summary/summary', $data);
        $this->load->view('common/footer');
    }
    
    // 分页获取全部实验任务信息
    public function getVariables($array) {
    	$this->timeOut();
    	$this->load->model('m_nvariable');
    	$result = $this->m_nvariable->getNvariable($array);
    	
    	$data = array();
    	foreach ($result as $r) {
    
    		$arrCourse = array('cour_no'=>$r->courseId,'cour_num'=>$r->courseNum,'cour_term'=>$r->courseTerm);
    		//var_dump($arrCourse);echo "<br>";
    		$resCourse = $this->getCoursep($arrCourse);
    		//var_dump($resCourse);echo "<br>";
    		$i=0;
    		//课程已发布
    		if($resCourse){
    			$arr = array(
    					'cour_id' => $resCourse->cour_id,
    					'cour_no' => $r->courseId,
    					'cour_num' => $r->courseNum,
    					'cour_name' => $r->courseName,
    					
    			);
    			array_push($data, $arr);
    		}else{
    			//课程未发布
    			$i++;
    		}
    		
    	}
    	$data1['data']=$data;
    	$data1['num']=$i;
    	return $data1;
    }
    
    function getMission($array){
    	$this->load->model('m_mission');
    	$result = $this->m_mission->getMission($array);
    	$data = array();
    	foreach ($result as $r) {
    		$arr = array(
    				'miss_id'=>$r->miss_id,
    				'miss_title'=>$r->miss_title,
    				'miss_start_time'=>$r->miss_start_time,
    				'miss_end_time'=>$r->miss_end_time,
    		);
    		array_push($data,$arr);
    	}
    	return $data;
    }
    
    function getMissionById($id){
    	$this->load->model('m_mission');
    	$result = $this->m_mission->getMissionById_ws($id);
    	$data = array();
    	foreach ($result as $r) {
    		$data = $r;
    	}
    	return $data;
    }
    
    
    
    // 实验任务详细信息页面
    public function summaryDetail() {   
        $this->timeOut();
        $stu_num = $this->session->userdata('u_name');
        //任务详情
        $miss_id = $this->uri->segment(4);
        $mission = $this->getMissionById($miss_id);
        $data['mission'] = $mission;

        //查看是否提交
        $array = array('summ_stu_num'=>$stu_num,'summ_miss_id'=>$miss_id);
        $summary = $this->getSummaryByArr($array);
        if($summary){
        	$data['summary']=$summary;
        	$this->load->view('common/header3');
        	$this->load->view('student/summary/summaryDetaily', $data);
        	$this->load->view('common/footer');
        }else{
        	$flag=0;
        	$date1=date('Y-m-d H:m:s');
        	if($mission->miss_end_time!="0000-00-00 00:00:00"){
        		if(strtotime($date1) > strtotime($mission->miss_end_time)){
        			$flag = 1;//超时
        		}
        	}
        	$data['flag']=$flag;
        	
	        $this->load->view('common/header3');
	        $this->load->view('student/summary/summaryDetailn', $data);
	        $this->load->view('common/footer');
        }
    }
    
    

    // 实验任务信息编辑页面
    public function summaryEdit() {
        $this->timeOut();
        $summ_id = $this->uri->segment(4);
        $summary = $this->getSummaryById($summ_id);
        $summary->summ_time = date('Y-m-d H:m:s');
        $mission = $this->getMissionById($summary->summ_miss_id);

        $data['summary'] = $summary;
        $data['mission'] = $mission;
        $data['showActive'] = '';
        $data['showUnactive'] = 'display:none';

        $this->load->view('common/header3');
        $this->load->view('student/summary/summaryEdit', $data);
        $this->load->view('common/footer');
    }

    // 实验任务详细信息新增页面
    public function summaryNew() {
        $this->timeOut();

        $miss_id = $this->uri->segment(4);
        @$summary->summ_id = 0;
        $summary->summ_miss_id = $miss_id;
        $summary->summ_stu_num = $this->session->userdata('u_num');
        $summary->summ_content = '';
        $summary->summ_time = date("Y-m-d H:m:s");
        
        $summary->summ_appr_id = 5;
        $summary->summ_appr_time = '0000-00-00';
        $summary->summ_result = '';

        
        $data['mission'] = $this->getMissionById($miss_id);
        $data['summary'] = $summary;

        $data['show'] = 'display:none';
        $data['showActive'] = 'display:none';
        $data['showUnactive'] = 'display:none';

        $this->load->view('common/header3');
        $this->load->view('student/summary/summaryEdit', $data);
        $this->load->view('common/footer');
    }

    public function summaryDelete() {
        $this->timeOut();
        $summ_id = $this->uri->segment(4);
        $this->load->model('m_summary');
        $this->m_summary->deleteSummary($summ_id);

        redirect('student/summary/summaryList');
    }

    // 保存实验任务信息
    public function save() {
        $this->timeOut();
        $miss_id = $this->uri->segment(4);

        $this->load->model('m_summary');
        $summ_id = $this->m_summary->saveInfo();

        $summary = $this->getSummaryById($summ_id);
        $mission = $this->getMissionById($miss_id);
        $data['summary']=$summary;
        $data['mission']=$mission;
        $this->load->view('common/header3');
        $this->load->view('student/summary/summaryDetaily', $data);
        $this->load->view('common/footer');
    }

    /*
    public function getSummarys2($offset) {
        $this->timeOut();
        $this->load->model('m_summary');
        $data = array();
        $result = $this->m_summary->getSummarys2($data, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array('m_id' => $r->m_id, 
            		'content' => $r->content,
            		'workTime' => $r->workTime,
                    'stateId' => $r->stateId, 
            		'title' => $r->title, 
            		'teaId' => $r->teaId,
            		'p_name' => $r->courseName,
            		'stuId' => $r->stuId,
                    'stu_name' => $r->stuName,  
            		'trealname' => $r->courseTeaName);
            array_push($data, $arr);
        }
        return $data;
    }
    */

    

    // 获取单个实验任务信息
    function getSummaryByArr($array) {
        $this->load->model('m_summary');
        $result = $this->m_summary->getSummary($array);
        $data = array();
        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }
    // 获取单个实验任务信息
    function getSummaryById($id) {
    	$this->load->model('m_summary');
    	$result = $this->m_summary->getSummaryById($id);
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


    // session中的role不存在的时候退出系统
    function timeOut() {
        $role = $this->session->userdata('roleId');

        if ($role != 5) {
            $this->load->view('logout');
        }
    }

}

?>