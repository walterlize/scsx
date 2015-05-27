<?php

class m_nfcompanyuser extends CI_Model {

    var $u_id = '';
    var $u_name = '';
    var $password = '';
    var $realname = '';
    var $phone = '';
    var $email = '';
    var $address = '';
    var $sex = '';
    var $ustateId = '';
    var $collegeId = '';
    var $addType='';

    function saveInfo() {
        $this->u_id = $this->input->post('u_id');
        $this->u_name = $this->input->post('u_name');
        $this->password = $this->input->post('password');
        $this->realname = $this->input->post('realname');
        $this->phone = $this->input->post('phone');
        $this->email = $this->input->post('email');
        $this->address = $this->input->post('uaddress');
        $this->sex = $this->input->post('sex');
        $this->ustateId = 2;
        $this->collegeId = $this->session->userdata('collegeId');
        $this->addType = $this->session->userdata('roleId');

        $id = $this->u_id;
        if ($id == 0) {
            $this->db->insert('company_users', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('company_users', $this, array('u_id' => $this->u_id));
        }
        return $id;
    }
    
    
}
?>

