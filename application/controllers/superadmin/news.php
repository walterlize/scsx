<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {

    function __construct()
	{
            parent::__construct();
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->library('session');
            $this->load->library('pagination');
	}

	public function newsList(){
		$this->timeOut();
    	
		$array = array('news_type_id'=>1);
    	
		$this->load->model("m_news");
		$num = $this->m_news->getNum($array);
		$offset = $this->uri->segment(4);
		$news = $this->getNews($array,$offset);
    	
    	
    	$config['base_url'] = base_url() . 'index.php/superadmin/news/newsList';
    	$config['total_rows'] = $num;
    	$config['uri_segment'] = 4;
    	$this->pagination->initialize($config);
    	$data['page'] = $this->pagination->create_links();
        $data['num']=$num;

    	$data['news'] = $news;
    	$data['title'] = "实习新闻";
    	$data['type']='1';
    	$this->load->view('common/header3');
    	$this->load->view('superadmin/news/news', $data);
    	$this->load->view('common/footer');
	}
	
	public function noticeList(){
		$this->timeOut();
		 
		$array = array('news_type_id'=>2);
		 
		$this->load->model("m_news");
		$num = $this->m_news->getNum($array);
		$offset = $this->uri->segment(4);
		$news = $this->getNews($array,$offset);
		 
		 
		$config['base_url'] = base_url() . 'index.php/superadmin/news/newsList';
		$config['total_rows'] = $num;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$data['page'] = $this->pagination->create_links();
		$data['num']=$num;
	
		$data['news'] = $news;
		$data['title'] = "通知公告";
		$data['type']='2';
		$this->load->view('common/header3');
		$this->load->view('superadmin/news/news', $data);
		$this->load->view('common/footer');
	}
	
	public function ruleList(){
		$this->timeOut();
		 
		$array = array('news_type_id'=>3);
		 
		$this->load->model("m_news");
		$num = $this->m_news->getNum($array);
		$offset = $this->uri->segment(4);
		$news = $this->getNews($array,$offset);
		 
		 
		$config['base_url'] = base_url() . 'index.php/superadmin/news/newsList';
		$config['total_rows'] = $num;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$data['page'] = $this->pagination->create_links();
		$data['num']=$num;
	
		$data['news'] = $news;
		$data['title'] = "实习规定";
		$data['type']='3';
		$this->load->view('common/header3');
		$this->load->view('superadmin/news/news', $data);
		$this->load->view('common/footer');
	}
	
	public function sumList(){
		$this->timeOut();
		 
		$array = array('news_type_id'=>4);
		 
		$this->load->model("m_news");
		$num = $this->m_news->getNum($array);
		$offset = $this->uri->segment(4);
		$news = $this->getNews($array,$offset);
		 
		 
		$config['base_url'] = base_url() . 'index.php/superadmin/news/newsList';
		$config['total_rows'] = $num;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$data['page'] = $this->pagination->create_links();
		$data['num']=$num;
	
		$data['news'] = $news;
		$data['title'] = "实习总结";
		$data['type']='4';
		$this->load->view('common/header3');
		$this->load->view('superadmin/news/news', $data);
		$this->load->view('common/footer');
	}
	
	
	
	public function newsNew(){
		$this->timeOut();
		$news_type = $this->uri->segment(4);
		
		@$news->news_id=0;
		$news->news_title = '';
		$news->news_time = date("Y-m-d H:m:s");
		$news->news_content = '';
		$news->news_keywords = '';
		$news->news_img = '';
		$news->news_auther_id = $this->session->userdata("u_num");
		$news->news_auther = $this->session->userdata("realname");
		$news->news_auditer_id =  $this->session->userdata("u_num");
		$news->news_auditer=$this->session->userdata("realname");
		$news->news_audit = 6;
		$news->news_audit_date ='';
		$news->news_type_id=$news_type;
		$news->news_college = $this->session->userdata("college");
		$news->news_count=0;
		
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
			
			default:
				$list = "newsList";
				$title = "实习新闻";
				break;
		}
		$data['list']=$list;
		$data['title']=$title;
		
		$data["news"]=$news;
		$data["show"]="display:none";
		
		$this->load->view('common/header3');
		$this->load->view('superadmin/news/newsEdit', $data);
		$this->load->view('common/footer');
	}
	
	function save(){
		$this->timeOut();
		
		$this->load->model("m_news");
		$news_id = $this->m_news->saveInfo();
		$news = $this->getNewsById($news_id);
		$admin_num = $this->session->userdata("u_num");
		if($news->news_auther_id == $admin_num) $flag =1;
		else $flag=0;
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
			
			default:
				$list = "newsList";
				$title = "实习新闻";
				break;
		}
		$data['list']=$list;
		$data['title']=$title;
		$data["news"]=$news;
		$data['flag']=$flag;
		$this->load->view('common/header3');
		$this->load->view('superadmin/news/newsDetail', $data);
		$this->load->view('common/footer');
		
	}
	
	function newsDetail(){
		$this->load->model("m_news");
		
		$news_id = $this->uri->segment(4);
		$news = $this->getNewsById($news_id);
		$admin_num = $this->session->userdata("u_num");
		
		if($news->news_auther_id == $admin_num) $flag =1;
		else $flag=0; 
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
			
			default:
				$list = "newsList";
				$title = "实习新闻";
				break;
		}
		$data['list']=$list;
		$data['title']=$title;
		$data['flag']=$flag;
		$data["news"]=$news;
		
		$this->load->view('common/header3');
		$this->load->view('superadmin/news/newsDetail', $data);
		$this->load->view('common/footer');
	}
	function newsDelete(){
		$news_id = $this->uri->segment(4);
		$this->load->model("m_news");
		$news = $this->getNewsById($news_id);
		$this->m_news->deleteNews($news_id);
		
	switch ($news->news_type_id){
			case 1:
				$list = "newsList";
				break;
			case 2:
				$list = "noticeList";
				break;
			case 3:
				$list = "ruleList";
				break;
			case 4:
				$list = "sumList";
				break;
			
			default:
				$list = "newsList";
				break;
		}
		
		redirect("superadmin/news/".$list);
		
		
	}
	
	function newsEdit(){
		$this->timeOut();
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
		$this->load->view('superadmin/news/newsEdit', $data);
		$this->load->view('common/footer');
	}
	
	function newsSuccess(){
		$this->timeOut();
		
		$news_id = $this->uri->segment(4);
		$admin_num = $this->session->userdata("u_num");
		$admin_name = $this->session->userdata("realname");
		$time = date("Y-m-d H:m:s");
		$array = array('news_audit'=>6,'news_auditer_id'=>$admin_num,'news_auditer'=>$admin_name,'news_audit_date'=>$time);
		$this->load->model('m_news');
		$this->m_news->updateNews($news_id, $array);
		
		redirect('superadmin/news/newsDetail/'.$news_id);
	}
	
	function newsFail(){
		$this->timeOut();
	
		$news_id = $this->uri->segment(4);
		$admin_num = $this->session->userdata("u_num");
		$admin_name = $this->session->userdata("realname");
		$time = date("Y-m-d H:m:s");
		$array = array('news_audit'=>7,'news_auditer_id'=>$admin_num,'news_auditer'=>$admin_name,'news_audit_date'=>$time);
		
		$this->load->model('m_news');
		$this->m_news->updateNews($news_id, $array);
	
		redirect('superadmin/news/newsDetail/'.$news_id);
	}
	
	
	public function getNewsById($id){
		$this->load->model("m_news");
		$result = $this->m_news->getNewsById($id);
		$data = array();
		foreach ($result as $r){
			$data = $r;
		}
		return $data;
		
	}
	
	
	
	
	
	public function getNews($array,$offset) {
		$this->timeOut();
		$this->load->model('m_news');
		$result = $this->m_news->getNewss($array,PER_PAGE,$offset);
	
		$data = array();
		foreach ($result as $r) {
			$arr = array(
					'news_id' => $r->news_id,
					'news_title' => $r->news_title,
					'news_time'=> $r->news_time,
					'news_auditer_id'=>$r->news_auditer,
					'news_keywords'=>$r->news_keywords,
					'usta_type'=>$r->usta_type
	
			);
			array_push($data, $arr);
		}
		return $data;                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     
	}
	
	// session中的role不存在的时候退出系统
	function timeOut() {
		$role = $this->session->userdata('roleId');
	
		if ($role != 1) {
			$this->load->view('logout');
		}
	}


       

}
?>
