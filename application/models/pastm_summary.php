<?php

class m_summary extends CI_Model {

    var $sumId = '';
    var $m_id = '';
    var $stuId = '';
    var $s_state = '';
    var $content = '';
    var $sendTime = '';

    function saveInfo($m_id) {
        $this->sumId = 0;
        $this->m_id = $m_id;
        $this->stuId = $this->session->userdata('u_name');
        $this->s_state = "已提交";
        $this->sendTime = date("Y-m-d");
        $this->content = $this->input->post('content');

        $id = $this->sumId;
        if ($id == 0) {
            $this->db->insert('summary', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('summary', $this, array('sumId' => $this->sumId));
        }
        return $id;
    }

    function getSummary($array) {
        $this->db->select();
        $this->db->from('ws_summary');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }

    function getSummarys1($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where("stateId", 3);
        $this->db->where("stuId", $this->session->userdata('u_name'));
        $this->db->order_by("m_id", "asc");
        $q = $this->db->get('ws_chakan1_mission', $per_page, $offset);
        return $q->result();
    }
    function getSummarys2($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where("stateId", 5);
        $this->db->where("stuId", $this->session->userdata('u_name'));
        $this->db->order_by("m_id", "asc");
        $q = $this->db->get('ws_fbaoming_mission', $per_page, $offset);
        return $q->result();
    }
    
    function sgetSummarys($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where($array);
        $this->db->where("stuId", $this->session->userdata('u_name'));
        $this->db->order_by("sumId", "asc");
        $q = $this->db->get('ws_summary1', $per_page, $offset);
        return $q->result();
    }

    function getOneInfo($id) {
        $this->db->select();
        $this->db->from('ws_chakan1_mission');
        $this->db->where('m_id', $id);
        $q = $this->db->get();
        return $q->result();
    }
    
    function sgetOneInfo($id) {
        $this->db->select();
        $this->db->from('ws_summary1');
        $this->db->where('sumId', $id);
        $q = $this->db->get();
        return $q->result();
    }
    
    function getOneInfos($id) {
        $this->db->select();
        $this->db->from('ws_summary');
        $this->db->where('sumId', $id);
        $q = $this->db->get();
        return $q->result();
    }

    function getNum11($array) {
        $this->db->where("stateId", 3);
        $this->db->where("stuId", $this->session->userdata('u_name'));
        $this->db->from('ws_chakan1_mission');
        $this->db->where($array);
        return $this->db->count_all_results();
    }
    function getNum12($array) {
        $this->db->where("stateId", 5);
        $this->db->where("stuId", $this->session->userdata('u_name'));
        $this->db->from('ws_fbaoming_mission');
        $this->db->where($array);
        return $this->db->count_all_results();
    }
    function getNum2($array) {
        $this->db->from('ws_summary');
        $this->db->where('stuId',$this->session->userdata('u_name'));
        return $this->db->count_all_results();
    }

    function updateSummaryinfo($id, $array) {
        $this->db->where('sumId', $id);
        $this->db->update('summary', $array);
    }

    function updateSummary($id, $array) {
        $this->db->where('sumId', $id);
        $this->db->update('summary', $array);
    }

    function delete($id) {
        $this->db->where('sumId', $id);
        $this->db->delete('summary');
    }

    // 获取审核状态
    function getState($s_state) {
        switch ($s_state) {
            case 1:
                return "已提交";
            case "待填写":
                return "待填写";
            case "":
                return "待填写";
        }
    }
    
    function getExist($array) {
        $this->db->select();
        $this->db->where($array);
        $this->db->from('summary');
        $q = $this->db->get();
        return $q->result();
    }

}

?>
