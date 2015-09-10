<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Frame extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('pagination');
    }

    /* public function index() {
      $this->load->view('common/title');
      $this->load->view('luntan/left');
      $this->load->view('luntan/main');
      $this->load->view('common/foot');
      } */

    public function index() {
    	
    	$u_num = $this->session->userdata("u_num");
    	$role = $this->session->userdata('roleId');
    	$college = $this->session->userdata('college');
    	//echo $u_num;
    	echo $role;
    	//echo $college;
    	 
    	
    	if(!$u_num || $u_num==''){
    		$this->load->view('common/title');
    		$this->load->view('luntan/luntanLogin');
    		$this->load->view('common/foot');
    	}else{
	        $this->load->model('m_luntan_1');
	        
	        
	        //分为学生 教师 管理员
	        switch ($role){
	        	case "1":
	        		$arrLuntan1 = array();
	        		$arrLuntan2 = array();
	        		break;
	        	case "2":
	        		$arrLuntan1 = array('college'=>$college);
	        		$arrLuntan2 = array('college'=>$college);
	        		break;
	        	case "3":
	        		$arrLuntan1 = array('teaId'=>$u_num);
	        		$arrLuntan2 = array('college'=>$college);
	        		break;
	        	case "5":
	        		$arrLuntan1 = array('stuId'=>$u_num);
	        		$arrLuntan2 = array('stuId'=>$u_num);
	        		break;
	        	default:
	        		$arrLuntan1 = array('stuId'=>0);
	        		$arrLuntan2 = array('stuId'=>0);
	        		break;
	        }
	        
	        $num1 = $this->m_luntan_1->getNum1($arrLuntan2);
	        $num2 = $this->m_luntan_1->getNum1($arrLuntan1);
	        $offset = 0;
	
	        $data['luntan1'] = $this->getLuntans1($arrLuntan2,$offset);//未回复
	        $data['luntan2'] = $this->getLuntans2($arrLuntan1,$offset);//已回复
	        
	        
	        $config['base_url'] = base_url() . 'index.php/luntan/luntan/luntan1List';
	        $config['total_rows'] = $num1;
	        $config['uri_segment'] = 4;
	        $this->pagination->initialize($config);
	        $data['page2'] = $this->pagination->create_links();
	        $config2['base_url'] = base_url() . 'index.php/luntan/luntan/luntan2List';
	        $config2['total_rows'] = $num2;
	        $config2['uri_segment'] = 4;
	        $this->pagination->initialize($config2);
	        $data['page2'] = $this->pagination->create_links();
	        
	        
	     
	        $this->load->view('common/title');
	        $this->load->view('luntan/luntan', $data);
	        $this->load->view('common/foot');
    	}
    }
    
    

    public function main() {
        //$this->load->view('common/title');
        $this->load->view('luntan/main');
        $this->load->view('common/foot');
    }

    public function menu() {
        // $this->load->view('common/title');
        $this->load->view('luntan/left');
        $this->load->view('common/foot');
    }

    public function getLuntans1($array,$offset) {
        $this->load->model('m_luntan_1');
        $data = array();

        $data = $this->m_luntan_1->getLuntans1($array, 10, $offset);
        return $data;
    }

    public function getLuntans2($array,$offset) {
        $this->load->model('m_luntan_1');
        $data = array();
        $data = $this->m_luntan_1->getLuntans2($array, 10, $offset);

        return $data;
    }

}

?>
