<div style="margin-left:20px; margin-right:20px;">
    <br />
    <h3>实习总结任务信息</h3>
    <table cellpadding="0" cellspacing="1" class="tablist2">
        <tr>
            <td class="td1" style="width: 111px">实习任务编号</td>
            <td class="td2" ><?= $m_id ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">教师ID</td>
            <td class="td2" ><?= $teaId ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习任务标题</td>
            <td class="td2" ><?= $title ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">发布时间</td>
            <td class="td2" ><?= $workTime ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习任务内容</td>
            <td class="td2" ><?= $content ?>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2" class="td3" align="center">
                <input type="button" name="btnEdit" value="编 辑" onclick="window.location.href='<?= base_url() ?>index.php/teacher/mission/missionEdit/<?= $m_id ?>';" id="btnEdit" class="input" />
                <input type="button" name="btnDelete" value="删 除" onclick="deleteInfo('<?= base_url() ?>index.php/teacher/mission/missionDelete/<?= $m_id ?>')" id="btnDelete" class="input" />
                <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/teacher/mission/missionList';" id="btnReturn" class="input" />      
            </td>
        </tr>
    </table>
</div>