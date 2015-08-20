<div style="margin-left:20px; margin-right:20px;">
    <br />
    <h3>审核实习总结信息</h3>
    <form name="form1" method="post" action="<?= base_url() ?>index.php/teacher/tsummary/update/<?= $summary->summ_id ?>" id="form1">
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
            <td class="td2" >
            	<select name = "summ_appr_id">
	            	<option value="6" <?php if($summary->summ_appr_id == 6) echo "selected"; ?> >审核成功</option>
	            	<option value="7" <?php if($summary->summ_appr_id == 7) echo "selected"; ?>>审核失败</option>
            	</select>
            </td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习总结评价</td>
            <td class="td2" >
            	<textarea rows="5" cols="100" name="summ_result"><?=$summary->summ_result?></textarea>
            </td>
        </tr>
        
        <tr>
            <td colspan="2" class="td3" align="center">
                <input type="submit" value="确 定" class="input" >
                <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/teacher/tsummary/tsummaryList';" id="btnReturn" class="input" />      
            </td>
        </tr>
        
    </table>
    </form>
</div>