<?php

class m_shenhe extends CI_Model {



    function getShenhe($array) {
        $this->db->select();
        $this->db->from('ws_chakan');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }


    function getShenhes($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where('patternId',1);
        $this->db->order_by("state", "asc");
        $q = $this->db->get('ws_chakan', $per_page, $offset);
        return $q->result();
    }
    function getShenhes1($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where('patternId',1);
        $this->db->order_by("state", "asc");
        $q = $this->db->get('ws_chakan', $per_page, $offset);
        return $q->result();
    }

    function getNum($array) {
        $this->db->from('ws_chakan');
        $this->db->where('patternId',1);
        return $this->db->count_all_results();
    }

    function updateShenhe($id, $array) {
        $this->db->where('b_id', $id);
        $this->db->update('baoming', $array);
    }

    function delete($id) {
        $this->db->where('b_id', $id);
        $this->db->delete('baoming');
    }

}

?>
