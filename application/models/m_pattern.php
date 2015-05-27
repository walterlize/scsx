<?php

class m_pattern extends CI_Model {


    //查找全部
    function getPattern($array) {
    	$this->db->select();
    	$this->db->from('pattern');
    	$this->db->where($array);
    	$q = $this->db->get();
    	return $q->result();
    }

}
?>

