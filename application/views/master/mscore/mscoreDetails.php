<div style="margin-left:20px; margin-right:20px;">
    <br />
    <h3>评价实习结果提交信息</h3>
    <table cellpadding="0" cellspacing="1" class="tablist2">
        <tr>
            <td class="td1" style="width: 111px">学生学号</td>
            <td class="td2" ><?= $stuId ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">学生姓名</td>
            <td class="td2" ><?= $stuName ?>&nbsp;</td>
        </tr> 
       <tr>
            <td class="td1" style="width: 111px">学生院系</td>
            <td class="td2" ><?= $stuMajor ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">学生班级</td>
            <td class="td2" ><?= $stuClass ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">分数</td>
            <td class="td2" ><?= $score ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">评语</td>
            <td class="td2" ><?= $comment ?>&nbsp;</td>
        </tr> 
        <tr>
            <td colspan="2" class="td3" align="center">
                <input type="button" name="btnReturn" value="编 辑" onclick="window.location.href='<?= base_url() ?>index.php/master/mscore/mscoreEdit/<?= $s_id ?>';" id="btnReturn" class="input" />
                <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/master/mscore/mscoreLists';" id="btnReturn" class="input" />      
            </td>
        </tr>
    </table>
</div>