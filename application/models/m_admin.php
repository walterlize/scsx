<?php

class m_admin extends CI_Model {

    var $admin_id = '';
    var $admin_num = '';
    var $admin_password = '';
    var $admin_name = '';
    var $admin_phone = '';
    var $admin_email = '';
    var $admin_address = '';
    var $admin_coll_name = '';
    var $admin_stat_id = '';
    

    function saveInfo() {
        $this->admin_id = $this->input->post('admin_id');
        $this->admin_num = $this->input->post('admin_num');
        $this->admin_password = $this->input->post('admin_password');
        $this->admin_name = $this->input->post('admin_name');
        $this->admin_phone = $this->input->post('admin_phone');
        $this->admin_email = $this->input->post('admin_email');
        $this->admin_address = $this->input->post('admin_address');
        $this->admin_coll_name = $this->input->post('admin_coll_name');
        $this->admin_stat_id = 1;

        $id = $this->admin_id;
        if ($id == 0) {
            $this->db->insert('admin', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('admin', $this, array('admin_id' => $this->admin_id));
        }
        return $id;
    }
    
    
    
    function getAdmin($array) {
        $this->db->select();
        $this->db->where($array);
        $this->db->from('admin');
        $q = $this->db->get();
        return $q->result();
    }
    
    //分页获取全部用户
    function getAdmins($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where($array);
        $q = $this->db->get('admin', $per_page, $offset);
        return $q->result();
    }
    
    function getAdminById($id) {
        $this->db->select();
        $this->db->from('admin');
        $this->db->where('admin_id', $id);
        $q = $this->db->get();
        return $q->result();
    }
    
    //分页获取具体学院用户
    function getAdminByCol($array, $per_page, $offset) {
    	$this->db->select();
    	$this->db->where("college",$this->session->userdata('college'));
    	$this->db->where($array);
    	$q = $this->db->get('admin', $per_page, $offset);
    	return $q->result();
    }

    function getNum($array) {
        $this->db->from('admin');
        $this->db->where($array);
        return $this->db->count_all_results();
    }
   
    function updateAdmin($id, $array) {
        $this->db->where('admin_id', $id);
        $this->db->update('admin', $array);
    }

    function deleteAdmin($id) {
        $this->db->where('admin_id', $id);
        $this->db->delete('admin');
    }

}
?>

