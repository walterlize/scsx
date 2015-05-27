<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3>实习报名列表</h3>
    <table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th scope="col">实习课程号</th>
            <th scope="col">实习课序号</th>
            <th scope="col">实习课程名</th>
            <th scope="col">实习课程英文名</th>
            <th scope="col">实习课程模式</th>
            <th scope="col">操作</th>
        </tr>
        <?php if (is_array($variable)) foreach ($variable as $r): ?>
                <tr class="RowStyle" align="center">
                    <td><?= $r['courseId'] ?></td>
                    <td><?= $r['courseNum'] ?></td>
                    <td><?= $r['courseName'] ?></td>
                    <td><?= $r['courseNameEn'] ?></td>
                    <td><?= $r['pattern'] ?></td>
                    <td>
                        <a id="" href="<?= base_url() ?>index.php/student/company/companyDetail/<?= $r['id'] ?>">实习基地</a>
                    </td>
                </tr>
            <?php endforeach; ?>
    </table>
    <div align="center"><?= $page ?></div>
</div>