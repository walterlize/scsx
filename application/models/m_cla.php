<?php

class m_cla extends CI_Model {

    var $classId = '';
    var $class = '';
    var $collegeId = '';
    var $department = '';

    function saveInfo() {
        $this->classId = $this->input->post('classId');
        $this->class = $this->input->post('class');
        $this->collegeId = $this->session->userdata('collegeId');
        $this->department = $this->input->post('department');

        $id = $this->classId;
        if ($id == 0) {
            $this->db->insert('class', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('class', $this, array('classId' => $this->classId));
        }
        return $id;
    }

    function getClas($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where('collegeId',$this->session->userdata('collegeId'));
        $this->db->order_by("classId", "asc");
        $q = $this->db->get('ws_class', $per_page, $offset);
        return $q->result();
    }
    function getCla($array) {
        $this->db->select();
        $this->db->from('ws_cla');
        $this->db->where('collegeId',$this->session->userdata('collegeId'));
        $this->db->where('patternId',3);
        $q = $this->db->get();
        return $q->result();
    }
    function getCla1($array) {
        $this->db->select();
        $this->db->from('class');
        $this->db->where('collegeId',$this->session->userdata('collegeId'));
        $q = $this->db->get();
        return $q->result();
    }
	function getCla2($array) {
        $this->db->select();
        $this->db->from('class');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }

    function getOneInfo($id) {
        $this->db->select();
        $this->db->from('ws_class');
        $this->db->where('classId', $id);
        $q = $this->db->get();
        return $q->result();
    }

    function getNum($array) {
        $this->db->from('ws_class');
        $this->db->where('collegeId',$this->session->userdata('collegeId'));
        return $this->db->count_all_results();
    }

    function updateClainfo($id, $array) {
        $this->db->where('claId', $id);
        $this->db->update('cla', $array);
    }
    function updateCla($id, $array) {
        $this->db->where('claId', $id);
        $this->db->update('cla', $array);
    }

    function delete($id) {
        $this->db->where('classId', $id);
        $this->db->delete('class');
    }

    }

?>
