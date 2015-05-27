<<style>
<!--
td{
text-align: left;
}
-->
</style>
<link href="<?= base_url(); ?>css/css1.css" type="text/css" rel="stylesheet" />

<div class="enterright" style="background-color: #F8F8F8;" >
    	<div class="enterrighttitle" ><p>实习项目模式选择</p></div>
        <div class="enterrightlist" >
        <form name="form1" method="post" action="<?= base_url() ?>index.php/admin/ncourse/save" id="form1">
            <input type="hidden" value="<?= $course->id ?>" name="id" id="id" />
     
        	<table width="99%" cellpadding="0" cellspacing="0">
        		<tr>
		            <td class="tabletitle" style="padding-left: 15px; width: 160px;">课程号</td>
		            <td class="tablecontent" style="padding-left: 15px" ><?= $course->courseId ?>&nbsp;</td>
		        </tr>
		        <tr>
		            <td class="tabletitle" style="padding-left: 15px; width: 160px">课序号</td>
		            <td class="tablecontent" style="padding-left: 15px" ><?= $course->courseNum ?>&nbsp;</td>
		        </tr>
		        <tr>
		            <td class="tabletitle" style="padding-left: 15px; width: 160px">课程名</td>
		            <td class="tablecontent" style="padding-left: 15px" ><?= $course->courseName ?>&nbsp;</td>
		        </tr>
		        <tr>
		            <td class="tabletitle" style="padding-left: 15px; width: 160px">课程英文名</td>
		            <td class="tablecontent" style="padding-left: 15px" ><?= $course->courseNameEn ?>&nbsp;</td>
		        </tr>
		        <tr>
		            <td class="tabletitle" style="padding-left: 15px; width: 160px">学分</td>
		            <td class="tablecontent" style="padding-left: 15px" ><?= $course->courseCredit ?>&nbsp;</td>
		        </tr>
		        <tr>
		            <td class="tabletitle" style="padding-left: 15px; width: 160px">学时</td>
		            <td class="tablecontent" style="padding-left: 15px" ><?= $course->courseHour ?>&nbsp;</td>
		        </tr>
		        <tr>
		            <td class="tabletitle" style="padding-left: 15px; width: 160px">指导教师</td>
		            <td class="tablecontent" style="padding-left: 15px" ><?= $course->courseTeaName ?>&nbsp;</td>
		        </tr>
		        <tr>
		            <td class="tabletitle" style="padding-left: 15px; width: 160px">上课班级</td>
		            <td class="tablecontent" style="padding-left: 15px" ><?= $course->courseClass ?>&nbsp;</td>
		        </tr>
		        <tr>
		            <td class="tabletitle" style="padding-left: 15px; width: 160px">上课时间</td>
		            <td class="tablecontent" style="padding-left: 15px" ><?= $course->courseTime ?>&nbsp;</td>
		        </tr>
		        <tr>
		            <td class="tabletitle" style="padding-left: 15px; width: 160px">上课地点</td>
		            <td class="tablecontent" style="padding-left: 15px" ><?= $course->coursePlace ?>&nbsp;</td>
		        </tr>
		        <tr>
		            <td class="tabletitle" style="padding-left: 15px; width: 160px">上课周次</td>
		            <td class="tablecontent" style="padding-left: 15px" ><?= $course->courseWeekly ?>&nbsp;</td>
		        </tr>
		        <tr>
		            <td class="tabletitle" style="padding-left: 15px; width: 160px">实习项目模式</td>
		            <td class="tablecontent" style="padding-left: 15px" >
		            <select name="patternId" style="width: 150px; height: 30px;">
		                <option value="4" >请选择模式</option>
		            	<option value="1" <?php if($course->patternId == "1") echo "selected"?>>志愿式</option>
		            	<option value="2" <?php if($course->patternId == "2") echo "selected"?>>自选式</option>
		            	<option value="3" <?php if($course->patternId == "3") echo "selected"?>>分配式</option>
		            </select>
		            
		            </td>
		        </tr>
		        
		        <tr>
		            <td colspan="2" class="td3" style="text-align: center;">
		                <input type="submit" name="btnSave" value="保 存" onclick="return check('form1');" id="btnSave" class="input" />
		                <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/admin/ncourse/ncourseList';" id="btnReturn" class="input" />      </td>
		        </tr>
            </table>
            </form>
        </div>     
</div>
