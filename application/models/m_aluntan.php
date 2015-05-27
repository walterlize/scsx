<?php

class m_aluntan extends CI_Model {

    var $l_id = '';
    var $stuId = '';
    var $time1 = '';
    var $content = '';
    var $teaId = '';
    var $time2 = '';
    var $reply = '';
    var $typeId = '';
    var $theme = '';

    function getLuntans($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where($array);
        $this->db->order_by("l_id", "asc");
        $q = $this->db->get('ws_lunta', $per_page, $offset);
        return $q->result();
    }

 
    function getOneInfo($id) {
        $this->db->select();
        $this->db->from('ws_lunta');
        $this->db->where('l_id', $id);
        $q = $this->db->get();
        return $q->result();
    }

    function getNum($array) {
        $this->db->from('ws_lunta');
        $this->db->where($array);
        return $this->db->count_all_results();
    }

    function delete($id) {
        $this->db->where('l_id', $id);
        $this->db->delete('luntan');
    }

}

?>
