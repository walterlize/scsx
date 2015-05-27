<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Password extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        ini_set('max_execution_time', '0'); //表示没有执行时间的限制，你的程序需要跑多久便跑多久
        date_default_timezone_set('PRC'); //设置中国时区
    }

    function index() {
        /*
          $this->load->view('includes/head');

          $data = $this->get_emptyData();

          $this->load->view('password_find', $data);
          $this->load->view('includes/footer');
       */
        $this->load->view('common/title'); 
        //$this->load->view('includes/head'); 
        $data = $this->get_emptyData();

        $this->load->view('password_find', $data);
        $this->load->view('common/foot');
    }

    // 找回密码
    function find() {
        $cardnumber = $this->input->post('cardnumber');
        $mail = $this->input->post('e_mail');
        $result = $this->mail_exist($mail);

        $data['result'] = '';
        $data['check_mail'] = '';
        $data['show'] = '';

        if (isset($result->email)) {
            $password = $result->password;
            $mail_info = "<h1>您的密码是" . $password . "，请尽快更改以免丢失。</h1><br />本邮件由系统自动发送，请勿回复。";

            $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'smtp.126.com',
                'smtp_port' => 25,
                'smtp_user' => 'coesystem@126.com',
                'smtp_pass' => 'abc123',
                'mailtype' => 'html'
            );
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");

            $this->email->from('coesystem@126.com', '中国农业大学工学院');
            $this->email->to($mail);

            $this->email->subject('密码找回');
            $this->email->message($mail_info);

            if ($this->email->send()) {
                $data['result'] = '<h4>您的密码已经发送至指定邮箱，请尽快查收并更改！</h4>';
                $data['show'] = 'display:none;';
            } else {
                $data['result'] = '<h4>邮件未能发送，请稍后重试！</h4>';
            }
        } else {
            $data['check_mail'] = '该邮箱地址不存在!';
        }

        $this->load->view('includes/head');
        $this->load->view('password_find', $data);
        $this->load->view('includes/footer');
    }

    function mail_exist($mail) {
        $this->load->model('m_user');
        $result = $this->m_user->mail_exist($mail);
        $data = '';
        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }

    function get_emptyData() {
        $data['result'] = '';
        $data['check_mail'] = '';
        $data['show'] = '';
        return $data;
    }

}

?>