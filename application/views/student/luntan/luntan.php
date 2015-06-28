<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3 class="lz_title>学生发帖列表</h3>
    <table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th scope="col"class="td1">学号</th>
            <th scope="col"class="td3">发帖类别</th>
            <th scope="col"class="td1">发帖主题（请注明实习基地）</th>
            <th scope="col"class="td3">发帖时间</th>
            <th scope="col"class="td1">操作</th>
        </tr>
        <?php if (is_array($luntan)) foreach ($luntan as $r): ?>
                <tr class="RowStyle" align="center">
                    <td class="td1"><?= $r['stuId'] ?></td>
                    <td class="td3"><?= $r['type'] ?></td>  
                    <td class="td1"><?= $r['theme'] ?></td> 
                    <td class="td3"><?= $r['time1'] ?></td>
                    <td class="td1">
                        <a id="" href="<?= base_url() ?>index.php/student/luntan/luntanDetail/<?= $r['l_id'] ?>">详细</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <tr>
            <td colspan="5" align="center">
                <input type="button" name="btnDelete" value="发 帖" onclick="window.location.href='<?= base_url() ?>index.php/student/luntan/luntanNew';" id="btnDelete" class="input" />
            </td>
        </tr>
    </table>
    <div align="center"><?= $page ?></div>
</div>