<?php

class m_tsummary extends CI_Model {

    var $sumId = '';
    var $m_id = '';
    var $stuId = '';
    var $s_state = '';
    var $content = '';
    var $sendTime = '';    
    var $teaId = '';
    var $u_name = '';
    var $realname = '';
    var $phone = '';
    var $mcontent = '';
    var $workTime = '';
    var $email = '';
    var $address = '';
    var $sex = '';
    var $title = '';

    
    function getSummary($array) {
        $this->db->select();
        $this->db->from('ws_summary1');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }

    function getTsummarys1($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where("teaId", $this->session->userdata('u_name'));
        $this->db->where("s_state", "已提交");
        $this->db->order_by("sumId", "asc");
        $q = $this->db->get('ws_summary1', $per_page, $offset);
        return $q->result();
    }
    function getTsummarys2($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where("teaId", $this->session->userdata('u_name'));
        $this->db->where("s_state", "已审核");
        $this->db->order_by("sumId", "asc");
        $q = $this->db->get('ws_summary1', $per_page, $offset);
        return $q->result();
    }

    function getOneInfo($id) {
        $this->db->select();
        $this->db->from('ws_summary1');
        $this->db->where('sumId', $id);
        $q = $this->db->get();
        return $q->result();
    }
    
    function updateSlog($id, $array) {
        $this->db->where('sumId', $id);
        $this->db->update('summary', $array);
    }

    function getNum($array) {
        $this->db->where("teaId", $this->session->userdata('u_name'));
        $this->db->where("s_state", "已提交");
        $this->db->from('ws_summary1');
        $this->db->where($array);
        return $this->db->count_all_results();
    }
    function getNum2($array) {
        $this->db->where("teaId", $this->session->userdata('u_name'));
        $this->db->where("s_state", "已审核");
        $this->db->from('ws_summary1');
        $this->db->where($array);
        return $this->db->count_all_results();
    }

}

?>
