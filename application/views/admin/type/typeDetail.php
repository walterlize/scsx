<div style="margin-left:20px; margin-right:20px;">
    <br />
    <h3>互动交流类别列表信息</h3>
    <table cellpadding="0" cellspacing="1" class="tablist2">
        <tr>
            <td class="td1" style="width: 111px">编号</td>
            <td class="td2" ><?= $typeId ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">类别名称</td>
            <td class="td2" ><?= $type ?>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2" class="td3" align="center">
                <input type="button" name="btnEdit" value="编 辑" onclick="window.location.href='<?= base_url() ?>index.php/admin/type/typeEdit/<?= $typeId ?>';" id="btnEdit" class="input" />
                <input type="button" name="btnDelete" value="删 除" onclick="deleteInfo('<?= base_url() ?>index.php/admin/type/typeDelete/<?= $typeId ?>')" id="btnDelete" class="input" />
                <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/admin/type/typeList';" id="btnReturn" class="input" />      </td>
        </tr>
    </table>
</div>