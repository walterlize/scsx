<?php

class m_nteacher extends CI_Model {

    var $db_connect1;
    var $db_connect2;
    public function __construct(){
        parent::__construct();
        $this->db_connect1 = $this->load->database('default', TRUE);
        /*
         *引入远程的oracle数据库
         * $this->db_connect2= $this->load->database ('db2', TRUE);
         */
    }

    //查询所有教师
    function getTea($array){
    	$this->db->select();
    	$this->db->from('oteacher');
    	$this->db->where('college',$this->session->userdata('college'));
    	$this->db->where($array);
    	$q = $this->db->get();
    	return $q->result();
    }
    /*
     * ------Oracle数据库查询-------
    function getTea_orcl($u_name,$password){
        $oracle= $this->load->database('db2', TRUE);
        $q = $oracle->query("SELECT * FROM v_sx_jsxxb where JSH='$u_name' and MM='$password'");
        return $q->result();
    }
    */

    //分页显示
    function getTeas($array, $per_page, $offset) {
    	$this->db->select();
    	$this->db->where('college',$this->session->userdata('college'));
    	$this->db->where($array);
    	$q = $this->db->get('oteacher', $per_page, $offset);
    	return $q->result();
    }
    
    //通过教师号查询
    function getTeaById($teaId) {
        $this->db->select();
        $this->db->from('oteacher');
        $this->db->where('teaId', $teaId);
        $q = $this->db->get();
        return $q->result();
    }
    
    function getNum($array){
    	$this->db->select();
    	$this->db->from('oteacher');
    	$this->db->where('college',$this->session->userdata('college'));
    	$this->db->where($array);
    	return $this->db->count_all_results();
    }
    
    function getNumALL($array){
    	$this->db->select();
    	$this->db->from('oteacher');
    	$this->db->where($array);
    	return $this->db->count_all_results();
    }
    
    //分页显示
    function getTeasALL($array, $per_page, $offset) {
    	$this->db->select();
    	$this->db->where($array);
    	$q = $this->db->get('oteacher', $per_page, $offset);
    	return $q->result();
    }


}
?>

