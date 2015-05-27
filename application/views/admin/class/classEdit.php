<!--
<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3>班级名称列表编辑</h3>
    <form name="form1" method="post" action="<?= base_url() ?>index.php/admin/cla/save" id="form1">
        <input type="hidden" value="<?= $class->classId ?>" name="classId" id="classId" />

        <table cellpadding="0" cellspacing="1" class="tablist2">
            <tr>
                <td class="td1" style="width: 111px">系名称</td>
                <td class="td2" ><input name="department" type="text" id="department" value="<?= $class->department ?>" size="50"   isRequired="true" />
                    <font color="red">*</font><span id="departmentMsg" class="MsgHide"系名称不能为空！</span></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">班级名称</td>
                <td class="td2" ><input name="class" type="text" id="class" value="<?= $class->class ?>" size="50"   isRequired="true" />
                    <font color="red">*</font><span id="classMsg" class="MsgHide">班级名称不能为空！</span></td>
            </tr>
            <tr>
                <td colspan="2" class="td3" align="center">
                    <input type="submit" name="btnSave" value="保 存" onclick="return check('form1');" id="btnSave" class="input" />
                    <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/admin/cla/claList';" id="btnReturn" class="input" />
                    <input type="button" name="btnCancel" value="取 消" onclick="window.location.href='<?= base_url() ?>index.php/admin/cla/claDetail/<?= $class->classId ?>';" id="btnCancel" class="input" style="<?php if (isset($show)) echo $show; ?>" />      </td>
            </tr>
        </table>
    </form>
</div>
-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <link href="<?= base_url(); ?>css/css1.css" type="text/css" rel="stylesheet" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>right</title>
    </head>
    <body>
        <div class="enterright">
            <div class="enterrighttitle"><p>班级名称列表编辑</p></div>
            <form name="form1" method="post" action="<?= base_url() ?>index.php/admin/cla/save" id="form1">
                <input type="hidden" value="<?= $class->classId ?>" name="classId" id="classId" />
                <div class="enterrightlist">
                    <table width="100%" cellpadding="0" cellspacing="0">
                        <tr class="tablecontent">
                            <td class="line1">系名称</td>
                            <td class="line2" >
                                <input name="department" type="text" id="department" value="<?= $class->department ?>" size="50"   isRequired="true" />
                                <font color="red">*</font><span id="departmentMsg" class="MsgHide">系名称不能为空！</span>
                        </td>
                    </tr> 
                    <tr class="tablecontent">
                        <td class="line1">班级名称</td>
                        <td class="line2" >
                            <input name="class" type="text" id="class" value="<?= $class->class ?>" size="50"   isRequired="true" />
                            <font color="red">*</font><span id="classMsg" class="MsgHide">班级名称不能为空！</span>
                        </td>
                    </tr>                        
                    <tr class="tablecontent">
                        <td colspan="2" class="line1" align="center">
                            <input type="submit" name="btnSave" value="保 存" onclick="return check('form1');" id="btnSave" class="input" />
		                    <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/admin/cla/claList';" id="btnReturn" class="input" />
		                    <input type="button" name="btnCancel" value="取 消" onclick="window.location.href='<?= base_url() ?>index.php/admin/cla/claDetail/<?= $class->classId ?>';" id="btnCancel" class="input" style="<?php if (isset($show)) echo $show; ?>" />      </td>
		                        
                        </td>
                    </tr>
                </table>
            </div>
        </form>          
    </div>
</body>
</html>