<div style="margin-left:20px; margin-right:20px;">
    <br />
    <h3>填写实习总结信息</h3>
    <table cellpadding="0" cellspacing="1" class="tablist2">
        <tr>
            <td class="td1" style="width: 111px">实习总结任务标题</td>
            <td class="td2" ><?= $summary->title ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">下达时间</td>
            <td class="td2" ><?= $summary->workTime ?>&nbsp;</td>
        </tr> 
        <tr>
            <td class="td1" style="width: 111px">实习总结任务内容</td>
            <td class="td2" ><?= $summary->content ?>&nbsp;</td>
        </tr>      
        <tr>
            <td class="td1" style="width: 111px">教师姓名</td>
            <td class="td2" ><?= $summary->realname ?>&nbsp;</td>
        </tr> 
        <tr  style="<?= $show1 ?>" align="center">
             <td class="td2" colspan="2" align="center"><font color="red" size="4px" >已填写</font>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2" class="td3" align="center">
                <input type="button" style="<?= $show ?>" name="btnReturn" value="填 写" onclick="window.location.href='<?= base_url() ?>index.php/student/summary/summaryNew/<?= $summary->m_id ?>';" id="btnReturn" class="input" />
                <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/student/summary/summaryList';" id="btnReturn" class="input" />      
            </td>
        </tr>
    </table>
</div>