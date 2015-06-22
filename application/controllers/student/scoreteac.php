<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Scoreteac extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('pagination');
        ini_set('max_execution_time', '0');
        date_default_timezone_set('PRC');
    }
    
	

    public function scoreList() {
        $this->timeOut();
        //
        $stu_num = $this->session->userdata("u_num");
       
        $arrScore = array('scor_stu_num'=>$stu_num);
        $score = $this->getScoreByArr($arrScore);
        
        $data['score'] = $score;
        $this->load->view('common/header3');
        $this->load->view('student/score/score', $data);
        $this->load->view('common/footer');
        
    }
    
    function getScoreByArr($array){
    	$this->load->model("m_scoreteac");
    	$res = $this->m_scoreteac->getScore_ws($array);
    	$data= array();
    	foreach ($res as $r){
    		$arr = array(
    				'cour_no'=>$r->cour_no,
    				'cour_num'=>$r->cour_num,
    				'cour_name'=>$r->cour_name,
    				'scor_teac_score'=>$r->scor_teac_score,
    				'scor_id'=>$r->scor_id
    		);
    		array_push($data,$arr);
    	}
    	return $data;
    }
    
    // 实验任务详细信息页面
    public function scoreDetail() {
    	$this->timeOut();
    	$score_id = $this->uri->segment(4);
    	$score= $this->getScoreById($score_id);
    	$cour_id = $score->scor_cour_id;
    	$coursep = $this->getCoursepById($cour_id);
    	$data['cour_id']=$cour_id;
    	$data['cour']=$coursep;
    
    	$data['score']= $score;
    	$this->load->view('common/header3');
    	$this->load->view('student/score/scoreDetail', $data);
    	$this->load->view('common/footer');
    }
    function getScoreById($id){
    	$this->load->model('m_scoreteac');
    	$res=$this->m_scoreteac->getScoreById($id);
    	$data = array();
    	foreach ($res as $r){
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

    // session中的role不存在的时候退出系统
    function timeOut() {
        $role = $this->session->userdata('roleId');

        if ($role != 5) {
            $this->load->view('logout');
        }
    }

}

?>