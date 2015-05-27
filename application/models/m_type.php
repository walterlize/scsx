<?php

class m_type extends CI_Model {

    var $typeId = '';
    var $type = '';

    function saveInfo() {
        $this->typeId = $this->input->post('typeId');
        $this->type = $this->input->post('type');

        $id = $this->typeId;
        if ($id == 0) {
            $this->db->insert('type', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('type', $this, array('typeId' => $this->typeId));
        }
        return $id;
    }

    function getType($array) {
        $this->db->select();
        $this->db->from('type');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }

    function getTypes($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where($array);
        $this->db->order_by("typeId", "asc");
        $q = $this->db->get('type', $per_page, $offset);
        return $q->result();
    }

    function getOneInfo($id) {
        $this->db->select();
        $this->db->from('type');
        $this->db->where('typeId', $id);
        $q = $this->db->get();
        return $q->result();
    }

    function getNum($array) {
        $this->db->from('type');
        $this->db->where($array);
        return $this->db->count_all_results();
    }

    function updateTypeinfo($id, $array) {
        $this->db->where('typeId', $id);
        $this->db->update('type', $array);
    }
    function updateType($id, $array) {
        $this->db->where('typeId', $id);
        $this->db->update('type', $array);
    }

    function delete($id) {
        $this->db->where('typeId', $id);
        $this->db->delete('type');
    }

    }

?>
