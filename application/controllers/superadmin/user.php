<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('pagination');
        ini_set('max_execution_time', '0');
        date_default_timezone_set('PRC');
    }

    public function userList() {
        $this->timeOut();
        
        $array="(teaRole = '院系管理员' or teaRole = '校级管理员')";
        $this->load->model('m_nteacher');
    	$num = $this->m_nteacher->getNumALL( $array);
    	$offset = $this->uri->segment(4);
    
    	$data['user'] = $this->getTeas( $array,$offset);
    	$config['base_url'] = base_url() . 'index.php/superadmin/user/userList';
    	$config['total_rows'] = $num;
    	$config['uri_segment'] = 4;
    	$this->pagination->initialize($config);
    	$data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('superadmin/user/user', $data);
        $this->load->view('common/footer');
    }
    
    
    
    public function getTeas($array,$offset) {
    	$this->timeOut();
    	$this->load->model('m_nteacher');
    	$data = array();
    
    	$result = $this->m_nteacher->getTeasALL($array, PER_PAGE, $offset);
    
    	foreach ($result as $r) {
    		$arr = array(
    				'teaId' => $r->teaId,
    				'password' => $r->password,
    				'teaName' => $r->teaName,
    				'teaTitle' => $r->teaTitle,
    				'teaRole' => $r->teaRole,
    				'college'=>$r->college
    		);
    		array_push($data, $arr);
    	}
    	return $data;
    }
    
    
    
    

    // 用户详细信息页面
    public function userDetail() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data = $this->getUser($id);

        $this->load->view('common/header3');
        $this->load->view('superadmin/user/userDetail', $data);
        $this->load->view('common/footer');
    }

    // 用户信息编辑页面
    public function userEdit() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data['user'] = $this->getUser($id);
        $data['college'] = $this->getColleges();

        $data['showActive'] = '';
        $data['showUnactive'] = 'display:none';

        $this->load->view('common/header3');
        $this->load->view('superadmin/user/userEdit', $data);
        $this->load->view('common/footer');
    }

    // 用户详细信息新增页面
    public function userNew() {
        $this->timeOut();

        @ $users->u_id = 0;
        $users->roleId = 2;
        $users->u_name = '';
        $users->password = '';
        $users->realname = '';
        $users->phone = '';
        $users->email = '';
        $users->address = '';
        $users->classId = 0;
        $users->sex = '';
        $users->ustateId = 1;
        $users->collegeId = '';

        $data['user'] = $users;
        $data['college'] = $this->getColleges();

        $data['show'] = 'display:none';
        $data['showActive'] = 'display:none';
        $data['showUnactive'] = 'display:none';

        $this->load->view('common/header3');
        $this->load->view('superadmin/user/userEdit', $data);
        $this->load->view('common/footer');
    }

    public function userDelete() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $this->load->model('m_user');
        $this->m_user->delete($id);

        $num = $this->m_user->getNum(array());
        $offset = 0;

        $data['user'] = $this->getUsers($offset);
        $config['base_url'] = base_url() . 'index.php/superadmin/user/userList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('superadmin/user/user', $data);
        $this->load->view('common/footer');
    }

// 保存用户信息
    public function save() {
        $this->timeOut();

        $this->load->model('m_user');
        $id = $this->m_user->saveInfo();
        $data = $this->getUser($id);

        $this->load->view('common/header3');
        $this->load->view('superadmin/user/userDetail', $data);
        $this->load->view('common/footer');
    }

// 分页获取全部用户信息
    public function getUsers($offset) {
        $this->timeOut();
        $this->load->model('m_user');
        $data = array();
        $result = $this->m_user->getadminUsers($data, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array('u_id' => $r->u_id, 'roleId' => $r->roleId, 'roleName' => $r->roleName, 
                'u_name' => $r->u_name,'password' => $r->password,'realname' => $r->realname,
                'phone' => $r->phone,'email' => $r->email,'address' => $r->address,'sex' => $r->sex,
                'ustateId' => $r->ustateId,'collegeId' => $r->collegeId,'ustate' => $r->ustate,'college' => $r->college);
            array_push($data, $arr);
        }
        return $data;
    }

// 获取单个用户信息
    function getUser($id) {
        $this->load->model('m_user');
        $result = $this->m_user->getOneInfo1($id);
        $data = array();
        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }

    public function getColleges() {
        $this->load->model('m_college');
        $data = $this->m_college->getCollege(array());
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