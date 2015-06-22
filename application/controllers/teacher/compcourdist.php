<?php
//分配式分配基地与学生
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Compcourdist extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('pagination');
        ini_set('max_execution_time', '0');
        date_default_timezone_set('PRC');
    }
    
/*
	 * 志愿式发布课程——设置基地
	 */
    
	public function companyList(){
		//1
		$this->timeOut();

		$o_id= $this->uri->segment(5);
		//课程在MySQL表中的id
		$cour_id= $this->uri->segment(4);
		$coursep = $this->getCoursepById($cour_id);
		 
		$tea_num = $this->session->userdata('u_num');
		//根据课程号查找审核成功的基地
		$array=array('comp_add_num'=>$tea_num);
		 
		$this->load->model('m_company');
		 
		$company = $this->getCompanys($array);//全部基地
		$array1=array('comp_add_num'=>$tea_num,'cour_id'=>$cour_id);
		$companyc = $this->getCocos($array1);//匹配基地
		$companyu = $this->myArrDiff($company,$companyc,'comp_id');//不匹配基地
		$offset = $this->uri->segment(6);
		$company = array_merge($companyc,$companyu);
		
		//全部选课人数
		
		//已分配选课人数
		
		//若基地数小于1，将课程改为未发布
		$comNum = count($companyc);
		if($comNum < 1){
			$this->load->model('m_course');
			$arrCourse = array('cour_publish'=>0);
			$this->m_course->updateCourse($cour_id, $arrCourse);
		}

		$num = count($company);
		$config['base_url'] = base_url() . 'index.php/teacher/compcourpublish/companyList/'.$cour_id.'/'.$o_id;
		$config['total_rows'] = $num;
		$config['uri_segment'] = 6;
		$this->pagination->initialize($config);
		$data['page'] = $this->pagination->create_links();
		$data['company'] = array_slice($company,$offset,PER_PAGE);
		
		$data['cour_id']=$cour_id;
		$data['coursep']=$coursep;
		$data['o_id']=$o_id;
		$data['flag']= count($companyc);
		
		$this->load->view('common/header3');
		$this->load->view('teacher/compcourd/compCourdPublish', $data);
		$this->load->view('common/footer');
	}
    
    // 实验任务详细信息页面
    public function companyDetail() {
    	//1
        $this->timeOut();
        $cour_id = $this->uri->segment(4);
        //课程基地号
        $comp_id = $this->uri->segment(5);
        $comp = $this->getCompanyById($comp_id);
       
        $data['comp']=$comp;
        $data['cour_id']=$cour_id;
        $data['o_id']=$this->uri->segment(6);
        $this->load->view('common/header3');
        $this->load->view('teacher/compcourd/companydDetail', $data);
        $this->load->view('common/footer');
    }
    
    
	
    
    function companyNew(){
    	//1
    	$this->timeOut();
    	//print_r($this->session->all_userdata());
    	$o_id=$this->uri->segment(5);
    	$cour_id=$this->uri->segment(4);
    	$coursep = $this->getCoursepById($cour_id);
    	
    	@$comp->comp_id = 0;
    	$comp->comp_name = '';
    	$comp->comp_user_id = '';
    	$comp->comp_address = '';
    	$comp->comp_url='';
    	$comp->comp_content='';
    	$comp->comp_plan = '';
    	$comp->comp_stat_id = 5;
    	$comp->comp_coll_id='';
    	$comp->comp_coll_name='';
    	$comp->comp_teacher='';
    	$comp->comp_add_num = '';
    	$comp->comp_add_type = '';
    	
    	@$user->user_id = 0;
	    $user->user_num = '';
	    $user->user_password = '';
	    $user->user_name = '';
	    $user->user_phone = '';
	    $user->user_email = '';
	    $user->user_address = '';
	    $user->user_coll_id  = '';
	    $user->user_coll_name = '';
	    $user->user_stat_id = 2;
	    @$coco->coco_id=0;
	    @$elco->elco_id=0;
	    
    	$data['coursep']=$coursep;
    	$data['comp']=$comp;
    	$data['user']=$user;
    	$data['coco']=$coco;
    	$data['elco']=$elco;
    	$data['o_id']=$o_id;
    	
    	$this->load->view('common/header3');
    	$this->load->view('teacher/compcourd/companyEdit', $data);
    	$this->load->view('common/footer');
    }
    
    function companyEdit(){
    	$this->timeOut();
    	//print_r($this->session->all_userdata());
    	 
    	$cour_id=$this->uri->segment(4);
    	$comp_id=$this->uri->segment(5);
    	$elco_id=$this->uri->segment(6);
    	//1.课程信息
    	$coursep = $this->getCoursepById($cour_id);
    	//2.公司信息
    	$company = $this->getCompanyById($comp_id);
    	//3.用户信息
    	$user = $this->getUserById($company->comp_user_id);
    	//4.coucom编号信息
    	$array = array('coco_cour_id'=>$cour_id,'coco_comp_id'=>$comp_id);
    	$coco = $this->getCocoByArr($array);
    	//5.elecom编号信息
    	$elco = $this->getElecomById($elco_id);
    	 
    	$data['coursep']=$coursep;
    	$data['comp']=$company;
    	$data['user']=$user;
    	$data['coco']=$coco;
    	$data['elco']=$elco;
    	 
    	$this->load->view('common/header3');
    	$this->load->view('teacher/compcourd/companyEdit', $data);
    	$this->load->view('common/footer');
    }
    
    
    
    function save(){
    	//1
    	$this->timeOut();
    	
    	$cour_id = $this->uri->segment(4);
    	$coursep = $this->getCoursepById($cour_id);
    	//1.user表
    	$this->load->model('m_user');
    	$user_id = $this->m_user->saveInfoByTea();
    	//2.company表
    	$this->load->model('m_company');
    	$comp_id = $this->m_company->saveInfoByTea($user_id);
    	//3.coucom表
    	@$coco->coco_id = $this->input->post('coco_id');
    	$coco->coco_cour_id = $coursep->cour_id;
    	$coco->coco_cour_no = $coursep->cour_no;
    	$coco->coco_cour_num = $coursep->cour_num;
    	$coco->coco_cour_term = $coursep->cour_term;
    	$coco->coco_comp_id = $comp_id;
    	$this->load->model('m_coucom');
    	$coco_id = $this->m_coucom->saveInfoByArr($coco);
    	$comp = $this->getCocoById($coco_id);
    	//存储结束
    	echo '<script language="JavaScript">alert("添加成功");</script>';
    	
    	$data['comp']=$comp;
    	$data['o_id'] = $this->uri->segment(5);
    	$this->load->view('common/header3');
    	$this->load->view('teacher/compcourd/comcouDetail', $data);
    	$this->load->view('common/footer');
    }
    
    
    
    
    
    /*
     * 取消设置为本课程基地
     */
    function companyCancel(){
    	//1
    	//删除coucom表
    	$cour_id = $this->uri->segment(4);
    	$coco_id = $this->uri->segment(5);
    	$comp_id = $this->uri->segment(6);
    	$o_id = $this->uri->segment(7);
    	
    	$this->load->model('m_coucom');
    	$this->m_coucom->deleteCoucom($coco_id);
    	
    	//删除elecom表中所有本课本基地学生数据
    	//$coursep = $this->getCoursepById($cour_id);
    	$this->load->model('m_elecom');
    	$array=array('elco_cour_id'=>$cour_id,'elco_comp_id'=>$comp_id);
    	
    	$this->m_elecom->deleteElecomByArr($array);
    	redirect('teacher/compcourdist/companyList/'.$cour_id.'/'.$o_id);
    }
    
    /*
     * 设置为本课程基地
     */
    function companySet(){
    	//1
    	//新增coucom表
    	$cour_id = $this->uri->segment(4);
    	$comp_id = $this->uri->segment(5);
    	//$o_id = $this->uri->segment(6);
    	//课程相关信息
    	$coursep = $this->getCoursepById($cour_id);
    	
    	@$coco->coco_id = 0;
    	$coco->coco_cour_id = $coursep->cour_id;
    	$coco->coco_cour_no = $coursep->cour_no;
    	$coco->coco_cour_num = $coursep->cour_num;
    	$coco->coco_cour_term = $coursep->cour_term;
    	$coco->coco_comp_id = $comp_id;
    	$this->load->model('m_coucom');
    	$coco_id = $this->m_coucom->saveInfoByArr($coco);
    	
    	//设置学生
    	
    	redirect('teacher/compcourdist/companyList/'.$cour_id.'/'.$o_id);
    	
    }
    
    function companystu(){
    	//为基地分配学生
    	$show = 1;
    	//获取基地信息
    	$comp_id = $this->uri->segment(5);
    	$comp = $this->getCompanyById($comp_id);
    	
    	//获取课程信息
    	$cour_id = $this->uri->segment(4);
    	$coursep = $this->getCoursepById($cour_id);
    	//获取选课名单
    	$array1 = array('courseId'=>$coursep->cour_no,'courseNum'=>$coursep->cour_num,'courseTerm'=>$coursep->cour_term);
    	$array2 = array('elco_cour_no'=>$coursep->cour_no,'elco_cour_num'=>$coursep->cour_num,'elco_cour_term'=>$coursep->cour_term);
    	$array3 = array('elco_cour_no'=>$coursep->cour_no,'elco_cour_num'=>$coursep->cour_num,'elco_cour_term'=>$coursep->cour_term,'elco_comp_id'=>$comp_id);
    	$stu = $this->getStu($array1);
    	//$audit1 = $audit;
    	//
    	$stuc = $this->getStud($array3);//已分配到本基地
    	$stud = $this->getStud($array2);
    	$stuf = $this->myArrDiff($stu,$stud,'stu_num');//未分配基地学生
    	
    	//查找本基地是否设置
    	$this->load->model('m_coucom');
    	$arraycc = array('coco_cour_id'=>$cour_id,'coco_comp_id'=>$comp_id);
    	$coco = $this->m_coucom->getCoucom($arraycc);
    	
    	if(!$stuc){
    		if($coco){
    			//删除$coco
    			foreach($coco as $r){
    				$this->m_coucom->deleteCoucom($r->coco_id);
    			}
    		}
    	}
    	
    	if($stuc){
    		//基地有学生
    		if(!$coco){
    			//基地未设置
    			$show = 3;
    		}else{
    			//基地已设置
    			$show = 2;
    		}
    	}else{
    		//基地没有学生
    		$show = 1;
    	}
    	
    	
    	$data['stuc']=$stuc;
    	$data['stuf']=$stuf;
    	$data['comp']=$comp;
    	$data['cour']=$coursep;
    	$data['show']=$show;

    	$this->load->view('common/header3');
    	$this->load->view('teacher/compcourd/companydStu', $data);
    	$this->load->view('common/footer');
    }
    
    function companystuSet(){
    	$cour_id = $this->uri->segment(4);
    	$comp_id = $this->uri->segment(5);
    	$coursep = $this->getCoursepById($cour_id);
    	$stustr = $this->input->post('stu_num');
    	//var_dump($stustr);
    	if($stustr){
    		//将学生-基地存入elecom
    		foreach ($stustr as $r){//$r为学号
    			$stu = explode("@",$r);
    			@$elco->elco_id = 0;
		    	$elco->elco_cour_id = $coursep->cour_id;
		    	$elco->elco_cour_no = $coursep->cour_no;
		    	$elco->elco_cour_num = $coursep->cour_num;
		    	$elco->elco_cour_term = $coursep->cour_term;
		    	$elco->elco_stu_num = $stu[0];
		    	$elco->elco_stu_name = $stu[1];
		    	$elco->elco_stu_class = $stu[2];
		    	$elco->elco_comp_id = $comp_id;
		    	$elco->elco_state = 6;
		    	
		    	$this->load->model('m_elecom');
		    	$this->m_elecom->saveInfoByArr($elco);
		    	
    		}
    	}else{
    		//未选择学生，不能设置该基地
    		echo '<script language="JavaScript">alert("未选择学生，不能设置该基地");</script>';
    	}
    	redirect('teacher/compcourdist/companystu/'.$cour_id.'/'.$comp_id);
    }
    
    function companystuSetByOne(){
    	$cour_id = $this->uri->segment(4);
    	$comp_id = $this->uri->segment(5);
    	$coursep = $this->getCoursepById($cour_id);
    	$stustr = urldecode($this->uri->segment(6));
    	
    	if($stustr){
    		//将学生-基地存入elecom
    
    		$stu = explode("__",$stustr);
    		@$elco->elco_id = 0;
    		$elco->elco_cour_id = $coursep->cour_id;
    		$elco->elco_cour_no = $coursep->cour_no;
    		$elco->elco_cour_num = $coursep->cour_num;
    		$elco->elco_cour_term = $coursep->cour_term;
    		$elco->elco_stu_num = $stu[0];
    		$elco->elco_stu_name = $stu[1];
    		$elco->elco_stu_class = $stu[2];
    		$elco->elco_comp_id = $comp_id;
    		$elco->elco_state = 6;
    		
    		$this->load->model('m_elecom');
    		$this->m_elecom->saveInfoByArr($elco);
    	}
    		redirect('teacher/compcourdist/companystu/'.$cour_id.'/'.$comp_id);
    }
    
    
    function companystuCan(){
    	$cour_id = $this->uri->segment(4);
    	$comp_id = $this->uri->segment(5);
    	
    	$stustr = $this->input->post('stu_numc');
    	//var_dump($stustr);
    	if($stustr){
    		//将学生-基地存入elecom
    		foreach ($stustr as $r){//$r为学号
    			$elco_id = $r;
    			
    			$this->load->model('m_elecom');
    			$this->m_elecom->deleteElecom($elco_id);
    		  
    		}
    	}else{
    		//未选择学生，不能设置该基地
    		echo '<script language="JavaScript">alert("未选择学生，不能删除");</script>';
    	}
    	redirect('teacher/compcourdist/companystu/'.$cour_id.'/'.$comp_id);
    }
    
    function companystuCanByOne(){
    	$cour_id = $this->uri->segment(4);
    	$comp_id = $this->uri->segment(5);
    	
    	$stustr = $this->uri->segment(6);
    	var_dump($stustr);
    	if($stustr){
    		//将学生-基地存入elecom
    			$elco_id = $stustr;
    			 
    			$this->load->model('m_elecom');
    			$this->m_elecom->deleteElecom($elco_id);
    		
    	}
    	redirect('teacher/compcourdist/companystu/'.$cour_id.'/'.$comp_id);
    }
    
    
    function getStu($array){
    	//暂时不考虑分页
    	$data  = array();//全部学生
    	$this->load->model('m_nvariable');
    	$result = $this->m_nvariable->getNvariable($array);
    	foreach ($result as $r) {
    		$arr = array(
    				'stu_num'=>$r->stuId,
    				'stu_name' => $r->stuName,
    				'stu_class' => $r->stuClass,
    				'elco_name' => "未提交",
    				'elco_id' => 0,
    				'elco_state' => '无信息'
    		);
    		array_push($data, $arr);
    	}
    	 
    	return $data;
    }
    
    //已分配基地学生
    function getStud($array){
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
    
    
    
    
    public function getCompanys($array) {
    	$this->timeOut();
    	$this->load->model('m_company');
    	$result = $this->m_company->getCompany($array);
    
    	$data = array();
    	foreach ($result as $r) {
    		$arr = array(
    				'comp_id' => $r->comp_id,
    				'comp_name' => $r->comp_name,
    				'comp_address' => $r->comp_address,
    				'comp_url' => $r->comp_url,
    				'comp_content' => $r->comp_content,
    				'comp_plan' => $r->comp_plan,
    				'comp_teacher' => $r->comp_teacher,
    				'user_name' => $r->user_name,
    				'user_phone' => $r->user_phone,
    				'user_email' => $r->user_email,
    				'coco'=>'0',
    				'coco_id'=>0
    		);
    		array_push($data, $arr);
    	}
    	return $data;
    }
    
    //已选择当前课程基地
    function getCocos($array){
    	$this->timeOut();
    	$this->load->model('m_coucom');
    	$result = $this->m_coucom->getCoucom_ws($array);
    	
    	$data = array();
    	foreach ($result as $r) {
    		$arr = array(
    				'comp_id' => $r->comp_id,
    				'comp_name' => $r->comp_name,
    				'comp_address' => $r->comp_address,
    				'comp_url' => $r->comp_url,
    				'comp_content' => $r->comp_content,
    				'comp_plan' => $r->comp_plan,
    				'comp_teacher' => $r->comp_teacher,
    				'user_name' => $r->user_name,
    				'user_phone' => $r->user_phone,
    				'user_email' => $r->user_email,
    				'coco'=>'1',
    				'coco_id'=>$r->coco_id
    		);
    		array_push($data, $arr);
    	}
    	return $data;
    }
       
    //获取单个基地——coco_id
    function getCompany($id){
    	$this->load->model('m_coucom');
    	$result = $this->m_coucom->getCoucomById_ws($id);
    	$data = array();
    	foreach ($result as $r) {
    		$data = $r;
    	}
    	return $data;
    }
    
    // 获取单个已分配课程
    function getCoursepById($id) {
    	$this->load->model('m_course');
    	$result = $this->m_course->getCourseById($id);
    	$data = array();
    	foreach ($result as $r) {
    		$data = $r;
    	}
    	return $data;
    }
    
    //获取单个基地-comp_id
    function getCompanyById($id){
    	$this->load->model('m_company');
    	$result = $this->m_company->getCompanysById($id);
    	$data = array();
    	foreach ($result as $r) {
    		$data = $r;
    	}
    	return $data;
    }
    //获取单个用户-user_id
    function getUserById($id){
    	$this->load->model('m_user');
    	$result = $this->m_user->getUserById($id);
    	$data = array();
    	foreach ($result as $r) {
    		$data = $r;
    	}
    	return $data;
    }
    //获取单个coco
    function getCocoByArr($array){
    	$this->load->model('m_coucom');
    	$result = $this->m_coucom->getCoucom($array);
    	$data = array();
    	foreach ($result as $r) {
    		$data = $r;
    	}
    	return $data;
    }
    //获取单个coco
    function getCocoById($id){
    	$this->load->model('m_coucom');
    	$result = $this->m_coucom->getCoucomById_ws($id);
    	$data = array();
    	foreach ($result as $r) {
    		$data = $r;
    	}
    	return $data;
    }
    //获取单个elco——elco_id
    function getElecomById($id){
    	$this->load->model('m_elecom');
    	$result = $this->m_elecom->getElecomById_ws($id);
    	$data = array();
    	foreach ($result as $r) {
    		$data = $r;
    	}
    	return $data;
    }
    // 获取单个
    function getNCourse($array) {
    	$this->load->model('m_ncourse');
    	$result = $this->m_ncourse->getNcourse($array);
    	$data = array();
    	foreach ($result as $r) {
    		$data = $r;
    	}
    	return $data;
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