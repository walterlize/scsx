<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Frame extends CI_Controller {

        function __construct()
	{
            parent::__construct();
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->library('session');
	}

	public function index(){
            $this->load->view('superadmin/frame1');
	}

        public function main(){
            $this->load->view('common/header');
            $this->load->view('superadmin/main');
            $this->load->view('common/footer');
        }

        public function menu(){
            $this->load->view('common/header');
            $this->load->view('superadmin/left');
            $this->load->view('common/footer');
        }
        public function main1(){
            $this->load->view('common/header');
            $this->load->view('superadmin/main1');
            $this->load->view('common/footer');
        }

        public function menu1(){
            $data['name'] = $this->session->userdata('u_name');
            $this->load->view('common/header');
            $this->load->view('superadmin/left1',$data);
            $this->load->view('common/footer');
        }

}
?>
