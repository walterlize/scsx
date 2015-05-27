<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3>实习报名查看列表</h3>
    <table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th scope="col">实习项目模式</th>
            <th scope="col">实习项目名称</th>
            <th scope="col">实习基地名称</th>
            
            <th scope="col">指导教师姓名</th>
            <th scope="col">报名状态</th>
            <th scope="col">操作</th>
        </tr>
        <?php if (is_array($chakan)) foreach ($chakan as $r): ?>
                <tr class="RowStyle" align="center">
                    <td>志愿式</td>
                    <td><?= $r['courseName'] ?></td>
                    <td><?= $r['comName'] ?></td>
                    <td><?= $r['courseTeaName'] ?></td>
                    <td><?= $r['state'] ?></td>
                    <td>
                        <a id="" href="<?= base_url() ?>index.php/student/chakan/chakanDetail/<?= $r['b_id'] ?>">详细</a>
                    </td>
                </tr>
            <?php endforeach; ?>
    </table>
    <div align="center"><?= $page ?></div>
</div>