<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Course extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->model('m_ncourse');
        date_default_timezone_set('PRC');
    }

    public function courseList() {
        $this->timeOut();
        //教师工号
        $teaNum = $this->session->userdata('u_num');
         //$array=array('courseTeaId'=>$teaNum.'*');
        $num = $this->m_ncourse->getNumLike($teaNum.'*');
        $offset = $this->uri->segment(4);
        $data['course'] = $this->getCourses($teaNum.'*',$offset);
        $config['base_url'] = base_url() . 'index.php/teacher/course/courseList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $this->load->view('common/header3');
        $this->load->view('teacher/course/course', $data);
        $this->load->view('common/footer');
    }

    // 实验任务详细信息页面
    public function courseDetail() {
        $this->timeOut();
        //判断是否显示
        $show1 = 'display:none';
        $show2 = 'display:none';
        $show3 = 'display:none';
        $flag = 0;
        
        $id = $this->uri->segment(4);
        $course = $this->getCourse($id);
        $array = array('cour_no'=>$course->courseId,'cour_num'=>$course->courseNum,'cour_term'=>$course->term);
        $coursep = $this->getCoursep($array);
        if(!$coursep){
        	//未选择模式
        	$coursep = $this->getEmptyCoursep();
        	$show1 = '';
        	$flag = 0;
        }else{
        	if($coursep->cour_publish != 1){
        		//已存储未发布
        		$show2 = '';
        	}
        	$show3 = '';
        	$flag = 1;
        }
        
        $data['course'] = $course;
        $data['coursep'] = $coursep;
        $data['show1'] = $show1;
        $data['show2'] = $show2;
        $data['show3'] = $show3;
        if($flag ==0 ){
	        $this->load->view('common/header3');
	        $this->load->view('teacher/course/courseDetail', $data);
	        $this->load->view('common/footer');
        }else{
        	redirect('teacher/course/coursePublish/'.$id.'/'.$coursep->cour_id);
        }
    }
    
    function courseNew(){
    	$this->timeOut();
    	//oracle课程详情
    	$id = $this->uri->segment(4);
    	$course = $this->getCourse($id);
    	//新增mysql课程表
    	@$coursep->cour_id = 0;
    	$coursep->cour_no = '';
    	$coursep->cour_num = '';
    	$coursep->cour_term = '';
    	$coursep->cour_coll_id = '';
    	$coursep->cour_coll_name = '';
    	$coursep->cour_name = '';
    	$coursep->cour_name_en = '';
    	$coursep->cour_credit = '';
    	$coursep->cour_hours = '';
    	$coursep->cour_class = '';
    	$coursep->cour_teac_num = '';
    	$coursep->cour_teac_name = '';
    	$coursep->cour_mode = '';
    	$coursep->cour_time = '';
    	$coursep->cour_place = '';
    	$coursep->cour_week = '';
    	$coursep->cour_pattern_id = '';
    	$coursep->cour_publish = 0;
    	
    	$data['course'] = $course;
    	$data['coursep'] = $coursep;
    	$this->load->view('common/header3');
    	$this->load->view('teacher/course/courseEdit', $data);
    	$this->load->view('common/footer');
    	
    }
    
    function courseSet(){
    	$this->timeOut();
    	//oracle课程详情
    	$o_id = $this->uri->segment(4);
    	
    	$this->load->model('m_course');
    	$m_id = $this->m_course->saveInfo();
    	
    	redirect('teacher/course/coursePublish/'.$o_id.'/'.$m_id);
    	 
    }
    function coursePublish(){
    	$o_id = $this->uri->segment(4);
    	$m_id = $this->uri->segment(5);
    	
    	$course = $this->getCourse($o_id);
    	$coursep = $this->getCoursepById($m_id);
    	$data['course']=$course;
    	$data['coursep']=$coursep;
    	
    	switch($coursep->cour_pattern_id){
    		case 1 :
    			//自选式
    			$this->load->view('common/header3');
    			$this->load->view('teacher/course/coursePublish1', $data);
    			$this->load->view('common/footer');
    			break;
    		case 2 :
    			//志愿式
    			$this->load->view('common/header3');
    			$this->load->view('teacher/course/coursePublish2', $data);
    			$this->load->view('common/footer');
    			break;
    		case 3 :
    			//分配式
    			$this->load->view('common/header3');
    			$this->load->view('teacher/course/coursePublish3', $data);
    			$this->load->view('common/footer');
    			break;
    	}
    }
    
    function coursePublish1(){
    	//自选式课程发布 coursep表中cour_publish置1
    	$o_id = $this->uri->segment(4);
    	$m_id = $this->uri->segment(5);
    	$array = array('cour_publish'=>1);
    	$this->load->model('m_course');
    	$result = $this->m_course->updateCourse($m_id, $array);
    	if($result > 0){
    		echo '<script language="JavaScript">alert("发布成功");</script>';
    	}else{
    		echo '<script language="JavaScript">alert("发布失败");</script>';
    	}
    	
    	 $teaNum = $this->session->userdata('u_num');
         //$array=array('courseTeaId'=>$teaNum.'*');
        $num = $this->m_ncourse->getNumLike($teaNum.'*');
        $offset = 0;
        $data['course'] = $this->getCourses($teaNum.'*',$offset);
        $config['base_url'] = base_url() . 'index.php/teacher/course/courseList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $this->load->view('common/header3');
        $this->load->view('teacher/course/course', $data);
        $this->load->view('common/footer');
    		
    }
    
    /*
     * 志愿式课程发布
     */
    function coursePublish2(){
    	//自选式课程发布 coursep表中cour_publish置1
    	$o_id = $this->uri->segment(5);
    	$m_id = $this->uri->segment(4);
    	$array = array('cour_publish'=>1);
    	$this->load->model('m_course');
    	$result = $this->m_course->updateCourse($m_id, $array);
    	if($result > 0){
    		echo '<script language="JavaScript">alert("发布成功");</script>';
    	}else{
    		echo '<script language="JavaScript">alert("发布失败");</script>';
    	}
    	 
    	$teaNum = $this->session->userdata('u_num');
         //$array=array('courseTeaId'=>$teaNum.'*');
        $num = $this->m_ncourse->getNumLike($teaNum.'*');
        $offset = 0;
        $data['course'] = $this->getCourses($teaNum.'*',$offset);
        $config['base_url'] = base_url() . 'index.php/teacher/course/courseList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $this->load->view('common/header3');
        $this->load->view('teacher/course/course', $data);
        $this->load->view('common/footer');
    
    }
    
    function coursePublish3(){
    	//自选式课程发布 coursep表中cour_publish置1
    	$o_id = $this->uri->segment(5);
    	$m_id = $this->uri->segment(4);
    	$array = array('cour_publish'=>1);
    	$this->load->model('m_course');
    	$result = $this->m_course->updateCourse($m_id, $array);
    	if($result > 0){
    		echo '<script language="JavaScript">alert("发布成功");</script>';
    	}else{
    		echo '<script language="JavaScript">alert("发布失败");</script>';
    	}
    
    	 $teaNum = $this->session->userdata('u_num');
         //$array=array('courseTeaId'=>$teaNum.'*');
        $num = $this->m_ncourse->getNumLike($teaNum.'*');
        $offset = 0;
        $data['course'] = $this->getCourses($teaNum.'*',$offset);
        $config['base_url'] = base_url() . 'index.php/teacher/course/courseList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $this->load->view('common/header3');
        $this->load->view('teacher/course/course', $data);
        $this->load->view('common/footer');
    
    }
    
    
    
    // 分页获取全部实验任务信息
    public function getCourses($tea_num,$offset) {
        $this->timeOut();
        $this->load->model('m_ncourse');
        $data = array();
        $result = $this->m_ncourse->getNcoursesLike($tea_num, PER_PAGE, $offset);

        $this->load->model('m_course');
        foreach ($result as $r) {
        	$arrCourse = array('cour_no'=>$r->courseId,'cour_num'=>$r->courseNum,'cour_term'=>$r->term);
        	$resCourse = $this->getCoursep($arrCourse);
        	if($resCourse){
	            $arr = array( 
	            		'id'=>$r->id,
	            		'courseId' => $r->courseId,
	            		'courseNum' => $r->courseNum,
	            		'courseName' => $r->courseName,
	            		'coursePattern' => $resCourse->patt_type,
	            		'coursePublish' => $resCourse->cour_publish
	                );
        	}else{
        		$arr = array(
        				'id'=>$r->id,
        				'courseId' => $r->courseId,
        				'courseNum' => $r->courseNum,
        				'courseName' => $r->courseName,
        				'coursePattern' => "未分配",
        				'coursePublish' => "未发布"
        		);
        	}
            array_push($data, $arr);
        }
        return $data;
    }

    // 获取单个oracle数据
    function getCourse($id) {
        $this->load->model('m_ncourse');
        $result = $this->m_ncourse->getNcourseById($id);
        $data = array();
        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }
    
    
    
    // 获取单个
    function getCoursep($array) {
    	$this->load->model('m_course');
    	$result = $this->m_course->getCourse_ws($array);
    	$data = array();
    	foreach ($result as $r) {
    		$data = $r;
    	}
    	return $data;
    }
    
    // 获取单个
    function getCoursepById($id) {
    	$this->load->model('m_course');
    	$result = $this->m_course->getCourseById_ws($id);
    	$data = array();
    	foreach ($result as $r) {
    		$data = $r;
    	}
    	return $data;
    }
    
    function getEmptyCoursep(){
    	@$coursep->cour_id = 0;
    	$coursep->cour_no = '';
    	$coursep->cour_num = '';
    	$coursep->cour_term = '';
    	$coursep->cour_coll_id = '';
    	$coursep->cour_coll_name = '';
    	$coursep->cour_name = '';
    	$coursep->cour_name_en = '';
    	$coursep->cour_credit = '';
    	$coursep->cour_hours = '';
    	$coursep->cour_class = '';
    	$coursep->cour_teac_num = '';
    	$coursep->cour_teac_name = '';
    	$coursep->cour_mode = '';
    	$coursep->cour_time = '';
    	$coursep->cour_place = '';
    	$coursep->cour_week = '';
    	$coursep->cour_pattern_id = '';
    	$coursep->cour_publish = '';
    	$coursep->patt_type = '';
    	
    	return $coursep;
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