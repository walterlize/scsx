<style>
<!--
td{
text-align: left;
padding-left:10px;
}
-->
</style>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <link href="<?= base_url(); ?>css/css1.css" type="text/css" rel="stylesheet" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>right</title>
    </head>
    <body>
        <div class="enterright">
            <div class="enterrighttitle"><p>查看回帖信息</p></div>
            <div class="enterrightlist">
                <table width="100%" cellpadding="0" cellspacing="0">
                    <tr class="tablecontent">
                        <td class="line1">学生学号</td>
                        <td class="line2" ><?= $stuId ?></td>
                    </tr>  
                    <tr class="tablecontent">
                        <td class="line1">发帖时间</td>
                        <td class="line2" ><?= $time1 ?>&nbsp;</td>
                    </tr> 
                    <tr class="tablecontent">
                        <td class="line1">发帖类别</td>
                        <td class="line2" ><?= $type ?>&nbsp;</td>
                    </tr> 
                    <tr class="tablecontent">
                        <td class="line1">发帖主题</td>
                        <td class="line2" ><?= $theme ?>&nbsp;</td>
                    </tr> 
                    <tr class="tablecontent">
                        <td class="line1">发帖内容</td>
                        <td class="line2" ><?= $content ?>&nbsp;</td>
                    </tr> 
                    <tr class="tablecontent">
                        <td class="line1">回帖教师工号</td>
                        <td class="line2" ><?= $teaId ?>&nbsp;</td>
                    </tr>
                    <tr class="tablecontent">
                        <td class="line1">回帖时间</td>
                        <td class="line2" ><?= $time2 ?>&nbsp;</td>
                    </tr> 
                    <tr class="tablecontent">
                        <td class="line1">回帖内容</td>
                        <td class="line2" ><?= $reply ?>&nbsp;</td>
                    </tr> 
                             
                    <tr class="tablecontent">
                        <td colspan="2" class="line1" align="center" style="text-align: center">                      
                            <a href="#" onclick="deleteInfo('<?= base_url() ?>index.php/admin/luntan/luntanDelete/<?= $l_id ?>')">删除</a>
                            <a href="#" onclick="window.location.href='<?= base_url() ?>index.php/admin/luntan/luntanList';">返回</a>     
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </body>
</html>