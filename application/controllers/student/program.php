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

    // 实验任务详细信息页面
    public function programDetail() {
        $this->timeOut();
        $id = $this->session->userdata('u_id');
        $data = $this->getProgram($id);

        $this->load->view('common/header3');
        $this->load->view('student/program/programDetail', $data);
        $this->load->view('common/footer');
    }
   
    // 获取单个实验任务信息
    function getProgram($id) {
        $this->load->model('m_program');
        $result = $this->m_program->getOneInfo1($id);
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