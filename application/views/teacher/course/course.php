<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3>本学期课程列表</h3>
    <table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th scope="col">课程号</th>
            <th scope="col">课序号</th>
            <th scope="col">课程名</th>
            <th scope="col">模式</th>
            <th scope="col">是否发布</th>
            <th scope="col">操作</th>
        </tr>
        <?php if (is_array($course)) foreach ($course as $r): ?>
                <tr class="RowStyle" align="center">
                    <td><?= $r['courseId'] ?></td>
                    <td><?= $r['courseNum'] ?></td>
                    <td><?= $r['courseName'] ?></td>
                    <td><?= $r['coursePattern'] ?></td>
                    <td><?php if($r['coursePublish']==1) echo "已发布";elseif ($r['coursePublish']==0)echo "未发布";else echo $r['coursePublish']; ?></td>
                    <td>
                        <a id="" href="<?= base_url() ?>index.php/teacher/course/courseDetail/<?= $r['id'] ?>">详细</a>
                    </td>
                </tr>
            <?php endforeach; ?>

    </table>
    <div align="center"><?= $page ?></div>
</div>