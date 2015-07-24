<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Student extends CI_Controller {

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
        $array=array('cour_teac_num'=>$teaNum,'cour_term'=>$term,'cour_publish'=>1);
        $offset = $this->uri->segment(4);
        $data['course'] = $this->getCourses($array,$offset);
        
        $num = $this->m_course->getNum($array);
        
        $config['base_url'] = base_url() . 'index.php/teacher/student/courseList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $data['num']='共有'.$num.'条记录。';

        $this->load->view('common/header3');
        $this->load->view('teacher/student/course', $data);
        $this->load->view('common/footer');
    }
    
    public function studentList() {
    	
    	$this->timeOut();
    	//查找课程号
    	$cour_id=$this->uri->segment(4);
    	$coursep = $this->getCoursepById($cour_id);
    	$array2 = array('elco_cour_no'=>$coursep->cour_no,'elco_cour_num'=>$coursep->cour_num,'elco_cour_term'=>$coursep->cour_term,'elco_state'=>6);
    	
    	//已分配基地选课学生
    	$audit = $this->getStudent($array2);
    	//未选课学生
    	 
    	$offset = $this->uri->segment(5);
    	$num = count($audit);
    	$config['base_url'] = base_url() . 'index.php/teacher/student/studentList/'.$cour_id;
    	$config['total_rows'] = $num;
    	$config['uri_segment'] = 5;
    	$this->pagination->initialize($config);
    	$data['page'] = $this->pagination->create_links();
        $data['num']='每页最多有10条记录，本页面共有'.$num.'条记录。';
    	$data['audit'] = array_slice($audit,$offset,PER_PAGE);
    	$data['cour_id'] = $cour_id;
    		
    	$this->load->view('common/header3');
    	$this->load->view('teacher/student/student', $data);
    	$this->load->view('common/footer');

    }
    
    // 实验任务详细信息页面
    public function studentDetail() {
    	$this->timeOut();
    	$cour_id = $this->uri->segment(4);
    	$elco_id = $this->uri->segment(5);
    	$elecom = $this->getElecom($elco_id);
    
    	$data['elco'] = $elecom;
    	$data['cour_id'] = $cour_id;
    	$this->load->view('common/header3');
    	$this->load->view('teacher/student/studentDetail', $data);
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
    
    //已提交基地学生
    function getStudent($array){
    	$data = array();
    	$this->load->model('m_elecom');
    	$result = $this->m_elecom->getElecom_ws($array);
    	foreach ($result as $r) {
    		$arr = array(
    				'stu_num'=>$r->elco_stu_num,
    				'stu_name' => $r->elco_stu_name,
    				'stu_class' => $r->elco_stu_class,
    				'elco_name' => $r->comp_name,
    				'elco_id' => $r->elco_id,
    				'elco_state' => $r->usta_type
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
    // 获取单个
    function getElecom($id) {
    	$this->load->model('m_elecom');
    	$result = $this->m_elecom->getElecomById_ws($id);
    	$data = array();
    	foreach ($result as $r) {
    		$data = $r;
    	}
    	return $data;
    }
    
    
    function studentExcel(){
    	$this->timeOut();
    	$cour_id = $this->uri->segment(4);
    	
    	$coursep = $this->getCoursepById($cour_id);
    	$array = array('elco_cour_no'=>$coursep->cour_no,'elco_cour_num'=>$coursep->cour_num,'elco_cour_term'=>$coursep->cour_term,'elco_state'=>6);
    	
    	//已分配基地选课学生
    	$this->load->model("m_elecom");
    	$result = $this->m_elecom->getElecom_ws($array);
    
    	if($result){
    		$this->load->library('PHPExcel');
    		$this->load->library('PHPExcel/IOFactory');
    
    		$objPHPExcel = new PHPExcel();
    		$objPHPExcel->getProperties()->setTitle("export")->setDescription("none");
    
    
    		//设置excel的属性：
    		//创建人
    		$objPHPExcel->getProperties()->setCreator($realname);
    		//最后修改人
    		$objPHPExcel->getProperties()->setLastModifiedBy($realname);
    		//标题
    		$objPHPExcel->getProperties()->setTitle("StuComp");
    		//题目
    		$objPHPExcel->getProperties()->setSubject("StuComp");
    		//设置当前的sheet
    		$objPHPExcel->setActiveSheetIndex(0);
    
    		//设置单元格的值
    		$objPHPExcel->getActiveSheet()->setCellValue('A1', $coursep->cour_teac_name);
    		$objPHPExcel->getActiveSheet()->setCellValue('B1', $coursep->cour_name);
    		$objPHPExcel->getActiveSheet()->setCellValue('C1', $coursep->cour_no."(".$coursep->cour_num.")");
    		$objPHPExcel->getActiveSheet()->setCellValue('D1', $coursep->cour_term);
    		
    		$objPHPExcel->getActiveSheet()->setCellValue('A2', '学号');
    		$objPHPExcel->getActiveSheet()->setCellValue('B2', '姓名');
    		$objPHPExcel->getActiveSheet()->setCellValue('C2', '班级');
    		$objPHPExcel->getActiveSheet()->setCellValue('D2', '基地名');
    		$objPHPExcel->getActiveSheet()->setCellValue('E2', '基地地址');
    		$objPHPExcel->getActiveSheet()->setCellValue('F2', '基地负责人');
    		$objPHPExcel->getActiveSheet()->setCellValue('G2', '负责人电话');
    		$objPHPExcel->getActiveSheet()->setCellValue('H2', '负责人邮箱');
    
    		$objPHPExcel->getActiveSheet()->getStyle('A')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
    		$objPHPExcel->getActiveSheet()->getStyle('G')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
    
    		$count = count($result);
    		for ($i = 3; $i <= $count+2; $i++) {
    			$objPHPExcel->getActiveSheet()->setCellValue('A' . $i, " ". $result[$i-3]->elco_stu_num , PHPExcel_Cell_DataType::TYPE_STRING );
    			$objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $result[$i-3]->elco_stu_name );
    			$objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $result[$i-3]->elco_stu_class);
    			$objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $result[$i-3]->comp_name );
    			$objPHPExcel->getActiveSheet()->setCellValue('E' . $i, $result[$i-3]->comp_address );
    			$objPHPExcel->getActiveSheet()->setCellValue('F' . $i, $result[$i-3]->user_name);
    			$objPHPExcel->getActiveSheet()->setCellValue('G' . $i, " ".$result[$i-3]->user_phone , PHPExcel_Cell_DataType::TYPE_STRING );
    			$objPHPExcel->getActiveSheet()->setCellValue('H' . $i, $result[$i-3]->user_email );
    			
    
    		}
    		 
    
    		 
    		$objPHPExcel->setActiveSheetIndex(0);
    		 
    		$objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');
    		 
    		//发送标题强制用户下载文件
    		ob_end_clean();
    		header('Content-Type: application/vnd.ms-excel');
    		header('Content-Disposition: attachment;filename="'.$coursep->cour_no."(".$coursep->cour_num.")_".date('dmy').'.xls"');
    		
    		header('Cache-Control: max-age=0');
    		 
    		$objWriter->save('php://output');
    
    		 
    	}
    
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