<div style="margin-left:20px; margin-right:20px;">
    <br />
    <h3>查看回帖信息</h3>
    <table cellpadding="0" cellspacing="1" class="tablist2">
        <tr>
            <td class="td1" style="width: 111px">学生学号</td>
            <td class="td2" ><?= $stuId ?>&nbsp;</td>
        </tr>
        
        <tr>
            <td class="td1" style="width: 111px">发帖时间</td>
            <td class="td2" ><?= $time1 ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">发帖类别</td>
            <td class="td2" ><?= $type ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">发帖主题</td>
            <td class="td2" ><?= $theme ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">发帖内容</td>
            <td class="td2" ><?= $content ?>&nbsp;</td>
        </tr>

        
        <tr>
            <td class="td1" style="width: 111px">回帖时间</td>
            <td class="td2" ><?= $time2 ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">回帖内容</td>
            <td class="td2" ><?= $reply ?>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2" class="td3" align="center">
                <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/teacher/luntan/cluntanList';" id="btnReturn" class="input" />      
            </td>
        </tr>
    </table>
</div>