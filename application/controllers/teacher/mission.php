<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mission extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('pagination');
        ini_set('max_execution_time', '0');
        date_default_timezone_set('PRC');
    }

    public function missionList() {
        $this->timeOut();

        $tea_num = $this->session->userdata('u_num');
        $array = array('miss_teac_num'=>$tea_num);
        $this->load->model('m_mission');
        $num = $this->m_mission->getNum($array);
        $offset = $this->uri->segment(4);

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

    // 实验任务详细信息页面
    public function missionDetail() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data['mission'] = $this->getMission($id);


        $this->load->view('common/header3');
        $this->load->view('teacher/mission/missionDetail', $data);
        $this->load->view('common/footer');
    }

    // 实验任务信息编辑页面
    public function missionEdit() {
        $this->timeOut();
        //教师课程列表
        $tea_num = $this->session->userdata('u_num');
        $courp=$this->getCoursep($tea_num,array());
        
        $id = $this->uri->segment(4);
        $data['mission'] = $this->getMission($id);
        $data['cour'] = $courp;

        $data['showActive'] = '';
        $data['showUnactive'] = 'display:none';

        $this->load->view('common/header3');
        $this->load->view('teacher/mission/missionEdit', $data);
        $this->load->view('common/footer');
        
    }

    // 实验任务详细信息新增页面
    public function missionNew() {
        $this->timeOut();
        //教师课程列表
        $tea_num = $this->session->userdata('u_num');
        $courp=$this->getCoursep($tea_num,array());
        if($courp){

	        @$mission->miss_id = 0;
	        $mission->miss_cour_id = '';
	        $mission->miss_tea_num = $this->session->userdata('u_num');
	        $mission->miss_tea_name = $this->session->userdata('realname');
	        $mission->miss_title = '';
	        $mission->miss_content = '';
	        $mission->miss_start_time = '';
	        $mission->miss_end_time = '';

	        $data['mission'] = $mission;
	        $data['cour'] = $courp;
	        $data['show'] = 'display:none';
	        $data['showActive'] = 'display:none';
	        $data['showUnactive'] = 'display:none';
	
	        $this->load->view('common/header3');
	        $this->load->view('teacher/mission/missionEdit', $data);
	        $this->load->view('common/footer');
        }else{
        	$this->load->view('common/header3');
        	$this->load->view('teacher/error_nocourse');
        	$this->load->view('common/footer');
        }
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
    public function save() {
        $this->timeOut();

        $this->load->model('m_mission');
        $id = $this->m_mission->saveInfo();
        $data['mission'] = $this->getMission($id);

        $this->load->view('common/header3');
        $this->load->view('teacher/mission/missionDetail', $data);
        $this->load->view('common/footer');
    }

    // 分页获取全部实验任务信息
    public function getMissions($array,$offset) {
        $this->timeOut();
        $this->load->model('m_mission');
        $data = array();
        $result = $this->m_mission->getMissions_ws($array, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array(
            		'miss_id' => $r->miss_id, 
            		'miss_cour_id' => $r->miss_cour_id,
                    'miss_cour_no' => $r->cour_no,
            		'miss_cour_num' => $r->cour_num,
            		'miss_cour_name' => $r->cour_name,
            		'miss_title' => $r->miss_title,
            		'miss_start_time' => $r->miss_start_time,
            		'miss_end_time' => $r->miss_end_time,
            );
            array_push($data, $arr);
        }
        return $data;
    }

    // 获取单个实验任务信息
    function getMission($id) {
        $this->load->model('m_mission');
        $result = $this->m_mission->getMissionById_ws($id);
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