<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3 class="lz_title">选择课程</h3>
    <table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th scope="col" class="td1">序号</th>
            <th scope="col" class="td3">课程编号</th>
            <th scope="col" class="td1">课程名称</th>
            <th scope="col" class="td3">实习模式</th>
            <th scope="col" class="td1">已评价学生</th>
        </tr>
        <?php if (is_array($course)) foreach ($course as $r): ?>
                <tr class="RowStyle" align="center">
                    <td class="td1"><?= $r['courseNum'] ?></td>
                    <td class="td3"><?= $r['courseId'] ?></td>
                    <td class="td1"><?= $r['courseName'] ?></td>
                    <td class="td3"><?= $r['coursePattern'] ?></td>
                    <td class="td1">
                        <a id="" href="<?= base_url() ?>index.php/teacher/scoreappr/scoreList/<?= $r['cour_id'] ?>">学生信息</a>
                    </td>
                </tr>
            <?php endforeach; ?>

    </table>
    <div class="page"><?= $page ?></div>
</div>