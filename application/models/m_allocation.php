<?php

class m_allocation extends CI_Model {

    var $b_id = '';
    var $u_id = '';
    var $c_id = '';
    var $stateId = '';
    var $pstateId = '';
    var $ystateId = '';

    function saveInfo() {
        $this->db->select('stuId,stuName');
        $mclass = $this->input->post('class');
        $mmajor = $this->input->post('major');
        //分配式（全班 选课）
        $array =array();
        if(($mclass!="") && ($mmajor != "")){
        	$array=array('stuClass'=>$mclass,'stuMajor'=>$mmajor);
        }else{
        	$array=array('stuClass'=>$mclass);
        }
        //选了课的学生
        $courseId = $this->input->post('courseId');
        $courseNum = $this->input->post('courseNum');
        $array1 =array();
        if(($mclass!="") && ($mmajor != "")){
        	$array1=array('stuClass'=>$mclass,'stuMajor'=>$mmajor,'courseId'=>$courseId,'courseNum'=>$courseNum);
        }else{
        	$array1=array('stuClass'=>$mclass,'courseId'=>$courseId,'courseNum'=>$courseNum);
        }
        $this->db->where($array1);
        $this->db->order_by("stuId", "desc");
        $q = $this->db->get('nvariable');
        $result = $q->result();
        
        $i = 0;
        foreach ($result as $r) {
            $this->b_id = $this->input->post('b_id');
            $this->u_id = $r->stuId;
            $this->u_name = $r->stuName;
            $this->c_id = $this->input->post('c_id');
            $this->stateId = 3;
            $this->pstateId = 1;
            $this->ystateId = 1;

            $id = $this->b_id;
            if ($id == 0) {
                $this->db->insert('baoming', $this);
                $id = $this->db->insert_id();
            } else {
                $this->db->update('baoming', $this, array('b_id' => $this->b_id));
            }
            $i++;
        }    
        return $i;
    }
    
    function delete($c_id) {
    	$this->db->where('c_id', $c_id);
    	$this->db->delete('baoming');
    }

 


        
    function getAllo($array){
    	$this->db->select('stuClass,comName,c_id');

    	$this->db->order_by("convert(stuClass using gbk)","asc");
    	$this->db->where($array);
    	$this->db->distinct();
    	$q = $this->db->get('ws_allo');
    	return $q->result();
    }
    
    function getAllo1($array, $per_page, $offset) {
    	
    	
    	$this->db->select();
    	$this->db->where('college',$this->session->userdata('college'));
    	$this->db->where('patternId',3);
    	$this->db->where($array);
    	$this->db->order_by("convert(courseName using gbk)","asc");
    	$this->db->distinct();
    	$q = $this->db->get('ws_allo', $per_page, $offset);
    	return $q->result();
    	
    	
    }
    
    function getAllo1_Num($array){
    	$this->db->select();
    	
    	$this->db->where($array);
    	$this->db->where('college',$this->session->userdata('college'));
    	$this->db->where('patternId',3);
    	$this->db->distinct();
    	$this->db->from('ws_allo');
    	
        return $this->db->count_all_results();
    }

    }

?>
