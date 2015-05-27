<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class News extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('pagination');
        ini_set('max_execution_time', '0');
        date_default_timezone_set('PRC');
    }

    public function newsList() {
        $this->timeOut();

        $this->load->model('m_news');
        $num = $this->m_news->getNum1(array());
        $offset = $this->uri->segment(4);

        $data['news'] = $this->getNewss($offset);
        $config['base_url'] = base_url() . 'index.php/admin/news/newsList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('admin/news/news', $data);
        $this->load->view('common/footer');
    }

    public function newsLists() {
        $this->load->model('m_news');
        $num = $this->m_news->getNum5(array());
        $offset = $this->uri->segment(4);

        $data['news'] = $this->getNews1($offset);
        $config['base_url'] = base_url() . 'index.php/admin/news/newsLists';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/title');
        $this->load->view('admin/news/snews1', $data);
        $this->load->view('common/foot');
    }
    public function noticeLists() {
        $this->load->model('m_news');
        $num = $this->m_news->getNum2(array());
        $offset = $this->uri->segment(4);

        $data['news'] = $this->getNews2($offset);
        $config['base_url'] = base_url() . 'index.php/admin/news/noticeLists';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/title');
        $this->load->view('admin/news/snews2', $data);
        $this->load->view('common/foot');
    }
    public function guidingLists() {
        $this->load->model('m_news');
        $num = $this->m_news->getNum3(array());
        $offset = $this->uri->segment(4);

        $data['news'] = $this->getNews3($offset);
        $config['base_url'] = base_url() . 'index.php/admin/news/guidingLists';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/title');
        $this->load->view('admin/news/snews3', $data);
        $this->load->view('common/foot');
    }
    public function summaryLists() {
        $this->load->model('m_news');
        $num = $this->m_news->getNum4(array());
        $offset = $this->uri->segment(4);

        $data['news'] = $this->getNews4($offset);
        $config['base_url'] = base_url() . 'index.php/admin/news/summaryLists';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/title');
        $this->load->view('admin/news/snews4', $data);
        $this->load->view('common/foot');
    }

    // 实验任务详细信息页面
    public function newsDetail() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data = $this->getNews($id);

        $this->load->view('common/header3');
        $this->load->view('admin/news/newsDetail', $data);
        $this->load->view('common/footer');
    }

    // 实验任务详细信息页面
    public function newsDetails1() {
        $id = $this->uri->segment(4);
        $data = $this->getNews($id);

        $this->load->view('common/title');
        $this->load->view('admin/news/newsDetails1', $data);
        $this->load->view('common/foot');
    }
    public function newsDetails2() {
        $id = $this->uri->segment(4);
        $data = $this->getNews($id);

        $this->load->view('common/title');
        $this->load->view('admin/news/newsDetails2', $data);
        $this->load->view('common/foot');
    }
    public function newsDetails3() {
        $id = $this->uri->segment(4);
        $data = $this->getNews($id);

        $this->load->view('common/title');
        $this->load->view('admin/news/newsDetails3', $data);
        $this->load->view('common/foot');
    }
    public function newsDetails4() {
        $id = $this->uri->segment(4);
        $data = $this->getNews($id);

        $this->load->view('common/title');
        $this->load->view('admin/news/newsDetails4', $data);
        $this->load->view('common/foot');
    }

    // 实验任务信息编辑页面
    public function newsEdit() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data['news'] = $this->getNews($id);
        $data['kind'] = $this->getKind();

        $data['showActive'] = '';
        $data['showUnactive'] = 'display:none';

        $this->load->view('common/header3');
        $this->load->view('admin/news/newsEdit', $data);
        $this->load->view('common/footer');
    }

    // 实验任务详细信息新增页面
    public function newsNew() {
        $this->timeOut();

        @$news->newsId = 0;
        $news->title = '';
        $news->sendTime = '';
        $news->content = '';
        $news->k_id = '';
        $news->addName = '';
    	$news->addCollege ='';
    	$news->browse=0;

        $data['news'] = $news;
        $data['kind'] = $this->getKind();

        $data['show'] = 'display:none';
        $data['showActive'] = 'display:none';
        $data['showUnactive'] = 'display:none';

        $this->load->view('common/header3');
        $this->load->view('admin/news/newsEdit', $data);
        $this->load->view('common/footer');
    }

    public function newsDelete() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $this->load->model('m_news');
        $this->m_news->delete($id);

        $num = $this->m_news->getNum1(array());
        $offset = 0;

        $data['news'] = $this->getNewss($offset);
        $config['base_url'] = base_url() . 'index.php/admin/news/newsList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('admin/news/news', $data);
        $this->load->view('common/footer');
    }

    // 保存实验任务信息
    public function save() {
        $this->timeOut();

        $this->load->model('m_news');
        $id = $this->m_news->saveInfo();
        $data = $this->getNews($id);

        $this->load->view('common/header3');
        $this->load->view('admin/news/newsDetail', $data);
        $this->load->view('common/footer');
    }

    public function getKind() {
        $this->load->model('m_news');
        $data = $this->m_news->getKind(array());
        return $data;
    }
    
    // 分页获取全部实验任务信息
    public function getNewss($offset) {
        $this->timeOut();
        $this->load->model('m_news');
        $data = array();
        $result = $this->m_news->getNewss($data, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array('newsId' => $r->newsId, 'title' => $r->title, 'sendTime' => $r->sendTime,
                'content' => $r->content,'k_id' => $r->k_id,'kind' => $r->kind);
            array_push($data, $arr);
        }
        return $data;
    }

    public function getNews1($offset) {
        $this->load->model('m_news');
        $data = array();
        $result = $this->m_news->getNew1($data, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array('newsId' => $r->newsId, 'title' => $r->title, 'sendTime' => $r->sendTime,
                'content' => $r->content,'k_id' => $r->k_id,'kind' => $r->kind);
            array_push($data, $arr);
        }
        return $data;
    }
    public function getNews2($offset) {
        $this->load->model('m_news');
        $data = array();
        $result = $this->m_news->getNew2($data, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array('newsId' => $r->newsId, 'title' => $r->title, 'sendTime' => $r->sendTime,
                'content' => $r->content,'k_id' => $r->k_id,'kind' => $r->kind);
            array_push($data, $arr);
        }
        return $data;
    }
    public function getNews3($offset) {
        $this->load->model('m_news');
        $data = array();
        $result = $this->m_news->getNew3($data, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array('newsId' => $r->newsId, 'title' => $r->title, 'sendTime' => $r->sendTime,
                'content' => $r->content,'k_id' => $r->k_id,'kind' => $r->kind);
            array_push($data, $arr);
        }
        return $data;
    }public function getNews4($offset) {
        $this->load->model('m_news');
        $data = array();
        $result = $this->m_news->getNew4($data, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array('newsId' => $r->newsId, 'title' => $r->title, 'sendTime' => $r->sendTime,
                'content' => $r->content,'k_id' => $r->k_id,'kind' => $r->kind);
            array_push($data, $arr);
        }
        return $data;
    }

    // 获取单个实验任务信息
    function getNews($id) {
        $this->load->model('m_news');
        $result = $this->m_news->getOneInfo($id);
        $data = array();
        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }

    // 获取查询结果
    public function results() {
        $this->timeOut();
        $this->load->model('m_news');

        $searchtype = $_POST['searchtype'];
        $searchterm = trim($_POST['searchterm']);
        if (!$searchtype || !$searchterm) {
            echo "您未填写内容，请返回并重试！";
            exit;
        }
        if (!get_magic_quotes_gpc()) {
            $searchtype = addslashes($searchtype);
            $searchterm = addslashes($searchterm);
        }

        //  $query = "select * from mission where " . $searchtype . " like %" . $searchterm . "%";
        $offset = $this->uri->segment(4);
        $data['jieguo'] = $this->getResults($searchtype, $searchterm, $offset);

        $this->load->view('common/header3');
        $this->load->view('admin/news/results', $data);
        $this->load->view('common/footer');
    }

    // 分页获取全部用户信息
    public function getResults($searchtype, $searchterm, $offset) {
        $this->timeOut();
        $this->load->model('m_news');
        $data = array();
        $query = $this->m_news->getResults($searchtype, $searchterm, $data, PER_PAGE, $offset);
        if (is_array($query)) {
            foreach ($query as $r) {
                $arr = array('newsId' => $r->newsId, 'title' => $r->title, 'sendTime' => $r->sendTime,
                    'content' => $r->content,'k_id' => $r->k_id,'kind' => $r->kind);
                array_push($data, $arr);
            }
            return $data;
        }
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