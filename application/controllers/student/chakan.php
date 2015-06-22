<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Chakan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('pagination');
        ini_set('max_execution_time', '0');
        date_default_timezone_set('PRC');
    }
    
    
    public function chakanList() {
    	$this->timeOut();
    	$stu_num = $this->session->userdata("u_num");
    	$array=array('elco_stu_num'=>$stu_num);
    
    	$this->load->model('m_elecom');
    	$num = $this->m_elecom->getElcoNum_ws($array);
    	$offset = $this->uri->segment(4);
    	
    	$data['chakan'] = $this->getChakans($array,$offset);
    	$config['base_url'] = base_url() . 'index.php/student/chakan/chakanList';
    	$config['total_rows'] = $num;
    	$config['uri_segment'] = 4;
    	$this->pagination->initialize($config);
    	$data['page'] = $this->pagination->create_links();
    	
    	$this->load->view('common/header3');
    	$this->load->view('student/chakan/chakan', $data);
    	$this->load->view('common/footer');
    }
    
    // 分页获取全部实验任务信息
    public function getChakans($array,$offset) {
    	$this->timeOut();
    	$this->load->model('m_elecom');
    	$data = array();
    	$result = $this->m_elecom->getElecomcours_ws($array, PER_PAGE, $offset);
    
    	foreach ($result as $r) {
    		$arr = array( 
    				'elco_id'=>$r->elco_id,
    				'elco_cour_no'=>$r->elco_cour_no,
    				'elco_cour_num'=>$r->elco_cour_num,
    				'cour_name'=>$r->cour_name,
    				'cour_teac_name'=>$r->cour_teac_name,
    				'comp_name'=>$r->comp_name,
    				'usta_type'=>$r->usta_type,
    				'patt_type'=>$r->patt_type
    		);
    		array_push($data, $arr);
    	}
    	return $data;
    }
    
    public function chakanDetail(){
    	$this->timeOut();
    	$this->load->model('m_elecom');
    	$elco_id = $this->uri->segment(4);
    	$elco = $this->getElco($elco_id);
    	$data['comp']=$elco;
    	$this->load->view('common/header3');
    	$this->load->view('student/chakan/chakanDetail', $data);
    	$this->load->view('common/footer');
    }

    
    function getElco($id){
    	$this->load->model("m_elecom");
    	$res = $this->m_elecom->getElecomcourById_ws($id);
    	$data= array();
    	foreach ($res as $r){
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