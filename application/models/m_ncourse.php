<?php

class m_ncourse extends CI_Model {
/*
    var $table = "ocourse";
    

    //按ID查找实习项目（课程）
    function getNcourseById($id) {
    	$this->db->select();
    	$this->db->from($this->table);
    	$this->db->where('id',$id);
    	$q = $this->db->get();
    	return $q->result();
    }

    //按条件查找实习项目（课程）
    function getNcourse($array) {
        $this->db->select();
        $this->db->from($this->table);
        //$this->db->where('college',$this->session->userdata('college'));
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }
    
    //按条件查找实习项目（课程）
    function getNcourseByCol($array) {
    	$this->db->select();
    	$this->db->from($this->table);
    	$this->db->where('XSM',$this->session->userdata('college'));
    	$this->db->where($array);
    	$q = $this->db->get();
    	return $q->result();
    }
    
    //按条件获得实习项目条数
    function getNum($array) {
    	$this->db->select();
    	$this->db->from($this->table);
    	$this->db->where($array);
    	return $this->db->count_all_results();
    }
    
    //按条件获得实习项目条数
    function getNumByCol($array) {
    	$this->db->select();
    	$this->db->from($this->table);
    	$this->db->where('XSM',$this->session->userdata('college'));
    	$this->db->where($array);
    	return $this->db->count_all_results();
    }
    
    
    //分页查询
    function getNcourses($array, $per_page, $offset) {
    	$this->db->select();
    	$this->db->where('XSM',$this->session->userdata('college'));
    	$this->db->where($array);
    	$q = $this->db->get($this->table, $per_page, $offset);
    	return $q->result();
    }

    //更新实习项目（自选，志愿，分配）
    function updateNcourse($id, $array) {
        $this->db->where('id', $id);
        $this->db->update($this->table, $array);
        return $this->db->affected_rows();
    }
    
    
    //按条件获得实习项目条数
    function getNumALL($array) {
    	$this->db->select();
    	$this->db->from($this->table);
    	$this->db->where($array);
    	return $this->db->count_all_results();
    }
    
    //按条件获得实习项目条数
    function getNumLike($tea_num,$array) {
    	$this->db->select();
    	$this->db->from($this->table);
    	$this->db->like('JSH',$tea_num);
    	$this->db->where($array);
    	return $this->db->count_all_results();
    }
    
    //分页查询
    function getNcoursesLike($tea_num,$array, $per_page, $offset) {
    	$this->db->select();
    	$this->db->like('JSH',$tea_num);
    	$this->db->where($array);
    	$q = $this->db->get($this->table, $per_page, $offset);
    	return $q->result();
    }
*/
	
	//按条件查找实习项目（课程）
	function getNcourse($array) {
		$conn = $this->dbConn();
        //处理array,改为where句式
        $str1 = $this->arrToStr($array);
		//将UTF-8转换为GBK
        $str=iconv('UTF-8', 'GBK', $str1);
		//select句式
        $query = "select * from NEWJW.XK_RW_LLRW_ALL_VIEW ".$str;

        $content=oci_parse($conn,$query);  //被解析语句     
        oci_execute($content);//执行被解析语句       
        $results = $this->resToObj($content);
        $this->dbClose($content,$conn);
        return $results;
	}
	
	
	function getNcourses($array, $per_page, $offset) {
		//连接数据库
		$conn = $this->dbConn();
		//处理array,改为where句式
        $str = $this->arrToStr($array);

		//可以直接用CI的分页
        if($offset =='' || !$offset) $offset=0;
        $strLimit1 = "  and rownum <= ".($offset+$per_page);
        $strLimit2 = "  and rownum <= ".$offset;
        if(!$str) {
        	$strLimit1 = " WHERE rownum <= ".($offset+$per_page);
        	$strLimit2 = " WHERE rownum <= ".$offset;
        }
		//$strOrder = " ORDER BY KCH ASC, KXH ASC";
        $query2 = "select * from NEWJW.XK_RW_LLRW_ALL_VIEW ".$str;

        $query1 = $query2.$strLimit1." minus ".$query2.$strLimit2;
        
        //$query1 = "select * from newjw.xk_rw_llrw_all_view WHERE JSH = '201250' AND rownum <=10  ORDER BY KCH ASC, KXH ASC MINUS select * from newjw.xk_rw_llrw_all_view WHERE JSH = '201250' AND rownum <=2 ORDER BY KCH ASC, KXH ASC";
        $query=iconv('UTF-8', 'GBK', $query1);
        //echo $query;
        //echo "<br>";
        //$query = "select * from V_SX_XSXXB WHERE ".$str.$strLimit;
               
        $content=oci_parse($conn,$query);  //被解析语句     
        //echo $content;
        oci_execute($content);//执行被解析语句       
        $results = $this->resToObj($content);
        $this->dbClose($content,$conn);
        return $results;
	}
	
	//按条件获得实习项目条数
	function getNum($array) {
		$conn = $this->dbConn();
        //处理array
        $str = $this->arrToStr($array);           
        $str1=iconv('UTF-8', 'GBK', $str);

        $query = "select * from NEWJW.XK_RW_LLRW_ALL_VIEW ".$str1;

               
        $content=oci_parse($conn,$query);  //被解析语句     

		if (!$content) {
        	
        	echo "SQL语句错误！";
        	exit;
        }
        $i = oci_execute($content);//执行被解析语句       
        if (!$i) {
        	
        	echo "预处理语句执行错误！";
        	exit;
        }
        $num = oci_fetch_all($content,$result);
        $this->dbClose($content,$conn);
        return $num;
	}
	
	//XK_RW_LLRW_ALL_VIEW
	
	//连接数据库
	function dbConn(){
        $conn = oci_connect('sjk','sjk#_2015$','(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = 202.205.91.55)(PORT = 1521)) (CONNECT_DATA = (SERVICE_NAME = urpjw) (SID = urpjw)))');

        if (!$conn) {
			$Error = oci_error();
			print htmlentities($Error['message']);
			exit;
		} else
		{
			return $conn;
		}
	}
	//关闭连接
	function dbClose($content,$conn){
		oci_free_statement($content);
		oci_close($conn);
	}
	
	function resToObj($content){
		$results = array();
		while (($row = oci_fetch_object($content)) != false) {
			// Use upper case attribute names for each standard Oracle column
			//echo $row->JSH . "<br>\n";
			@$this->zhandi_iconv($row,"GB2312","UTF-8");
			array_push($results,$row);
		}
		return $results;
	}
	
	
	/**
	 * 循环实现编码互转
	 *
	 * @param string $param(字符串，对象，或者数组)，$currCharset当前编码，$toCharset期望编码
	 * @return 参数类型
	
	 */
	
	function zhandi_iconv($param,$currCharset,$toCharset){
	
		if ($currCharset != $toCharset){
			if (is_string($param)){
				return iconv($currCharset, $toCharset, $param);
			}else if (is_array($param)){
				foreach ($param as $key => $value){
					$param[$key] = $this->zhandi_iconv($value,$currCharset,$toCharset);
				}
				return $param;
			}else if (is_object($param)){
				foreach ($param as $key => $value){
					$param->$key = $this->zhandi_iconv($value,$currCharset,$toCharset);
				}
				return $param;
			}else{
				return $param;
			}
		}
		return $param;
	}
	
	function arrToStr($array){
    	//处理array

    	$str = '';
    	$i = 0;
		//计算数组中元素的个数
    	$ai = count($array);
		//将数组改为where 的句式
    	foreach($array as $key => $val){
			//将数组的key与value对应
    		$str = $str." ".$key." = '".$val."'";

    		$i++;

    		if($i < $ai)$str = $str." and ";
    	}
    	if($str) $str1 = "WHERE ".$str;

    	else $str1 = $str;
		//printf($str1);
    	return $str1;
    }
    
}
?>

