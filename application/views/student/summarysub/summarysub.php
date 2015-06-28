<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3 class="lz_title>实习任务列表</h3>
    <?php if (is_array($variable)) foreach ($variable as $r): ?>
    <table class="tablist2" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th scope="col" colspan=5 style="text-align: left; " class="td1">
            	&nbsp;&nbsp;<?= $r['cour_name'] ?>(<?= $r['cour_no'] ?>-<?= $r['cour_num'] ?>)
            </th>
            
        </tr>
        <tr class="HeaderStyle">
           
            <th scope="col" class="td1" >实习任务</th>
            <th scope="col" class="td1" style="width:15% ">下达时间</th>
            <th scope="col" class="td1" style="width:15% ">截止时间</th>
            <th scope="col" class="td1" style="width:5% ">操作</th>
        </tr>
        <?php for($i=0;$i<count($summary[$r['cour_id']]);$i++):?>
                <tr class="RowStyle" align="center">
                    <td class="td2" ><?=$summary[$r['cour_id']][$i]['miss_title']?></td>
                    <td class="td2" style="width:15% "><?=$summary[$r['cour_id']][$i]['miss_start_time']?></td>
                    <td class="td2" style="width:15% "><?php if($summary[$r['cour_id']][$i]['miss_end_time']=="0000-00-00 00:00:00") echo "无";else echo $summary[$r['cour_id']][$i]['miss_end_time']?></td>
                   
                   
                    <td class="td2" style="width:5% ">
                        <a id="" href="<?= base_url() ?>index.php/student/summarysub/summarysubDetail/<?= $summary[$r['cour_id']][$i]['summ_id'] ?>">详细</a>
                    </td>
                </tr>
        <?php endfor;?>
         
    </table>
    <br>
    <?php endforeach; ?>
    <div align="center"></div>
</div>