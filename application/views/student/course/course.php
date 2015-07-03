<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3 class="lz_title">实习报名列表</h3>
    <table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th scope="col" class="td1">实习课程号</th>
            <th scope="col"class="td3">实习课序号</th>
            <th scope="col" class="td1">实习课程名</th>
            <th scope="col" class="td3">实习课程英文名</th>
            <th scope="col" class="td1">实习课程模式</th>
            <th scope="col" class="td3">操作</th>
        </tr>
        <?php if (is_array($variable)) foreach ($variable as $r): ?>
                <tr class="RowStyle" align="center">
                    <td class="td1"><?= $r['courseId'] ?></td>
                    <td class="td3"><?= $r['courseNum'] ?></td>
                    <td class="td1"><?= $r['courseName'] ?></td>
                    <td class="td3"><?= $r['courseNameEn'] ?></td>
                    <td class="td1"><?= $r['pattern'] ?></td>
                    <td class="td3">
                        <a id="" href="<?= base_url() ?>index.php/student/course/courseDetail/<?= $r['id'] ?>">详细</a>
                    </td>
                </tr>
            <?php endforeach; ?>
    </table>
    <div align="center"><?= $page ?></div>
</div>