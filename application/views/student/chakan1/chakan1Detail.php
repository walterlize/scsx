<div style="margin-left:20px; margin-right:20px;">
    <br />
    <h3>实习结果评价查看信息</h3>
    <table cellpadding="0" cellspacing="1" class="tablist2">
        <tr>
            <td class="td1" style="width: 111px">教师姓名</td>
            <td class="td2" ><?= $teaName ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">教师打分</td>
            <td class="td2" ><?= $tscore ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">教师评价</td>
            <td class="td2" ><?= $tcomment ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">基地用户姓名</td>
            <td class="td2" ><?= $mName ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">基地用户打分</td>
            <td class="td2" ><?= $mscore ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">基地用户评价</td>
            <td class="td2" ><?= $mcomment ?>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2" class="td3" align="center">
                <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/student/chakan1/chakan1List';" id="btnReturn" class="input" />      
            </td>
        </tr>
    </table>
</div>