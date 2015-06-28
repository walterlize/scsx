<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Term extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('pagination');
        ini_set('max_execution_time', '0');
        date_default_timezone_set('PRC');
    }

    //当前学期
    public function termNow() {
        $this->timeOut();

        $this->load->model('m_nowterm');
        //$nowterm = $this->m_nowterm->getNowterm(array());
        $nowterm = $this->getNowTerm(1);
        
        $data['nowterm']=$nowterm;
        
        
        $this->load->view('common/header3');
        $this->load->view('superadmin/term/term', $data);
        $this->load->view('common/footer');
    }
    
    //设置当前学期
    public function termNowEdit() {
    	$this->timeOut();
    	//$id= $this->uri->segment(4);
    	$id=1;
    
    	$this->load->model('m_nowterm');
    	$nowterm = $this->getNowTerm($id);
    	
    	$this->load->model('m_term');
    	$term = $this->m_term->getterm(array());
    
    	$data['nowterm']=$nowterm;
    	$data['term']=$term;
    
    	$this->load->view('common/header3');
    	$this->load->view('superadmin/term/termNowEdit', $data);
    	$this->load->view('common/footer');
    }
    
    public function termNowSet(){
    	$this->timeOut();
    	$term = $this->input->post("term");
    	$array=array('term'=>$term);
    	$this->load->model('m_nowterm');
    	$this->m_nowterm->updateNowterm(1,$array);
    	$nowterm = $this->getNowTerm(1);
    	//更新session
    	$this->session->set_userdata('term', $nowterm->term);
    	   	
    	redirect('superadmin/term/termNowSetN');
    }
    
    //当前学期
    public function termNowSetN() {
    	//
    	//
    	//打印session
    	//
    	//print_r($this->session->all_userdata());
    	
    	$this->load->model('m_nowterm');
    	//$nowterm = $this->m_nowterm->getNowterm(array());
    	$nowterm = $this->getNowTerm(1);
    
    	$data['nowterm']=$nowterm;
    
    	$this->load->view('common/header3');
    	$this->load->view('superadmin/term/term', $data);
    	$this->load->view('common/footer');
    }
    
    public function termNew(){
    	$this->timeOut();
    	@$term->id=0;
    	$term->term='';
    	
    	$data['term']=$term;
    	
    	$this->load->view('common/header3');
    	$this->load->view('superadmin/term/termNew', $data);
    	$this->load->view('common/footer');
    }
    
    public function termSet(){
    	$this->timeOut();
    	$this->load->model('m_term');
    	//$nowterm = $this->m_nowterm->getNowterm(array());
    	$this->m_term->saveInfo();
    	    	
    	redirect('superadmin/term/termSetN');
    }
    
    public function termSetN(){ 	
    	
    	$this->load->model('m_nowterm');
    	$nowterm = $this->getNowTerm(1);
    	
    	$this->load->model('m_term');
    	$term = $this->m_term->getterm(array());
    
    	$data['nowterm']=$nowterm;
    	$data['term']=$term;
    
    	$this->load->view('common/header3');
    	$this->load->view('superadmin/term/termList', $data);
    	$this->load->view('common/footer');
    }
    
    //学期列表
    public function termList(){
    	$this->timeOut();
    	$this->load->model('m_term');
    	$term = $this->m_term->getterm(array());
    	
    	$data['term']=$term;
    	
    	$this->load->view('common/header3');
    	$this->load->view('superadmin/term/termList', $data);
    	$this->load->view('common/footer');
    }
    public function termEdit(){
    	$this->timeOut();
    	$id=$this->uri->segment(4);
    	$this->load->model('m_term');
    	$term = $this->getTerm($id);
    	$a = $term->term;
    	$b=preg_match_all('/\d+/',$a,$arr);

    	$y1=0;
    	$y2=0;
    	foreach($arr as $r){
    		$y1 = $r[0];
    		$y2 = $r[1];
    	}
    	$data['term']=$term;
    	$data['y1'] = $y1;
    	$data['y2'] = $y2;
    	$this->load->view('common/header3');
    	$this->load->view('superadmin/term/termEdit', $data);
    	$this->load->view('common/footer');
    }
    
    public function termDelete(){
    	$id=$this->uri->segment(4);
    	$this->load->model('m_term');
    	$this->m_term->delete($id);
    	redirect('superadmin/term/termSetN');
    }
    
    
    function getNowTerm($id){
    	$this->load->model('m_nowterm');
    	$result = $this->m_nowterm->getNowtermById($id);
    	$data = array();
        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }
    function getTerm($id){
    	$this->load->model('m_term');
    	$result = $this->m_term->getTermById($id);
    	$data = array();
    	foreach ($result as $r) {
    		$data = $r;
    	}
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