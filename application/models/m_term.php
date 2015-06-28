<?php

class m_term extends CI_Model {

    var $id = '';
    var $term = '';
    

    function saveInfo() {
        $this->id = $this->input->post('id');;
        $y1= $this->input->post('y1');
        $y2= $this->input->post('y2');
        $this->term = $y1.'-'.$y2.'-3-2';
       
        $id = $this->id;
        if ($id == 0) {
            $this->db->insert('term', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('term', $this, array('id' => $this->id));
        }
        return $id;
    }

    function getterm($array) {
        $this->db->select();
        $this->db->from('term');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }


    function getTermById($id) {
        $this->db->select();
        $this->db->from('term');
        $this->db->where('id', $id);
        $q = $this->db->get();
        return $q->result();
    }



    function updateTerm($id, $array) {
        $this->db->where('id', $id);
        $this->db->update('term', $array);
    }
    
    function delete($id) {
    	$this->db->where('id', $id);
    	$this->db->delete('term');
    }

    

}

?>
