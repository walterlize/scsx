<!--
<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3>基地负责教师信息编辑</h3>
    <form name="form1" method="post" action="<?= base_url() ?>index.php/admin/choose_teacher/save" id="form1">
        <input type="hidden" value="<?= $choose_teacher->c_id ?>" name="c_id" id="c_id" />

        <table cellpadding="0" cellspacing="1" class="tablist2">
            <tr>
                <td class="td1" style="width: 111px">实习基地名称</td>
                <td class="td2" ><select id="comId" name="comId" >
<?php foreach ($company as $r): ?>
                                <option value="<?= $r->comId ?>"
    <?php
    if (isset($company->comId) && $r->comId == $company->comId)
        echo 'selected';
    else
        echo '';
    ?>
                                        >
    <?= $r->comName ?>
                                </option>
<?php endforeach; ?>
                    </select>       </td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">带队教师名称</td>
                <td class="td2" ><select id="u_id" name="u_id" >
<?php foreach ($users as $r): ?>
                                <option value="<?= $r->u_id ?>"
    <?php
    if (isset($users->u_id) && $r->u_id == $users->u_id)
        echo 'selected';
    else
        echo '';
    ?>
                                        >
    <?= $r->realname ?>(<?= $r->u_name ?>)
                                </option>
<?php endforeach; ?>
                    </select>       </td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">指导教师名称</td>
                <td class="td2" ><select id="userId" name="userId" >
<?php foreach ($users as $r): ?>
                                <option value="<?= $r->u_id ?>"
    <?php
    if (isset($users->u_id) && $r->u_id == $users->u_id)
        echo 'selected';
    else
        echo '';
    ?>
                                        >
    <?= $r->realname ?>(<?= $r->u_name ?>)
                                </option>
<?php endforeach; ?>
                    </select>       </td>
            </tr>
            <tr>
                <td colspan="2" class="td3" align="center">
                    <input type="submit" name="btnSave" value="保 存" onclick="return check('form1');" id="btnSave" class="input" />
                    <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/admin/choose_teacher/choose_teacherList';" id="btnReturn" class="input" />
                    <input type="button" name="btnCancel" value="取 消" onclick="window.location.href='<?= base_url() ?>index.php/admin/choose_teacher/choose_teacherDetail/<?= $choose_teacher->c_id ?>';" id="btnCancel" class="input" style="<?php if (isset($show)) echo $show; ?>" />      </td>
            </tr>
        </table>
    </form>
</div>-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <link href="<?= base_url(); ?>css/css1.css" type="text/css" rel="stylesheet" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>right</title>
    </head>
    <body>
        <div class="enterright">
            <div class="enterrighttitle"><p>基地负责教师信息编辑</p></div>
            <form name="form1" method="post" action="<?= base_url() ?>index.php/admin/choose_teacher/save" id="form1">
                <input type="hidden" value="<?= $choose_teacher->c_id ?>" name="c_id" id="c_id" />
                <div class="enterrightlist">
                    <table width="100%" cellpadding="0" cellspacing="0">
                        <tr class="tablecontent">
                            <td class="line1">实习基地名称</td>
                            <td class="line2" >
                                <select id="comId" name="comId" >
                                    <?php foreach ($company as $r): ?>
                                        <option value="<?= $r->comId ?>"
                                        <?php
                                        if (isset($company->comId) && $r->comId == $company->comId)
                                            echo 'selected';
                                        else
                                            echo '';
                                        ?>
                                                >
                                                    <?= $r->comName ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr> 
                        <tr class="tablecontent">
                            <td class="line1">带队教师名称</td>
                            <td class="line2" >
                                <select id="u_id" name="u_id" >
                                    <?php foreach ($users as $r): ?>
                                        <option value="<?= $r->u_id ?>"
                                        <?php
                                        if (isset($users->u_id) && $r->u_id == $users->u_id)
                                            echo 'selected';
                                        else
                                            echo '';
                                        ?>
                                                >
                                            <?= $r->realname ?>(<?= $r->u_name ?>)
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr> 
                        <tr class="tablecontent">
                            <td class="line1">指导教师名称</td>
                            <td class="line2" >
                                <select id="userId" name="userId" >
                                    <?php foreach ($users as $r): ?>
                                        <option value="<?= $r->u_id ?>"
                                        <?php
                                        if (isset($users->u_id) && $r->u_id == $users->u_id)
                                            echo 'selected';
                                        else
                                            echo '';
                                        ?>
                                                >
                                            <?= $r->realname ?>(<?= $r->u_name ?>)
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>                      
                        <tr class="tablecontent">
                            <td colspan="2" class="line1" align="center">
                                <input type="submit" name="btnSave" value="保 存" onclick="return check('form1');" id="btnSave" class="input" />
			                    <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/admin/choose_teacher/choose_teacherList';" id="btnReturn" class="input" />
			                    <input type="button" name="btnCancel" value="取 消" onclick="window.location.href='<?= base_url() ?>index.php/admin/choose_teacher/choose_teacherDetail/<?= $choose_teacher->c_id ?>';" id="btnCancel" class="input" style="<?php if (isset($show)) echo $show; ?>" />      </td>                            </td>
                        </tr>
                    </table>
                </div>
            </form>          
        </div>
    </body>
</html>