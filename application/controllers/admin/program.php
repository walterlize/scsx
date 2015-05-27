<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Program extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('pagination');
        ini_set('max_execution_time', '0');
        date_default_timezone_set('PRC');
    }

    public function programList() {
        $this->timeOut();

        $this->load->model('m_program');
        $num = $this->m_program->getNum(array());
        $offset = $this->uri->segment(4);

        $data['program'] = $this->getPrograms($offset);
        $config['base_url'] = base_url() . 'index.php/admin/program/programList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('admin/program/program', $data);
        $this->load->view('common/footer');
    }

    // 实验任务详细信息页面
    public function programDetail() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data = $this->getProgram($id);

        $this->load->view('common/header3');
        $this->load->view('admin/program/programDetail', $data);
        $this->load->view('common/footer');
    }
    
    // 实验任务信息编辑页面
    public function programEdit() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data['program'] = $this->getProgram($id);
        $data['pattern'] = $this->getPatterns();

        $data['showActive'] = '';
        $data['showUnactive'] = 'display:none';

        $this->load->view('common/header3');
        $this->load->view('admin/program/programEdit', $data);
        $this->load->view('common/footer');
    }

    // 实验任务详细信息新增页面
    public function programNew() {
        $this->timeOut();

        @$program->p_id = 0;
        $program->p_name = '';
        $program->content = '';
        $program->patternId = '';
        $program->collegeId = $this->session->userdata('collegeId');
        $program->depart = '';

        $data['program'] = $program;
        $data['college'] = $this->getColleges();
        $data['pattern'] = $this->getPatterns();

        $data['show'] = 'display:none';
        $data['showActive'] = 'display:none';
        $data['showUnactive'] = 'display:none';

        $this->load->view('common/header3');
        $this->load->view('admin/program/programEdit', $data);
        $this->load->view('common/footer');
    }

    public function programDelete() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $this->load->model('m_program');
        $this->m_program->delete($id);

        $num = $this->m_program->getNum(array());
        $offset = 0;

        $data['program'] = $this->getPrograms($offset);
        $config['base_url'] = base_url() . 'index.php/admin/program/programList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('admin/program/program', $data);
        $this->load->view('common/footer');
    }

    // 保存实验任务信息
    public function save() {
        $this->timeOut();

        $this->load->model('m_program');
        $id = $this->m_program->saveInfo();
        $data = $this->getProgram($id);

        $this->load->view('common/header3');
        $this->load->view('admin/program/programDetail', $data);
        $this->load->view('common/footer');
    }

    public function getColleges() {
        $this->load->model('m_college');
        $data = $this->m_college->getCollege(array());
        return $data;
    }
    public function getPatterns() {
        $this->load->model('m_program');
        $data = $this->m_program->getPattern(array());
        return $data;
    }
    
    // 分页获取全部实验任务信息
    public function getPrograms($offset) {
        $this->timeOut();
        $this->load->model('m_program');
        $data = array();
        $result = $this->m_program->getPrograms($data, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array('p_id' => $r->p_id, 'p_name' => $r->p_name, 'content' => $r->content, 'collegeId' => $r->collegeId,
                 'patternId' => $r->patternId, 'pattern' => $r->pattern, 'pcontent' => $r->pcontent, 'depart' => $r->depart);
            array_push($data, $arr);
        }
        return $data;
    }

    // 获取单个实验任务信息
    function getProgram($id) {
        $this->load->model('m_program');
        $result = $this->m_program->getOneInfo($id);
        $data = array();
        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }

    // session中的role不存在的时候退出系统
    function timeOut() {
        $role = $this->session->userdata('roleId');

        if ($role != 2) {
            $this->load->view('logout');
        }
    }

}

?>