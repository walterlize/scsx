<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mission extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('pagination');
        ini_set('max_execution_time', '0');
        date_default_timezone_set('PRC');
    }

    public function missionList() {
        $this->timeOut();

        $this->load->model('m_mission');
        $num = $this->m_mission->getNum(array());
        $offset = $this->uri->segment(4);

        $data['mission'] = $this->getMissions($offset);
        $config['base_url'] = base_url() . 'index.php/teacher/mission/missionList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('teacher/mission/mission', $data);
        $this->load->view('common/footer');
    }

    // 实验任务详细信息页面
    public function missionDetail() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data = $this->getMission($id);


        $this->load->view('common/header3');
        $this->load->view('teacher/mission/missionDetail', $data);
        $this->load->view('common/footer');
    }

    // 实验任务信息编辑页面
    public function missionEdit() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data['mission'] = $this->getMission($id);

        $data['showActive'] = '';
        $data['showUnactive'] = 'display:none';

        $this->load->view('common/header3');
        $this->load->view('teacher/mission/missionEdit', $data);
        $this->load->view('common/footer');
    }

    // 实验任务详细信息新增页面
    public function missionNew() {
        $this->timeOut();

        @$mission->m_id = 0;
        $mission->teaId = $this->session->userdata('u_id');
        $mission->content = '';
        $mission->workTime = '';
        $mission->title = '';

        $data['mission'] = $mission;

        $data['show'] = 'display:none';
        $data['showActive'] = 'display:none';
        $data['showUnactive'] = 'display:none';

        $this->load->view('common/header3');
        $this->load->view('teacher/mission/missionEdit', $data);
        $this->load->view('common/footer');
    }

    public function missionDelete() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $this->load->model('m_mission');
        $this->m_mission->delete($id);

        $num = $this->m_mission->getNum(array());
        $offset = 0;

        $data['mission'] = $this->getMissions($offset);
        $config['base_url'] = base_url() . 'index.php/teacher/mission/missionList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('teacher/mission/mission', $data);
        $this->load->view('common/footer');
    }

    // 保存实验任务信息
    public function save() {
        $this->timeOut();

        $this->load->model('m_mission');
        $id = $this->m_mission->saveInfo();
        $data = $this->getMission($id);

        $this->load->view('common/header3');
        $this->load->view('teacher/mission/missionDetail', $data);
        $this->load->view('common/footer');
    }

    // 分页获取全部实验任务信息
    public function getMissions($offset) {
        $this->timeOut();
        $this->load->model('m_mission');
        $data = array();
        $result = $this->m_mission->getMissions($data, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array(
            		'm_id' => $r->m_id, '
            		teaId' => $r->teaId,
                    'content' => $r->content,
            		 'workTime' => $r->workTime, 
            		'title' => $r->title);
            array_push($data, $arr);
        }
        return $data;
    }

    // 获取单个实验任务信息
    function getMission($id) {
        $this->load->model('m_mission');
        $result = $this->m_mission->getOneInfo($id);
        $data = array();
        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
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