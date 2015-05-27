<html>
    <head>
        <title>实验任务列表查询结果</title>
    </head>
    <body>
        <div style="margin-left:20px; margin-right:20px">
            <br />
            <h3>实验任务列表查询结果</h3>

            <table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th scope="col">用户ID</th><th scope="col">登录名</th><th scope="col">密码</th><th scope="col">身份</th><th scope="col">操作</th>
        </tr>
        <?php if (is_array($jieguo)) foreach ($jieguo as $r): ?>
                <tr class="RowStyle" align="center">
                    <td><?= $r['u_id'] ?></td>
                    <td><?= $r['u_name'] ?></td>
                    <td><?= $r['password'] ?></td>
                    <td><?= $r['roleName'] ?></td>
                    <td>
                        <a id="" href="<?= base_url() ?>index.php/admin/user/userDetail/<?= $r['u_id'] ?>">详细</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <tr>
            <td colspan="5" align="center">
                <input type="button" name="btnNew" value="单条记录新增" onclick="window.location.href='<?= base_url() ?>index.php/admin/user/userNew';" id="btnNew" class="input" />
                <input type="button" name="btnDownload" value="模板下载" onclick="window.location.href='<?= base_url() ?>index.php/admin/user/download';" id="btnDownload" class="input"  />
                <input type="button" name="btnUpload" value="导入文件" onclick="window.location.href='<?= base_url() ?>index.php/admin/user/upload';" id="btnUpload" class="input"   />
                <input type="button" name="btnReturn" value="删 除" onclick="window.location.href='<?= base_url() ?>index.php/admin/user/userList';" id="btnReturn" class="input"  style="display:none"/>
                <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?=base_url()?>index.php/admin/user/userList';" id="btnReturn" class="input" />
            </td>
        </tr>
    </table>

</body>
</html>
