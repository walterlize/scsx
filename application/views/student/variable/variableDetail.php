<div style="margin-left:20px; margin-right:20px;">
    <br />
    <h3>实习报名信息</h3>
    <table cellpadding="0" cellspacing="1" class="tablist2">
        <tr>
            <td class="td1" style="width: 111px">实习课程号</td>
            <td class="td2" ><?= $variable->courseId ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习课序号</td>
            <td class="td2" ><?= $variable->courseNum ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习课程名</td>
            <td class="td2" ><?= $variable->courseName ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习课程英文名</td>
            <td class="td2" ><?= $variable->courseNameEn ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习课程学分</td>
            <td class="td2" ><?= $course->courseCredit ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习课程学时</td>
            <td class="td2" ><?= $course->courseTime ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习课程上课周次</td>
            <td class="td2" ><?= $course->courseWeekly ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">指导教师姓名</td>
            <td class="td2" ><?= $course->courseTeaName ?>&nbsp;</td>
        </tr>
        
        <tr>
            <td class="td1" style="width: 111px">实习课程模式</td>
            <td class="td2" ><?= $variable->pattern ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习课程模式简介</td>
            <td class="td2" ><?= $variable->content ?>&nbsp;</td>
        </tr>

        <tr>
            <td colspan="2" class="td3" align="center">
                <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/student/variable/variableList';" id="btnReturn" class="input" />      
            </td>
        </tr>
    </table>
</div>