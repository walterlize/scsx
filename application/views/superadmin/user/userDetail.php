<!--
<div style="margin-left:20px; margin-right:20px;">
    <br />
    <h3>学院管理员信息</h3>
    <table cellpadding="0" cellspacing="1" class="tablist2"> 
        <tr>
            <td class="td1" style="width: 111px">所在学院</td>
            <td class="td2" ><?= $college ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">性别</td>
            <td class="td2" ><?= $sex ?>&nbsp;</td>
        </tr>  
        <tr>
            <td class="td1" style="width: 111px">用户名</td>
            <td class="td2" ><?= $u_name ?>&nbsp;</td>
        </tr> 
        <tr>
            <td class="td1" style="width: 111px">密码</td>
            <td class="td2" ><?= $password ?>&nbsp;</td>
        </tr> 
        <tr>
            <td class="td1" style="width: 111px">姓名</td>
            <td class="td2" ><?= $realname ?>&nbsp;</td>
        </tr> 
        <tr>
            <td class="td1" style="width: 111px">电话</td>
            <td class="td2" ><?= $phone ?>&nbsp;</td>
        </tr> 
        <tr>
            <td class="td1" style="width: 111px">邮箱</td>
            <td class="td2" ><?= $email ?>&nbsp;</td>
        </tr> 
        <tr>
            <td class="td1" style="width: 111px">地址</td>
            <td class="td2" ><?= $address ?>&nbsp;</td>
        </tr> 
        <tr>
            <td colspan="2" class="td3" align="center">
                <input type="button" name="btnEdit" value="编 辑" onclick="window.location.href='<?= base_url() ?>index.php/superadmin/user/userEdit/<?= $u_id ?>';" id="btnEdit" class="input" />
                <input type="button" name="btnDelete" value="删 除" onclick="deleteInfo('<?= base_url() ?>index.php/superadmin/user/userDelete/<?= $u_id ?>')" id="btnDelete" class="input" />
                <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/superadmin/user/userList';" id="btnReturn" class="input" />      </td>
        </tr>
    </table>
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
            <div class="enterrighttitle"><p>学院管理员信息</p></div>
            <div class="enterrightlist">
                <table width="100%" cellpadding="0" cellspacing="0">
                    <tr class="tablecontent">
                        <td class="line1">所在学院</td>
                        <td class="line2" ><?= $college ?>&nbsp;</td>
                    </tr>
                    <tr class="tablecontent">
                        <td class="line1">性别</td>
                        <td class="line2" ><?= $sex ?>&nbsp;</td>
                    </tr>  
                    <tr class="tablecontent">
                        <td class="line1">用户名</td>
                        <td class="line2" ><?= $u_name ?>&nbsp;</td>
                    </tr> 
                    <tr class="tablecontent">
                        <td class="line1">密码</td>
                        <td class="line2" ><?= $password ?>&nbsp;</td>
                    </tr> 
                    <tr class="tablecontent">
                        <td class="line1">姓名</td>
                        <td class="line2" ><?= $realname ?>&nbsp;</td>
                    </tr> 
                    <tr class="tablecontent">
                        <td class="line1">电话</td>
                        <td class="line2" ><?= $phone ?>&nbsp;</td>
                    </tr> 
                    <tr class="tablecontent">
                        <td class="line1">邮箱</td>
                        <td class="line2" ><?= $email ?>&nbsp;</td>
                    </tr> 
                    <tr class="tablecontent">
                        <td class="line1">地址</td>
                        <td class="line2" ><?= $address ?>&nbsp;</td>
                    </tr> 
                             
                    <tr class="tablecontent">
                        <td colspan="2" class="line1" align="center">
                            <a href="#" onclick="window.location.href='<?= base_url() ?>index.php/superadmin/user/userEdit/<?= $u_id ?>';">编辑</a>
                            <a href="#" onclick="deleteInfo('<?= base_url() ?>index.php/superadmin/user/userDelete/<?= $u_id ?>')">删除</a>
                            <a href="#" onclick="window.location.href='<?= base_url() ?>index.php/superadmin/user/userList';">返回</a>     
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </body>
</html>