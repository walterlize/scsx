<!--
<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3>班级名称管理列表</h3>
    <table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th scope="col">学院名称</th><th scope="col">系名称</th><th scope="col">班级名称</th><th scope="col">操作</th>
        </tr>
        <?php if (is_array($class)) foreach ($class as $r): ?>
                <tr class="RowStyle" align="center">
                    <td><?= $r['college'] ?></td>
                    <td><?= $r['department'] ?></td>
                    <td><?= $r['class'] ?></td>
                    <td>
                        <a id="" href="<?= base_url() ?>index.php/admin/cla/claDetail/<?= $r['classId'] ?>">详细</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <tr>
            <td colspan="6" align="center">
                <input type="button" name="btnDelete" value="新 增" onclick="window.location.href='<?= base_url() ?>index.php/admin/cla/claNew';" id="btnDelete" class="input" />
                <input type="button" name="btnReturn" value="删 除" onclick="window.location.href='<?= base_url() ?>index.php/admin/cla/claList';" id="btnReturn" class="input"  style="display:none"/>
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
    	<div class="enterrighttitle"><p>班级名称管理列表</p></div>
        <div class="enterrightlist">
        	<table width="100%" cellpadding="0" cellspacing="0">
            	<tr class="tabletitle">
                	<td class="line2">学院名称</td><td class="line2">系名称</td><td class="line2">班级名称</td><td>操作</td>
                </tr>  
                <?php if (is_array($class)) foreach ($class as $r): ?>
                <tr class="tablecontent">
                    <td class="line2"><?= $r['college'] ?></td>
                    <td class="line2"><?= $r['department'] ?></td>
                    <td class="line2"><?= $r['class'] ?></td>
                    <td>
                        <a id="" href="<?= base_url() ?>index.php/admin/cla/claDetail/<?= $r['classId'] ?>">详细</a>
                    </td>        
                </tr>
            <?php endforeach; ?>
                <tr>
            <td class="tablecontent" colspan="6" align="center">
                <a href="#" onclick="window.location.href='<?= base_url() ?>index.php/admin/cla/claNew';">新增</a>
                <a href="#" onclick="window.location.href='<?= base_url() ?>index.php/admin/cla/claList';" style="display:none">删除</a>
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