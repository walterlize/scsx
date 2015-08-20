<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Report extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('pagination');
        ini_set('max_execution_time', '0');
        date_default_timezone_set('PRC');
    }

    public function reportList() {
        $this->timeOut();

        //print_r($this->session->all_userdata());

        $this->load->model('m_report');
        $tea_num = $this->session->userdata('u_num');
        $term = $this->session->userdata('term');
        $array = array('repo_auditer1_id'=>$tea_num,'repo_cour_term'=>$term ,'repo_state != '=>1);
        $num = $this->m_report->getNum($array);
        $offset = $this->uri->segment(4);

        $data['repo'] = $this->getReports($array,$offset);
        $config['base_url'] = base_url() . 'index.php/teacher/report/reportList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('teacher/report/report', $data);
        $this->load->view('common/footer');
    }

   
    // 实验任务详细信息页面
    public function reportDetail() {
        $this->timeOut();
        $repo_id = $this->uri->segment(4);
        $data['repo'] = $this->getReport($repo_id);
    	
    	$this->load->view('common/header3');
    	$this->load->view('teacher/report/reportDetail', $data);
    	$this->load->view('common/footer');
    }

   
    // 实验任务信息编辑页面
    public function reportEdit() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data['repo'] = $this->getReport($id);
        
        $this->load->view('common/header3');
        $this->load->view('teacher/report/reportEdit', $data);
        $this->load->view('common/footer');
    }

    // 实验任务详细信息新增页面
    public function reportNew() {
        $this->timeOut();

        @$repo->repo_id = 0;
	 	$repo->repo_cour_no ='';
	 	$repo->repo_cour_num = '';
	 	$repo->repo_cour_term = '';
	 	$repo->repo_cour_name = '';
	 	
	    $repo->repo_title = '';
	    $repo->repo_time = '';
	    $repo->repo_content = '';
	    $repo->repo_keywords = '';
	    
	    $repo->repo_auther_id = '';
	    $repo->repo_auther ='';
	    $repo->repo_auditer1_id = '';
	    $repo->repo_auditer1='';
	    $repo->repo_audit1 = '';
	    $repo->repo_audit1_content ='';
	    $repo->repo_audit1_date ='';
	    $repo->repo_auditer2_id = '';
	    $repo->repo_auditer2='';
	    $repo->repo_audit2 = '';
	    $repo->repo_audit2_content ='';
	    $repo->repo_audit2_date ='';
	    $repo->repo_state='';
	    $repo->repo_college = '';
	    $repo->repo_count='';
       

        $data['repo'] = $repo;
        
        $stuId = $this->session->userdata('u_num');
        $term = $this->session->userdata('term');
        $array=array('XH'=>$stuId,'ZXJXJHH'=>$term);
        $this->load->model('m_nvariable');
        $cour = $this->getVariables($array);
       
        $data['cour']=$cour['data'];
       
        
        $data['show'] = 'display:none';
     

        $this->load->view('common/header3');
        $this->load->view('teacher/report/reportEdit', $data);
        $this->load->view('common/footer');
    }
    
    // 保存实验任务信息
    public function save() {
    	$this->timeOut();
    	$term = $this->session->userdata("term");
    	$tea_num = $this->session->userdata("u_num");
    	$tea_name = $this->session->userdata("realname");
    	
    	$repo_id = $this->input->post("repo_id");
    	$repo_audit1 = $this->input->post("repo_audit1");
    	$repo_audit1_content = $this->input->post("repo_audit1_content");
    	$repo_audit1_date = date("Y-m-d H:m:s");
    	$array = array(
    			'repo_auditer1_id'=>$tea_num,
    			'repo_auditer1'=>$tea_name,
    			'repo_audit1'=>$repo_audit1,
    			'repo_audit1_content'=>$repo_audit1_content,
    			'repo_audit1_date'=>$repo_audit1_date,
    			'repo_state'=>$repo_audit1
    	);
    	$repo_id = $this->input->post("repo_id");
    	$this->load->model("m_report");
    	$this->m_report->updateReport($repo_id, $array);
    	$data['repo'] = $this->getReport($repo_id);
    
    	$this->load->view('common/header3');
    	$this->load->view('teacher/report/reportDetail', $data);
    	$this->load->view('common/footer');
    }
    
    public function reportUpdate(){
    	$this->timeOut();
    	$repo_id = $this->uri->segment(4);
    	$array = array('repo_state'=>2);
    	$this->load->model('m_report');
    	$this->m_report->updateReport($repo_id, $array);
    	
    	$data['repo'] = $this->getReport($repo_id);
    	
    	$this->load->view('common/header3');
    	$this->load->view('teacher/report/reportDetail', $data);
    	$this->load->view('common/footer');
    	
    }
    
    
    
   

    public function reportDelete() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $this->load->model('m_report');
        $this->m_report->deleteReport($id);

        redirect("student/report/reportList");
    }

   
    // 分页获取全部实验任务信息
    public function getReports($array,$offset) {
        $this->timeOut();
        $this->load->model('m_report');
        $data = array();
        $result = $this->m_report->getReports($array, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array(
            		'repo_id'=>$r->repo_id,
            		'repo_cour_no'=>$r->repo_cour_no,
            		'repo_cour_num'=>$r->repo_cour_num,
            		'repo_cour_term'=>$r->repo_cour_term,
            		'repo_cour_name'=>$r->repo_cour_name,
            		'repo_auther_id'=>$r->repo_auther_id,
            		'repo_auther'=>$r->repo_auther,
            		'repo_title'=>$r->repo_title,
            		'repo_time'=>$r->repo_time,
            		'repo_state'=>$r->repo_state,
            );
            array_push($data, $arr);
        }
        return $data;
    }

    public function sgetLuntans($offset) {
        $this->load->model('m_sluntan');
        $data = array();
        $result = $this->m_sluntan->sgetLuntans($data, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array('l_id' => $r->l_id, 
            		'stuId' => $r->stuId, 
            		'stuName' => $r->stuName,
            		'time1' => $r->time1,
               		'content' => $r->content, 
            		'teaId' => $r->teaId, 
            		'time2' => $r->time2,
                
                'typeId' => $r->typeId,'theme' => $r->theme,'type' => $r->type);
            array_push($data, $arr);
        }
        return $data;
    }

    // 获取单个实验任务信息
    function getReport($id) {
        $this->load->model('m_report');
        $result = $this->m_report->getReportById($id);
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