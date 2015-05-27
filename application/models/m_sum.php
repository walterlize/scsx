<?php

class m_sum extends CI_Model {
   
    function getSum($array) {
        $this->db->select();
        $this->db->from('sum');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }

    function getSums($id) {   
        $this->db->from('ws_user');
        $this->db->where('collegeId',$this->session->userdata('collegeId'));
        $this->db->where('roleId',5);
        $this->db->where('classId',$id);
        return $this->db->count_all_results();
    }
     
    }

?>
