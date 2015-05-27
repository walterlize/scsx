<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Shenhe extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('date');
        $this->load->library('session');
        $this->load->library('pagination');
        ini_set('max_execution_time', '0');
        date_default_timezone_set('PRC');
    }

    public function shenheList() {
        $this->timeOut();

        $this->load->model('m_shenhe');
        $num = $this->m_shenhe->getNum(array());
        $offset = $this->uri->segment(4);

        $data['shenhe'] = $this->getShenhes($offset);
        $config['base_url'] = base_url() . 'index.php/admin/shenhe/shenheList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('admin/shenhe/shenhe', $data);
        $this->load->view('common/footer');
        
    }
    
    // 
    public function getShenhes($offset) {
    	$this->timeOut();
    	$this->load->model('m_shenhe');
    	$data = array();
    	$result = $this->m_shenhe->getShenhes($data, PER_PAGE, $offset);
    
    	foreach ($result as $r) {
    		$arr = array( 
    				'b_id' => $r->b_id,
    				'c_id' => $r->c_id, 
    				'stuId' => $r->stuId,
    				'state'=>$r->state,
    				'courseTeaName'=>$r->courseTeaName,
    				'courseName'=>$r->courseName,
    				'comName'=>$r->comName,
    				'stuName'=>$r->stuName
    		);
    		array_push($data, $arr);
    	}
    	return $data;
    }
    
    

    public function updateState() {
        $this->timeOut();

        $id = $this->uri->segment(4);
        $stateId = $this->uri->segment(5);
        $array = array('stateId' => $stateId);

        $this->load->model('m_shenhe');
        $this->m_shenhe->updateShenhe($id, $array);

        $offset = '';
        $num = $this->m_shenhe->getNum(array());
        $data['shenhe'] = $this->getShenhes1($offset);
        $config['base_url'] = base_url() . 'index.php/admin/shenhe/shenheList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('admin/shenhe/shenhe', $data);
        $this->load->view('common/footer');
    }

    public function getShenhes1($offset) {
        $this->timeOut();
        $this->load->model('m_shenhe');
        $data = array();
        $result = $this->m_shenhe->getShenhes1($data, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array( 
            		'b_id' => $r->b_id,
    				'c_id' => $r->c_id, 
    				'stuId' => $r->stuId,
    				'state'=>$r->state,
    				'courseTeaName'=>$r->courseTeaName,
    				'courseName'=>$r->courseName,
    				'comName'=>$r->comName,
    				'stuName'=>$r->stuName
                );
            array_push($data, $arr);
        }
        return $data;
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