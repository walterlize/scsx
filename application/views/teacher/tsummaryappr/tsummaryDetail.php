<div style="margin-left:20px; margin-right:20px;">
    <br />
    <h3>审核实习总结信息</h3>
    <table cellpadding="0" cellspacing="1" class="tablist2">
    	<tr>
            <td class="td1" style="width: 111px" colspan=2>
            <?= $summary->cour_name ?>(<?= $summary->cour_no ?>-<?= $summary->cour_num ?>)
            </td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习总结标题</td>
            <td class="td2" ><?= $summary->miss_title ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">下达时间</td>
            <td class="td2" ><?= $summary->miss_start_time ?>&nbsp;</td>
        </tr> 
        <tr>
            <td class="td1" style="width: 111px">实习任务内容</td>
            <td class="td2" ><?= $summary->miss_content ?>&nbsp;</td>
        </tr> 
        <tr>
            <td class="td1" style="width: 111px">学生学号</td>
            <td class="td2" ><?= $summary->summ_stu_num ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">学生姓名</td>
            <td class="td2" ><?= $summary->summ_stu_name ?>&nbsp;</td>
        </tr>       
        <tr>
            <td class="td1" style="width: 111px">提交时间</td>
            <td class="td2" ><?= $summary->summ_time ?>&nbsp;</td>
        </tr> 
        <tr>
            <td class="td1" style="width: 111px">实习总结内容</td>
            <td class="td2" ><?= $summary->summ_content ?>&nbsp;</td>
        </tr> 
        <tr>
            <td class="td1" style="width: 111px">实习总结状态</td>
            <td class="td2" ><span style="color: red">
            <?php 
            if($summary->summ_appr_id==5) echo "待审核"; 
            if($summary->summ_appr_id==6) echo "审核成功";
            if($summary->summ_appr_id==7) echo "审核失败";
            ?>&nbsp;
            </span></td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习总结评价</td>
            <td class="td2" ><?= $summary->summ_result ?>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2" class="td3" align="center">
            <input type="button" value="编 辑" class="input" onclick="window.location.href='<?= base_url(); ?>index.php/teacher/tsummary/tsummaryEdit/<?= $summary->summ_id ?>'">
                <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/teacher/tsummaryappr/tsummaryList';" id="btnReturn" class="input" />      
            </td>
        </tr>
    </table>
</div>