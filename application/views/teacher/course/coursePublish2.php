<!-- 志愿式 -->
<div style="margin-left:20px; margin-right:20px;">
    <br />
    <h3  class="lz_title">课程发布</h3>
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
            <td class="td1" colspan="2">
            <span style="color: red">课程为志愿式，请至少设置一个实习基地</span>
            </td>
        </tr>
        
        <tr>
            <td colspan="2" class="td3" align="center">
            	<input type="button" name="btnReturn" value="设 置 基 地" onclick="window.location.href='<?= base_url() ?>index.php/teacher/compcourpublish/companyList/<?=$coursep->cour_id?>/<?=$course->id?>';" id="btnReturn" class="input" />
                <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/teacher/course/courseList';" id="btnReturn" class="input" />      
            </td>
        </tr>
    </table>
</div>