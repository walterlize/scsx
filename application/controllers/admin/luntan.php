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

    public function luntanList() {
        $this->timeOut();

        $this->load->model('m_aluntan');
        $num = $this->m_aluntan->getNum(array());
        $offset = $this->uri->segment(4);

        $data['luntan'] = $this->getLuntans($offset);
        $config['base_url'] = base_url() . 'index.php/admin/luntan/luntanList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('admin/luntan/luntan', $data);
        $this->load->view('common/footer');
    }

   
    // 实验任务详细信息页面
    public function luntanDetail() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data = $this->getLuntan($id);

        $this->load->view('common/header3');
        $this->load->view('admin/luntan/luntanDetail', $data);
        $this->load->view('common/footer');
    }

   
    public function luntanDelete() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $this->load->model('m_aluntan');
        $this->m_aluntan->delete($id);

        $num = $this->m_aluntan->getNum(array());
        $offset = 0;

        $data['luntan'] = $this->getLuntans($offset);
        $config['base_url'] = base_url() . 'index.php/admin/luntan/luntanList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('admin/luntan/luntan', $data);
        $this->load->view('common/footer');
    }


    public function getLuntans($offset) {
        $this->load->model('m_aluntan');
        $data = array();
        $result = $this->m_aluntan->getLuntans($data, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array('l_id' => $r->l_id, 'stuId' => $r->stuId, 'time1' => $r->time1,
                'content' => $r->content, 'teaId' => $r->teaId, 'time2' => $r->time2,
                'reply' => $r->reply,
                
                
                'typeId' => $r->typeId, 'type' => $r->type, 'theme' => $r->theme);
            array_push($data, $arr);
        }
        return $data;
    }

    // 获取单个实验任务信息
    function getLuntan($id) {
        $this->load->model('m_aluntan');
        $result = $this->m_aluntan->getOneInfo($id);
        $data = array();
        foreach ($result as $r) {
            $data = $r;
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