<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Type extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('pagination');
        ini_set('max_execution_time', '0');
        date_default_timezone_set('PRC');
    }

    public function typeList() {
        $this->timeOut();

        $this->load->model('m_type');
        $num = $this->m_type->getNum(array());
        $offset = $this->uri->segment(4);

        $data['type'] = $this->getTypes($offset);
        $config['base_url'] = base_url() . 'index.php/admin/type/typeList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('admin/type/type', $data);
        $this->load->view('common/footer');
    }

    // 实验任务详细信息页面
    public function typeDetail() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data = $this->getType($id);


        $this->load->view('common/header3');
        $this->load->view('admin/type/typeDetail', $data);
        $this->load->view('common/footer');
    }
    
    // 实验任务信息编辑页面
    public function typeEdit() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data['type'] = $this->getType($id);

        $data['showActive'] = '';
        $data['showUnactive'] = 'display:none';

        $this->load->view('common/header3');
        $this->load->view('admin/type/typeEdit', $data);
        $this->load->view('common/footer');
    }

    // 实验任务详细信息新增页面
    public function typeNew() {
        $this->timeOut();

        @$type->typeId = 0;
        $type->type = '';

        $data['type'] = $type;

        $data['show'] = 'display:none';
        $data['showActive'] = 'display:none';
        $data['showUnactive'] = 'display:none';

        $this->load->view('common/header3');
        $this->load->view('admin/type/typeEdit', $data);
        $this->load->view('common/footer');
    }

    public function typeDelete() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $this->load->model('m_type');
        $this->m_type->delete($id);

        $num = $this->m_type->getNum(array());
        $offset = 0;

        $data['type'] = $this->getTypes($offset);
        $config['base_url'] = base_url() . 'index.php/admin/type/typeList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('admin/type/type', $data);
        $this->load->view('common/footer');
    }

    // 保存实验任务信息
    public function save() {
        $this->timeOut();

        $this->load->model('m_type');
        $id = $this->m_type->saveInfo();
        $data = $this->getType($id);

        $this->load->view('common/header3');
        $this->load->view('admin/type/typeDetail', $data);
        $this->load->view('common/footer');
    }

    // 分页获取全部实验任务信息
    public function getTypes($offset) {
        $this->timeOut();
        $this->load->model('m_type');
        $data = array();
        $result = $this->m_type->getTypes($data, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array('typeId' => $r->typeId, 'type' => $r->type);
            array_push($data, $arr);
        }
        return $data;
    }

    // 获取单个实验任务信息
    function getType($id) {
        $this->load->model('m_type');
        $result = $this->m_type->getOneInfo($id);
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