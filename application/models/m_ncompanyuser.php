<?php

class m_ncompanyuser extends CI_Model {

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
        $this->address = $this->input->post('address');
        $this->sex = $this->input->post('sex');
        $this->ustateId = 1;
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
    
    function getNCompUserL($array) {
    	$this->db->select();
    	$this->db->where($array);
    	$this->db->from('company_users');
    	$q = $this->db->get();
    	return $q->result();
    }
    
    function getNCompUser($array) {
        $this->db->select();
        $this->db->where($array);
        $this->db->where("collegeId",$this->session->userdata('collegeId'));
        $this->db->from('company_users');
        $q = $this->db->get();
        return $q->result();
    }
    
    function getNCompUsers($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where($array);
        $this->db->where("collegeId",$this->session->userdata('collegeId'));
        $q = $this->db->get('company_users', $per_page, $offset);
        return $q->result();
    }
    
    
    function getNCompUserById($id) {
        $this->db->select();
        $this->db->from('company_users');
        $this->db->where('u_id', $id);
        $q = $this->db->get();
        return $q->result();
    }
    

    function getNum($array) {
        $this->db->from('company_users');
        $this->db->where($array);
        $this->db->where("collegeId",$this->session->userdata('collegeId'));
        return $this->db->count_all_results();
    }
    

    function updateNCompUser($id, $array) {
        $this->db->where('u_id', $id);
        $this->db->update('company_users', $array);
    }

    function delete($id) {
        $this->db->where('u_id', $id);
        $this->db->delete('company_users');
    }

}
?>

