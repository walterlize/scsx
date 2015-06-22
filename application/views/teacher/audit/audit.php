<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3 class="lz_title">学生报名信息</h3>
    <table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th scope="col" class="td1">学号</th>
            <th scope="col" class="td3">姓名</th>
            <th scope="col" class="td1">班级</th>
            <th scope="col" class="td3">基地</th>
            <th scope="col" class="td1">状态</th>
            <th scope="col" class="td3">操作</th>
        </tr>
        <?php if (is_array($audit)) foreach ($audit as $r): ?>
                <tr class="RowStyle" align="center">
                    <td class="td1"><?= $r['stu_num'] ?></td>
                    <td class="td3"><?= $r['stu_name'] ?></td>
                    <td class="td1"><?= $r['stu_class'] ?></td>
                    <td class="td3"><?= $r['elco_name'] ?></td>
                    <td class="td1">
                    <?php if($r['elco_id']!=0){?>
                        <a id="" href="<?= base_url() ?>index.php/teacher/audit/auditDetail/<?=$cour_id?>/<?= $r['elco_id'] ?>"><?= $r['elco_name'] ?></a>
                    <?php }else{?>
                    	<?= $r['elco_name'] ?>
                    <?php }?>
                    </td>
                    
                    
                     <td class="td1"><?= $r['elco_state'] ?></td>
                    <td style="width: 200px;">
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


