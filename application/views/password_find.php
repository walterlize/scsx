<!--
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<div align="center">
 <link href="<?= base_url(); ?>css/candidate_style.css" rel="stylesheet" type="text/css" />
 <link rel="stylesheet" href="<?= base_url(); ?>css/global.css" type="text/css" />
        <div align="center"><h3>找回密码</h3></div>
    <br />
    <div style="width:80%;">
    <script src="<?= base_url(); ?>javascript/validation.js" type="text/javascript"></script>
    <form name="form1" method="post" action="<?= base_url() ?>index.php/password/find" id="form1">
<table cellpadding="0" cellspacing="1" class="tablist2" style="<?= $show ?>">
        <tr>
            <td class="td1" style="width: 179px">
                邮箱地址</td>
            <td class="td2">
                <input name="e_mail" type="text" value="" id="e_mail" isRequired="true" validEnum="Email"/>
            <font color="red">*</font> <span id="e_mailMsg" class="MsgHide">邮箱地址不能为空或者格式错误！</span>
            <span id="mail"><?= $check_mail ?></span></td>
        </tr>
        <tr>
            <td align="center" colspan="2" class="td3">
                <input type="submit" name="btnSave" value="确 定" onclick="return check('form1')" id="btnSave" class="input" />
                <input type="button" name="btnCancel" value="返 回" onclick="window.location.href='<?= base_url() ?>';" id="btnCancel" class="input" />
            </td>
        </tr>
    </table>
    <br />
<?= $result ?>
</form></div>
</div>-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <link href="<?= base_url() ?>css/css2.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url(); ?>css/candidate_style.css" rel="stylesheet" type="text/css" />
        <!--<link rel="stylesheet" href="<?= base_url(); ?>css/global.css" type="text/css" />-->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>找回密码</title>
    </head>
    <body>
        <div class="box">
            <script src="<?= base_url(); ?>javascript/validation.js" type="text/javascript"></script>
            <div class="search">找回密码</div>
            <div class="searchcontent">
                <form name="form1" method="post" action="<?= base_url() ?>index.php/password/find" id="form1">
                    <table width="100%" border="0" style="text-align: center;" >
                        <tr>
                        <td>
                        	请联系教务处管理员或学院教务员！
                        </td>
                        </tr>
                        <tr class="mailbutton">
                            <td>
                                <div class="button">
                                    <div style="margin-left: 60px;">
                                    <a href="#" onclick="window.location.href='<?= base_url() ?>';">返回</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <?= $result ?>
                </form>
            </div>
        </div>
    </body>
</html>
