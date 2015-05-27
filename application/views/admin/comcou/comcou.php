
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="<?= base_url(); ?>css/css1.css" type="text/css" rel="stylesheet" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>right</title>
</head>
<body>
	<div class="enterright">
    	<div class="enterrighttitle"><p>实习项目信息列表</p></div>
        <div class="enterrightlist">
        	<table width="100%" cellpadding="0" cellspacing="0">
            	<tr class="tabletitle">
                	<td class="line2" style="width: 10%">实习项目<br />课程号</td>
                	<td class="line2" style="width: 10%">实习项目<br />课序号</td>
                	<td class="line2" style="width: 25%">实习项目<br />课程名</td>
                	<td class="line2" style="width: 10%">实习项目<br />模式</td>
                	<td class="line2" style="width: 25%">实习基地<br />名称</td>
                	<td class="line2" style="width: 10%">实习基地<br />负责人</td>
                	<td class="line2" style="width: 10%">操作</td>
                </tr>  
                <?php if (is_array($comcou)) foreach ($comcou as $r): ?>
                <tr class="tablecontent">
                    <td class="line2" style="width: 10%"><?= $r['courseId'] ?></td>
                    <td class="line2" style="width: 10%"><?= $r['courseNum'] ?></td>
                    <td class="line2" style="width: 25%"><?= $r['courseName'] ?></td>
                    <td class="line2" style="width: 10%"><?=$r['pattern']?></td>
                    <td class="line2" style="width: 25%"><?=$r['comName']?></td>
                    <td class="line2" style="width: 10%"><?=$r['realname']?></td>
                    <td class="line2" style="width: 10%">
                        <a id="" href="<?= base_url() ?>index.php/admin/ncomcou/ncomcouEdit/<?= $r['id'] ?>">修改</a>
                    </td>        
                </tr>
            <?php endforeach; ?>
            <tr>
	            <td colspan="7" style="text-align: center;">
	            	<input type="button" name="btnSave" value="新 增" onclick="window.location.href='<?= base_url() ?>index.php/admin/ncomcou/ncomcouNew';" id="btnSave" class="input" />
	            </td>
            </tr>
            </table>
      </div>
        <div class="pagenumber" align="center"><?= $page ?></div>       
    </div>
</body>
</html>