<?php

class m_nvariable extends CI_Model {
/*
    var $table = "ovariable";

    //按ID查找选课结果
    function getNvariableById($id) {
    	$this->db->select();
    	$this->db->from($this->table);
    	$this->db->where('id',$id);
    	$q = $this->db->get();
    	return $q->result();
    }

    //按条件查找选课结果
    function getNvariable1($array) {
        $this->db->select();
        $this->db->from($this->table);
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }
    
    //按条件获得实习项目条数
    function getNum1($array) {
    	$this->db->select();
    	$this->db->from($this->table);
    	$this->db->where($array);
    	return $this->db->count_all_results();
    }
    //按条件获得实习项目条数
    function getNumByCol1($array) {
    	$this->db->select();
    	$this->db->where('XSM',$this->session->userdata('college'));
    	$this->db->from($this->table);
    	$this->db->where($array);
    	return $this->db->count_all_results();
    }
    
    //分页查询
    function getNvariables1($array, $per_page, $offset) {
    	$this->db->select();
    	$this->db->where($array);
    	$q = $this->db->get($this->table, $per_page, $offset);
    	return $q->result();
    }
    
    //分页查询
    function getNvariablesByCol1($array, $per_page, $offset) {
    	$this->db->select();
    	$this->db->where('XSM',$this->session->userdata('college'));
    	$this->db->where($array);
    	$q = $this->db->get($this->table, $per_page, $offset);
    	return $q->result();
    }


    //按条件查找选课结果
    function getClass($array) {
    	$this->db->select('stuClass,stuMajor');
    	$this->db->from($this->table);
    	
    	$this->db->order_by("convert(stuClass using gbk)","asc");
    	$this->db->where($array);
    	$this->db->distinct();
    	$q = $this->db->get();
    	return $q->result();
    }
*/
	
	//按条件查找选课结果
	function getNvariable($array) {
		$conn = $this->dbConn();
        //处理array
        $str1 = $this->arrToStr($array);
        $str=iconv('UTF-8', 'GBK', $str1);
              
        $query = "select * from V_SX_XSXKB ".$str;
               
        $content=oci_parse($conn,$query);  //被解析语句     
        oci_execute($content);//执行被解析语句       
        $results = $this->resToObj($content);
        $this->dbClose($content,$conn);
        return $results;
	}
	
	function getNum($array) {
		$conn = $this->dbConn();
        //处理array
        $str1 = $this->arrToStr($array);
        $str=iconv('UTF-8', 'GBK', $str1);
              
        $query = "select * from V_SX_XSXKB ".$str;
               
        $content=oci_parse($conn,$query);  //被解析语句
    	oci_execute($content);//执行被解析语句
    	$num = oci_fetch_all($content,$result);
        $this->dbClose($content,$conn);
        return $num;
	}
	
	//按条件获得实习项目条数
	function getNumByCol($array) {
		$conn = $this->dbConn();
        //处理array
        $str1 = $this->arrToStr($array);            
        $college = $this->session->userdata('college');
        $strCol1 = " and XSM = ".$college;
        if(!$str) $strCol1="WHERE XSM = ".$college;
        $str=iconv('UTF-8', 'GBK', $str1);
        $strCol=iconv('UTF-8', 'GBK', $strCol1);
        $query = "select * from V_SX_XSXKB ".$str.$strCol;
        
               
        $content=oci_parse($conn,$query);  //被解析语句     
        oci_execute($content);//执行被解析语句       
        $results = $this->resToObj($content);
        $this->dbClose($content,$conn);
        return $results;
	}
	
	//分页查询
	function getNvariables($array, $per_page, $offset) {
		$conn = $this->dbConn();
        //处理array
        $str = $this->arrToStr($array);
        if($offset =='' || !$offset) $offset=0;
        $strLimit1 = "  and rownum <= ".($offset+$per_page);
        $strLimit2 = "  and rownum <= ".$offset;
        if(!$str) {
        	$strLimit1 = " WHERE rownum <= ".($offset+$per_page);
        	$strLimit2 = " WHERE rownum <= ".$offset;
        }
        $query2 = "select * from V_SX_XSXKB ".$str;
        $query1 = $query2.$strLimit1." minus ".$query2.$strLimit2;
        $query=iconv('UTF-8', 'GBK', $query1);
        
               
        $content=oci_parse($conn,$query);  //被解析语句     
        
        oci_execute($content);//执行被解析语句       
        $results = $this->resToObj($content);
        $this->dbClose($content,$conn);
        return $results;
	}
	
	function getNvariablesByCol($array, $per_page, $offset) {
		$conn = $this->dbConn();
        //处理array
        $str = $this->arrToStr($array);
        $college = $this->session->userdata('college');
        $strCol = " and XSM = ".$college;
        if(!$str) $strCol1="WHERE XSM = ".$college;
        if($offset =='' || !$offset) $offset=0;
        $strLimit1 = "  and rownum <= ".($offset+$per_page);
        $strLimit2 = "  and rownum <= ".$offset;
        $query = "select * from V_SX_XSXKB ".$str.$strCol;
        $query = $query.$strLimit1." minus ".$query.$strLimit2;
        //$query = "select * from V_SX_XSXKB WHERE ".$str.$strCol.$strLimit;
               
        $content=oci_parse($conn,$query);  //被解析语句     
        oci_execute($content);//执行被解析语句       
        $results = $this->resToObj($content);
        $this->dbClose($content,$conn);
        return $results;
	}
	
	//连接数据库
	function dbConn(){
		$conn = oci_connect('sjk','sjk#_2015$','202.205.91.55/urpjw');
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
			$this->zhandi_iconv($row,"GBK","UTF-8");
			array_push($results,$row);
		}
		return $results;
	}
	
	function arrToStr($array){
    	//处理array
    	$str = '';
    	$i = 0;
    	$ai = count($array);
    	foreach($array as $key => $val){
    		$str = $str." ".$key." = '".$val."'";
    		$i++;
    		if($i < $ai)$str = $str." and ";
    	}
    	if($str) $str1 = "WHERE ".$str;
    	else $str1 = $str;
    	return $str1;
    }
	
	/**
	 * 循环实现编码互转
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

    
}
?>

