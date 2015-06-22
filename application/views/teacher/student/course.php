<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3 class="lz_title">已发布课程的学生信息</h3>
    <table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th scope="col" class="td1">序号</th>
            <th scope="col" class="td3">课程号</th>
            <th scope="col" class="td1">课序号</th>
            <th scope="col" class="td3">课程名</th>
            <th scope="col" class="td1">模式</th>
            <th scope="col" class="td3">所选学生信息查看</th>
        </tr>
        <?php if (is_array($course)) foreach ($course as $key=>$r): ?>
                <tr class="RowStyle" align="center">
                    <td class="td1"><?= $key+1 ?></td>
                    <td class="td3"><?= $r['courseId'] ?></td>
                    <td class="td1"><?= $r['courseNum'] ?></td>
                    <td class="td3"><?= $r['courseName'] ?></td>
                    <td class="td1"><?= $r['coursePattern'] ?></td>
                    <td class="td3">
                        <a id="" title="查看所有已选择本课程的学生信息" href="<?= base_url() ?>index.php/teacher/student/studentList/<?= $r['cour_id'] ?>">学生信息</a>
                    </td>
                </tr>
            <?php endforeach; ?>
    </table>
    <!--
    <div align="right">每页最多有15条记录，本次总共有<?=$num?>条记录。</div>
    -->
    <div align="right"><?=$num?></div>
    <div align="center"><?= $page ?></div>
</div>