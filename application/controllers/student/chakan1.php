<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Chakan1 extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('pagination');
        ini_set('max_execution_time', '0');
        date_default_timezone_set('PRC');
    }

    public function chakan1List() {
        $this->timeOut();

        $this->load->model('m_chakan1');
        $num = $this->m_chakan1->getNum(array());
        $offset = $this->uri->segment(4);

        $data['chakan1'] = $this->getChakan1s($offset);
        $config['base_url'] = base_url() . 'index.php/student/chakan1/chakan1List';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('student/chakan1/chakan1', $data);
        $this->load->view('common/footer');
    }

    // 实验任务详细信息页面
    public function chakan1Detail() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data = $this->getChakan1($id);

        $this->load->view('common/header3');
        $this->load->view('student/chakan1/chakan1Detail', $data);
        $this->load->view('common/footer');
    }
    
    // 分页获取全部实验任务信息
    public function getChakan1s($offset) {
        $this->timeOut();
        $this->load->model('m_chakan1');
        $data = array();
        $result = $this->m_chakan1->getChakan1s1($data, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array(
            		'b_id'=>$r->b_id,
            		'teaName'=>$r->teaName,
            		'tscore'=>$r->tscore,
            		'mName'=>$r->mName,
            		'mscore'=>$r->mscore
            );
            array_push($data, $arr);
        }
        return $data;
    }

    // 获取单个实验任务信息
    function getChakan1($id) {
        $this->load->model('m_chakan1');
        $result = $this->m_chakan1->getOneInfo($id);
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