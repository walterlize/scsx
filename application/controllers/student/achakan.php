<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Achakan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('pagination');
        ini_set('max_execution_time', '0');
        date_default_timezone_set('PRC');
    }

    public function achakanList() {
        $this->timeOut();

        $this->load->model('m_achakan');
        $array=array('patternId'=>'3');
        $num = $this->m_achakan->getNum($array);
        $offset = $this->uri->segment(4);

        $data['achakan'] = $this->getAchakans($array,$offset);
        $config['base_url'] = base_url() . 'index.php/student/achakan/achakanList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('student/achakan/achakan', $data);
        $this->load->view('common/footer');
    }
    
    // 分页获取全部实验任务信息
    public function getAchakans($array,$offset) {
    	$this->timeOut();
    	$this->load->model('m_achakan');
    	$data = array();
    	$result = $this->m_achakan->getAchakans($array, PER_PAGE, $offset);
    
    	foreach ($result as $r) {
    		$arr = array( 
    				'b_id' => $r->b_id,
    				'c_id' => $r->c_id, 
    				'courseName'=>$r->courseName,
    				'comId' => $r->comId,
    				'comName' => $r->comName,
    				'courseTeaName'=>$r->courseTeaName,
    				'pattern'=>$r->pattern
    		);
    		array_push($data, $arr);
    	}
    	return $data;
    }

    // 实验任务详细信息页面
    public function achakanDetail() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data = $this->getAchakan($id);


        $this->load->view('common/header3');
        $this->load->view('student/achakan/achakanDetail', $data);
        $this->load->view('common/footer');
    }
    
    

    // 获取单个实验任务信息
    function getAchakan($id) {
        $this->load->model('m_achakan');
        $result = $this->m_achakan->getOneInfo($id);
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