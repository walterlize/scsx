<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3>实习项目信息管理列表</h3>
    <table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th scope="col">实习项目名称</th><th scope="col">所属系别</th><th scope="col">实习项目内容</th><th scope="col">实习项目模式</th><th scope="col">操作</th>
        </tr>
        <?php if (is_array($program)) foreach ($program as $r): ?>
                <tr class="RowStyle" align="center">
                    <td><?= $r['p_name'] ?></td>
                    <td><?= $r['depart'] ?></td>
                    <td><?= $r['content'] ?></td>
                    <td><?= $r['pattern'] ?></td>
                    <td>
                        <a id="" href="<?= base_url() ?>index.php/admin/program/programDetail/<?= $r['p_id'] ?>">详细</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <tr>
            <td colspan="6" align="center">
                <input type="button" name="btnDelete" value="新 增" onclick="window.location.href='<?= base_url() ?>index.php/admin/program/programNew';" id="btnDelete" class="input" />
                <input type="button" name="btnReturn" value="删 除" onclick="window.location.href='<?= base_url() ?>index.php/admin/program/programList';" id="btnReturn" class="input"  style="display:none"/>
            </td>
        </tr>
    </table>
    <div align="center"><?= $page ?></div>
</div>