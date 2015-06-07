<!-- 自选式 -->
<div style="margin-left:20px; margin-right:20px;">
    <br />
    <h3>课程发布</h3>
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
            <span style="color: red">课程为自选式，可直接发布或添加基地</span>
            </td>
        </tr>
        
        <tr>
            <td colspan="2" class="td3" align="center">
            <input type="button" name="btnReturn" value="添加基地" onclick="window.location.href='<?= base_url() ?>index.php/teacher/company/companyList/<?=$coursep->cour_id?>';" id="btnReturn" class="input" />
            	<input type="button" name="btnReturn" value="发布课程" onclick="window.location.href='<?= base_url() ?>index.php/teacher/course/coursePublish1/<?=$course->id?>/<?=$coursep->cour_id?>';" id="btnReturn" class="input" />
                <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/teacher/course/courseList';" id="btnReturn" class="input" />      
            </td>
        </tr>
    </table>
</div>