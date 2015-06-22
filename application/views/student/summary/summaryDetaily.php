<div style="margin-left:20px; margin-right:20px;">
    <br />
    <h3>填写实习总结信息</h3>
    <table cellpadding="0" cellspacing="1" class="tablist2">
        <tr>
            <td class="td1" style="width: 111px" colspan="2">
            	<?= $mission->cour_name ?>(<?= $mission->cour_no ?>-<?= $mission->cour_num ?>)&nbsp;
            </td>
        </tr> 
        
        <tr>
            <td class="td1" style="width: 111px">教师姓名</td>
            <td class="td2" ><?= $mission->cour_teac_name ?>&nbsp;</td>
        </tr> 
        <tr>
            <td class="td1" style="width: 111px">实习总结任务标题</td>
            <td class="td2" ><?= $mission->miss_title ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">下达时间</td>
            <td class="td2" ><?= $mission->miss_start_time ?>&nbsp;</td>
        </tr> 
        <tr>
            <td class="td1" style="width: 111px">截止时间</td>
            <td class="td2" ><?= $mission->miss_end_time ?>&nbsp;</td>
        </tr> 
        <tr>
            <td class="td1" style="width: 111px">实习任务内容</td>
            <td class="td2" ><?= $mission->miss_content ?>&nbsp;</td>
        </tr>      
               
        <tr align="center">
             <td class="td2" colspan="2" style="text-align: center;"><font color="red" size="4px" >已填写</font>&nbsp;</td>
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
            <?php 
            	if($summary->summ_appr_id == 5) echo "待审核";
            	else echo "已审核";
            ?>&nbsp;
            </td>
        </tr>  
        
        <tr>
            <td colspan="2" class="td3" align="center">
            <?php if($summary->summ_appr_id == 5){?>
                <input type="button" name="btnReturn" value="修 改" onclick="window.location.href='<?= base_url() ?>index.php/student/summary/summaryEdit/<?= $summary->summ_id ?>';" id="btnReturn" class="input" />
            <?php }?>
            <input type="button" name="btnDelete" value="删 除" onclick="deleteInfo('<?= base_url() ?>index.php/student/summary/summaryDelete/<?= $summary->summ_id ?>')" id="btnDelete" class="input" />
                <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/student/summary/summaryList';" id="btnReturn" class="input" />      
            </td>
        </tr>
        
    </table>
</div>