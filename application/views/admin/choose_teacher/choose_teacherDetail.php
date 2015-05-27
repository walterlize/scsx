<!--
<div style="margin-left:20px; margin-right:20px;">
    <br />
    <h3>基地负责带队教师信息</h3>
    <table cellpadding="0" cellspacing="1" class="tablist2">
        <tr>
            <td class="td1" style="width: 111px">基地教师编号</td>
            <td class="td2" ><?= $c_id ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习基地名称</td>
            <td class="td2" ><?= $comName ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习基地地址</td>
            <td class="td2" ><?= $yaddress ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习基地负责人</td>
            <td class="td2" ><?= $yrealname ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习基地电话</td>
            <td class="td2" ><?= $yphone ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习基地邮箱</td>
            <td class="td2" ><?= $yemail ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">指导教师姓名</td>
            <td class="td2" ><?= $trealname ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">带队教师工号</td>
            <td class="td2" ><?= $u_name ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">带队教师姓名</td>
            <td class="td2" ><?= $realname ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">带队教师电话</td>
            <td class="td2" ><?= $phone ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">带队教师邮箱</td>
            <td class="td2" ><?= $email ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">带队教师办公地址</td>
            <td class="td2" ><?= $address ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">带队教师班级</td>
            <td class="td2" ><?= $class ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习基地所属项目模式</td>
            <td class="td2" ><?= $pattern ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习基地简介</td>
            <td class="td2" ><?= $content ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习基地实习计划</td>
            <td class="td2" ><?= $plan ?>&nbsp;</td>
        </tr>     
        <tr>
            <td colspan="2" class="td3" align="center">
                <input type="button" name="btnEdit" value="编 辑" onclick="window.location.href='<?= base_url() ?>index.php/admin/choose_teacher/choose_teacherEdit/<?= $c_id ?>';" id="btnEdit" class="input" />
                <input type="button" name="btnDelete" value="删 除" onclick="deleteInfo('<?= base_url() ?>index.php/admin/choose_teacher/choose_teacherDelete/<?= $c_id ?>')" id="btnDelete" class="input" />
                <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/admin/choose_teacher/choose_teacherList';" id="btnReturn" class="input" />      </td>
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
            <div class="enterrighttitle"><p>基地负责带队教师信息</p></div>
            <div class="enterrightlist">
                <table width="100%" cellpadding="0" cellspacing="0">
                    <tr class="tablecontent">
                        <td class="line1">实习基地名称</td>
                        <td class="line2" ><?= $comName ?>&nbsp;</td>
                    </tr>
                    <tr class="tablecontent">
                        <td class="line1">实习基地负责人</td>
                        <td class="line2" ><?= $yrealname ?>&nbsp;</td>
                    </tr>  
                    <tr class="tablecontent">
                        <td class="line1">指导教师姓名</td>
                        <td class="line2" ><?= $trealname ?>&nbsp;</td>
                    </tr> 
                    <tr class="tablecontent">
                        <td class="line1">带队教师工号</td>
                        <td class="line2" ><?= $u_name ?>&nbsp;</td>
                    </tr> 
                    <tr class="tablecontent">
                        <td class="line1">带队教师姓名</td>
                        <td class="line2" ><?= $realname ?>&nbsp;</td>
                    </tr> 
                    <tr class="tablecontent">
                        <td class="line1">实习基地所属项目模式</td>
                        <td class="line2" ><?= $pattern ?>&nbsp;</td>
                    </tr> 
                    <tr class="tablecontent">
                        <td class="line1">实习基地简介</td>
                        <td class="line2" ><?= $content ?>&nbsp;</td>
                    </tr> 
                    <tr class="tablecontent">
                        <td class="line1">实习基地实习计划</td>
                        <td class="line2" ><?= $plan ?>&nbsp;</td>
                    </tr> 
                             
                    <tr class="tablecontent">
                        <td colspan="2" class="line1" align="center">
                            <a href="#" onclick="window.location.href='<?= base_url() ?>index.php/admin/choose_teacher/choose_teacherEdit/<?= $c_id ?>';">编辑</a>
                            <a href="#" onclick="deleteInfo('<?= base_url() ?>index.php/admin/choose_teacher/choose_teacherDelete/<?= $c_id ?>')">删除</a>
                            <a href="#" onclick="window.location.href='<?= base_url() ?>index.php/admin/choose_teacher/choose_teacherList';">返回</a>     
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </body>
</html>