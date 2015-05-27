<?php

class m_college extends CI_Model {

    var $collegeId = '';
    var $college = '';

    function saveInfo() {
        $this->collegeId = $this->input->post('collegeId');
        $this->college = $this->input->post('college');

        $id = $this->collegeId;
        if ($id == 0) {
            $this->db->insert('college', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('college', $this, array('collegeId' => $this->collegeId));
        }
        return $id;
    }

    function getCollege($array) {
        $this->db->select();
        $this->db->from('college');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }

    function getColleges($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where($array);
        $this->db->order_by("collegeId", "asc");
        $q = $this->db->get('college', $per_page, $offset);
        return $q->result();
    }

    function getOneInfo($id) {
        $this->db->select();
        $this->db->from('college');
        $this->db->where('collegeId', $id);
        $q = $this->db->get();
        return $q->result();
    }

    function getNum($array) {
        $this->db->from('college');
        $this->db->where($array);
        return $this->db->count_all_results();
    }

    function updateCollegeinfo($id, $array) {
        $this->db->where('collegeId', $id);
        $this->db->update('college', $array);
    }
    function updateCollege($id, $array) {
        $this->db->where('collegeId', $id);
        $this->db->update('college', $array);
    }

    function delete($id) {
        $this->db->where('collegeId', $id);
        $this->db->delete('college');
    }

    }

?>
