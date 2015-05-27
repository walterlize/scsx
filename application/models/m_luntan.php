<?php

class m_luntan extends CI_Model {

    var $l_id = '';
    var $stuId = '';
    var $time1 = '';
    var $content = '';
    var $teaId = '';
    var $time2 = '';
    var $reply = '';
    var $typeId = '';
    var $theme = '';

    function getLuntans1($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where('teaId', 0);
        $this->db->order_by("l_id", "asc");
        $q = $this->db->get('ws_lunta', $per_page, $offset);
        return $q->result();
    }

    function getLuntans2($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where($array);
        $this->db->order_by("l_id", "asc");
        $q = $this->db->get('ws_luntan', $per_page, $offset);
        return $q->result();
    }

    function getOneInfo1($id) {
        $this->db->select();
        $this->db->from('ws_lunta');
        $this->db->where('l_id', $id);
        $q = $this->db->get();
        return $q->result();
    }
    
    function getOneInfo2($id) {
        $this->db->select();
        $this->db->from('ws_luntan');
        $this->db->where('l_id', $id);
        $q = $this->db->get();
        return $q->result();
    }

    function getNum($array) {
        $this->db->from('luntan');
        $this->db->where($array);
        return $this->db->count_all_results();
    }

    function delete($id) {
        $this->db->where('l_id', $id);
        $this->db->delete('luntan');
    }
    function getResults1($searchtype, $searchterm, $array, $per_page, $offset) {
        $this->db->select();
        $this->db->where('teaId', 0);
        $this->db->order_by("l_id", "asc");
        $this->db->where($searchtype, $searchterm);
        $q = $this->db->get('ws_lunta', $per_page, $offset);
        return $q->result();
    }
    function getResults2($searchtype, $searchterm, $array, $per_page, $offset) {
        $this->db->select();
        $this->db->where($array);
        $this->db->where($searchtype, $searchterm);
        $q = $this->db->get('ws_luntan', $per_page, $offset);
        return $q->result();
    }
   

}

?>
