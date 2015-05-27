<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3>互动交流类别列表编辑</h3>
    <form name="form1" method="post" action="<?= base_url() ?>index.php/admin/type/save" id="form1">
        <input type="hidden" value="<?= $type->typeId ?>" name="typeId" id="typeId" />

        <table cellpadding="0" cellspacing="1" class="tablist2">
            <tr>
                <td class="td1" style="width: 111px">类别名称</td>
                <td class="td2" ><input name="type" type="text" id="type" value="<?= $type->type ?>" size="50"   isRequired="true" />
                    <font color="red">*</font><span id="typeMsg" class="MsgHide">类别名称不能为空！</span></td>
            </tr>
            <tr>
                <td colspan="2" class="td3" align="center">
                    <input type="submit" name="btnSave" value="保 存" onclick="return check('form1');" id="btnSave" class="input" />
                    <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/admin/type/typeList';" id="btnReturn" class="input" />
                    <input type="button" name="btnCancel" value="取 消" onclick="window.location.href='<?= base_url() ?>index.php/admin/type/typeDetail/<?= $type->typeId ?>';" id="btnCancel" class="input" style="<?php if (isset($show)) echo $show; ?>" />      </td>
            </tr>
        </table>
    </form>
</div>