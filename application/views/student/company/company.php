<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3>课程基地信息</h3>
    <span >请选择基地或
    
    	<input type="button" name="btnReturn" value="新增基地" onclick="window.location.href='<?= base_url() ?>index.php/student/company/companyNew/<?=$cour_id?>';" id="btnReturn" class="input" />
    </span><br><br>
    <table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th scope="col">课程号</th>
            <th scope="col">课序号</th>
            <th scope="col">课程名</th>
            <th scope="col">实习基地名</th>
            <th scope="col">基地负责人</th>
            <th scope="col">负责人联系方式</th>
            <th scope="col">操作</th>
        </tr>
        <?php if (is_array($company)) foreach ($company as $r): ?>
                <tr class="RowStyle" align="center">
                    <td><?= $r['cour_no'] ?></td>
                    <td><?= $r['cour_num'] ?></td>
                    <td><?= $r['cour_name'] ?></td>
                    <td><?= $r['comp_name'] ?></td>
                    <td><?= $r['user_name'] ?></td>
                    <td><?= $r['user_phone'] ?></td>
                    <td>
                        <a id="" href="<?= base_url() ?>index.php/student/company/companyDetail/<?= $r['coco_id'] ?>">详细</a>
                    </td>
                </tr>
            <?php endforeach; ?>
    </table>
    <div align="center"><?= $page ?></div>
</div>