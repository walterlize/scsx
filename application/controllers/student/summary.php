<?php

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

        $this->load->model('m_summary');
        $num1 = $this->m_summary->getNum11(array());
        $num2 = $this->m_summary->getNum12(array());
        $num = $num1+$num2;
        $offset = $this->uri->segment(4);

        $data['summary1'] = $this->getSummarys1($offset);
        $data['summary2'] = $this->getSummarys2($offset);
        $config['base_url'] = base_url() . 'index.php/student/summary/summaryList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('student/summary/summary', $data);
        $this->load->view('common/footer');
    }
    
    public function summaryLists() {
        $this->timeOut();

        $this->load->model('m_summary');
        $num = $this->m_summary->getNum2(array());
        $offset = $this->uri->segment(4);

        $data['summary'] = $this->sgetSummarys($offset);
        $config['base_url'] = base_url() . 'index.php/student/summary/summaryLists';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('student/summary/summarys', $data);
        $this->load->view('common/footer');
    }

    // 实验任务详细信息页面
    public function summaryDetail1() {   
        $this->timeOut();
        $stuId = $this->session->userdata('u_name');
        $id = $this->uri->segment(4);
        $array = array('m_id' => $id, 'stuId' => $stuId);
        $result = $this->m_summary->getExist($array);

        if ($result) {
            $show = 'display:none';
            $show1 = 'display';
        } else {
            $show = 'display';
            $show1 = 'display:none';
        }
        $data['show'] = $show;
        $data['show1'] = $show1;
        $data['summary'] = $this->getSummary($id);

        $this->load->view('common/header3');
        $this->load->view('student/summary/summaryDetail1', $data);
        $this->load->view('common/footer');
    }
    public function summaryDetail2() {   
        $this->timeOut();
        $stuId = $this->session->userdata('u_id');
        $id = $this->uri->segment(4);
        $array = array('m_id' => $id, 'stuId' => $stuId);
        $result = $this->m_summary->getExist($array);

        if ($result) {
            $show = 'display:none';
            $show1 = 'display';
        } else {
            $show = 'display';
            $show1 = 'display:none';
        }
        $data['show'] = $show;
        $data['show1'] = $show1;
        $data['summary'] = $this->getSummary($id);

        $this->load->view('common/header3');
        $this->load->view('student/summary/summaryDetail2', $data);
        $this->load->view('common/footer');
    }
    
    // 实验任务详细信息页面
    public function summaryDetails() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data = $this->sgetSummary($id);


        $this->load->view('common/header3');
        $this->load->view('student/summary/summaryDetails', $data);
        $this->load->view('common/footer');
    }

    // 实验任务信息编辑页面
    public function summaryEdit() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data['summary'] = $this->getSummary($id);

        $data['showActive'] = '';
        $data['showUnactive'] = 'display:none';

        $this->load->view('common/header3');
        $this->load->view('student/summary/summaryEdit', $data);
        $this->load->view('common/footer');
    }

    // 实验任务详细信息新增页面
    public function summaryNew() {
        $this->timeOut();

        @$ws_summary->sumId = 0;
        $ws_summary->m_id = $this->uri->segment(4);
        $ws_summary->stuId = $this->session->userdata('u_id');
        $ws_summary->content = '';
        $ws_summary->sendTime = '';
        $ws_summary->s_state = '';

        $id = $this->uri->segment(4);
        $data['mission'] = $this->getSummary($id);
        $data['summary'] = $ws_summary;

        $data['show'] = 'display:none';
        $data['showActive'] = 'display:none';
        $data['showUnactive'] = 'display:none';

        $this->load->view('common/header3');
        $this->load->view('student/summary/summaryEdit', $data);
        $this->load->view('common/footer');
    }

    public function summaryDelete() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $this->load->model('m_summary');
        $this->m_summary->delete($id);

        $num = $this->m_summary->getNum1(array());
        $offset = 0;

        $data['summary'] = $this->getSummarys($offset);
        $config['base_url'] = base_url() . 'index.php/student/summary/summaryList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('student/summary/summary', $data);
        $this->load->view('common/footer');
    }

    // 保存实验任务信息
    public function save() {
        $this->timeOut();

        $this->load->model('m_summary');
        $m_id = $this->uri->segment(4);
        
        $id = $this->m_summary->saveInfo($m_id);
        $data = $this->sgetSummary($id);

        $this->load->view('common/header3');
        $this->load->view('student/summary/summaryDetails', $data);
        $this->load->view('common/footer');
    }

    // 分页获取全部实验任务信息
    public function getSummarys1($offset) {
        $this->timeOut();
        $this->load->model('m_summary');
        $data = array();
        $result = $this->m_summary->getSummarys1($data, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array(
            		'm_id' => $r->m_id, 
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

    public function sgetSummarys($offset) {
        $this->timeOut();
        $this->load->model('m_summary');
        $data = array();
        $result = $this->m_summary->sgetSummarys($data, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array('sumId' => $r->sumId, 
            		'content' => $r->content,
            		'sendTime' => $r->sendTime,
                    's_state' => $r->s_state, 
            		'm_id' => $r->m_id,
            		'teaId' => $r->teaId,
                    'mcontent' => $r->mcontent,  
            		'workTime' => $r->workTime,'stuId' => $r->stuId,
                
            		  
            		'title' => $r->title);
            array_push($data, $arr);
        }
        return $data;
    }

    // 获取单个实验任务信息
    function getSummary($id) {
        $this->load->model('m_summary');
        $result = $this->m_summary->getOneInfo($id);
        $data = array();
        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }
    
    // 获取单个实验任务信息
    function sgetSummary($id) {
        $this->load->model('m_summary');
        $result = $this->m_summary->sgetOneInfo($id);
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