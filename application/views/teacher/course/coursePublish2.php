<!-- 志愿式 -->
<div style="margin-left:20px; margin-right:20px;">
    <br />
    <h3>学生报名信息</h3>
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
            <td class="td1" colspan="2">
            <span style="color: red">课程为志愿式，请设置至少一个基地后再进行发布</span>
            </td>
            
        </tr>
        
        <tr>
            <td colspan="2" class="td3" align="center">
            	<input type="button" name="btnReturn" value="设 置 基 地" onclick="window.location.href='<?= base_url() ?>index.php/teacher/course/coursePublish2/<?=$course->id?>/<?=$coursep->cour_id?>';" id="btnReturn" class="input" />
                <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/teacher/course/courseList';" id="btnReturn" class="input" />      
            </td>
        </tr>
    </table>
</div>