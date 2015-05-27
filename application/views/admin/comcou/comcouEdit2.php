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
            <input type="hidden" value="<?= $comc->id?>" name="id" id="id" />
            <input type="hidden" value="<?= $comc->course_id?>" name="course_id" id="course_id" />
            <input type="hidden" value="<?= $comc->courseId?>" name="courseId" id="courseId" />
            <input type="hidden" value="<?= $comc->courseNum?>" name="courseNum" id="courseNum" />
     
        	<table width="99%" cellpadding="0" cellspacing="0">
        		<tr>
		            <td class="tabletitle" style="padding-left: 15px; width: 160px">实习项目课程号</td>
		            <td class="tablecontent" style="padding-left: 15px" >
		            	<?=$comc->courseId?>           
		            </td>
		        </tr>
		        <tr>
		            <td class="tabletitle" style="padding-left: 15px; width: 160px">实习项目课序号</td>
		            <td class="tablecontent" style="padding-left: 15px" >
		            	<?=$comc->courseNum?>           
		            </td>
		        </tr>
		        <tr>
		            <td class="tabletitle" style="padding-left: 15px; width: 160px">实习项目课程名</td>
		            <td class="tablecontent" style="padding-left: 15px" >
		            	<?=$comc->courseName?>           
		            </td>
		        </tr>
		        

		        <tr>
		            <td class="tabletitle" style="padding-left: 15px; width: 160px">实习基地名</td>
		            <td class="tablecontent" style="padding-left: 15px" >
		            	<select name="comId" style="width: 300px;">
		            	
		            	<?php 
		            	foreach ($company as $r){
		            		echo "<option value=";
		            		echo $r->comId;
		            		if($r->comId == $comc->comId)
		            			echo " selected";
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
