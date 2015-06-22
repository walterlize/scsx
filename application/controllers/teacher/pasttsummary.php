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

        $this->load->model('m_tsummary');
        $num = $this->m_tsummary->getNum(array());
        $offset = $this->uri->segment(4);

        $data['tsummary'] = $this->getTsummarys1($offset);
        $config['base_url'] = base_url() . 'index.php/teacher/tsummary/tsummaryList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('teacher/tsummary/tsummary', $data);
        $this->load->view('common/footer');
    }
    
    public function tsummaryLists() {
        $this->timeOut();

        $this->load->model('m_tsummary');
        $num = $this->m_tsummary->getNum2(array());
        $offset = $this->uri->segment(4);

        $data['tsummary'] = $this->getTsummarys2($offset);
        $config['base_url'] = base_url() . 'index.php/teacher/tsummary/tsummaryLists';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('teacher/tsummary/tsummarys', $data);
        $this->load->view('common/footer');
    }

    // 实验任务详细信息页面
    public function tsummaryDetail() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data = $this->getTsummary($id);

        $this->load->view('common/header3');
        $this->load->view('teacher/tsummary/tsummaryDetail', $data);
        $this->load->view('common/footer');
    }
     // 实验任务详细信息页面
    public function tsummaryDetails() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data = $this->getTsummary($id);


        $this->load->view('common/header3');
        $this->load->view('teacher/tsummary/tsummaryDetails', $data);
        $this->load->view('common/footer');
    }

    public function updateState() {
        $this->timeOut();

        $id = $this->uri->segment(4);
        $s_state = "已审核";
        $array = array('s_state' => $s_state);

        $this->load->model('m_tsummary');
        $this->m_tsummary->updateSlog($id, $array);

        $data = $this->getTsummary($id);

        $this->load->view('common/header3');
        $this->load->view('teacher/tsummary/tsummaryDetail', $data);
        $this->load->view('common/footer');
    }
    
    // 分页获取全部实验任务信息
    public function getTsummarys1($offset) {
        $this->timeOut();
        $this->load->model('m_tsummary');
        $data = array();
        $result = $this->m_tsummary->getTsummarys1($data, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array('sumId' => $r->sumId, 
            		'content' => $r->content,
            		'sendTime' => $r->sendTime,
                's_state' => $r->s_state,
            		 'm_id' => $r->m_id,
            		'teaId' => $r->teaId,
                'mcontent' => $r->mcontent,  
            		'workTime' => $r->workTime,
            		'stuId' => $r->stuId,
               
            		 'realname' => $r->realname, 
            		
            		'sex' => $r->sex,  
            		'title' => $r->title);
            array_push($data, $arr);
        }
        return $data;
    }
    
     // 分页获取全部实验任务信息
    public function getTsummarys2($offset) {
        $this->timeOut();
        $this->load->model('m_tsummary');
        $data = array();
        $result = $this->m_tsummary->getTsummarys2($data, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array('sumId' => $r->sumId, 
            		'content' => $r->content,
            		'sendTime' => $r->sendTime,
                's_state' => $r->s_state,
            		 'm_id' => $r->m_id,
            		'teaId' => $r->teaId,
                'mcontent' => $r->mcontent,  
            		'workTime' => $r->workTime,
            		'stuId' => $r->stuId,
               
            		 'realname' => $r->realname, 
            		
            		'sex' => $r->sex,  
            		'title' => $r->title);
            array_push($data, $arr);
        }
        return $data;
    }

    // 获取单个实验任务信息
    function getTsummary($id) {
        $this->load->model('m_tsummary');
        $result = $this->m_tsummary->getOneInfo($id);
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