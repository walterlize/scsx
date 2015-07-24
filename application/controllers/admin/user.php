<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct()
	{
            parent::__construct();
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->library('session');
            $this->load->library('pagination');
	}

	public function stuList(){
		$this->timeOut();
    	$college =$this->session->userdata("college");
    	
		$array = array('XSM'=>$college);
    	
		$this->load->model("m_nstudent");
		$num = $this->m_nstudent->getNumALL($array);
		
		$offset = $this->uri->segment(4);
		$stu = $this->getStus($array,$offset);
    	
    	
    	$config['base_url'] = base_url() . 'index.php/admin/user/stuList';
    	$config['total_rows'] = $num;
    	$config['uri_segment'] = 4;
    	$this->pagination->initialize($config);
    	$data['page'] = $this->pagination->create_links();
        $data['num']=$num;

    	$data['stu'] = $stu;
    	
    	$this->load->view('common/header3');
    	$this->load->view('admin/user/stu', $data);
    	$this->load->view('common/footer');
	}
	
	public function teaList(){
		$this->timeOut();
    	$college =$this->session->userdata("college");
		$array = array('XSM'=>$college);
    	
		$this->load->model("m_nteacher");
		$num = $this->m_nteacher->getNumALL($array);
		$offset = $this->uri->segment(4);
		$tea = $this->getTeas($array,$offset);
    	
    	
    	$config['base_url'] = base_url() . 'index.php/admin/user/teaList';
    	$config['total_rows'] = $num;
    	$config['uri_segment'] = 4;
    	$this->pagination->initialize($config);
    	$data['page'] = $this->pagination->create_links();
        $data['num']=$num;

    	$data['tea'] = $tea;
    	
    	$this->load->view('common/header3');
    	$this->load->view('admin/user/tea', $data);
    	$this->load->view('common/footer');
	}
	
	
	
	
	
	
	function newsDetail(){
		$this->load->model("m_news");
		$news_id = $this->uri->segment(4);
		$news = $this->getNewsById($news_id);
		switch ($news->news_type_id){
			case 1:
				$list = "newsList";
				$title = "实习新闻";
				break;
			case 2:
				$list = "noticeList";
				$title = "通知公告";
				break;
			case 3:
				$list = "ruleList";
				$title = "实习规定";
				break;
			case 4:
				$list = "sumList";
				$title = "实习总结";
				break;
			case 5:
				$list = "imgList";
				$title = "实习风采";
				break;
			default:
				$list = "newsList";
				$title = "实习新闻";
				break;
		}
		$data['list']=$list;
		$data['title']=$title;
		$data["news"]=$news;
		
		$this->load->view('common/header3');
		$this->load->view('admin/news/newsDetail', $data);
		$this->load->view('common/footer');
	}
	
	function searchStu(){
		$college =$this->session->userdata("college");
		$array = array();
		
		$searchType=$this->input->post('selectType');
		$searchTerm=$this->input->post('searchTerm');
		if (!get_magic_quotes_gpc()) {
			$searchType1 = addslashes($searchType);
			$searchTerm1 = addslashes($searchTerm);
		}
		//echo $searchType;
		if ($searchType1 == '1') {
			$array = array('XH' => $searchTerm,'XSM'=>$college);
		} elseif ($searchType1 == '2') {
			$array = array('XM' => $searchTerm,'XSM'=>$college);
		} elseif ($searchType1 == '3') {
			$array = array('BM' => $searchTerm,'XSM'=>$college);
		}else{
			$array=array('XSM'=>$college);
		}
		//print_r($array);
		
		$this->load->model("m_nstudent");
		
		$stu = $this->getStu($array);
    	$data['stu'] = $stu;
    	
    	$this->load->view('common/header3');
    	$this->load->view('admin/user/stuResult', $data);
    	$this->load->view('common/footer');
	}
	
	function searchTea(){
		$college =$this->session->userdata("college");
		$array = array();
	
		$searchType=$this->input->post('selectType');
		$searchTerm=$this->input->post('searchTerm');
		if (!get_magic_quotes_gpc()) {
			$searchType1 = addslashes($searchType);
			$searchTerm1 = addslashes($searchTerm);
		}
		//echo $searchType;
		if ($searchType1 == '1') {
			$array = array('JSH' => $searchTerm,'XSM'=>$college);
		} elseif ($searchType1 == '2') {
			$array = array('JSM' => $searchTerm,'XSM'=>$college);
		} else{
			$array=array('XSM'=>$college);
		}
		//print_r($array);
	
		
	
		$tea = $this->getTea($array);
		$data['tea'] = $tea;
		 
		$this->load->view('common/header3');
		$this->load->view('admin/user/teaResult', $data);
		$this->load->view('common/footer');
	}
	
	
	
	
	public function getTeas($array,$offset) {
		$this->timeOut();
		$this->load->model('m_nteacher');
		$result = $this->m_nteacher->getTeasALL($array,PER_PAGE,$offset);
	
		$data = array();
		foreach ($result as $r) {
			$arr = array(
					'tea_num'=>$r->JSH,
					'tea_name'=>$r->JSM,
					'tea_title'=>$r->ZCSM,
					'tea_password'=>$r->MM,
					'tea_college'=>$r->XSM
	
			);
			array_push($data, $arr);
		}
		return $data;                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     
	}
	
	public function getStus($array,$offset) {
		$this->timeOut();
		$this->load->model('m_nstudent');
		$result = $this->m_nstudent->getStus($array,PER_PAGE,$offset);
	
		$data = array();
		foreach ($result as $r) {
			$arr = array(
					'stu_num'=>$r->XH,
					'stu_name'=>$r->XM,
					'stu_college'=>$r->XSM,
					'stu_major'=>$r->ZYM,
					'stu_class'=>$r->BM,
					'stu_grade'=>$r->NJMC,
					'stu_password'=>$r->MM
	
			);
			array_push($data, $arr);
		}
		return $data;
	}
	
	public function getStu($array) {
		$this->timeOut();
		$this->load->model('m_nstudent');
		$result = $this->m_nstudent->getStu($array);
	
		$data = array();
		foreach ($result as $r) {
			$arr = array(
					'stu_num'=>$r->XH,
					'stu_name'=>$r->XM,
					'stu_college'=>$r->XSM,
					'stu_major'=>$r->ZYM,
					'stu_class'=>$r->BM,
					'stu_grade'=>$r->NJMC,
					'stu_password'=>$r->MM
	
			);
			array_push($data, $arr);
		}
		return $data;
	}
	
	public function getTea($array) {
		$this->timeOut();
		$this->load->model('m_nteacher');
		$result = $this->m_nteacher->getTea($array);
	
		$data = array();
		foreach ($result as $r) {
			$arr = array(
					'tea_num'=>$r->JSH,
					'tea_name'=>$r->JSM,
					'tea_title'=>$r->ZCSM,
					'tea_password'=>$r->MM,
					'tea_college'=>$r->XSM
	
			);
			array_push($data, $arr);
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
