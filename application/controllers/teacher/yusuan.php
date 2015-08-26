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

        $tea_num = $this->session->userdata('u_num');
        $term = $this->session->userdata('term');
        $array = array('ys_teac_num'=>$tea_num,'ys_term'=>$term);
        $this->load->model('m_yusuan');
        $num = $this->m_yusuan->getNum($array);
        $offset = $this->uri->segment(4);

        $data['yusuan'] = $this->getYusuans($array,$offset);
        $config['base_url'] = base_url() . 'index.php/teacher/yusuan/yusuanList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $data['num']='共有'.$num.'条记录。';
        $this->load->view('common/header3');
        $this->load->view('teacher/yusuan/yusuan', $data);
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
    	$this->load->view('teacher/yusuan/yusuanDetail', $data);
    	$this->load->view('common/footer');
    }

    // 实验任务信息编辑页面
    public function yusuanEdit() {
        $this->timeOut();
        $ys_id = $this->uri->segment(4);
        $yusuan = $this->getYusuan($ys_id);
        $data['yusuan']=$yusuan;
        
        $data['show'] = 'display:none';
        $data['showActive'] = 'display:none';
        $data['showUnactive'] = 'display:none';
        
        $this->load->view('common/header3');
        $this->load->view('teacher/yusuan/yusuanNew1', $data);
        $this->load->view('common/footer');
    }

    // 实验任务详细信息新增页面
    public function yusuanNew() {
        $this->timeOut();
        //教师课程列表
        $tea_num = $this->session->userdata('u_num');
        $tea_name = $this->session->userdata('realname');
        $term = $this->session->userdata('term');
        $college  = $this->session->userdata('college');
       // echo $tea_name;echo $term;echo $college;

	        @$yusuan->ys_id = 0;
		    $yusuan->ys_college = $college;
		    $yusuan->ys_name = '';
		    $yusuan->ys_teac_name = $tea_name;
		    $yusuan->ys_no = '';
		    $yusuan->ys_content = '';
		    $yusuan->ys_class = '';
		    $yusuan->ys_address = '';
		    $yusuan->ys_stu_num = '';
		    $yusuan->ys_days = '';
		    $yusuan->ys_teac = '';
		    $yusuan->ys_stu = '';
		    $yusuan->ys_teac_num = $tea_num;
		    $yusuan->ys_state = 0;
		    $yusuan->ys_coll_idea = '';
		    $yusuan->ys_audit_name = '';
		    $yusuan->ys_audit_num = '';
		    $yusuan->ys_state2 = '';
		    $yusuan->ys_idea = '';
		    $yusuan->ys_audit_name2= '';
		    $yusuan->ys_audit_num2 = '';
		    $yusuan->ys_term = $term;
		    $yusuan->ys_time = date("Y-m-d H:m:s");

	        $data['yusuan'] = $yusuan;
	        //$data['cour'] = $courp;
	        $data['show'] = 'display:none';
	        $data['showActive'] = 'display:none';
	        $data['showUnactive'] = 'display:none';
	
	        $this->load->view('common/header3');
	        $this->load->view('teacher/yusuan/yusuanNew1', $data);
	        $this->load->view('common/footer');
      
    }
    
    public function save() {
    	$this->timeOut();
    
    	$this->load->model('m_yusuan');
    	$id = $this->m_yusuan->saveInfo();
    	$data['yusuan'] = $this->getYusuan($id);
    	redirect("teacher/yusuan/step2/".$id);
    
    
    }
    
    public function step1() {
    	$this->timeOut();
    	/*
    	 $this->load->model('m_yusuan');
    	 $id = $this->m_yusuan->saveInfo();
    	 $data['yusuan'] = $this->getYusuan($id);
    	*/
    	$ys_id = $this->uri->segment(4);
    	$yusuan = $this->getYusuan($ys_id);
    	$data['yusuan']=$yusuan;
    	$data['show'] = 'display:none';
    	$data['showActive'] = 'display:none';
    	$data['showUnactive'] = 'display:none';
    	 
    	$this->load->view('common/header3');
    	$this->load->view('teacher/yusuan/yusuanEdit1', $data);
    	$this->load->view('common/footer');
    }
    
    public function step2() {
    	$this->timeOut();
    
    	$ys_id = $this->uri->segment(4);
    	$array = array('fy_ys'=>$ys_id,'fy_tors'=>'tea');
    	$this->load->model("m_feiyong");
    	$feiyong = $this->m_feiyong->getFeiyong_ws($array);
    	$data['feiyong']=$feiyong;
    	
    	$yusuan = $this->getYusuan($ys_id);
    	$data['yusuan']=$yusuan;
    	
    	$this->load->view('common/header3');
    	$this->load->view('teacher/yusuan/yusuanEdit2', $data);
    	$this->load->view('common/footer');
    }
    
    public function step3() {
    	$this->timeOut();
    	
    	$ys_id = $this->uri->segment(4);
    	$yusuan = $this->getYusuan($ys_id);
    	$data['yusuan']=$yusuan;
    	$array = array('fy_ys'=>$ys_id,'fy_tors'=>'stu');
    	$this->load->model("m_feiyong");
    	$feiyong = $this->m_feiyong->getFeiyong_ws($array);
    	 $data['feiyong']=$feiyong;
    	 
    	$this->load->view('common/header3');
    	$this->load->view('teacher/yusuan/yusuanEdit3', $data);
    	$this->load->view('common/footer');
    }
    
    public function step4() {
    	$this->timeOut();
    	 
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
    	$this->load->view('teacher/yusuan/yusuanEdit4', $data);
    	$this->load->view('common/footer');
    }
    
    public function updateYusuan(){
    	$ys_id = $this->uri->segment(4);
    	$this->load->model("m_yusuan");
    	$arrYusuan = array('ys_state'=>1);
    	$this->m_yusuan->updateYusuan($ys_id,$arrYusuan);
    	
    	redirect("teacher/yusuan/step4/".$ys_id);
    	
    }
    
    public function savefy(){
    	$ys_id = $this->uri->segment(4);
    	$this->load->model('m_feiyong');
    	$id = $this->m_feiyong->saveInfo();
    	//$data['feiyong'] = $this->getFeiyong($id);
    	redirect("teacher/yusuan/step3/".$ys_id);
    }
    
    public function feiyongDelete() {
    	$this->timeOut();
    	$ys_id = $this->uri->segment(4);
    	$id = $this->uri->segment(5);
    	$this->load->model('m_feiyong');
    	$this->m_feiyong->deleteFeiyong($id);
    
    	redirect("teacher/yusuan/step3/".$ys_id);
    }
    
    public function savefyt(){
    	$ys_id = $this->uri->segment(4);
    	$this->load->model('m_feiyong');
    	$id = $this->m_feiyong->saveInfo();
    	//$data['feiyong'] = $this->getFeiyong($id);
    	redirect("teacher/yusuan/step2/".$ys_id);
    }
    
    public function feiyongDeletet() {
    	$this->timeOut();
    	$ys_id = $this->uri->segment(4);
    	$id = $this->uri->segment(5);
    	$this->load->model('m_feiyong');
    	$this->m_feiyong->deleteFeiyong($id);
    
    	redirect("teacher/yusuan/step2/".$ys_id);
    }
    
    

    public function missionDelete() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $this->load->model('m_mission');
        $this->m_mission->deleteMission($id);

        $tea_num = $this->session->userdata('u_num');
        $array = array('miss_teac_num'=>$tea_num);
        $this->load->model('m_mission');
        $num = $this->m_mission->getNum($array);
        $offset = 0;

        $data['mission'] = $this->getMissions($array,$offset);
        $config['base_url'] = base_url() . 'index.php/teacher/mission/missionList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $data['num']='每页最多有15条记录，本页面共有'.$num.'条记录。';
        $this->load->view('common/header3');
        $this->load->view('teacher/mission/mission', $data);
        $this->load->view('common/footer');
    }

    // 保存实验任务信息
   

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

        if ($role != 3) {
            $this->load->view('logout');
        }
    }

}

?>