<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Imgnews extends CI_Controller {

    function __construct()
	{
            parent::__construct();
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->library('session');
            $this->load->library('pagination');
	}

	
	public function imgList(){
		$this->timeOut();
		//print_r($this->session->all_userdata());
		 
		$array = array('news_type_id'=>5);
		 
		$this->load->model("m_news");
		$num = $this->m_news->getNum($array);
		$offset = $this->uri->segment(4);
		$news = $this->getNews($array,$offset);
		 
		$config['base_url'] = base_url() . 'index.php/admin/imgnews/imgList';
		$config['total_rows'] = $num;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$data['page'] = $this->pagination->create_links();
		$data['num']=$num;
	
		$data['news'] = $news;
		$data['title'] = "实习风采";
		$data['type']='5';
		$this->load->view('common/header3');
		$this->load->view('admin/img/img', $data);
		$this->load->view('common/footer');
	}
	
	public function imgNew(){
		$this->timeOut();
		
		
		@$news->news_id=0;
		$news->news_title = '';
		$news->news_time = date("Y-m-d H:m:s");
		$news->news_content = '';
		$news->news_keywords = '';
		$news->news_img = '';
		$news->news_auther_id = $this->session->userdata("u_num");
		$news->news_auther = $this->session->userdata("realname");
		$news->news_auditer_id = '';
		$news->news_auditer='';
		$news->news_audit = 6;
		$news->news_audit_date ='';
		$news->news_type_id=5;
		$news->news_college = $this->session->userdata("college");
		$news->news_count=0;
		
		
		
		$data["news"]=$news;
		$data["show"]="display:none";
		
		$this->load->view('common/header3');
		$this->load->view('admin/img/imgEdit', $data);
		$this->load->view('common/footer');
	}
	
	function save(){
		$this->timeOut();
		
		$this->load->model("m_news");
		$news_id = $this->m_news->saveInfo();
		$news = $this->getNewsById($news_id);
		$data["news"]=$news;
		
		$this->load->view('common/header3');
		$this->load->view('admin/img/imgDetail', $data);
		$this->load->view('common/footer');
		
	}
	
	function imgDetail(){
		$this->load->model("m_news");
		$news_id = $this->uri->segment(4);
		$news = $this->getNewsById($news_id);
		
		$data["news"]=$news;
		
		$this->load->view('common/header3');
		$this->load->view('admin/img/imgDetail', $data);
		$this->load->view('common/footer');
	}
	function imgDelete(){
		$news_id = $this->uri->segment(4);
		$this->load->model("m_news");
		$news = $this->getNewsById($news_id);
		$this->m_news->deleteNews($news_id);
		
	
		
		redirect("admin/imgnews/imgList");
		
		
	}
	
	
	function imgEdit(){
		$this->timeOut();
		$news_id = $this->uri->segment(4);
		$news = $this->getNewsById($news_id);
		
		$data["news"]=$news;
	
		$this->load->view('common/header3');
		$this->load->view('admin/img/imgEdit', $data);
		$this->load->view('common/footer');
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
	
		if ($role != 2) {
			$this->load->view('logout');
		}
	}


       

}
?>
