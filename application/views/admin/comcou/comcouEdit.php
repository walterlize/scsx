<style>
<!--
td{
text-align: left;
}
-->
</style>
<link href="<?= base_url(); ?>css/css1.css" type="text/css" rel="stylesheet" />

<div class="enterright" style="background-color: #F8F8F8;" >
    	<div class="enterrighttitle" ><p>实习基地分配</p></div>
        <div class="enterrightlist" >
        <form name="form1" method="post" action="<?= base_url() ?>index.php/admin/ncomcou/save" id="form1">
            <input type="hidden" value="<?= $comc->id?>" name="comId" id="comId" />
            
     
        	<table width="99%" cellpadding="0" cellspacing="0">
        		<tr>
		            <td class="tabletitle" style="padding-left: 15px; width: 160px">实习项目课程</td>
		            <td class="tablecontent" style="padding-left: 15px" >
		            	<select name="courseId" id="courseId" onchange="selectId()" style="width: 160px;">
		            	<option value="">-------课程号-------</option>
		            	<?php 
		            	foreach ($course as $r){
		            		echo "<option value=";
		            		echo $r->courseId;
		            		echo ">";
		            		echo $r->courseId;
		            		echo "</option>";
		            	}
		            	?>
		            	</select>
		            	&nbsp;&nbsp;&nbsp;
		            	<select name="courseNum" id="courseNum" onchange="selectNum()" style="width: 120px;">
		            	<option value="">----课序号----</option>
		            
		            	</select>
		            	&nbsp;&nbsp;&nbsp;
		            	<select name="course_id" id="courseName" onchange="selectName()" style="width: 250px;">
		            	<option value="">--------------课程名-------------</option>
		            
		            	</select>
		            	
		            	<script type="text/javascript">
				            function selectId(){
				            	//获取所选一级指标值
				                var seId = document.getElementById("courseId").value;
				                var seNum = document.getElementById("courseNum");
				                var seName = document.getElementById("courseName");
				                
				    	        if(seId){
				    	        	var urla = '<?=base_url();?>index.php/admin/ncomcou/getAjaxId/'+seId;
				    	    		//通过Ajax获取数据
				    	            $.ajax({
				    	                type: "get",               
				    	                url: urla,
				    	                dataType: "json", //返回数据形式为json	
				    	                              
				    	                success: function (data) {
				    		                if(data){	                	
				    		                	//为下拉框获取选项
				    		                	seNum.options.length = 0;
				    		                	seNum.options.add(new Option("----课序号----", ""));
				    		                	for(var i=0;i<data.courseNum.length;i++){    
				    		                	    seNum.options.add(new Option(data.courseNum[i]['courseNum'], data.courseNum[i]['courseNum']));
				    		                	}
				    		                }
				    	
				    	               },
				    	                error: function(XMLHttpRequest, textStatus, errorThrown) {
				    		                //以下代码供测试
				    	                    //alert(XMLHttpRequest.status);
				    	                    //alert(XMLHttpRequest.readyState);
				    	                    //alert(textStatus);
				    	                    alert("数据加载失败");
				    	                }
				    	            }); 
				                }else{
				                	//为下拉框获取选项
				                	seNum.options.length = 0;
				                	seNum.options.add(new Option("----课序号----", ""));
				                	seName.options.length = 0;
				                	seName.options.add(new Option("--------------课程名-------------", ""));
				                }
				            }

				            function selectNum(){
				            	//获取所选二级指标值
				                var seId = document.getElementById("courseId").value;
				                var seNum = document.getElementById("courseNum");
				                var seName = document.getElementById("courseName");
				    	        if(seId){
				    	        	var urla = '<?=base_url();?>index.php/admin/ncomcou/getAjaxNum/'+seId+'/'+seNum.value;
				    	    		//通过Ajax获取数据
				    	            $.ajax({
				    	                type: "get",               
				    	                url: urla,
				    	                dataType: "json", //返回数据形式为json	
				    	                              
				    	                success: function (data) {
				    		                if(data){	                	
				    		                	//为下拉框获取选项
				    		                	seName.options.length = 0;
				    		                	seName.options.add(new Option("--------------课程名-------------", ""));
				    		                	for(var i=0;i<data.courseName.length;i++){    
				    		                	    seName.options.add(new Option(data.courseName[i]['courseName'], data.courseName[i]['id']));
				    		                	}
				    		                	
				    		                }
				    	
				    	               },
				    	                error: function(XMLHttpRequest, textStatus, errorThrown) {
				    		                //以下代码供测试
				    	                    //alert(XMLHttpRequest.status);
				    	                    //alert(XMLHttpRequest.readyState);
				    	                    //alert(textStatus);
				    	                    alert("数据加载失败");
				    	                }
				    	            }); 
				                }else{
				                	//为下拉框获取选项
				                	seName.options.length = 0;
				                	seName.options.add(new Option("--------------课程名-------------", ""));
				                }
				            }
				            </script>
            
		            </td>
		            
		        </tr>
		        

		        <tr>
		            <td class="tabletitle" style="padding-left: 15px; width: 160px">实习基地名</td>
		            <td class="tablecontent" style="padding-left: 15px" >
		            	<select name="comId" style="width: 300px;">
		            	<option value="">---------------请选择基地---------------</option>
		            	<?php 
		            	foreach ($company as $r){
		            		echo "<option value=";
		            		echo $r->comId;
		            		echo ">";
		            		echo $r->comName;
		            		echo "</option>";
		            	}
		            	?>
		            	</select>
		            </td>
		        </tr>
		        
		        
		        <tr>
		            <td colspan="2" class="td3" style="text-align: center;">
		                <input type="submit" name="btnSave" value="保 存" onclick="return check('form1');" id="btnSave" class="input" />
		                <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/admin/ncomcou/ncomcouList';" id="btnReturn" class="input" style="<?=$show?>" />      </td>
		        </tr>
            </table>
            
        </div>     
</div>
