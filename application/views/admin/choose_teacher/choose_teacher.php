<!--
<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3>基地负责教师信息列表</h3>
    <table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th scope="col">实习基地名称</th><th scope="col">带队教师</th><th scope="col">指导教师</th><th scope="col">基地负责人</th><th scope="col">实习模式</th><th scope="col">操作</th>
        </tr>
        <?php if (is_array($choose_teacher)) foreach ($choose_teacher as $r): ?>
                <tr class="RowStyle" align="center">
                    <td><?= $r['comName'] ?></td>
                    <td><?= $r['realname'] ?></td>  
                    <td><?= $r['trealname'] ?></td>
                    <td><?= $r['yrealname'] ?></td>
                    <td><?= $r['pattern'] ?></td>
                    <td>
                        <a id="" href="<?= base_url() ?>index.php/admin/choose_teacher/choose_teacherDetail/<?= $r['c_id'] ?>">详细</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <tr>
            <td colspan="5" align="center">
                <input type="button" name="btnDelete" value="新 增" onclick="window.location.href='<?= base_url() ?>index.php/admin/choose_teacher/choose_teacherNew';" id="btnDelete" class="input" />
                <input type="button" name="btnReturn" value="删 除" onclick="window.location.href='<?= base_url() ?>index.php/admin/choose_teacher/choose_teacherList';" id="btnReturn" class="input"  style="display:none"/>
            </td>
        </tr>
    </table>
    <div align="center"><?= $page ?></div>
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
    	<div class="enterrighttitle"><p>基地负责教师信息列表</p></div>
        <div class="enterrightlist">
        	<table width="100%" cellpadding="0" cellspacing="0">
            	<tr class="tabletitle">
                	<td class="line2">实习基地名称</td><td class="line2">带队教师</td><td class="line2">基地负责人</td><td class="line2">实习模式</td><td>操作</td>
                </tr>  
                <?php if (is_array($choose_teacher)) foreach ($choose_teacher as $r): ?>
                <tr class="tablecontent">
                    <td class="line2"><?= $r['comName'] ?></td>
                    <td class="line2"><?= $r['realname'] ?></td>
                    <td class="line2"><?= $r['yrealname'] ?></td>
                    <td class="line2"><?= $r['pattern'] ?></td>
                    <td>
                        <a id="" href="<?= base_url() ?>index.php/admin/choose_teacher/choose_teacherDetail/<?= $r['c_id'] ?>">详细</a>
                    </td>        
                </tr>
            <?php endforeach; ?>
                <tr>
            <td class="tablecontent" colspan="6" align="center">
                <a href="#" onclick="window.location.href='<?= base_url() ?>index.php/admin/choose_teacher/choose_teacherNew';">新增</a>
                <a href="#" onclick="window.location.href='<?= base_url() ?>index.php/admin/choose_teacher/choose_teacherList';" style="display:none">删除</a>
                <!--<input type="button" name="btnDelete" value="新 增" onclick="window.location.href='<?= base_url() ?>index.php/superadmin/college/collegeNew';" id="btnDelete" class="input" />               
           -->
            </td>
        </tr>
            </table>
      </div>
        <div class="pagenumber" align="center"><?= $page ?></div>       
    </div>
</body>
</html>