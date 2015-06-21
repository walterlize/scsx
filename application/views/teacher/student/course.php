<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3>已发布课程列表</h3>
    <table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th scope="col">课程号</th>
            <th scope="col">课序号</th>
            <th scope="col">课程名</th>
            <th scope="col">模式</th>
            <th scope="col">操作</th>
        </tr>
        <?php if (is_array($course)) foreach ($course as $r): ?>
                <tr class="RowStyle" align="center">
                    <td><?= $r['courseId'] ?></td>
                    <td><?= $r['courseNum'] ?></td>
                    <td><?= $r['courseName'] ?></td>
                    <td><?= $r['coursePattern'] ?></td>
                    <td>
                        <a id="" href="<?= base_url() ?>index.php/teacher/student/studentList/<?= $r['cour_id'] ?>">学生信息</a>
                    </td>
                </tr>
            <?php endforeach; ?>

    </table>
    <div align="center"><?= $page ?></div>
</div>