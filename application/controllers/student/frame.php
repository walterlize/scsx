<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Frame extends CI_Controller {

        function __construct()
	{
            parent::__construct();
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->library('session');
            $this->load->model('m_user');
	}

	public function index(){
        $this->load->view('student/frame4');
	}
	/*
	public function index(){
	
		//1.查找选课表中数据
		
			$this->load->model('m_nvariable');
			$stuId = $this->session->userdata('u_name');
			$stuClass = $this->session->userdata('class');
			$stuMajor = $this->session->userdata('major');
			$stuCollege = $this->session->userdata('college');
			
	
	
		$result = $this->m_user->getStudent(array());
		$data = array();
		foreach ($result as $r) {
			$data = $r;
		}
		if ($data->patternId == 1) {
			$this->load->view('student/frame1');
		}
		else if ($data->patternId == 2) {
			$this->load->view('student/frame2');
		}
		else if ($data->patternId == 3) {
			$this->load->view('student/frame3');
		}
	}
*/
        public function main(){
            $this->load->view('common/header');
            $this->load->view('student/main');
            $this->load->view('common/footer');
        }

        public function menu1(){
            $data['name'] = $this->session->userdata('u_name');
            $this->load->view('common/header');
            $this->load->view('student/left1',$data);
            $this->load->view('common/footer');
        }
        public function menu2(){
            $data['name'] = $this->session->userdata('u_name');
            $this->load->view('common/header');
            $this->load->view('student/left2',$data);
            $this->load->view('common/footer');
        }
        public function menu3(){
            $data['name'] = $this->session->userdata('u_name');
            $this->load->view('common/header');
            $this->load->view('student/left3',$data);
            $this->load->view('common/footer');
        }
        public function menu4(){
        	$data['id'] = $this->session->userdata('u_name');
        	$data['name'] = $this->session->userdata('realname');
        	$this->load->view('common/header');
        	$this->load->view('student/left4',$data);
        	$this->load->view('common/footer');
        }

}
?>
