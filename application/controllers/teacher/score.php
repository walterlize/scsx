<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Score extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('pagination');
        ini_set('max_execution_time', '0');
        date_default_timezone_set('PRC');
    }
    
public function courseList() {
        $this->timeOut();
        //教师工号
        $teaNum = $this->session->userdata('u_num');
        $term = $this->session->userdata('term');//学期
        
        $this->load->model('m_course');
        $array=array('cour_teac_num'=>$teaNum,'cour_term'=>$term);
        $offset = $this->uri->segment(4);
        $data['course'] = $this->getCourses($array,$offset);
        
        $num = $this->m_course->getNum($array);
        
        $config['base_url'] = base_url() . 'index.php/teacher/score/courseList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $data['num']='共有'.$num.'条记录。';

        $this->load->view('common/header3');
        $this->load->view('teacher/score/course', $data);
        $this->load->view('common/footer');
    }
    
// 分页获取全部实验任务信息
    public function getCourses($array,$offset) {
        $this->timeOut();
        $this->load->model('m_course');
        $data = array();
        $result = $this->m_course->getCourses_ws($array, PER_PAGE, $offset);

        foreach ($result as $r) {
        	
	        $arr = array( 
	            		
	            		'courseId' => $r->cour_no,
	            		'courseNum' => $r->cour_num,
	            		'courseName' => $r->cour_name,
	            		'coursePattern' => $r->patt_type,
	            		'coursePublish' => $r->cour_publish,
	            		'cour_id' => $r->cour_id
	            );
	        array_push($data, $arr);
        	
            
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
    

    public function scoreList() {
        $this->timeOut();

        $cour_id = $this->uri->segment(4);
        //查找本门课未评价的学生
        $coursep = $this->getCoursepById($cour_id);
        $array1 = array('KCH'=>$coursep->cour_no,'KXH'=>$coursep->cour_num,'ZXJXJHH'=>$coursep->cour_term);
        $array2 = array('scor_cour_id'=>$cour_id);
         
        $stuall = $this->getStuAll($array1);//全部选课学生
        //已评价学生
        $stuscore = $this->getStuscore($array2);
        //未评价学生
        $stuscoreu = $this->myArrDiff($stuall,$stuscore,'stu_num');
        
        $offset = $this->uri->segment(5);  	
    	$num = count($stuscoreu);
    
    	$config['base_url'] = base_url() . 'index.php/teacher/score/scoreList/'.$cour_id;
    	$config['total_rows'] = $num;
    	$config['uri_segment'] = 5;
        $config['num_links'] = 4;

    	$this->pagination->initialize($config);
    	$data['page'] = $this->pagination->create_links();
    	
    	$data['stuscoreu'] = array_slice($stuscoreu,$offset,PER_PAGE);
        $data['cour_id'] = $cour_id;

        $this->load->view('common/header3');
        $this->load->view('teacher/score/score', $data);
        $this->load->view('common/footer');
    }
    
    function getStuAll($array){
    	//暂时不考虑分页
    	$data  = array();//全部学生
    	$this->load->model('m_nvariable');
    	$result = $this->m_nvariable->getNvariable($array);
    	foreach ($result as $r) {
    		$arr = array(
    				'stu_num'=>$r->XH,
    				'stu_name' => $r->XM,
    				'stu_class' => $r->BM,
    				
    		);
    		array_push($data, $arr);
    	}
    	 
    	return $data;
    }
    
    function getStuScore($array){
    	//暂时不考虑分页
    	$data  = array();//全部学生
    	$this->load->model('m_scoreteac');
    	$result = $this->m_scoreteac->getScore($array);
    	foreach ($result as $r) {
    		$arr = array(
    				'stu_num'=>$r->scor_stu_num,
    				'stu_name' => $r->scor_stu_name,
    				'stu_class' => $r->scor_stu_class,
    	
    		);
    		array_push($data, $arr);
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
    
    // 实验任务详细信息新增页面
    public function scoreNew() {
    	$this->timeOut();
    	$stu_num = $this->uri->segment(4);
    	$cour_id = $this->uri->segment(5);
    	$coursep = $this->getCoursepById($cour_id);
    	//获取学生基地信息
    	$arrComp = array('elco_cour_id'=>$cour_id,'elco_stu_num'=>$stu_num);
    	$elco = $this->getElecom($arrComp);
    	
    	//var_dump($elco);
    	//获取学生信息
    	$arrStu = array('XH'=>$stu_num);
    	$stu = $this->getStu($arrStu);
    	
    
    	@$score->scor_id = 0;
    	$score->scor_stu_num = $stu_num;
    	$score->scor_stu_name = $stu->XM;
    	$score->scor_stu_class = $stu->BM;
    	$score->scor_cour_id = $cour_id;
    	$score->scor_teac_num = $this->session->userdata('u_num');
    	$score->scor_teac_name = $this->session->userdata('realname');;
    	$score->scor_teac_score = '';
    	$score->scor_teac_comment = '';
    	
        $data['score']=$score;
        $data['cour']=$coursep;
        $data['stu']=$stu;
        $data['elco']=$elco;//基地信息
        $data['cour_id'] = $cour_id;
    	$data['show'] = 'display:none';
    	$data['showActive'] = 'display:none';
    	$data['showUnactive'] = 'display:none';
    
    	$this->load->view('common/header3');
    	$this->load->view('teacher/score/scoreEdit', $data);
    	$this->load->view('common/footer');
    }
    
    function getStu($array){
    	$this->load->model('m_nstudent');
    	$stu = $this->m_nstudent->getStu($array);
    	$data = array();
    	foreach ($stu as $r){
    		$data = $r;
    	}
    	return $data;
    }
    
    function getElecom($array){
    	$this->load->model('m_elecom');
    	$res = $this->m_elecom->getElecom_ws($array);
    	$data = array();
    	foreach ($res as $r){
    		$data = $r;
    	}
    	return $data;
    }
    
    // 保存实验任务信息
    public function save() {
    	$this->timeOut();
    
    	$this->load->model('m_scoreteac');
    	$cour_id = $this->uri->segment(4);
    	$coursep = $this->getCoursepById($cour_id);

    	$scor_id = $this->m_scoreteac->saveInfo();
    	$data['score'] =$this->getScoreById($scor_id);
    	$data['cour_id']=$cour_id;
    	$data['cour']=$coursep;
    
    	$this->load->view('common/header3');
    	$this->load->view('teacher/score/scoreDetail', $data);
    	$this->load->view('common/footer');
    }


// 实验任务详细信息页面
    public function scoreDetail() {
        $this->timeOut();
        $score_id = $this->uri->segment(4);
        $score= $this->getScoreById($score_id);
        $cour_id = $score->scor_cour_id;
        $coursep = $this->getCoursepById($cour_id);
        $data['cour_id']=$cour_id;
        $data['cour']=$coursep;
        
        $data['score']= $score;
        $this->load->view('common/header3');
        $this->load->view('teacher/scoreappr/scoreDetail', $data);
        $this->load->view('common/footer');
    }
    
	function getScoreById($id){
		$this->load->model('m_scoreteac');
		$res=$this->m_scoreteac->getScoreById($id);
		$data = array();
		foreach ($res as $r){
			$data = $r;
		}
		return $data;
	}
	
	// 实验任务信息编辑页面
	public function scoreEdit() {
		$this->timeOut();
		
		$stu_num = $this->uri->segment(4);
    	$cour_id = $this->uri->segment(5);
    	$scor_id = $this->uri->segment(6);
    	$coursep = $this->getCoursepById($cour_id);
    	//获取学生基地信息
    	$arrComp = array('elco_cour_id'=>$cour_id,'elco_stu_num'=>$stu_num);
    	$elco = $this->getElecom($arrComp);
    	//var_dump($elco);
    	//获取学生信息
    	$arrStu = array('XH'=>$stu_num);
    	$stu = $this->getStu($arrStu);
    	
    	$score = $this->getScoreById($scor_id);
    	$data['score']=$score;
    	$data['cour']=$coursep;
    	$data['stu']=$stu;
    	$data['elco']=$elco;//基地信息
    	$data['cour_id'] = $cour_id;
    	
	
		$data['showActive'] = '';
		$data['showUnactive'] = 'display:none';
	
		$this->load->view('common/header3');
		$this->load->view('teacher/score/scoreEdit', $data);
		$this->load->view('common/footer');
	}
   

    public function scoreDelete() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $this->load->model('m_score');
        $this->m_score->delete($id);

        $num = $this->m_score->getNum1(array());
        $offset = 0;

        $data['score'] = $this->getScores($offset);
        $config['base_url'] = base_url() . 'index.php/teacher/score/scoreList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('teacher/score/score', $data);
        $this->load->view('common/footer');
    }


    

    
    //返回两数组差集（按指定键值）
    function myArrDiff($array1,$array2,$key){
    	if(count($array1) != count($array2)){
    		foreach ($array1 as $i=>$p){
    			foreach($array2 as $q){
    				if($p[$key] == $q[$key]){
    					unset($array1[$i]);
    				}
    			}
    		}
    		$array1 = array_values($array1);
    	}else{
    		$array1=array();
    	}
    	return $array1;
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