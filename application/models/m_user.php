<?php

class m_user extends CI_Model {

    var $user_id = '';
    var $user_num = '';
    var $user_password = '';
    var $user_name = '';
    var $user_phone = '';
    var $user_email = '';
    var $user_address = '';
    var $user_coll_id  = '';
    var $user_coll_name = '';
    var $user_stat_id = '';
    

    function saveInfo() {
        $this->user_id = $this->input->post('user_id');
        $this->user_num = $this->input->post('user_num');
        $this->user_password = $this->input->post('user_password');
        $this->user_name = $this->input->post('user_name');
        $this->user_phone = $this->input->post('user_phone');
        $this->user_email = $this->input->post('user_email');
        $this->user_address = $this->input->post('user_address');
        $this->user_coll_id = $this->input->post('user_coll_id');
        $this->user_coll_name = $this->input->post('user_coll_name');
        $this->user_stat_id = 1;

        $id = $this->user_id;
        if ($id == 0) {
            $this->db->insert('user', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('user', $this, array('user_id' => $this->user_id));
        }
        return $id;
    }
    
    function saveInfoByStu() {
    	$this->user_id = $this->input->post('user_id');
    	$this->user_num = $this->input->post('user_email');
    	$this->user_password = $this->input->post('user_phone');
    	$this->user_name = $this->input->post('user_name');
    	$this->user_phone = $this->input->post('user_phone');
    	$this->user_email = $this->input->post('user_email');
    	$this->user_address = $this->input->post('user_address');
    	$this->user_coll_id = $this->session->userdata('collegeId');
    	$this->user_coll_name = $this->session->userdata('college');
    	$this->user_stat_id = 2;
    
    	$id = $this->user_id;
    	if ($id == 0) {
    		$this->db->insert('user', $this);
    		$id = $this->db->insert_id();
    	} else {
    		$this->db->update('user', $this, array('user_id' => $this->user_id));
    	}
    	return $id;
    }
    function saveInfoByTea() {
    	$this->user_id = $this->input->post('user_id');
    	$this->user_num = $this->input->post('user_num');
    	$this->user_password = $this->input->post('user_password');
    	$this->user_name = $this->input->post('user_name');
    	$this->user_phone = $this->input->post('user_phone');
    	$this->user_email = $this->input->post('user_email');
    	$this->user_address = $this->input->post('user_address');
    	$this->user_coll_id = $this->session->userdata('collegeId');
    	$this->user_coll_name = $this->session->userdata('college');
    	$this->user_stat_id = 1;
    
    	$id = $this->user_id;
    	if ($id == 0) {
    		$this->db->insert('user', $this);
    		$id = $this->db->insert_id();
    	} else {
    		$this->db->update('user', $this, array('user_id' => $this->user_id));
    	}
    	return $id;
    }
    
    function getUser($array) {
        $this->db->select();
        $this->db->where($array);
        $this->db->from('ws_user');
        $q = $this->db->get();
        return $q->result();
    }
    
    //分页获取全部用户
    function getUsers($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where($array);
        $q = $this->db->get('ws_user', $per_page, $offset);
        return $q->result();
    }
    
    function getUserById($id) {
        $this->db->select();
        $this->db->from('ws_user');
        $this->db->where('user_id', $id);
        $q = $this->db->get();
        return $q->result();
    }
    
    function getOneInfo($id){
    	$this->db->select();
    	$this->db->from('ws_user');
    	$this->db->where('user_id', $id);
    	$q = $this->db->get();
    	return $q->result();
    }
    
    //分页获取具体学院用户
    function getUsersByCol($array, $per_page, $offset) {
    	$this->db->select();
    	$this->db->where("college",$this->session->userdata('college'));
    	$this->db->where($array);
    	$q = $this->db->get('ws_user', $per_page, $offset);
    	return $q->result();
    }

    function getNum($array) {
        $this->db->from('ws_user');
        $this->db->where($array);
        return $this->db->count_all_results();
    }
   
   
    function updateUser($id, $array) {
        $this->db->where('user_id', $id);
        $this->db->update('user', $array);
    }

    function deleteUser($id) {
        $this->db->where('user_id', $id);
        $this->db->delete('user');
    }

}
?>

