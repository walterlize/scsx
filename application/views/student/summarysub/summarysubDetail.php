<div style="margin-left:20px; margin-right:20px;">
    <br />
    <h3 class="lz_title>填写实习总结信息</h3>
    <table cellpadding="0" cellspacing="1" class="tablist2">
        <tr>
            <td class="td1" style="width: 111px" colspan="2">
            	<?= $summary->cour_name ?>(<?= $summary->cour_no ?>-<?= $summary->cour_num ?>)&nbsp;
            </td>
        </tr> 
        
        <tr>
            <td class="td1" style="width: 111px">教师姓名</td>
            <td class="td2" ><?= $summary->cour_teac_name ?>&nbsp;</td>
        </tr> 
        <tr>
            <td class="td1" style="width: 111px">实习总结任务标题</td>
            <td class="td2" ><?= $summary->miss_title ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">下达时间</td>
            <td class="td2" ><?= $summary->miss_start_time ?>&nbsp;</td>
        </tr> 
        <tr>
            <td class="td1" style="width: 111px">截止时间</td>
            <td class="td2" ><?= $summary->miss_end_time ?>&nbsp;</td>
        </tr> 
        <tr>
            <td class="td1" style="width: 111px">实习任务内容</td>
            <td class="td2" ><?= $summary->miss_content ?>&nbsp;</td>
        </tr>      
        <tr>
            <td class="td1" style="width: 111px">实习总结内容</td>
            <td class="td2" ><?= $summary->summ_content ?>&nbsp;</td>
        </tr>  
        <tr>
            <td class="td1" style="width: 111px">实习总结填写时间</td>
            <td class="td2" ><?= $summary->summ_time ?>&nbsp;</td>
        </tr>  
        <tr>
            <td class="td1" style="width: 111px">实习总结审核状态</td>
            <td class="td2" >
            <font color="red" size="4px" >
            <?php 
            	if($summary->summ_appr_id == 5) echo "待审核";
            	else echo "已审核";
            ?>&nbsp;
            </font>
            </td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习总结评价</td>
            <td class="td2" ><?= $summary->summ_result ?>&nbsp;</td>
        </tr>    
        
        <tr>
            <td colspan="2" class="td3" align="center">
                <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/student/summarysub/summarysubList';" id="btnReturn" class="input" />      
            </td>
        </tr>
        
    </table>
</div>