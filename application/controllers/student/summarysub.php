<?php
//---------------------------
//oracle---------------------
//---------------------------
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Summarysub extends CI_Controller {

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

    public function summarysubList() {
        $this->timeOut();
        $stu_num = $this->session->userdata('u_num');
        $term = $this->session->userdata('term');
        //$array = array('summ_stu_num'=>$stu_num);
        //1.已发布选课列表
        $array=array('XH'=>$stu_num,'ZXJXJHH'=>$term);
    	$this->load->model('m_nvariable');
    	$num = $this->m_nvariable->getNum($array);
    	$data1 = $this->getVariables($array);
    	$variable = $data1['data'];
    	$num = $num - $data1['num'];
        //2.课程任务
        $summary = array();
        foreach ($variable as $r){
        	$arrays = array('miss_cour_id'=>$r['cour_id'],'summ_stu_num'=>$stu_num);
        	$summary[$r['cour_id']]=$this->getSummary($arrays);
        }

       
		$data['variable']=$variable;
		$data['summary']=$summary;
        $this->load->view('common/header3');
        $this->load->view('student/summarysub/summarysub', $data);
        $this->load->view('common/footer');
    }
    
    // 分页获取全部实验任务信息
    public function getVariables($array) {
    	$this->timeOut();
    	$this->load->model('m_nvariable');
    	$result = $this->m_nvariable->getNvariable($array);
    	
    	$data = array();
    	foreach ($result as $r) {
    
    		$arrCourse = array('cour_no'=>$r->KCH,'cour_num'=>$r->KXH,'cour_term'=>$r->ZXJXJHH);
    		//var_dump($arrCourse);echo "<br>";
    		$resCourse = $this->getCoursep($arrCourse);
    		//var_dump($resCourse);echo "<br>";
    		$i=0;
    		//课程已发布
    		if($resCourse){
    			$arr = array(
    					'cour_id' => $resCourse->cour_id,
    					'cour_no' => $resCourse->cour_no,
    					'cour_num' => $resCourse->cour_num,
    					'cour_name' => $resCourse->cour_name,
    					
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
    
    
    // 实验任务详细信息页面
    public function summarysubDetail() {   
        $this->timeOut();
        $stu_num = $this->session->userdata('u_name');
        //任务详情
        $summ_id = $this->uri->segment(4);
        $summary = $this->getSummaryById_ws($summ_id);
        
        $data['summary']=$summary;
        $this->load->view('common/header3');
        $this->load->view('student/summarysub/summarysubDetail', $data);
        $this->load->view('common/footer');
        
    }
    

   
	function getSummary($array){
    	$this->load->model('m_summary');
    	$result = $this->m_summary->getSummary_ws($array);
    	$data = array();
    	foreach ($result as $r) {
    		$arr = array(
    				'summ_id'=>$r->summ_id,
    				'summ_miss_id'=>$r->summ_miss_id,
    				'miss_title'=>$r->miss_title,
    				'miss_start_time'=>$r->miss_start_time,
    				'miss_end_time'=>$r->miss_end_time,
    				'summ_content'=>$r->summ_content,
    				'summ_time'=>$r->summ_time,
    				'summ_appr_id'=>$r->summ_appr_id,
    				'summ_appr_time'=>$r->summ_appr_time,
    				'summ_result'=>$r->summ_result,
    		);
    		array_push($data,$arr);
    	}
    	return $data;
    }


    // 获取单个实验任务信息
    function getSummaryById_ws($id) {
    	$this->load->model('m_summary');
    	$result = $this->m_summary->getSummaryById_ws($id);
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