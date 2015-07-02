<?php
class Aself extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('pagination');
		ini_set('max_execution_time', '0');
		date_default_timezone_set('PRC');
		$this->load->model('m_admin');
	}
		
	/*
	 * 按ID查询
	 */
	function getSelfbyId($id){
		
		$result = $this->m_admin->getAdminById($id);
		$data = array();
		foreach ($result as $r){
			$data = $r;
		}
		return $data;
	}
	/*
	 * 个人信息详情
	 */
	public function selfDetail(){
		$this->timeOut();
	
		$id = $this->session->userdata('id');
		$data['admin']= $this->getSelfbyId($id);
	
		$data['title'] = '个人信息';
	
		$this->load->view('common/header3');
		$this->load->view('admin/self/selfDetail', $data);
		$this->load->view('common/footer');
	}
	
	/*
	 * 编辑个人信息
	 */
	public function selfEdit(){
		$this->timeOut();
		$id = $this->session->userdata('id');
		$data['admin'] = $this->getSelfbyId($id);
		$data['title'] = '个人信息';
	
		$this->load->view('common/header3');
		$this->load->view('admin/self/selfEdit', $data);
		$this->load->view('common/footer');
	}
	
	/*
	 * 设置个人信息
	 */
 		public function selfSet(){
        	$this->timeOut();
        
        	$admin_id = $this->m_admin->saveInfo();
        	
        	redirect("admin/aself/selfDetail/".$admin_id);
        	
        }
	
	


	
	/*
	 * session中的role不为1的时候退出系统
	 */
	function timeOut(){
		
		$role = $this->session->userdata('roleId');
	
		if($role != 2){
			$this->load->view('logout');
		}
	}
}