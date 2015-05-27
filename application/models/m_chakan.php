<?php

class m_chakan extends CI_Model {
    
    function getChakans($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where('stuId', $this->session->userdata('u_name'));
        $this->db->order_by("b_id", "asc");
        $this->db->where($array);
        $q = $this->db->get('ws_chakan', $per_page, $offset);
        return $q->result();
    }
    function getNum($array) {
    	$this->db->where('stuId', $this->session->userdata('u_name'));
    	$this->db->from('ws_chakan');
    	$this->db->where($array);
    	return $this->db->count_all_results();
    }

    function getOneInfo($id) {
        $this->db->select();
        $this->db->from('ws_chakan');
        $this->db->where('b_id', $id);
        $q = $this->db->get();
        return $q->result();
    }

    
    
    function getExist($array) {
        $this->db->select();
        $this->db->where($array);
        $this->db->from('ws_chakan');
        $q = $this->db->get();
        return $q->result();
    }


}

?>
