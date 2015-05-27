<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Teacher extends CI_Controller {

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
    public function teacherDetail() {
        $this->timeOut();
        $id = $this->session->userdata('u_name');
        $data = $this->getTeacher($id);

        $this->load->view('common/header3');
        $this->load->view('teacher/teacher/teacherDetail', $data);
        $this->load->view('common/footer');
    }

    // 用户信息编辑页面
    public function teacherEdit() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data['teacher'] = $this->getTeacher($id);

        $data['showActive'] = '';
        $data['showUnactive'] = 'display:none';


        $this->load->view('common/header3');
        $this->load->view('teacher/teacher/teacherEdit', $data);
        $this->load->view('common/footer');
    }


// 保存用户信息
    public function save() {
        $this->timeOut();

        $this->load->model('m_teacher');
        $id = $this->m_teacher->saveInfo();
        $data = $this->getTeacher($id);

        $this->load->view('common/header3');
        $this->load->view('teacher/teacher/teacherDetail', $data);
        $this->load->view('common/footer');
    }

// 获取单个用户信息
    function getTeacher($id) {
        $this->load->model('m_nteacher');
        $result = $this->m_nteacher->getTeaById($id);
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