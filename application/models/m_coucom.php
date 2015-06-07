<?php
//课程基地匹配
class m_coucom extends CI_Model {

    var $coco_id = '';
    var $coco_cour_id = '';
    var $coco_cour_no = '';
    var $coco_cour_num = '';
    var $coco_cour_term = '';
    var $coco_comp_id = '';
    
    function saveInfo() {
    	$this->coco_id = $this->input->post('coco_id');
	    $this->coco_cour_id = $this->input->post('coco_cour_id');
	    $this->coco_cour_no = $this->input->post('coco_cour_no');
	    $this->coco_cour_num = $this->input->post('coco_cour_num');
	    $this->coco_cour_term = $this->input->post('coco_cour_term');
	    $this->coco_comp_id = $this->input->post('coco_comp_id');
    
    	$id = $this->coco_id;
    	if ($id == 0) {
    		$this->db->insert('coucom', $this);
    		$id = $this->db->insert_id();
    	} else {
    		$this->db->update('coucom', $this, array('coco_id' => $this->coco_id));
    	}
    	return $id;
    }
    
    function saveInfoByArr($array) {
    	$this->coco_id = $array->coco_id;
    	$this->coco_cour_id = $array->coco_cour_id;
    	$this->coco_cour_no = $array->coco_cour_no;
    	$this->coco_cour_num = $array->coco_cour_num;
    	$this->coco_cour_term = $array->coco_cour_term;
    	$this->coco_comp_id = $array->coco_comp_id;
    
    	$id = $this->coco_id;
    	if ($id == 0) {
    		$this->db->insert('coucom', $this);
    		$id = $this->db->insert_id();
    	} else {
    		$this->db->update('coucom', $this, array('coco_id' => $this->coco_id));
    	}
    	return $id;
    }

    //按ID查找
    function getCoucomById($id) {
    	$this->db->select();
    	$this->db->from('coucom');
    	$this->db->where('coco_id',$id);
    	$q = $this->db->get();
    	return $q->result();
    }

    //按条件查找
    function getCoucom($array) {
        $this->db->select();
        $this->db->from('coucom');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }
    
    
    //按条件获得实习项目条数
    function getNum($array) {
    	$this->db->select();
    	$this->db->from('coucom');
    	$this->db->where($array);
    	return $this->db->count_all_results();
    }
    
    
    //分页查询
    function getCoucoms($array, $per_page, $offset) {
    	$this->db->select();
    	$this->db->where($array);
    	$q = $this->db->get('coucom', $per_page, $offset);
    	return $q->result();
    }
    

    //更新
    function updateCoucom($id, $array) {
        $this->db->where('coco_id', $id);
        $this->db->update('coucom', $array);
        return $this->db->affected_rows();
    }
    
    function deleteCoucom($id) {
    	$this->db->where('coco_id', $id);
    	$this->db->delete('coucom');
    }
    
    //分页查询
    function getCoucoms_ws($array, $per_page, $offset) {
    	$this->db->select();
    	$this->db->where($array);
    	$q = $this->db->get('ws_coucom', $per_page, $offset);
    	return $q->result();
    }
    
    //按条件获得实习项目条数
    function getNum_ws($array) {
    	$this->db->select();
    	$this->db->from('ws_coucom');
    	$this->db->where($array);
    	return $this->db->count_all_results();
    }
    //按ID查找
    function getCoucomById_ws($id) {
    	$this->db->select();
    	$this->db->from('ws_coucom');
    	$this->db->where('coco_id',$id);
    	$q = $this->db->get();
    	return $q->result();
    }
    //按条件查找
    function getCoucom_ws($array) {
    	$this->db->select();
    	$this->db->from('ws_coucom');
    	$this->db->where($array);
    	$q = $this->db->get();
    	return $q->result();
    }
    

}
?>

