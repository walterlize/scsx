<!--
<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3>用户信息编辑</h3>
    <form name="form1" method="post" action="<?= base_url() ?>index.php/superadmin/user/save" id="form1">
        <input type="hidden" value="<?= $user->u_id ?>" name="u_id" id="u_id" />
        <table cellpadding="0" cellspacing="1" class="tablist2">
            <tr>
                <td class="td1" style="width: 111px">所在学院</td>
                <td class="td2" ><select id="collegeId" name="collegeId" >
<?php foreach ($college as $r): ?>
                                        <option value="<?= $r->collegeId ?>"
    <?php
    if (isset($user->collegeId) && $r->collegeId == $user->collegeId)
        echo 'selected';
    else
        echo '';
    ?>
                                                >
    <?= $r->college ?>
                                        </option>
<?php endforeach; ?>
                    </select>       </td>
            </tr>
         <tr>
                <td class="td1" style="width: 111px">性别</td>
                 <td class="td2" ><select id="sex" name="sex" >
                         <option value="男">男</option> 
                         <option value="女">女</option> 
                    </select>       </td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">用户名</td>
                <td class="td2" ><input name="u_name" type="text" id="u_name" value="<?= $user->u_name ?>" size="50"  isRequired="true" />
                    <font color="red">*</font><span id="u_nameMsg" class="MsgHide">用户名不能为空！</span></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">密码</td>
                <td class="td2" ><input name="password" type="text" id="password" value="<?= $user->password ?>" size="50"  isRequired="true" />
                    <font color="red">*</font><span id="passwordMsg" class="MsgHide">密码不能为空！</span></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">姓名</td>
                <td class="td2" ><input name="realname" type="text" id="realname" value="<?= $user->realname ?>" size="50"  isRequired="true" />
                    <font color="red">*</font><span id="realnameMsg" class="MsgHide">姓名不能为空！</span></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">电话</td>
                <td class="td2" ><input name="phone" type="text" id="phone" value="<?= $user->phone ?>" size="50"  isRequired="true" />
                    <font color="red">*</font><span id="phoneMsg" class="MsgHide">电话不能为空！</span></td>    
            </tr>
            <tr>
                <td class="td1" style="width: 111px">邮箱</td>
                <td class="td2" ><input name="email" type="text" id="email" value="<?= $user->email ?>" size="50"  isRequired="true" />
                    <font color="red">*</font><span id="emailMsg" class="MsgHide">邮箱不能为空！</span></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">地址</td>
                <td class="td2" ><input name="address" type="text" id="address" value="<?= $user->address ?>" size="50"  isRequired="true" />
                    <font color="red">*</font><span id="addressMsg" class="MsgHide">地址不能为空！</span></td>
            </tr>
            <tr>
                <td colspan="2" class="td3" align="center">
                    <input type="submit" name="btnSave" value="保 存" onclick="return check('form1');" id="btnSave" class="input" />
                    <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/superadmin/user/userList';" id="btnReturn" class="input" />
                    <input type="button" name="btnCancel" value="取 消" onclick="window.location.href='<?= base_url() ?>index.php/superadmin/user/userDetail/<?= $user->u_id ?>';" id="btnCancel" class="input" style="<?php if (isset($show)) echo $show; ?>" />      </td>
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
            <div class="enterrighttitle"><p>用户信息编辑</p></div>
            <form name="form1" method="post" action="<?= base_url() ?>index.php/superadmin/user/save" id="form1">
                <input type="hidden" value="<?= $user->u_id ?>" name="u_id" id="u_id" />
                <input type="hidden" value="<?= $user->roleId ?>" name="roleId" id="roleId" />
                <div class="enterrightlist">
                    <table width="100%" cellpadding="0" cellspacing="0">
                        <tr class="tablecontent">
                            <td class="line1">所在学院</td>
                            <td class="line2" >
                                <select id="collegeId" name="collegeId" >
                                    <?php foreach ($college as $r): ?>
                                        <option value="<?= $r->collegeId ?>"
                                        <?php
                                        if (isset($user->collegeId) && $r->collegeId == $user->collegeId)
                                            echo 'selected';
                                        else
                                            echo '';
                                        ?>
                                                >
                                                    <?= $r->college ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr> 
                        <tr class="tablecontent">
                            <td class="line1">性别</td>
                            <td class="line2" >
                                <select id="sex" name="sex" >
                                    <option value="男">男</option> 
                                    <option value="女">女</option> 
                                </select>
                            </td>
                        </tr> 
                        <tr class="tablecontent">
                            <td class="line1">用户名</td>
                            <td class="line2" ><input name="u_name" type="text" id="u_name" value="<?= $user->u_name ?>" size="50"  isRequired="true" />
                                <font color="red">*</font><span id="u_nameMsg" class="MsgHide">用户名不能为空！</span></td>
                        </tr>
                        <tr class="tablecontent">
                            <td class="line1">密码</td>
                            <td class="line2" ><input name="password" type="text" id="password" value="<?= $user->password ?>" size="50"  isRequired="true" />
                                <font color="red">*</font><span id="passwordMsg" class="MsgHide">密码不能为空！</span></td>
                        </tr>
                        <tr class="tablecontent">
                            <td class="line1">姓名</td>
                            <td class="line2" ><input name="realname" type="text" id="realname" value="<?= $user->realname ?>" size="50"  isRequired="true" />
                                <font color="red">*</font><span id="realnameMsg" class="MsgHide">姓名不能为空！</span></td>
                        </tr>
                        <tr class="tablecontent">
                            <td class="line1">电话</td>
                            <td class="line2" ><input name="phone" type="text" id="phone" value="<?= $user->phone ?>" size="50"  isRequired="true" />
                                <font color="red">*</font><span id="phoneMsg" class="MsgHide">电话不能为空！</span></td>    
                        </tr>
                        <tr class="tablecontent">
                            <td class="line1">邮箱</td>
                            <td class="line2" ><input name="email" type="text" id="email" value="<?= $user->email ?>" size="50"  isRequired="true" />
                                <font color="red">*</font><span id="emailMsg" class="MsgHide">邮箱不能为空！</span></td>
                        </tr>
                        <tr class="tablecontent">
                            <td class="line1">地址</td>
                            <td class="line2" ><input name="address" type="text" id="address" value="<?= $user->address ?>" size="50"  isRequired="true" />
                                <font color="red">*</font><span id="addressMsg" class="MsgHide">地址不能为空！</span></td>
                        </tr>
                        <tr class="tablecontent">
                            <td colspan="2" class="line1" align="center">
                             	   <input type="submit" name="btnSave" value="保 存" onclick="return check('form1');" id="btnSave" class="input" />
                 				   <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/superadmin/user/userList';" id="btnReturn" class="input" />
                  				   <input type="button" name="btnCancel" value="取 消" onclick="window.location.href='<?= base_url() ?>index.php/superadmin/user/userDetail/<?= $user->u_id ?>';" id="btnCancel" class="input" style="<?php if (isset($show)) echo $show; ?>" />      </td>
                    
                        </tr>
                    </table>
                </div>
            </form>          
        </div>
    </body>
</html>