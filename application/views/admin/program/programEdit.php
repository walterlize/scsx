<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3>实习项目信息管理列表编辑</h3>
    <form name="form1" method="post" action="<?= base_url() ?>index.php/admin/program/save" id="form1">
        <input type="hidden" value="<?= $program->p_id ?>" name="p_id" id="p_id" />

        <table cellpadding="0" cellspacing="1" class="tablist2">
            <tr>
                <td class="td1" style="width: 111px">实习项目名称</td>
                <td class="td2" ><input name="p_name" type="text" id="p_name" value="<?= $program->p_name ?>" size="50"   isRequired="true" />
                    <font color="red">*</font><span id="p_nameMsg" class="MsgHide">实习项目名称不能为空！</span></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">所属系别</td>
                <td class="td2" ><input name="depart" type="text" id="depart" value="<?= $program->depart ?>" size="50"   isRequired="true" />
                    <font color="red">*</font><span id="departMsg" class="MsgHide">所属系别不能为空！</span></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">实习项目内容</td>
                <td class="td2" ><input name="content" type="text" id="content" value="<?= $program->content ?>" size="50"   isRequired="true" />
                    <font color="red">*</font><span id="contentMsg" class="MsgHide">实习项目内容不能为空！</span></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">实习项目模式</td>
                <td class="td2" ><select id="patternId" name="patternId" >
                        <?php foreach ($pattern as $r): ?>
                            <option value="<?= $r->patternId ?>"
                            <?php
                            if (isset($program->patternId) && $r->patternId == $program->patternId)
                                echo 'selected';
                            else
                                echo '';
                            ?>
                                    >
                                        <?= $r->pattern ?>
                            </option>
                        <?php endforeach; ?>
                    </select>       </td>
            </tr>
            <tr>
                <td colspan="2" class="td3" align="center">
                    <input type="submit" name="btnSave" value="保 存" onclick="return check('form1');" id="btnSave" class="input" />
                    <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/admin/program/programList';" id="btnReturn" class="input" />
                    <input type="button" name="btnCancel" value="取 消" onclick="window.location.href='<?= base_url() ?>index.php/admin/program/programDetail/<?= $program->p_id ?>';" id="btnCancel" class="input" style="<?php if (isset($show)) echo $show; ?>" />      </td>
            </tr>
        </table>
    </form>
</div>