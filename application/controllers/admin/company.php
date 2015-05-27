<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Company extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('pagination');
        ini_set('max_execution_time', '0');
        date_default_timezone_set('PRC');
    }

    public function companyList() {
        $this->timeOut();

        $this->load->model('m_company');
        $num = $this->m_company->getNum(array());
        $offset = $this->uri->segment(4);

        $data['company'] = $this->getCompanys($offset);
        $config['base_url'] = base_url() . 'index.php/admin/company/companyList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('admin/company/company', $data);
        $this->load->view('common/footer');
    }

    public function companyLists() {
        $this->load->model('m_company');
        $num = $this->m_company->getNum(array());
        $offset = $this->uri->segment(4);

        $data['company'] = $this->sgetCompanys($offset);
        $config['base_url'] = base_url() . 'index.php/admin/company/companyLists';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/title');
        $this->load->view('admin/company/scompany', $data);
        $this->load->view('common/foot');
    }

    // 实验任务详细信息页面
    public function companyDetail() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data = $this->getCompany($id);


        $this->load->view('common/header3');
        $this->load->view('admin/company/companyDetail', $data);
        $this->load->view('common/footer');
    }

    // 实验任务详细信息页面
    public function companyDetails() {
        $id = $this->uri->segment(4);
        $data = $this->getCompany($id);

        $this->load->view('common/title');
        $this->load->view('admin/company/companyDetails', $data);
        $this->load->view('common/foot');
    }

    // 实验任务信息编辑页面
    public function companyEdit() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data['company'] = $this->getCompany($id);
        $data['users'] = $this->getUsers();
        $data['state'] = $this->getStates();
        $data['program'] = $this->getPrograms();

        $data['showActive'] = '';
        $data['showUnactive'] = 'display:none';

        $this->load->view('common/header3');
        $this->load->view('admin/company/companyEdit', $data);
        $this->load->view('common/footer');
    }

    // 实验任务详细信息新增页面
    public function companyNew() {
        $this->timeOut();

        @$company->comId = 0;
        $company->comName = '';
        $company->content = '';
        $company->plan = '';
        $company->u_id = '';
        $company->stateId = 5;
        $company->p_id = '';

        $data['company'] = $company;
        $data['users'] = $this->getUsers();
        $data['state'] = $this->getStates();
        $data['program'] = $this->getPrograms();

        $data['show'] = 'display:none';
        $data['showActive'] = 'display:none';
        $data['showUnactive'] = 'display:none';

        $this->load->view('common/header3');
        $this->load->view('admin/company/companyEdit', $data);
        $this->load->view('common/footer');
    }

    public function companyDelete() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $this->load->model('m_company');
        $this->m_company->delete($id);

        $num = $this->m_company->getNum(array());
        $offset = 0;

        $data['company'] = $this->getCompanys($offset);
        $config['base_url'] = base_url() . 'index.php/admin/company/companyList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('admin/company/company', $data);
        $this->load->view('common/footer');
    }

    // 保存实验任务信息
    public function save() {
        $this->timeOut();

        $this->load->model('m_company');
        $id = $this->m_company->saveInfo();
        $data = $this->getCompany($id);

        $this->load->view('common/header3');
        $this->load->view('admin/company/companyDetail', $data);
        $this->load->view('common/footer');
    }

    // 分页获取全部实验任务信息
    public function getCompanys($offset) {
        $this->timeOut();
        $this->load->model('m_company');
        $data = array();
        $result = $this->m_company->getCompanys($data, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array('comId' => $r->comId, 'comName' => $r->comName, 'address' => $r->address,
                'phone' => $r->phone, 'email' => $r->email, 'content' => $r->content, 'plan' => $r->plan,
                'u_id' => $r->u_id, 'realname' => $r->realname, 'stateId' => $r->stateId, 'p_id' => $r->p_id,
                'p_name' => $r->p_name,'patternId' => $r->patternId,'depart' => $r->depart,'u_name' => $r->u_name,
                'password' => $r->password,'state' => $r->state,'pattern' => $r->pattern,'collegeId' => $r->collegeId);
            array_push($data, $arr);
        }
        return $data;
    }

    public function sgetCompanys($offset) {
        $this->load->model('m_company');
        $data = array();
        $result = $this->m_company->getCompanys($data, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array('comId' => $r->comId, 'comName' => $r->comName, 'address' => $r->address,
                'phone' => $r->phone, 'email' => $r->email, 'content' => $r->content, 'plan' => $r->plan);
            array_push($data, $arr);
        }
        return $data;
    }

    // 获取单个实验任务信息
    function getCompany($id) {
        $this->load->model('m_company');
        $result = $this->m_company->getOneInfo($id);
        $data = array();
        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }

    public function getUsers() {
        $this->load->model('m_user');
        $data = $this->m_user->sgetUser(array());
        return $data;
    }
    public function getStates() {
        $this->load->model('m_company');
        $data = $this->m_company->getStates(array());
        return $data;
    }
    public function getPrograms() {
        $this->load->model('m_program');
        $data = $this->m_program->getsPrograms(array());
        return $data;
    }
    
    // 获取查询结果
    public function results() {
        $this->timeOut();
        $this->load->model('m_company');

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
        $this->load->view('admin/company/results', $data);
        $this->load->view('common/footer');
    }

    // 分页获取全部用户信息
    public function getResults($searchtype, $searchterm, $offset) {
        $this->timeOut();
        $this->load->model('m_company');
        $data = array();
        $query = $this->m_company->getResults($searchtype, $searchterm, $data, PER_PAGE, $offset);
        if (is_array($query)) {
            foreach ($query as $r) {
                $arr = array('comId' => $r->comId, 'comName' => $r->comName, 'address' => $r->address,
                    'phone' => $r->phone, 'email' => $r->email, 'content' => $r->content, 'plan' => $r->plan);
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