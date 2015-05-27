<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3>互动交流类别列表</h3>
    <table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th scope="col">类别名称</th><th scope="col">操作</th>
        </tr>
        <?php if (is_array($type)) foreach ($type as $r): ?>
                <tr class="RowStyle" align="center">
                    <td><?= $r['type'] ?></td>
                    <td>
                        <a id="" href="<?= base_url() ?>index.php/admin/type/typeDetail/<?= $r['typeId'] ?>">详细</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <tr>
            <td colspan="6" align="center">
                <input type="button" name="btnDelete" value="新 增" onclick="window.location.href='<?= base_url() ?>index.php/admin/type/typeNew';" id="btnDelete" class="input" />
                <input type="button" name="btnReturn" value="删 除" onclick="window.location.href='<?= base_url() ?>index.php/admin/type/typeList';" id="btnReturn" class="input"  style="display:none"/>
            </td>
        </tr>
    </table>
    <div align="center"><?= $page ?></div>
</div>