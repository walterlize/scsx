<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Yusuan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('pagination');
        ini_set('max_execution_time', '0');
        date_default_timezone_set('PRC');
    }

    public function yusuanList() {
        $this->timeOut();

        $college = $this->session->userdata('college');
        $term = $this->session->userdata('term');
        $array = array('ys_college'=>$college,'ys_term'=>$term,'ys_state !=' =>0);
        $this->load->model('m_yusuan');
        $num = $this->m_yusuan->getNum($array);
        $offset = $this->uri->segment(4);

        $data['yusuan'] = $this->getYusuans($array,$offset);
        $config['base_url'] = base_url() . 'index.php/admin/yusuan/yusuanList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $data['num']='共有'.$num.'条记录。';
        $this->load->view('common/header3');
        $this->load->view('admin/yusuan/yusuan', $data);
        $this->load->view('common/footer');
    }

    // 实验任务详细信息页面
    public function yusuanDetail() {
       $ys_id = $this->uri->segment(4);
    	$yusuan = $this->getYusuan($ys_id);
    	$data['yusuan']=$yusuan;
    	$array = array('fy_ys'=>$ys_id,'fy_tors'=>'stu');
    	$this->load->model("m_feiyong");
    	$feiyong2 = $this->m_feiyong->getFeiyong_ws($array);
    	$data['feiyong2']=$feiyong2;
    	$array1 = array('fy_ys'=>$ys_id,'fy_tors'=>'tea');
    	$this->load->model("m_feiyong");
    	$feiyong1 = $this->m_feiyong->getFeiyong_ws($array1);
    	$data['feiyong1']=$feiyong1;
    	$data['show'] = 'display:none';
    	$data['showActive'] = 'display:none';
    	$data['showUnactive'] = 'display:none';
    
    	$this->load->view('common/header3');
    	$this->load->view('admin/yusuan/yusuanDetail', $data);
    	$this->load->view('common/footer');
    }

    // 实验任务信息编辑页面
    public function yusuanEdit() {
    	$ys_id = $this->uri->segment(4);
    	$yusuan = $this->getYusuan($ys_id);
    	$data['yusuan']=$yusuan;
    	$array = array('fy_ys'=>$ys_id,'fy_tors'=>'stu');
    	$this->load->model("m_feiyong");
    	$feiyong2 = $this->m_feiyong->getFeiyong_ws($array);
    	$data['feiyong2']=$feiyong2;
    	$array1 = array('fy_ys'=>$ys_id,'fy_tors'=>'tea');
    	$this->load->model("m_feiyong");
    	$feiyong1 = $this->m_feiyong->getFeiyong_ws($array1);
    	$data['feiyong1']=$feiyong1;
    	$data['show'] = 'display:none';
    	$data['showActive'] = 'display:none';
    	$data['showUnactive'] = 'display:none';
    	
    	$data['admin_num']=$this->session->userdata('u_num');
    	$data['admin_name']=$this->session->userdata('realname');
    	
    	$this->load->view('common/header3');
    	$this->load->view('admin/yusuan/yusuanEdit', $data);
    	$this->load->view('common/footer');
    }    
    
    public function update(){
    	$ys_id = $this->input->post('ys_id');
    	$ys_state = $this->input->post('ys_state');
    	$ys_coll_idea = $this->input->post('ys_coll_idea');
    	$ys_audit_num =$this->session->userdata('u_num');
    	$ys_audit_name =$this->session->userdata('realname');
    	
    	$this->load->model("m_yusuan");
    	$arrYusuan = array(
    			'ys_state'=>$ys_state,
    			'ys_coll_idea'=>$ys_coll_idea,
    			'ys_audit_num'=>$ys_audit_num,
    			'ys_audit_name'=>$ys_audit_name
    			
    	);
    	$this->m_yusuan->updateYusuan($ys_id,$arrYusuan);
    	
    	redirect("admin/yusuan/yusuanDetail/".$ys_id);
    	
    }
    
   

    // 分页获取全部实验任务信息
    public function getYusuans($array,$offset) {
        $this->timeOut();
        $this->load->model('m_yusuan');
        $data = array();
        $result = $this->m_yusuan->getYusuans($array, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array(
            		'ys_id' => $r->ys_id, 
            		'ys_name' => $r->ys_name,
                    'ys_state' => $r->ys_state,
            		'ys_time' => $r->ys_time,
            		'ys_no'=>$r->ys_no
            		
            );
            array_push($data, $arr);
        }
        return $data;
    }
    /*
    // 分页获取全部实验任务信息
    public function getFeiyongs($array) {
    	$this->timeOut();
    	$this->load->model('m_feiyong');
    	$data = array();
    	$result = $this->m_feiyong->getFeiyong_ws($array);
    
    	foreach ($result as $r) {
    		$arr = array(
    				'fy_id' => $r->fy_id,
    				'fy_' => $r->ys_name,
    				'ys_state' => $r->ys_state,
    				'ys_time' => $r->ys_time,
    				'ys_no'=>$r->ys_no
    
    		);
    		array_push($data, $arr);
    	}
    	return $data;
    }
    */

    // 获取单个实验任务信息
    function getYusuan($id) {
        $this->load->model('m_yusuan');
        $result = $this->m_yusuan->getYusuanById($id);
        $data = array();
        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }
    
    //获取该老师所有课程
    function getCoursep($tea_num,$array){
    	$this->load->model('m_course');
    	$result = $this->m_course->getCoursesLike($tea_num, $array);
    	$data = array();
    	if($result){
    		foreach ($result as $r){
    			$arr=array(
	    			'cour_id'=>$r->cour_id,
	    			'cour_name'=>$r->cour_name,
	    			'cour_no'=>$r->cour_no,
	    			'cour_num'=>$r->cour_num
    				);
    			array_push($data,$arr);
    		};
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