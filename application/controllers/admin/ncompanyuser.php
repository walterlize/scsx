<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ncompanyuser extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('pagination');
        ini_set('max_execution_time', '0');
        date_default_timezone_set('PRC');
    }
    
    //基地用户管理
    public function ncompanyUserList(){
    	$this->timeOut();
    	
    	$array=array('ustateId'=>'1');
    	$this->load->model('m_ncompanyuser');
    	$num = $this->m_ncompanyuser->getNum($array);
    	$offset = $this->uri->segment(4);
    	
    	$data['compuser'] = $this->getCompUsers($array,$offset);
    	$config['base_url'] = base_url().'index.php/admin/ncompanyuser/ncompanyUserList';
    	$config['total_rows'] = $num;
    	$config['uri_segment'] = 4;
    	$this->pagination->initialize($config);
    	$data['page'] = $this->pagination->create_links();
    	
    	
    	$this->load->view('common/header3');
    	$this->load->view('admin/ncompany/ncompuser', $data);
    	$this->load->view('common/footer');

    }
    
    //分页获取基地用户列表
    public function getCompUsers($array,$offset){
    	$this->timeOut();
    	$this->load->model('m_ncompanyuser');
    	
    	$result = $this->m_ncompanyuser->getNCompUsers($array, PER_PAGE, $offset);
    	$data = array();
    	foreach ($result as $r) {
    		$arr = array(
    				'u_id' => $r->u_id, 
                    'u_name' => $r->u_name,
    				'password' => $r->password,
    				'realname' => $r->realname,
                    'phone' => $r->phone,
    				'email' => $r->email,
    				'address' => $r->address,
                    'sex' => $r->sex,
    				'ustateId' => $r->ustateId,
    				'collegeId' => $r->collegeId,
    				);
    		array_push($data, $arr);
    	}
    	return $data;
    }
    
    //基地用户详情
    public function ncompanyUserDetail(){
    	$this->timeOut();
        $id = $this->uri->segment(4);
        $data['compuser'] = $this->getCompUser($id);


        $this->load->view('common/header3');
        $this->load->view('admin/ncompany/ncompuserDetail', $data);
        $this->load->view('common/footer');
    }
    
    //获取单个基地用户
    function getCompUser($id){
    	$this->load->model('m_ncompanyuser');
    	$result = $this->m_ncompanyuser->getNCompUserById($id);
    	$data = array();
    	foreach ($result as $r) {
    		$data = $r;
    	}
    	return $data;
    }
    
    //新增
    public function ncompanyUserNew(){
    	@$comu->u_id = 0;
    	$comu->u_name = '';
    	$comu->password = '';
    	$comu->realname = '';
    	$comu->phone = '';
    	$comu->email = '';
    	$comu->address = '';
    	$comu->sex = '';
    	$comu->ustateId = '';
    	$comu->collegeId = '';
    	
        $data['compuser']=$comu;
        $data['show']="display:none";
    	
    	$this->load->view('common/header3');
    	$this->load->view('admin/ncompany/ncompuserEdit', $data);
    	$this->load->view('common/footer');

    }
    
    // 保存信息
    public function save() {
    	$this->timeOut();
    
    	$this->load->model('m_ncompanyuser');
    	$id = $this->m_ncompanyuser->saveInfo();
    	$data['compuser'] = $this->getCompUser($id);


        $this->load->view('common/header3');
        $this->load->view('admin/ncompany/ncompuserDetail', $data);
        $this->load->view('common/footer');
    }
    
    //编辑用户
    // 实验任务信息编辑页面
    public function ncompanyuserEdit() {
    	$this->timeOut();
    	$id = $this->uri->segment(4);
    	$data['compuser'] = $this->getCompUser($id);
    	$data['show']="";
    
    	$this->load->view('common/header3');
    	$this->load->view('admin/ncompany/ncompuserEdit', $data);
    	$this->load->view('common/footer');
    }
    
    //删除
    public function ncompanyuserDelete(){
    	$this->timeOut();
    	$id = $this->uri->segment(4);
    	 
    	$array=array();
    	$this->load->model('m_ncompanyuser');
    	$this->m_ncompanyuser->delete($id);
    	$num = $this->m_ncompanyuser->getNum($array);
    	$offset = 0;
    	
    	$data['compuser'] = $this->getCompUsers($array,$offset);
    	$config['base_url'] = base_url().'index.php/admin/ncompanyuser/ncompanyUserList';
    	$config['total_rows'] = $num;
    	$config['uri_segment'] = 4;
    	$this->pagination->initialize($config);
    	$data['page'] = $this->pagination->create_links();
    	
    	$this->load->view('common/header3');
    	$this->load->view('admin/ncompany/ncompuser', $data);
    	$this->load->view('common/footer');
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