<div style="margin-left:20px; margin-right:20px;">
    <br />
    <h3 class="lz_title">实习报名信息</h3>
    <table cellpadding="0" cellspacing="1" class="tablist2">
        <tr>
            <td class="td1" style="width: 111px">课程号</td>
            <td class="td2" ><?= $variable->KCH ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">课序号</td>
            <td class="td2" ><?= $variable->KXH ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">课程名</td>
            <td class="td2" ><?= $variable->KCM ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">课程英文名</td>
            <td class="td2" ><?= $course->YWKCM ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">课程学分</td>
            <td class="td2" ><?= $course->XF ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">课程学时</td>
            <td class="td2" ><?= $course->XS ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">开课校区</td>
            <td class="td2" ><?= $course->XQM ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">指导教师姓名</td>
            <td class="td2" ><?= $course->JSM ?>&nbsp;</td>
        </tr>
        
        <tr>
            <td class="td1" style="width: 111px">实习课程模式</td>
            <td class="td2" ><?= $coursep->patt_type ?>&nbsp;</td>
        </tr>
        
        <tr>
            <td colspan="2" class="td3" align="center">
            <input type="button" name="btnReturn" value="提 交 基 地" onclick="window.location.href='<?= base_url() ?>index.php/student/companyz/companyList/<?= $coursep->cour_id ?>';" id="btnReturn" class="input" />
                <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/student/variablebm/variableList';" id="btnReturn" class="input" />      
            </td>
        </tr>
    </table>
</div>