<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class College extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('pagination');
        ini_set('max_execution_time', '0');
        date_default_timezone_set('PRC');
    }

    public function collegeList() {
        $this->timeOut();

        $this->load->model('m_college');
        $num = $this->m_college->getNum(array());
        $offset = $this->uri->segment(4);

        $data['college'] = $this->getColleges($offset);
        $config['base_url'] = base_url() . 'index.php/superadmin/college/collegeList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('superadmin/college/college', $data);
        $this->load->view('common/footer');
    }

    // 实验任务详细信息页面
    public function collegeDetail() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data = $this->getCollege($id);

        $this->load->view('common/header3');
        $this->load->view('superadmin/college/collegeDetail', $data);
        $this->load->view('common/footer');
    }
    
    // 实验任务信息编辑页面
    public function collegeEdit() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data['college'] = $this->getCollege($id);

        $data['showActive'] = '';
        $data['showUnactive'] = 'display:none';

        $this->load->view('common/header3');
        $this->load->view('superadmin/college/collegeEdit', $data);
        $this->load->view('common/footer');
    }

    // 实验任务详细信息新增页面
    public function collegeNew() {
        $this->timeOut();

        @$college->collegeId = 0;
        $college->college = '';

        $data['college'] = $college;

        $data['show'] = 'display:none';
        $data['showActive'] = 'display:none';
        $data['showUnactive'] = 'display:none';

        $this->load->view('common/header3');
        $this->load->view('superadmin/college/collegeEdit', $data);
        $this->load->view('common/footer');
    }

    public function collegeDelete() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $this->load->model('m_college');
        $this->m_college->delete($id);

        $num = $this->m_college->getNum(array());
        $offset = 0;

        $data['college'] = $this->getColleges($offset);
        $config['base_url'] = base_url() . 'index.php/superadmin/college/collegeList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('superadmin/college/college', $data);
        $this->load->view('common/footer');
    }

    // 保存实验任务信息
    public function save() {
        $this->timeOut();

        $this->load->model('m_college');
        $id = $this->m_college->saveInfo();
        $data = $this->getCollege($id);

        $this->load->view('common/header3');
        $this->load->view('superadmin/college/collegeDetail', $data);
        $this->load->view('common/footer');
    }

    // 分页获取全部实验任务信息
    public function getColleges($offset) {
        $this->timeOut();
        $this->load->model('m_college');
        $data = array();
        $result = $this->m_college->getColleges($data, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array('collegeId' => $r->collegeId, 'college' => $r->college);
            array_push($data, $arr);
        }
        return $data;
    }

    // 获取单个实验任务信息
    function getCollege($id) {
        $this->load->model('m_college');
        $result = $this->m_college->getOneInfo($id);
        $data = array();
        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }

    // session中的role不存在的时候退出系统
    function timeOut() {
        $role = $this->session->userdata('roleId');

        if ($role != 1) {
            $this->load->view('logout');
        }
    }

}

?>