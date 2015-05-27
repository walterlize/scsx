<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Choose_teacher extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('pagination');
        ini_set('max_execution_time', '0');
        date_default_timezone_set('PRC');
    }

    public function choose_teacherList() {
        $this->timeOut();

        $this->load->model('m_choose_teacher');
        $num = $this->m_choose_teacher->getNum(array());
        $offset = $this->uri->segment(4);

        $data['choose_teacher'] = $this->getChoose_teachers($offset);
        $config['base_url'] = base_url() . 'index.php/admin/choose_teacher/choose_teacherList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('admin/choose_teacher/choose_teacher', $data);
        $this->load->view('common/footer');
    }
    
    public function choose_teacherLists() {
        $this->load->model('m_choose_teacher');
        $num = $this->m_choose_teacher->getNum(array());
        $offset = $this->uri->segment(4);

        $data['choose_teacher'] = $this->sgetChoose_teachers($offset);
        $config['base_url'] = base_url() . 'index.php/admin/choose_teacher/choose_teacherLists';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/title');
        $this->load->view('admin/choose_teacher/schoose_teacher', $data);
        $this->load->view('common/foot');
    }

    // 实验任务详细信息页面
    public function choose_teacherDetail() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data = $this->getChoose_teacher($id);


        $this->load->view('common/header3');
        $this->load->view('admin/choose_teacher/choose_teacherDetail', $data);
        $this->load->view('common/footer');
    }

    // 实验任务详细信息页面
    public function choose_teacherDetails() {
        $id = $this->uri->segment(4);
        $data = $this->getChoose_teacher($id);

        $this->load->view('common/title');
        $this->load->view('admin/choose_teacher/choose_teacherDetails', $data);
        $this->load->view('common/foot');
    }
    // 实验任务信息编辑页面
    public function choose_teacherEdit() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data['choose_teacher'] = $this->getChoose_teacher($id);
        $data['company'] = $this->getCompany();
        $data['users'] = $this->getUsers();

        $data['showActive'] = '';
        $data['showUnactive'] = 'display:none';

        $this->load->view('common/header3');
        $this->load->view('admin/choose_teacher/choose_teacherEdit', $data);
        $this->load->view('common/footer');
    }

    // 实验任务详细信息新增页面
    public function choose_teacherNew() {
        $this->timeOut();

        @$choose_teacher->c_id = 0;
        $choose_teacher->u_id = '';
        $choose_teacher->comId = '';
        $choose_teacher->userId = '';

        $data['choose_teacher'] = $choose_teacher;
        $data['company'] = $this->getCompany();
        $data['users'] = $this->getUsers();

        $data['show'] = 'display:none';
        $data['showActive'] = 'display:none';
        $data['showUnactive'] = 'display:none';

        $this->load->view('common/header3');
        $this->load->view('admin/choose_teacher/choose_teacherEdit', $data);
        $this->load->view('common/footer');
    }

    public function getUsers() {
        $this->load->model('m_user');
        $data = $this->m_user->getTeacher(array());
        return $data;
    }

    public function getCompany() {
        $this->load->model('m_company');
        $data = $this->m_company->getCompany(array());
        return $data;
    }
    
    public function choose_teacherDelete() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $this->load->model('m_choose_teacher');
        $this->m_choose_teacher->delete($id);
        $num = $this->m_choose_teacher->getNum(array());
        $offset = 0;

        $data['choose_teacher'] = $this->getChoose_teachers($offset);
        $config['base_url'] = base_url() . 'index.php/admin/choose_teacher/choose_teacherList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('admin/choose_teacher/choose_teacher', $data);
        $this->load->view('common/footer');
    }

    // 保存实验任务信息
    public function save() {
        $this->timeOut();

        $this->load->model('m_choose_teacher');
        $id = $this->m_choose_teacher->saveInfo();
        $data = $this->getChoose_teacher($id);

        $this->load->view('common/header3');
        $this->load->view('admin/choose_teacher/choose_teacherDetail', $data);
        $this->load->view('common/footer');
    }

    // 分页获取全部实验任务信息
    public function getChoose_teachers($offset) {
        $this->timeOut();
        $this->load->model('m_choose_teacher');
        $data = array();
        $result = $this->m_choose_teacher->getChoose_teachers($data, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array('comId' => $r->comId, 'c_id' => $r->c_id, 'u_id' => $r->u_id,'state' => $r->state,
                'comName' => $r->comName, 'yaddress' => $r->yaddress,'yphone' => $r->yphone, 'yemail' => $r->yemail,
                'content' => $r->content, 'plan' => $r->plan,'u_name' => $r->u_name, 'roleId' => $r->roleId,
                'password' => $r->password, 'realname' => $r->realname,'phone' => $r->phone, 'email' => $r->email,
                'address' => $r->address, 'classId' => $r->classId,'trealname' => $r->trealname,'userId' => $r->userId,
                'sex' => $r->sex, 'ustateId' => $r->ustateId,'collegeId' => $r->collegeId,'ysex' => $r->ysex,
                'yu_id' => $r->yu_id, 'stateId' => $r->stateId,'p_id' => $r->p_id,'yu_name' => $r->yu_name,
                'ypassword' => $r->ypassword, 'yrealname' => $r->yrealname,'p_name' => $r->p_name,'patternId' => $r->patternId,
                'depart' => $r->depart, 'pattern' => $r->pattern,'ycollegeId' => $r->ycollegeId,'class' => $r->class);
            array_push($data, $arr);
        }
        return $data;
    }
    // 分页获取全部实验任务信息
    public function sgetChoose_teachers($offset) {
        $this->load->model('m_choose_teacher');
        $data = array();
        $result = $this->m_choose_teacher->getChoose_teachers($data, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array('comId' => $r->comId, 'c_id' => $r->c_id, 'u_id' => $r->u_id,
                'comName' => $r->comName, 'caddress' => $r->caddress,'cphone' => $r->cphone, 'cemail' => $r->cemail,
                'content' => $r->content, 'plan' => $r->plan,'u_name' => $r->u_name, 'roleId' => $r->roleId,
                'password' => $r->password, 'realname' => $r->realname,'phone' => $r->phone, 'email' => $r->email,
                'address' => $r->address, 'class' => $r->class,'ttrealname' => $r->ttrealname,'userId' => $r->userId);
            array_push($data, $arr);
        }
        return $data;
    }

    // 获取单个实验任务信息
    function getChoose_teacher($id) {
        $this->load->model('m_choose_teacher');
        $result = $this->m_choose_teacher->getOneInfo($id);
        $data = array();
        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }

    // 获取查询结果
    public function results() {
        $this->timeOut();
        $this->load->model('m_choose_teacher');

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
        $this->load->view('admin/choose_teacher/results', $data);
        $this->load->view('common/footer');
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