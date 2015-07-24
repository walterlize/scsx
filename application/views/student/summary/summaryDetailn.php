
<div style="margin-left:20px; margin-right:20px;">
    <br />
    <h3 class="lz_title">填写实习总结信息</h3>
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
            <td class="td2" ><?php if($mission->miss_end_time == "0000-00-00 00:00:00") echo "无";else echo $mission->miss_end_time?>&nbsp;</td>
        </tr> 
        <tr>
            <td class="td1" style="width: 111px">实习总结任务内容</td>
            <td class="td2" ><?= $mission->miss_content ?>&nbsp;</td>
        </tr>   
        
            <?php 
            	if(isset($flag) && $flag == 1){
	            		echo '<tr>';
	            		echo '<td class="td1" colspan=2>';
	            		echo '<span style="color:red;">截止时间已过</span>';
	            		echo '</td>';
	            		echo '</tr>';
            	}
            
            ?>
 
         
        
        <tr>
            <td colspan="2" class="td3" align="center">
           
                <input type="button" name="btnReturn" value="填 写" onclick="window.location.href='<?= base_url() ?>index.php/student/summary/summaryNew/<?= $mission->miss_id ?>';" id="btnReturn" class="input" style="<?php if(isset($flag) && $flag ==1) echo "display:none";?>"/>
                <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/student/summary/summaryList';" id="btnReturn" class="input" />      
            </td>
        </tr>
        
    </table>
</div>