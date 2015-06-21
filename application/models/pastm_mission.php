<?php

class m_mission extends CI_Model {

    var $m_id = '';
    var $teaId = '';
    var $content = '';
    var $workTime = '';
    var $title = '';

    function saveInfo() {
        $this->m_id = $this->input->post('m_id');
        $this->teaId = $this->session->userdata('u_name');
        $this->content = $this->input->post('content');
        $this->workTime = date("Y-m-d");
        $this->title = $this->input->post('title');

        $id = $this->m_id;
        if ($id == 0) {
            $this->db->insert('mission', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('mission', $this, array('m_id' => $this->m_id));
        }
        return $id;
    }

    function getMission($array) {
        $this->db->select();
        $this->db->from('mission');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }

    function getMissions($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where("teaId", $this->session->userdata('u_name'));
        $this->db->order_by("m_id", "asc");
        $q = $this->db->get('mission', $per_page, $offset);
        return $q->result();
    }

    function getOneInfo($id) {
        $this->db->select();
        $this->db->from('mission');
        $this->db->where('m_id', $id);
        $q = $this->db->get();
        return $q->result();
    }

    function getNum($array) {
        $this->db->where("teaId", $this->session->userdata('u_name'));
        $this->db->from('mission');
        $this->db->where($array);
        return $this->db->count_all_results();
    }

    function updateMissioninfo($id, $array) {
        $this->db->where('m_id', $id);
        $this->db->update('mission', $array);
    }

    function updateMission($id, $array) {
        $this->db->where('m_id', $id);
        $this->db->update('mission', $array);
    }

    function delete($id) {
        $this->db->where('m_id', $id);
        $this->db->delete('mission');
    }

}

?>
