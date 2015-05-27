<div style="margin-left:20px; margin-right:20px;">
    <br />
    <h3>查看实习总结信息</h3>
    <table cellpadding="0" cellspacing="1" class="tablist2">
        <tr>
            <td class="td1" style="width: 111px">实习总结标题</td>
            <td class="td2" ><?= $title ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">下达时间</td>
            <td class="td2" ><?= $workTime ?>&nbsp;</td>
        </tr> 
        <tr>
            <td class="td1" style="width: 111px">实习任务内容</td>
            <td class="td2" ><?= $mcontent ?>&nbsp;</td>
        </tr> 
        <tr>
            <td class="td1" style="width: 111px">学生学号</td>
            <td class="td2" ><?= $stuId ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">学生姓名</td>
            <td class="td2" ><?= $realname ?>&nbsp;</td>
        </tr>       
        <tr>
            <td class="td1" style="width: 111px">提交时间</td>
            <td class="td2" ><?= $sendTime ?>&nbsp;</td>
        </tr> 
        <tr>
            <td class="td1" style="width: 111px">实习总结内容</td>
            <td class="td2" ><?= $content ?>&nbsp;</td>
        </tr> 
        <tr>
            <td class="td1" style="width: 111px">实习总结状态</td>
            <td class="td2" ><?= $s_state ?>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2" class="td3" align="center">
                <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/teacher/tsummary/tsummaryLists';" id="btnReturn" class="input" />      
            </td>
        </tr>
    </table>
</div>