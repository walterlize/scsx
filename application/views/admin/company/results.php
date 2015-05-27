<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3>实习基地信息列表查询结果</h3>
    <table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th scope="col">实习基地名称</th><th scope="col">地址</th><th scope="col">操作</th>
        </tr>
        <?php if (is_array($jieguo)) foreach ($jieguo as $r): ?>
                <tr class="RowStyle" align="center">
                    <td><?= $r['comName'] ?></td>
                    <td><?= $r['address'] ?></td> 
                    <td>
                        <a id="" href="<?= base_url() ?>index.php/admin/company/companyDetail/<?= $r['comId'] ?>">详细</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <tr>
            <td colspan="5" align="center">
                <input type="button" name="btnDelete" value="新 增" onclick="window.location.href='<?= base_url() ?>index.php/admin/company/companyNew';" id="btnDelete" class="input" />
                <input type="button" name="btnReturn" value="删 除" onclick="window.location.href='<?= base_url() ?>index.php/admin/company/companyList';" id="btnReturn" class="input"  style="display:none"/>
                <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/admin/company/companyList';" id="btnReturn" class="input" />
            </td>
        </tr>
    </table>
</div>