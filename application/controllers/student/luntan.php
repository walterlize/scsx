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

        $this->load->model('m_sluntan');
        $num = $this->m_sluntan->getNum1(array());
        $offset = $this->uri->segment(4);

        $data['luntan'] = $this->getLuntans($offset);
        $config['base_url'] = base_url() . 'index.php/student/luntan/luntanList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('student/luntan/luntan', $data);
        $this->load->view('common/footer');
    }

    public function cluntanList() {
        $this->load->model('m_sluntan');
        $num = $this->m_sluntan->getNum2(array());
        $offset = $this->uri->segment(4);

        $data['luntan'] = $this->sgetLuntans($offset);
        $config['base_url'] = base_url() . 'index.php/student/luntan/cluntanList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('student/luntan/sluntan', $data);
        $this->load->view('common/footer');
    }

    // 实验任务详细信息页面
    public function luntanDetail() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data = $this->getLuntan($id);


        $this->load->view('common/header3');
        $this->load->view('student/luntan/luntanDetail', $data);
        $this->load->view('common/footer');
    }

    // 实验任务详细信息页面
    public function luntanDetails() {
        $id = $this->uri->segment(4);
        $data = $this->sgetLuntan($id);

        $this->load->view('common/header3');
        $this->load->view('student/luntan/luntanDetails', $data);
        $this->load->view('common/footer');
    }

    // 实验任务信息编辑页面
    public function luntanEdit() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data['luntan'] = $this->getLuntan($id);
        $data['type'] =  $this->getTypes();

        $data['showActive'] = '';
        $data['showUnactive'] = 'display:none';

        $this->load->view('common/header3');
        $this->load->view('student/luntan/luntanEdit', $data);
        $this->load->view('common/footer');
    }

    // 实验任务详细信息新增页面
    public function luntanNew() {
        $this->timeOut();

        @$luntan->l_id = 0;
        $luntan->stuId = $this->session->userdata('u_id');
        $luntan->time1 = '';
        $luntan->content = '';
        $luntan->teaId = '';
        $luntan->time2 = '';
        $luntan->reply = '';
        $luntan->typeId = '';
        $luntan->theme = '';

        $data['luntan'] = $luntan;
        $data['type'] =  $this->getTypes();

        $data['show'] = 'display:none';
        $data['showActive'] = 'display:none';
        $data['showUnactive'] = 'display:none';

        $this->load->view('common/header3');
        $this->load->view('student/luntan/luntanEdit', $data);
        $this->load->view('common/footer');
    }

    public function luntanDelete() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $this->load->model('m_sluntan');
        $this->m_sluntan->delete($id);

        $num = $this->m_sluntan->getNum1(array());
        $offset = 0;

        $data['luntan'] = $this->getLuntans($offset);
        $config['base_url'] = base_url() . 'index.php/student/luntan/luntanList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('student/luntan/luntan', $data);
        $this->load->view('common/footer');
    }

    // 保存实验任务信息
    public function save() {
        $this->timeOut();

        $this->load->model('m_sluntan');
        $id = $this->m_sluntan->saveInfo();
        $data = $this->getLuntan($id);

        $this->load->view('common/header3');
        $this->load->view('student/luntan/luntanDetail', $data);
        $this->load->view('common/footer');
    }

    public function getTypes() {
        $this->load->model('m_type');
        $data = $this->m_type->getType(array());
        return $data;
    }
    // 分页获取全部实验任务信息
    public function getLuntans($offset) {
        $this->timeOut();
        $this->load->model('m_sluntan');
        $data = array();
        $result = $this->m_sluntan->getLuntans($data, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array('l_id' => $r->l_id, 'stuId' => $r->stuId, 'time1' => $r->time1,
                'content' => $r->content, 'teaId' => $r->teaId, 'time2' => $r->time2,
                'reply' => $r->reply,'typeId' => $r->typeId,'type' => $r->type,'theme' => $r->theme);
            array_push($data, $arr);
        }
        return $data;
    }

    public function sgetLuntans($offset) {
        $this->load->model('m_sluntan');
        $data = array();
        $result = $this->m_sluntan->sgetLuntans($data, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array('l_id' => $r->l_id, 
            		'stuId' => $r->stuId, 
            		'time1' => $r->time1,
                'content' => $r->content, 
            		'teaId' => $r->teaId, 
            		'time2' => $r->time2,
                
                'typeId' => $r->typeId,'theme' => $r->theme,'type' => $r->type);
            array_push($data, $arr);
        }
        return $data;
    }

    // 获取单个实验任务信息
    function getLuntan($id) {
        $this->load->model('m_sluntan');
        $result = $this->m_sluntan->getOneInfo($id);
        $data = array();
        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }
    
     // 获取单个实验任务信息
    function sgetLuntan($id) {
        $this->load->model('m_sluntan');
        $result = $this->m_sluntan->sgetOneInfo($id);
        $data = array();
        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }

    
    // session中的role不存在的时候退出系统
    function timeOut() {
        $role = $this->session->userdata('roleId');

        if ($role != 5) {
            $this->load->view('logout');
        }
    }

}

?>