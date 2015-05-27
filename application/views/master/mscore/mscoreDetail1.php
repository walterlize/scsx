<div style="margin-left:20px; margin-right:20px;">
    <br />
    <h3>学生报名信息</h3>
    <table cellpadding="0" cellspacing="1" class="tablist2">
        <tr>
            <td class="td1" style="width: 111px">实习项目名称</td>
            <td class="td2" ><?= $courseName ?>&nbsp;</td>
        </tr>  
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
            <td class="td1" style="width: 111px">学生性别</td>
            <td class="td2" ><?= $stuSex ?>&nbsp;</td>
        </tr>      
        <tr>
            <td colspan="2" class="td3" align="center">
                <input type="button" name="btnReturn" value="评 价" onclick="window.location.href='<?= base_url() ?>index.php/master/mscore/mscoreNew1/<?= $stuId ?>/<?= $b_id ?>';" id="btnReturn" class="input" />
                <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/master/mscore/mscoreList';" id="btnReturn" class="input" />      
            </td>
        </tr>
    </table>
</div>