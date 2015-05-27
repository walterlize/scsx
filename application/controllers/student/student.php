<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Student extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('pagination');
        ini_set('max_execution_time', '0');
        date_default_timezone_set('PRC');
    }

    // 用户详细信息页面
    public function studentDetail() {
        $this->timeOut();
        $id = $this->session->userdata('u_name');
        $data = $this->getStudent($id);

        $this->load->view('common/header3');
        $this->load->view('student/student/studentDetail', $data);
        $this->load->view('common/footer');
    }

    // 用户信息编辑页面
    public function studentEdit() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data['student'] = $this->getStudent($id);

        $data['showActive'] = '';
        $data['showUnactive'] = 'display:none';


        $this->load->view('common/header3');
        $this->load->view('student/student/studentEdit', $data);
        $this->load->view('common/footer');
    }


// 保存用户信息
    public function save() {
        $this->timeOut();

        $this->load->model('m_stu');
        $id = $this->m_stu->saveInfo();
        $data = $this->getStudent($id);

        $this->load->view('common/header3');
        $this->load->view('student/student/studentDetail', $data);
        $this->load->view('common/footer');
    }

// 获取单个用户信息
    function getStudent($id) {
        $this->load->model('m_nstudent');
        $result = $this->m_nstudent->getStuById($id);
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