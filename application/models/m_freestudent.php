<?php

class m_freestudent extends CI_Model {

    function getOneInfo1($id) {
        $this->db->select();
        $this->db->from('ws_freestudent');
        $this->db->where('stuId', $id);
        $q = $this->db->get();
        return $q->result();
    }
    }

?>
