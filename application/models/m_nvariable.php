<?php

class m_nvariable extends CI_Model {

    var $id = '';
    var $courseId = '';
    var $courseNum = '';
    var $stuId ='';
    var $stuClass = '';
    var $stuName = '';
    
	function saveInfo() {
        $this->id = $this->input->post('id');
        $this->courseId = $this->input->post('courseId');
        $this->courseNum = $this->input->post('courseNum');
        $this->stuId = $this->input->post('stuId');
        $this->stuClass = $this->input->post('stuClass');
        $this->stuName = $this->input->post('stuName');
       
        $id = $this->u_id;
        if ($id == 0) {
            $this->db->insert('nvariable', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('nvariable', $this, array('id' => $this->id));
        }
        return $id;
    }

    //按ID查找选课结果
    function getNvariableById($id) {
    	$this->db->select();
    	$this->db->from('nvariable');
    	$this->db->where('id',$id);
    	$q = $this->db->get();
    	return $q->result();
    }

    //按条件查找选课结果
    function getNvariable($array) {
        $this->db->select();
        $this->db->from('nvariable');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }
    
    //按条件获得实习项目条数
    function getNum($array) {
    	$this->db->select();
    	$this->db->where('college',$this->session->userdata('college'));
    	$this->db->from('nvariable');
    	$this->db->where($array);
    	return $this->db->count_all_results();
    }
    
    //分页查询
    function getNvariables($array, $per_page, $offset) {
    	$this->db->select();
    	$this->db->where('college',$this->session->userdata('college'));
    	$this->db->where($array);
    	$q = $this->db->get('nvariable', $per_page, $offset);
    	return $q->result();
    }

    //更新实习项目（自选，志愿，分配）
    function updateNvariable($id, $array) {
        $this->db->where('id', $id);
        $this->db->update('nvariable', $array);
        return $this->db->affected_rows();
    }
    
    
    
    
    //按ID查找选课结果
    function getNvariableById_ws($id) {
    	$this->db->select();
    	$this->db->from('ws_nvariable');
    	$this->db->where('id',$id);
    	$q = $this->db->get();
    	return $q->result();
    }
    
    //按条件查找选课结果
    function getNvariable_ws($array) {
    	$this->db->select();
    	$this->db->from('ws_nvariable');
    	$this->db->where('college',$this->session->userdata('college'));
    	$this->db->where($array);
    	$q = $this->db->get();
    	return $q->result();
    }
    
    //按条件获得实习项目条数
    function getNum_ws($array) {
    	$this->db->select();
    	$this->db->from('ws_nvariable');
    	$this->db->where('college',$this->session->userdata('college'));
    	$this->db->where($array);
    	return $this->db->count_all_results();
    }
    
    //分页查询
    function getNvariables_ws($array, $per_page, $offset) {
    	$this->db->select();
    	$this->db->where('college',$this->session->userdata('college'));
    	$this->db->where($array);
    	$q = $this->db->get('ws_nvariable', $per_page, $offset);
    	return $q->result();
    }
    
    //按条件查找选课结果
    function getClass($array) {
    	$this->db->select('stuClass,stuMajor');
    	$this->db->from('nvariable');
    	
    	$this->db->order_by("convert(stuClass using gbk)","asc");
    	$this->db->where($array);
    	$this->db->distinct();
    	$q = $this->db->get();
    	return $q->result();
    }
    
    //按条件获得实习项目条数
    function getNum_ws1($array) {
    	$this->db->select();
    	$this->db->from('ws_nvariable1');
    	$this->db->where('college',$this->session->userdata('college'));
    	$this->db->where($array);
    	return $this->db->count_all_results();
    }
    
    //分页查询
    function getNvariables_ws1($array, $per_page, $offset) {
    	$this->db->select();
    	$this->db->where('college',$this->session->userdata('college'));
    	$this->db->where($array);
    	$q = $this->db->get('ws_nvariable1', $per_page, $offset);
    	return $q->result();
    }
    
    
}
?>

