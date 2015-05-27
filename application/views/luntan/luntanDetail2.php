<div style="margin-left:20px; margin-right:20px;">
    <br />
    <h1><font size=4><center>查看回帖信息</center></font></h1>
    <center>
    <table cellpadding="0" cellspacing="1"  border="2" border-color="black"  width="400" >
        <tr>
            <td class="td1" style="width: 111px"><font size=3>学生发帖编号</font></td>
            <td class="td2" ><font size=3><?= $l_id ?>&nbsp;</font></td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px"><font size=3>学号</font></td>
            <td class="td2" ><font size=3><?= $stuId ?>&nbsp;</font></td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px"><font size=3>学生姓名</font></td>
            <td class="td2" ><font size=3><?= $srealname ?>&nbsp;</font></td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px"><font size=3>学生电话</font></td>
            <td class="td2" ><font size=3><?= $sphone ?>&nbsp;</font></td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px"><font size=3>学生邮箱</font></td>
            <td class="td2" ><font size=3><?= $semail ?>&nbsp;</font></td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px"><font size=3>学生班级</font></td>
            <td class="td2" ><font size=3><?= $sclass ?>&nbsp;</font></td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px"><font size=3>发帖时间</font></td>
            <td class="td2" ><font size=3><?= $time1 ?>&nbsp;</font></td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px"><font size=3>发帖类别</font></td>
            <td class="td2" ><font size=3><?= $type ?>&nbsp;</font></td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px"><font size=3>发帖主题</font></td>
            <td class="td2" ><font size=3><?= $theme ?>&nbsp;</font></td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px"><font size=3>发帖内容</font></td>
            <td class="td2" ><font size=3><?= $content ?>&nbsp;</font></td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px"><font size=3>回帖教师工号</font></td>
            <td class="td2" ><font size=3><?= $teaId ?>&nbsp;</font></td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px"><font size=3>回帖教师姓名</font></td>
            <td class="td2" ><font size=3><?= $trealname ?>&nbsp;</font></td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px"><font size=3>回帖教师电话</font></td>
            <td class="td2" ><font size=3><?= $tphone ?>&nbsp;</font></td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px"><font size=3>回帖教师邮箱</font></td>
            <td class="td2" ><font size=3><?= $temail ?>&nbsp;</font></td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px"><font size=3>回帖教师班级</font></td>
            <td class="td2" ><font size=3><?= $tclass ?>&nbsp;</font></td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px"><font size=3>回帖时间</font></td>
            <td class="td2" ><font size=3><?= $time2 ?>&nbsp;</font></td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px"><font size=3>回帖内容</font></td>
            <td class="td2" ><font size=3><?= $reply ?>&nbsp;</font></td>
        </tr>
        <tr>
            <td colspan="2" class="td3" align="center">
                <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/luntan/luntan/luntan2List';" id="btnReturn" class="input" />      
            </td>
        </tr>
    </table></center>
</div>