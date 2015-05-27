<?php

class m_scores extends CI_Model {

    var $s_id = '';
    var $teaId = '';
    var $stuId = '';
    var $score = '';
    var $comment = '';
    var $course_id = '';
    var $courseId = '';
    var $courseNum = '';

    function saveInfo($stuId) {
        $this->s_id = $this->input->post('s_id');
        $this->teaId = $this->session->userdata('u_name');
        $this->stuId = $stuId;
        $this->score = $this->input->post('score');
        $this->comment = $this->input->post('comment');
        $this->course_id = $this->input->post('course_id');
        $this->courseId = $this->input->post('courseId');
        $this->courseNum = $this->input->post('courseNum');

        $id = $this->s_id;
        $data = array(
            's_id' => $this->s_id,
            'teaId' => $this->teaId,
            'stuId' => $this->stuId,
            'score' => $this->score,
            'comment' => $this->comment,
        	'course_id'=>$this->course_id,
        	'courseId'=>$this->courseId,
        	'courseNum'=>$this->courseNum
        );
        if ($id == 0) {
            $this->db->insert('score', $data);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('score', $data, array('s_id' => $this->s_id));
        }
        return $id;
    }



    //在报名表中查看老师所有学生信息
    function getScores1($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where('courseTeaId', $this->session->userdata('u_name')+"*");
        $this->db->where("stateId",3);
        $this->db->order_by("b_id", "asc");
        $q = $this->db->get('ws_chakan1', $per_page, $offset);
        return $q->result();
    }
    
    //查看已评价信息=》在score中查看教师Id已评价学生
    
    function sgetScores($array, $per_page, $offset) {
    	$this->db->select();
    	$this->db->where('teaId', $this->session->userdata('u_name'));
    	$this->db->order_by("s_id", "asc");
    	$q = $this->db->get('score', $per_page, $offset);
    	return $q->result();
    }
    function getNum2($array) {
    	$this->db->where('teaId', $this->session->userdata('u_name')+"*");
    	$this->db->from('score');
    	$this->db->where($array);
    	return $this->db->count_all_results();
    }
    
    

    function getOneInfo1($id) {
        $this->db->select();
        $this->db->from('ws_chakan1');
        $this->db->where('b_id', $id);
        $q = $this->db->get();
        return $q->result();
    }
    

    function sgetOneInfo($id) {
        $this->db->select();
        $this->db->from('score');
        $this->db->where('s_id', $id);
        $q = $this->db->get();
        return $q->result();
    }

    function getNum1($array) {
        $this->db->where('courseTeaId', $this->session->userdata('u_name')+"*");
        $this->db->where("stateId", 3);
        $this->db->where("pstateId", 0);
        $this->db->from('ws_chakan1');
        $this->db->where($array);
        return $this->db->count_all_results();
    }
    
    function getNum3($array) {
        $this->db->where('courseTeaId', $this->session->userdata('u_name')+"*");
        $this->db->where("stateId",3);
        $this->db->from('ws_chakan1');
        return $this->db->count_all_results();
    }
   

    function updateScoreinfo($id, $array) {
        $this->db->where('s_id', $id);
        $this->db->update('score', $array);
    }

    function updateScore($id, $array) {
        $this->db->where('s_id', $id);
        $this->db->update('score', $array);
    }

    function delete($id) {
        $this->db->where('s_id', $id);
        $this->db->delete('score');
    }
    
    function getScoreNum($array1,$array2) {
    	$this->db->where($array1);
    	$this->db->where($array2);
    	$this->db->from('score');
    	return $this->db->count_all_results();
    }
    

}

?>
