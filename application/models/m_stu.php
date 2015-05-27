<?php

class m_stu extends CI_Model {

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
        $this->u_id = $this->session->userdata('u_id');
        $this->roleId = $this->session->userdata('roleId');
        $this->u_name = $this->session->userdata('u_name');
        $this->password = $this->session->userdata('password');
        
        $this->realname = $this->input->post('realname');
        $this->phone = $this->input->post('phone');
        $this->email = $this->input->post('email');
        $this->address = $this->input->post('address');
        $this->classId = $this->input->post('classId');
        $this->sex = $this->input->post('sex');
        $this->ustateId = $this->input->post('ustateId');
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

    function getOneInfo($id) {
        $this->db->select();
        $this->db->from('users');
        $this->db->where('u_id', $id);
        $q = $this->db->get();
        return $q->result();
    }

    function updateStudentinfo($id, $array) {
        $this->db->where('u_id', $id);
        $this->db->update('users', $array);
    }

}
?>

