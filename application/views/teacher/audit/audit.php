<div style="margin-left:20px; margin-right:20px">
    <br />
    <div class="lz_title">
    	学生报名信息 
    	<div style="float: right; font-size: 15px; height: 30px;margin-bottom: 25px;margin-right: 25px;margin-top: 15px;">
    		<input type="button" name="btnDelete" value="已审核信息" onclick="window.location.href='<?= base_url() ?>index.php/teacher/student/studentList/<?= $cour_id ?>';" id="btnDelete" class="input" />
    		<input type="button" name="btnDelete" value="导出EXCEL" onclick="window.location.href='<?= base_url() ?>index.php/teacher/student/studentExcel/<?= $cour_id ?>';" id="btnDelete" class="input" />
    	</div>
    </div>
    <div style="text-align: right; width: 100%;float: right; font-size: 14px; margin-bottom: 10px;">选课人数 <?=$num?>人，已提交基地人数<?=$num-$numf?>人。通过审核<?=$numtt?>人</div>
    <table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th scope="col" class="td1">学 号</th>
            <th scope="col" class="td3">姓 名</th>
            <th scope="col" class="td1">班 级</th>
            <th scope="col" class="td3">基地信息</th>
            <th scope="col" class="td1">审核状态</th>
            <th scope="col" class="td3">操 作</th>
        </tr>
        <?php if (is_array($audit)) foreach ($audit as $r): ?>
                <tr class="RowStyle" align="center">
                    <td class="td1"><?= $r['stu_num'] ?></td>
                    <td class="td3"><?= $r['stu_name'] ?></td>
                    <td class="td1"><?= $r['stu_class'] ?></td>
                   <!--
                    <td class="td3"><?= $r['elco_name'] ?></td>
                    -->
                    <td class="td3">
                    <?php if($r['elco_id']!=0){?>
                        <a id="" title="点击查看基地详细信息" href="<?= base_url() ?>index.php/teacher/audit/auditDetail/<?=$cour_id?>/<?= $r['elco_id'] ?>"><?= $r['elco_name'] ?></a>
                    <?php }else{?>
                    	<?= $r['elco_name'] ?>
                    <?php }?>
                    </td>
                    
                    
                     <td class="td1"><?= $r['elco_state'] ?></td>
                    <td class="td3" style="width: 200px;">
                    <?php if($r['elco_id']!=0){?>
                        <input type="button" name="btnReturn" value="通过" onclick="window.location.href='<?= base_url() ?>index.php/teacher/audit/auditPassa/<?= $cour_id ?>/<?= $r['elco_id']?>';" id="btnReturn" class="input" /> 
						<input type="button" name="btnReturn" value="失败" onclick="window.location.href='<?= base_url() ?>index.php/teacher/audit/auditFaila/<?= $cour_id ?>/<?= $r['elco_id']?>';" id="btnReturn" class="input" /> 
                    <?php }else{?>
                    	未提交基地
                    <?php }?>
                    </td>
                </tr>
            <?php endforeach; ?>

    </table>
   
    <div align="center"><?= $page ?></div>
</div>


