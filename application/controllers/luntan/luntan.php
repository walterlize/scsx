<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Luntan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('pagination');
        ini_set('max_execution_time', '0');
        date_default_timezone_set('PRC');
    }

    public function luntan1List() {
        $this->load->model('m_luntan');
        $num = $this->m_luntan->getNum(array());
        $offset = $this->uri->segment(4);

        $data['luntan'] = $this->getLuntans1($offset);
        $config['base_url'] = base_url() . 'index.php/luntan/luntan/luntan1List';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/title');
        $this->load->view('luntan/luntan1', $data);
        $this->load->view('common/foot');
    }

    public function luntan2List() {
        $this->load->model('m_luntan');
        $num = $this->m_luntan->getNum(array());
        $offset = $this->uri->segment(4);

        $data['luntan'] = $this->getLuntans2($offset);
        $config['base_url'] = base_url() . 'index.php/luntan/luntan/luntan1List';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/title');
        $this->load->view('luntan/luntan2', $data);
        $this->load->view('common/foot');
    }

    // 实验任务详细信息页面
    public function luntanDetail1() {
        $id = $this->uri->segment(4);
        $data = $this->getLuntan1($id);

        $this->load->view('common/title');
        $this->load->view('luntan/luntanDetail1', $data);
        $this->load->view('common/foot');
    }

    // 实验任务详细信息页面
    public function luntanDetail2() {
        $id = $this->uri->segment(4);
        $data = $this->getLuntan2($id);

        $this->load->view('common/title');
        $this->load->view('luntan/luntanDetail2', $data);
        $this->load->view('common/foot');
    }

    public function getLuntans1($offset) {
        $this->load->model('m_luntan');
        $data = array();
        $result = $this->m_luntan->getLuntans1($data, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array('l_id' => $r->l_id, 'stuId' => $r->stuId, 'time1' => $r->time1,
                'content' => $r->content, 'teaId' => $r->teaId, 'time2' => $r->time2, 'srealname' => $r->srealname,
                'reply' => $r->reply,'typeId' => $r->typeId, 'type' => $r->type, 'theme' => $r->theme);
            array_push($data, $arr);
        }
        return $data;
    }

    public function getLuntans2($offset) {
        $this->load->model('m_luntan');
        $data = array();
        $result = $this->m_luntan->getLuntans2($data, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array('l_id' => $r->l_id, 'stuId' => $r->stuId, 'time1' => $r->time1,
                'content' => $r->content, 'teaId' => $r->teaId, 'time2' => $r->time2,
                'reply' => $r->reply, 'srealname' => $r->srealname, 'trealname' => $r->trealname,
                'sphone' => $r->sphone, 'semail' => $r->semail, 'sclass' => $r->sclass,
                'tphone' => $r->tphone, 'temail' => $r->temail, 'tclass' => $r->tclass,
                'typeId' => $r->typeId, 'type' => $r->type, 'theme' => $r->theme);
            array_push($data, $arr);
        }
        return $data;
    }

    // 获取单个实验任务信息
    function getLuntan1($id) {
        $this->load->model('m_luntan');
        $result = $this->m_luntan->getOneInfo1($id);
        $data = array();
        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }

    // 获取单个实验任务信息
    function getLuntan2($id) {
        $this->load->model('m_luntan');
        $result = $this->m_luntan->getOneInfo2($id);
        $data = array();
        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }
    // 获取查询结果
    public function results1() {
        $this->load->model('m_luntan');
        $num = $this->m_luntan->getNum(array());
        $config['base_url'] = base_url() . 'index.php/luntan/luntan/luntan1List';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

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
        $data['jieguo'] = $this->getResults1($searchtype, $searchterm, $offset);

        $this->load->view('common/title');
        $this->load->view('luntan/results1', $data);
        $this->load->view('common/foot');
    }

// 分页获取全部用户信息
    public function getResults1($searchtype, $searchterm, $offset) {
        $this->load->model('m_luntan');
        $data = array();
        $query = $this->m_luntan->getResults1($searchtype, $searchterm, $data, PER_PAGE, $offset);
        if (is_array($query)) {
            foreach ($query as $r) {
                $arr = array('l_id' => $r->l_id, 'stuId' => $r->stuId, 'time1' => $r->time1,
                'content' => $r->content, 'teaId' => $r->teaId, 'time2' => $r->time2, 'srealname' => $r->srealname,
                'reply' => $r->reply,'typeId' => $r->typeId, 'type' => $r->type, 'theme' => $r->theme);
            array_push($data, $arr);
            }
            return $data;
        }
    }
    // 获取查询结果
    public function results2() {
        $this->load->model('m_luntan');
        $num = $this->m_luntan->getNum(array());
        $config['base_url'] = base_url() . 'index.php/luntan/luntan/luntan2List';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

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
        $data['jieguo'] = $this->getResults2($searchtype, $searchterm, $offset);

        $this->load->view('common/title');
        $this->load->view('luntan/results2', $data);
        $this->load->view('common/foot');
    }

// 分页获取全部用户信息
    public function getResults2($searchtype, $searchterm, $offset) {
        $this->load->model('m_luntan');
        $data = array();
        $query = $this->m_luntan->getResults2($searchtype, $searchterm, $data, PER_PAGE, $offset);
        if (is_array($query)) {
            foreach ($query as $r) {
                $arr = array('l_id' => $r->l_id, 'stuId' => $r->stuId, 'time1' => $r->time1,
                'content' => $r->content, 'teaId' => $r->teaId, 'time2' => $r->time2,
                'reply' => $r->reply, 'srealname' => $r->srealname, 'trealname' => $r->trealname,
                'sphone' => $r->sphone, 'semail' => $r->semail, 'sclass' => $r->sclass,
                'tphone' => $r->tphone, 'temail' => $r->temail, 'tclass' => $r->tclass,
                'typeId' => $r->typeId, 'type' => $r->type, 'theme' => $r->theme);
            array_push($data, $arr);
            }
            return $data;
        }
    }

}

?>