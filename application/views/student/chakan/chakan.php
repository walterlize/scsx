<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3>实习报名查看列表</h3>
    <table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th scope="col">模式</th>
            <th scope="col">课程号</th>
            <th scope="col">课序号</th>
            <th scope="col">课程名</th>
            <th scope="col">基地名</th>
            <th scope="col">指导教师姓名</th>
            <th scope="col">报名状态</th>
            <th scope="col">操作</th>
        </tr>
        <?php if (is_array($chakan)) foreach ($chakan as $r): ?>
                <tr class="RowStyle" align="center">
                    <td><?= $r['patt_type'] ?></td>
                    <td><?= $r['elco_cour_no'] ?></td>
                    <td><?= $r['elco_cour_num'] ?></td>
                    <td><?= $r['cour_name'] ?></td>
                    <td><?= $r['comp_name'] ?></td>
                    <td><?= $r['cour_teac_name'] ?></td>
                    <td><?= $r['usta_type'] ?></td>
                    <td>
                        <a id="" href="<?= base_url() ?>index.php/student/chakan/chakanDetail/<?= $r['elco_id'] ?>">详细</a>
                    </td>
                </tr>
            <?php endforeach; ?>
    </table>
    <div align="center"><?= $page ?></div>
</div>