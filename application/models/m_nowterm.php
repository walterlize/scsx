<?php

class m_nowterm extends CI_Model {

    var $id = '';
    var $term = '';
    

    function saveInfo() {
        $this->id = 0;
        $this->term = $this->uri->segment(4);
       
        $id = $this->id;
        if ($id == 0) {
            $this->db->insert('nowterm', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('nowterm', $this, array('id' => $this->id));
        }
        return $id;
    }

    function getNowterm($array) {
        $this->db->select();
        $this->db->from('nowterm');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }


    function getNowtermById($id) {
        $this->db->select();
        $this->db->from('nowterm');
        $this->db->where('id', $id);
        $q = $this->db->get();
        return $q->result();
    }



    function updateNowterm($id, $array) {
        $this->db->where('id', $id);
        $this->db->update('nowterm', $array);
        return $this->db->affected_rows();
    }

    

}

?>
