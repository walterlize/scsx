<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('pagination');
        ini_set('max_execution_time', '0');
        date_default_timezone_set('PRC');
    }

    public function userList() {
        $this->timeOut();

        $this->load->model('m_user');
        $num = $this->m_user->getNum1(array());
        $offset = $this->uri->segment(4);

        $data['user'] = $this->getUsers($offset);
        $config['base_url'] = base_url() . 'index.php/admin/user/userList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('admin/user/user', $data);
        $this->load->view('common/footer');
    }

    // 用户详细信息页面
    public function userDetail() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data = $this->getUser($id);

        $this->load->view('common/header3');
        $this->load->view('admin/user/userDetail', $data);
        $this->load->view('common/footer');
    }

    // 用户信息编辑页面
    public function userEdit() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data['user'] = $this->getUser($id);
        $data['roles'] = $this->getRoles();
        $this->load->model("m_cla");
        $data['class']=$this->m_cla->getCla1(array());

        $data['showActive'] = '';
        $data['showUnactive'] = 'display:none';

        $this->load->view('common/header3');
        $this->load->view('admin/user/userEdit', $data);
        $this->load->view('common/footer');
    }

    // 用户详细信息新增页面
    public function userNew() {
        $this->timeOut();

        @ $users->u_id = 0;
        $users->roleId = '';
        $users->u_name = '';
        $users->password = '';
        $users->realname = '';
        $users->phone = '';
        $users->email = '';
        $users->address = '';
        $users->classId = '';
        $users->sex= '男';
        $users->collegeId = $this->session->userdata('collegeId');

        $data['user'] = $users;
        $data['roles'] = $this->getRoles();
        $this->load->model("m_cla");
        $data['class']=$this->m_cla->getCla1(array());

        $data['show'] = 'display:none';
        $data['showActive'] = 'display:none';
        $data['showUnactive'] = 'display:none';

        $this->load->view('common/header3');
        $this->load->view('admin/user/userEdit', $data);
        $this->load->view('common/footer');
    }

    public function userDelete() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $this->load->model('m_user');
        $this->m_user->delete($id);

        $num = $this->m_user->getNum(array());
        $offset = 0;

        $data['user'] = $this->getUsers($offset);
        $config['base_url'] = base_url() . 'index.php/admin/user/userList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('admin/user/user', $data);
        $this->load->view('common/footer');
    }

    public function download() {
        $this->timeOut();

        $file_dir =  chop('./download');
        //$file_dir = chop('D:\xampp\htdocs\yuyue\download'); //去掉路径中多余的空格
        $file_name = 'template.xls'; //文件名
        //得出要下载的文件的路径
        $file_path = $file_dir;
        if (substr($file_dir, strlen($file_dir) - 1, strlen($file_dir)) != '/')
            $file_path .= '/';
        $file_path .= $file_name;
        //判断要下载的文件是否存在
        if (!file_exists($file_path)) {
            echo '对不起,你要下载的文件不存在。';
            return false;
        }
        $file_size = filesize($file_path);
        header("Content-type: application/octet-stream");
        header('Content-Type: text/html; charset=utf-8');
        header("Accept-Ranges: bytes");
        header("Accept-Length: $file_size");
        header("Content-Disposition: attachment; filename=" . $file_name);

        $fp = fopen($file_path, "r");
        $buffer_size = 1024;
        $cur_pos = 0;

        while (!feof($fp) && $file_size - $cur_pos > $buffer_size) {
            $buffer = fread($fp, $buffer_size);
            echo $buffer;
            $cur_pos += $buffer_size;
        }

        $buffer = fread($fp, $file_size - $cur_pos);
        echo $buffer;
        fclose($fp);
        return true;
    }

    // 上传文件
    public function upload() {
        $this->timeOut();

        
        
        @ $users->u_id = 0;
        $users->roleId = '';
        $users->u_name = '';
        $users->password = '';
        $users->realname = '';
        $users->phone = '';
        $users->email = '';
        $users->address = '';
        $users->class = '';
        $users->sex= '';
        $users->collegeId = $this->session->userdata('collegeId');

        $data['user'] = $users;

        $data['show'] = 'display:none';
        $data['showActive'] = 'display:none';
        $data['showUnactive'] = 'display:none';

        $this->load->view('common/header3');
        $this->load->view('admin/user/upload', $data);
        $this->load->view('common/footer');
    }

    public function shangchuan() {
       // $connect = @mysqli_connect("localhost", "root", "", "yuyue");
        error_reporting(E_ALL ^ E_NOTICE);
        if ($_POST) {
            $Import_TmpFile = $_FILES['file']['tmp_name'];
            mysql_select_db('campus'); //选择数据库    
            require_once 'reader.php';
            $data = new Spreadsheet_Excel_Reader();
            $data->setOutputEncoding('UTF-8');
            $data->read($Import_TmpFile);
            $array = array();

            for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) {
                for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
                    $array[$i][$j] = $data->sheets[0]['cells'][$i][$j];
                }
            }
            $this->sava_data($array, $connect);
        }
    }

    public function sava_data($array, $connect) {
        $count = 0;
        $total = 0;
        $collegeId = $this->session->userdata('collegeId');
       
        foreach ($array as $tmp) {
            /*    $Isql = "Select u_id from    xls    where u_id='" . $tmp[1] . "'";
              //$Isql = "Select u_id from    xls    where u_id=20";
              $sql = "Insert into users (u_id, roleId, u_name, realname, password, phone, email, address) value(";
              $sql.="'" . $tmp[1] . "', '" . $tmp[2] . "', '" . $tmp[3] . "', '" . $tmp[4] . "', '" . $tmp[5] . "', '" . $tmp[6] . "', '" . $tmp[7] . "', '" . $tmp[8] . "' ) ";

              $result = @mysql_query($Isql, $connect);
              echo $Isql;
              echo $sql; */
        	
            $Isql = "Select u_id from    xls    where u_id='" . $tmp[1] . "'";
            //$Isql = "Select u_id from    xls    where u_id=20";
            
            $sql = "Insert into users (u_id, roleId, u_name, password, realname, sex, phone, email, address, classId,  ustateId, collegeId) value(";
            $sql.="'" . $tmp[1] . "', '" . $tmp[2] . "', '" . $tmp[3] . "', '" . $tmp[4] ."', '" . $tmp[5]. "', '". $tmp[6]  . "', '" . $tmp[7] . "', '" . $tmp[8] ."', '" . $tmp[9] ."', '" . $tmp[10]. "', '" .$collegeId. "' ) ";
            
            
            $this->load->model('m_user');
            $result = $this->m_user->insertUser($array, $tmp);
            /*  echo $result;
              if ($result) {
              echo "success";
              } else {
              show_404();
              } */

            if (@!mysql_num_rows($result)) {
                if (mysql_query($sql)) {
                    $count++;
                }
            }
            $total++;
        }
        echo "<script>alert('共有" . $total . "条数据，导入" . $count . "条数据成功' );</script>";
    }

    public function TtoD($text) {
        $jd1900 = GregorianToJD(1, 1, 1900) - 2;
        $myJd = $text + $jd1900;
        $myDate = JDToGregorian($myJd);
        $myDate = explode('/', $myDate);
        $myDateStr = str_pad($myDate[2], 4, '0', STR_PAD_LEFT) . "-" . str_pad($myDate[0], 2, '0', STR_PAD_LEFT) . "-" . str_pad($myDate[1], 2, '0', STR_PAD_LEFT);
        return $myDateStr;
    }

// 保存用户信息
    public function save() {
        $this->timeOut();

        $this->load->model('m_user');
        $id = $this->m_user->saveInfo();
        $data = $this->getUser($id);

        $this->load->view('common/header3');
        $this->load->view('admin/user/userDetail', $data);
        $this->load->view('common/footer');
    }

// 分页获取全部用户信息
    public function getUsers($offset) {
        $this->timeOut();
        $this->load->model('m_user');
        $data = array();
        $result = $this->m_user->getUsers($data, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array('u_id' => $r->u_id, 'roleId' => $r->roleId, 'roleName' => $r->roleName, 
                'u_name' => $r->u_name,'password' => $r->password,'realname' => $r->realname,
                'phone' => $r->phone,'email' => $r->email,'address' => $r->address,'class' => $r->class,
                'classId' => $r->classId,'sex' => $r->sex,'ustateId' => $r->ustateId,'collegeId' => $r->collegeId,
                 'college' => $r->college,'ustate' => $r->ustate);
            array_push($data, $arr);
        }
        return $data;
    }

// 获取单个用户信息
    function getUser($id) {
        $this->load->model('m_user');
        $result = $this->m_user->getOneInfo($id);
        $data = array();
        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }

// 获取查询结果
    public function results() {
        $this->timeOut();
        $this->load->model('m_user');

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
        $this->load->view('admin/user/results', $data);
        $this->load->view('common/footer');
    }

// 分页获取全部用户信息
    public function getResults($searchtype, $searchterm, $offset) {
        $this->timeOut();
        $this->load->model('m_user');
        $data = array();
        $query = $this->m_user->getResults($searchtype, $searchterm, $data, PER_PAGE, $offset);
        if (is_array($query)) {
            foreach ($query as $r) {
                $arr = array('u_id' => $r->u_id, 'roleId' => $r->roleId, 'roleName' => $r->roleName, 
                'u_name' => $r->u_name,'password' => $r->password,'realname' => $r->realname,
                'phone' => $r->phone,'email' => $r->email,'address' => $r->address,'class' => $r->class);
            array_push($data, $arr);
            }
            return $data;
        }
    }

    public function getRoles() {
        $this->load->model('m_role');
        $data = $this->m_role->getRole(array());
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