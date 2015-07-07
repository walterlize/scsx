<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

        function __construct(){
            parent::__construct();
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->library('session');
            ini_set('max_execution_time', '0');
            date_default_timezone_set('PRC');
	}

        public function password(){
            $data['result'] = '';
            $this->load->view('common/header3');
            $this->load->view('password', $data);
            $this->load->view('common/footer');
        }

        // 改变密码
        public function changePassword(){
            $this->load->model('m_admin');
            $password = $this->input->post('newpassword');
            $array = array('admin_password' => $password);
            $id = $this->session->userdata('id');
            $this->m_admin->updateAdmin($id, $array);
            $data['result'] = '密码已经成功修改！';
            $this->load->view('common/header3');
            $this->load->view('password', $data);
            $this->load->view('common/footer');
        }

        // 检查原始密码是否正确
        function passwordCheck(){
            extract($_REQUEST);
            $result = $this->getData();
            if($old_password != $result->admin_password){
                echo '原密码错误，请重新输入！';
            } else {
                echo '';
            }
        }

        function getData(){
            $id = $this->session->userdata('id');
            $this->load->model('m_admin');
            $result = $this->m_admin->getOneInfo($id);
            $data = "";
            foreach ($result as $r){
                $data = $r;
            }
            return $data;
        }
}
?>