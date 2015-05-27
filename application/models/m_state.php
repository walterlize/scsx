<?php

class m_state extends CI_Model {


    //查找全部
    function getStatebyId($id) {
    	$this->db->select();
    	$this->db->from('state');
    	$this->db->where('stateId',$id);
    	$q = $this->db->get();
    	return $q->result();
    }

}
?>

