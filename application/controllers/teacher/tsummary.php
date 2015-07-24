<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tsummary extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('pagination');
        ini_set('max_execution_time', '0');
        date_default_timezone_set('PRC');
    }

    public function tsummaryList() {
        $this->timeOut();

        $tea_num = $this->session->userdata('u_num');
        $term = $this->session->userdata('term');
        //查询该老师名下所有本学期summary
        //========================
        $array = array('miss_teac_num'=>$tea_num,'summ_appr_id !='=>4,'cour_term'=>$term);
        
        $this->load->model('m_summary');
        $num = $this->m_summary->getNum_ws($array);
        $offset = $this->uri->segment(4);

        $data['tsummary'] = $this->getSummarys($array,$offset);
        $config['base_url'] = base_url() . 'index.php/teacher/tsummary/tsummaryList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $data['num']='共有'.$num.'条记录。';

        $this->load->view('common/header3');
        $this->load->view('teacher/tsummary/tsummary', $data);
        $this->load->view('common/footer');
    }
    
   

    // 实验任务详细信息页面
    public function tsummaryDetail() {
        $this->timeOut();
        $summ_id = $this->uri->segment(4);
        $summary = $this->getSummary($summ_id);
        $data['summary'] = $summary;
        if($summary->summ_appr_id == 5){
	        $this->load->view('common/header3');
	        $this->load->view('teacher/tsummary/tsummaryDetail', $data);
	        $this->load->view('common/footer');
        }else{
        	$this->load->view('common/header3');
        	$this->load->view('teacher/tsummaryappr/tsummaryDetail', $data);
        	$this->load->view('common/footer');
        }
    }
    
    // 实验任务详细信息页面
    public function tsummaryEdit() {
    	$this->timeOut();
    	$summ_id = $this->uri->segment(4);
    	$summary = $this->getSummary($summ_id);
    	$data['summary'] = $summary;
    	//if($summary->summ_appr_id == 5){
    		$this->load->view('common/header3');
    		$this->load->view('teacher/tsummary/tsummaryEdit', $data);
    		$this->load->view('common/footer');
    	//}elseif($summary->summ_appr_id == 6){
    	//	$this->load->view('common/header3');
    	//	$this->load->view('teacher/tsummaryappr/tsummaryDetail', $data);
    	//	$this->load->view('common/footer');
    	//}
    }
     

    public function updateState() {
        $this->timeOut();

        $summ_id = $this->uri->segment(4);
        
        $array = array('summ_appr_id' => 6);

        $this->load->model('m_summary');
        $this->m_summary->updateSummary($summ_id, $array);

        $data['summary'] = $this->getSummary($summ_id);

        $this->load->view('common/header3');
        $this->load->view('teacher/tsummary/tsummaryDetail', $data);
        $this->load->view('common/footer');
    }
    
    public function update() {
    	$this->timeOut();
    
    	$summ_id = $this->uri->segment(4);
        $summ_appr_id = $this->input->post("summ_appr_id");
        $summ_result = $this->input->post("summ_result");
        $summ_appr_time = date("Y-m-d H:m:s");
    	$array = array('summ_appr_id' => $summ_appr_id , 'summ_appr_time' => $summ_appr_time, 'summ_result'=>$summ_result );
    
    	$this->load->model('m_summary');
    	$this->m_summary->updateSummary($summ_id, $array);
    
    	$data['summary'] = $this->getSummary($summ_id);
    
    	$this->load->view('common/header3');
    	$this->load->view('teacher/tsummary/tsummaryDetail', $data);
    	$this->load->view('common/footer');
    }
    
    // 分页获取全部实验任务信息
    public function getSummarys($array,$offset) {
        $this->timeOut();
        $this->load->model('m_summary');
        $data = array();
        $result = $this->m_summary->getSummarys_ws($array, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array(
            		'summ_id' => $r->summ_id,
            		'summ_miss_id' => $r->summ_miss_id,
            		'summ_content' => $r->summ_content,
            		'summ_time' => $r->summ_time,
            		'summ_stu_num' => $r->summ_stu_num,
            		'summ_stu_name' => $r->summ_stu_name,
            		'summ_appr_id' => $r->summ_appr_id,
            		'summ_appr_time' => $r->summ_appr_time,
            		'summ_result' =>$r->summ_result,
            		'cour_no'=>$r->cour_no,
            		'cour_num'=>$r->cour_num,
            		'cour_name'=>$r->cour_name,
            		'miss_title'=>$r->miss_title
            );
            array_push($data, $arr);
        }
        return $data;
    }
    
     
    // 获取单个实验任务信息
    function getSummary($id) {
        $this->load->model('m_summary');
        $result = $this->m_summary->getSummaryById_ws($id);
        $data = array();
        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
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