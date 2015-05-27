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
        $this->load->model('m_luntan_1');
        $num = $this->m_luntan_1->getNum(array());
        $offset = $this->uri->segment(4);

        $data['luntan1'] = $this->getLuntans1($offset);
        $data['luntan2'] = $this->getLuntans2($offset);
        
        $config['base_url'] = base_url() . 'index.php/luntan/luntan/luntan1List';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page2'] = $this->pagination->create_links();
        $config2['base_url'] = base_url() . 'index.php/luntan/luntan/luntan2List';
        $config2['total_rows'] = $num;
        $config2['uri_segment'] = 4;
        $this->pagination->initialize($config2);
        $data['page2'] = $this->pagination->create_links();
        
        //print_r($data['luntan1'] );
        //echo "<br>";
        //print_r($data['luntan2'] );
        $tea1=array();$tea2=array();
        $stu1=array();$stu2=array();
        for($i = 0;$i<count($data['luntan1']);$i++){
        	$tea1[$i] = $this->getTea($data['luntan1'][$i]->teaId);
        	$stu1[$i] = $this->getStu($data['luntan1'][$i]->stuId);
        }
        for($i = 0;$i<count($data['luntan2']);$i++){
        	$tea2[$i] = $this->getTea($data['luntan2'][$i]->teaId);
        	$stu2[$i] = $this->getStu($data['luntan2'][$i]->stuId);
        }
        
        $data['stu1']=$stu1;
        $data['stu2']=$stu2;
        $data['tea1']=$tea1;
        $data['tea2']=$tea2;
     
        $this->load->view('common/title');
        $this->load->view('luntan/luntan', $data);
        $this->load->view('common/foot');
    }
    
    function getTea($teaId){
    	$this->load->model('m_nteacher');
    	$result=$this->m_nteacher->getTeaById($teaId);
    	$data =array();
    	foreach ($result as $r){
    		$data = $r;
    	}
    	return $data;
    }
    
    function getStu($stuId){
    	$this->load->model('m_nstudent');
    	$result=$this->m_nstudent->getStuById($stuId);
    	$data =array();
    	foreach ($result as $r){
    		$data = $r;
    	}
    	return $data;
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

    public function getLuntans1($offset) {
        $this->load->model('m_luntan_1');
        $data = array();

        $data = $this->m_luntan_1->getLuntans1($data, 10, 0);
        return $data;
    }

    public function getLuntans2($offset) {
        $this->load->model('m_luntan_1');
        $data = array();
        $data = $this->m_luntan_1->getLuntans2($data, 10, $offset);

        return $data;
    }

}

?>
