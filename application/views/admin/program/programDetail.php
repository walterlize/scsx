<div style="margin-left:20px; margin-right:20px;">
    <br />
    <h3>实习项目信息管理列表信息</h3>
    <table cellpadding="0" cellspacing="1" class="tablist2">
        <tr>
            <td class="td1" style="width: 111px">实习项目名称</td>
            <td class="td2" ><?= $p_name ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">所属系别</td>
            <td class="td2" ><?= $depart ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习项目内容</td>
            <td class="td2" ><?= $content ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习项目模式</td>
            <td class="td2" ><?= $pattern ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习项目模式介绍</td>
            <td class="td2" ><?= $pcontent ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习项目学院</td>
            <td class="td2" ><?= $college ?>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2" class="td3" align="center">
                <input type="button" name="btnEdit" value="编 辑" onclick="window.location.href='<?= base_url() ?>index.php/admin/program/programEdit/<?= $p_id ?>';" id="btnEdit" class="input" />
                <input type="button" name="btnDelete" value="删 除" onclick="deleteInfo('<?= base_url() ?>index.php/admin/program/programDelete/<?= $p_id ?>')" id="btnDelete" class="input" />
                <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/admin/program/programList';" id="btnReturn" class="input" />      </td>
        </tr>
    </table>
</div>