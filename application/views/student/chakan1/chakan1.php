<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3>实习结果评价查看列表</h3>
    <table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th scope="col">教师姓名</th><th scope="col">教师分数</th><th scope="col">基地用户姓名</th><th scope="col">基地分数</th><th scope="col">操作</th>
        </tr>
        <?php if (is_array($chakan1)) foreach ($chakan1 as $r): ?>
                <tr class="RowStyle" align="center">
                    <td><?= $r['teaName'] ?></td>
                    <td><?= $r['tscore'] ?></td> 
                    <td><?= $r['mName'] ?></td>
                    <td><?= $r['mscore'] ?></td>
                    <td>
                        <a id="" href="<?= base_url() ?>index.php/student/chakan1/chakan1Detail/<?= $r['b_id'] ?>">详细</a>
                    </td>
                </tr>
            <?php endforeach; ?>
    </table>
    <div align="center"><?= $page ?></div>
</div>