<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cla extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('pagination');
        ini_set('max_execution_time', '0');
        date_default_timezone_set('PRC');
    }

    public function claList() {
        $this->timeOut();

        $this->load->model('m_cla');
        $num = $this->m_cla->getNum(array());
        $offset = $this->uri->segment(4);

        $data['class'] = $this->getClas($offset);
        $config['base_url'] = base_url() . 'index.php/admin/cla/claList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('admin/class/class', $data);
        $this->load->view('common/footer');
    }

    // 实验任务详细信息页面
    public function claDetail() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data = $this->getCla($id);

        $this->load->view('common/header3');
        $this->load->view('admin/class/classDetail', $data);
        $this->load->view('common/footer');
    }
    
    // 实验任务信息编辑页面
    public function claEdit() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data['class'] = $this->getCla($id);

        $data['showActive'] = '';
        $data['showUnactive'] = 'display:none';

        $this->load->view('common/header3');
        $this->load->view('admin/class/classEdit', $data);
        $this->load->view('common/footer');
    }

    // 实验任务详细信息新增页面
    public function claNew() {
        $this->timeOut();

        @$class->classId = 0;
        $class->class = '';
        $class->collegeId = $this->session->userdata('collegeId');
        $class->department = '';

        $data['class'] = $class;
        $data['college'] = $this->getColleges();

        $data['show'] = 'display:none';
        $data['showActive'] = 'display:none';
        $data['showUnactive'] = 'display:none';

        $this->load->view('common/header3');
        $this->load->view('admin/class/classEdit', $data);
        $this->load->view('common/footer');
    }

    public function claDelete() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $this->load->model('m_cla');
        $this->m_cla->delete($id);

        $num = $this->m_cla->getNum(array());
        $offset = 0;

        $data['class'] = $this->getClas($offset);
        $config['base_url'] = base_url() . 'index.php/admin/cla/claList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('admin/class/class', $data);
        $this->load->view('common/footer');
    }

    // 保存实验任务信息
    public function save() {
        $this->timeOut();

        $this->load->model('m_cla');
        $id = $this->m_cla->saveInfo();
        $data = $this->getCla($id);

        $this->load->view('common/header3');
        $this->load->view('admin/class/classDetail', $data);
        $this->load->view('common/footer');
    }

    public function getColleges() {
        $this->load->model('m_college');
        $data = $this->m_college->getCollege(array());
        return $data;
    }
    
    // 分页获取全部实验任务信息
    public function getClas($offset) {
        $this->timeOut();
        $this->load->model('m_cla');
        $data = array();
        $result = $this->m_cla->getClas($data, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array('classId' => $r->classId, 'class' => $r->class, 'collegeId' => $r->collegeId, 'college' => $r->college,
                'department' => $r->department);
            array_push($data, $arr);
        }
        return $data;
    }

    // 获取单个实验任务信息
    function getCla($id) {
        $this->load->model('m_cla');
        $result = $this->m_cla->getOneInfo($id);
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