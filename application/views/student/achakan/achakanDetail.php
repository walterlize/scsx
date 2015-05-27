<div style="margin-left:20px; margin-right:20px;">
    <br />
    <h3>查看实习分配结果信息</h3>
    <table cellpadding="0" cellspacing="1" class="tablist2">
        <tr>
            <td class="td1" style="width: 111px">实习项目模式</td>
            <td class="td2" ><?= $pattern ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习项目名称</td>
            <td class="td2" ><?= $courseName ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">指导教师姓名</td>
            <td class="td2" ><?= $courseTeaName ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习基地名称</td>
            <td class="td2" ><?= $comName ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习基地地址</td>
            <td class="td2" ><?= $comAddress ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习基地负责人</td>
            <td class="td2" ><?= $realname ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">负责人电话</td>
            <td class="td2" ><?= $uPhone ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">负责人邮箱</td>
            <td class="td2" ><?= $uEmail ?>&nbsp;</td>
        </tr>
        
        
        <tr>
            <td class="td1" style="width: 111px">实习基地简介</td>
            <td class="td2" ><?= $comContent ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习基地计划</td>
            <td class="td2" ><?= $comPlan ?>&nbsp;</td>
        </tr>

        <tr>
            <td colspan="2" class="td3" align="center">
                <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/student/achakan/achakanList';" id="btnReturn" class="input" />      
            </td>
        </tr>
    </table>
</div>