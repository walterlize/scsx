<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3>已发布课程列表</h3>
    <table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th scope="col">学号</th>
            <th scope="col">姓名</th>
            <th scope="col">班级</th>
            <th scope="col">基地</th>
            <th scope="col">状态</th>
            <th scope="col">操作</th>
        </tr>
        <?php if (is_array($audit)) foreach ($audit as $r): ?>
                <tr class="RowStyle" align="center">
                    <td><?= $r['stu_num'] ?></td>
                    <td><?= $r['stu_name'] ?></td>
                    <td><?= $r['stu_class'] ?></td>
                    <td>
                    <?php if($r['elco_id']!=0){?>
                        <a id="" href="<?= base_url() ?>index.php/teacher/audit/auditDetail2/<?=$cour_id?>/<?= $r['elco_id'] ?>"><?= $r['elco_name'] ?></a>
                    <?php }else{?>
                    	<?= $r['elco_name'] ?>
                    <?php }?>
                    </td>
                    
                    
                    <td><?= $r['elco_state'] ?></td>
                    <td style="width: 200px;">
                    <?php if($r['elco_id']!=0){?>
                        <input type="button" name="btnReturn" value="通过" onclick="window.location.href='<?= base_url() ?>index.php/teacher/audit/auditPass2a/<?= $cour_id ?>/<?= $r['elco_id']?>';" id="btnReturn" class="input" /> 
						<input type="button" name="btnReturn" value="失败" onclick="window.location.href='<?= base_url() ?>index.php/teacher/audit/auditFail2a/<?= $cour_id ?>/<?= $r['elco_id']?>';" id="btnReturn" class="input" /> 
                    <?php }else{?>
                    	未提交基地
                    <?php }?>
                    </td>
                </tr>
            <?php endforeach; ?>

    </table>
    <div align="center"><?= $page ?></div>
</div>

