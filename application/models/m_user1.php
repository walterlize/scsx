<?php

class m_user extends CI_Model {

    var $u_id = '';
    var $roleId = '';
    var $u_name = '';
    var $password = '';
    var $realname = '';
    var $phone = '';
    var $email = '';
    var $address = '';
    var $classId = '';
    var $sex = '';
    var $ustateId = '';
    var $collegeId = '';

    function saveInfo() {
        $this->u_id = $this->input->post('u_id');
        $this->roleId = $this->input->post('roleId');;
        $this->u_name = $this->input->post('u_name');
        $this->password = $this->input->post('password');
        $this->realname = $this->input->post('realname');
        $this->phone = $this->input->post('phone');
        $this->email = $this->input->post('email');
        $this->address = $this->input->post('address');
        $this->classId = $this->input->post('classId');
        $this->sex = $this->input->post('sex');
        $this->ustateId = 1;
        $this->collegeId = $this->input->post('collegeId');

        $id = $this->u_id;
        if ($id == 0) {
            $this->db->insert('users', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('users', $this, array('u_id' => $this->u_id));
        }
        return $id;
    }

    function sgetUser($array) {
        $this->db->select();
        $this->db->where("roleId",4);
        $this->db->from('users');
        $q = $this->db->get();
        return $q->result();
    }
    
    function getUser($array) {
        $this->db->select();
        $this->db->where($array);
        $this->db->from('users');
        $q = $this->db->get();
        return $q->result();
    }
    function getStudent($array) {
        $this->db->select();
        $this->db->where('u_id',$this->session->userdata('u_id'));
        $this->db->from('ws_student');
        $q = $this->db->get();
        return $q->result();
    }

    function getUsers($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where("collegeId",$this->session->userdata('collegeId'));
        $this->db->order_by("classId", "asc");
        $q = $this->db->get('ws_user', $per_page, $offset);
        return $q->result();
    }
    function getadminUsers($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where("roleId",2);
        $this->db->order_by("collegeId", "asc");
        $q = $this->db->get('ws_user_role', $per_page, $offset);
        return $q->result();
    }

    function getOneInfo($id) {
        $this->db->select();
        $this->db->from('ws_user');
        $this->db->where('u_id', $id);
        $q = $this->db->get();
        return $q->result();
    }
    function getOneInfo1($id) {
        $this->db->select();
        $this->db->from('ws_user_role');
        $this->db->where('u_id', $id);
        $q = $this->db->get();
        return $q->result();
    }

    function getNum($array) {
        $this->db->from('ws_user_role');
        $this->db->where("roleId",2);
        return $this->db->count_all_results();
    }
    function getNum1($array) {
        $this->db->from('ws_user');
        $this->db->where("collegeId",$this->session->userdata('collegeId'));
        return $this->db->count_all_results();
    }

    function getTeacher($array) {
        $this->db->select();
        $this->db->where('roleId', 3);
        $this->db->from('users');
        $q = $this->db->get();
        return $q->result();
    }

    function updateUserinfo($id, $array) {
        $this->db->where('u_id', $id);
        $this->db->update('users', $array);
    }

    function delete($id) {
        $this->db->where('u_id', $id);
        $this->db->delete('users');
    }

    function getResults($searchtype, $searchterm, $array, $per_page, $offset) {

        //     $query = "select * from mission where " . $searchtype . " like %" . $searchterm . "%";     
        //   return $query->result;
        $this->db->select();
        $this->db->where($array);
        $this->db->where($searchtype, $searchterm);
        $q = $this->db->get('ws_user_role', $per_page, $offset);
        return $q->result();
    }

    function insertUser($tmp,$collegeId) {
        /* $this->db->select();
          $this->db->where($array);
          $this->db->from('ws_user_role');
          $q = $this->db->get();
          return $q->result();

          $connect = mysqli_connect("localhost", "root", "", "yuyue");
          if (!$connect) {
          echo "database connect wrong";
          exit;
          } */
        $Isql = "Select u_id from   users where u_id='" . $tmp[1] . "'";
        //$Isql = "Select u_id from    xls    where u_id=20";
        $sql = "Insert into `users` (u_id, roleId, u_name, password, realname, sex, phone, email, address, classId,  ustateId, collegeId) value(";
        $sql.="'0 ', '" . $tmp[2] . "', '" . $tmp[3] . "', '" . $tmp[4] ."', '" . $tmp[5]. "', '". $tmp[6]  . "', '" . $tmp[7] . "', '" . $tmp[8] ."', '" . $tmp[9] ."', '" . $tmp[10]. "', '1', '" .$collegeId. "' ) ";
        
        //$result = @mysql_query($Isql, $connect);
        //mysql_query($sql);
        $result = @mysql_query($sql);
        return $result;
    }
    
    function getStuNum($array) {
    	$this->db->from('users');
    	$this->db->where("roleId",5);
    	$this->db->where($array);
    	return $this->db->count_all_results();
    }
    
    function getUsersByCon($array, $per_page, $offset) {
    	$this->db->select();
    	$this->db->where("collegeId",$this->session->userdata('collegeId'));
    	$this->db->where($array);
    	$q = $this->db->get('ws_user', $per_page, $offset);
    	return $q->result();
    }

}
?>

