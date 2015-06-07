<div style="margin-left:20px; margin-right:20px;">
    <br />
    <h3>
    	<div style="float: left; ">课程详细信息</div>
    	<div style="float: left; font-size:12px; <?php if(isset($show3)) echo $show3; ?> ">&nbsp;&nbsp;&nbsp;--&nbsp;&nbsp;&nbsp;(&nbsp;&nbsp;<a  href="<?= base_url() ?>index.php/teacher/company/companyList/<?=$coursep->cour_id?>" target="_blank">查看基地</a>&nbsp;&nbsp;)</div>
    </h3>
    <br><br>
    <table cellpadding="0" cellspacing="1" class="tablist2">
        <tr>
            <td class="td1" style="width: 111px">课程号</td>
            <td class="td2" ><?= $course->courseId ?>&nbsp;</td>
        </tr>  
        <tr>
            <td class="td1" style="width: 111px">课序号</td>
            <td class="td2" ><?= $course->courseNum ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">课程名</td>
            <td class="td2" ><?= $course->courseName ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">课程英文名</td>
            <td class="td2" ><?= $course->courseNameEn ?>&nbsp;</td>
        </tr>  
        <tr>
            <td class="td1" style="width: 111px">学分</td>
            <td class="td2" ><?= $course->courseCredit ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">学时</td>
            <td class="td2" ><?= $course->courseHour ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">课程模式</td>
            <td class="td2" >
            <?php
                if($coursep->patt_type=="")echo "未设置";
                else echo $coursep->patt_type;
            ?>&nbsp;
            </td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">是否发布</td>
            <td class="td2" >
            <?php 
            	if($coursep->cour_publish==1) echo "已发布";
            	else echo "未发布";
            	
            ?>&nbsp;
            </td>
        </tr>
        
        
        <tr>
            <td colspan="2" class="td3" align="center">
            	<input type="button" name="btnReturn" value="设置模式" onclick="window.location.href='<?= base_url() ?>index.php/teacher/course/courseNew/<?=$course->id?>';" id="btnReturn" class="input" style="<?php if(isset($show1)) echo $show1; ?>" />
            	<!--  <input type="button" name="btnReturn" value="查看基地" onclick="window.location.href='<?= base_url() ?>index.php/teacher/company/companyList/<?=$coursep->cour_id?>';" id="btnReturn" class="input" style="<?php if(isset($show3)) echo $show3; ?>" />-->
            	<input type="button" name="btnReturn" value="发布课程" onclick="window.location.href='<?= base_url() ?>index.php/teacher/course/coursePublish/<?=$course->id?>/<?=$coursep->cour_id?>';" id="btnReturn" class="input" style="<?php if(isset($show2)) echo $show2?>" />
                <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/teacher/course/courseList';" id="btnReturn" class="input" />      
            </td>
        </tr>
    </table>
</div>