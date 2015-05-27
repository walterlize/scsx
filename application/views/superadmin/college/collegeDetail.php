<!--
<div style="margin-left:20px; margin-right:20px;">
    <br />
    <h3>学院名称管理列表信息</h3>
    <table cellpadding="0" cellspacing="1" class="tablist2">
        <tr>
            <td class="td1" style="width: 111px">编号</td>
            <td class="td2" ><?= $collegeId ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">学院名称</td>
            <td class="td2" ><?= $college ?>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2" class="td3" align="center">
                <input type="button" name="btnEdit" value="编 辑" onclick="window.location.href='<?= base_url() ?>index.php/superadmin/college/collegeEdit/<?= $collegeId ?>';" id="btnEdit" class="input" />
                <input type="button" name="btnDelete" value="删 除" onclick="deleteInfo('<?= base_url() ?>index.php/superadmin/college/collegeDelete/<?= $collegeId ?>')" id="btnDelete" class="input" />
                <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/superadmin/college/collegeList';" id="btnReturn" class="input" />      </td>
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
            <div class="enterrighttitle"><p>学院名称管理列表信息</p></div>
            <div class="enterrightlist">
                <table width="100%" cellpadding="0" cellspacing="0">
                    <tr class="tabletitle">
                        <td class="line1">编号</td>
                        <td class="line2" ><?= $collegeId ?>&nbsp;</td>
                    </tr>
                    <tr class="tablecontent">
                        <td class="line1">学院名称</td>
                        <td class="line2" ><?= $college ?>&nbsp;</td>
                    </tr>  
                    <tr class="tablecontent">
                        <td colspan="2" class="line1" align="center">
                            <a href="#" onclick="window.location.href='<?= base_url() ?>index.php/superadmin/college/collegeEdit/<?= $collegeId ?>';">编辑</a>
                            <a href="#" onclick="deleteInfo('<?= base_url() ?>index.php/superadmin/college/collegeDelete/<?= $collegeId ?>')">删除</a>
                            <a href="#" onclick="window.location.href='<?= base_url() ?>index.php/superadmin/college/collegeList';">返回</a>     
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </body>
</html>
