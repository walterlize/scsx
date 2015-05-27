<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="<?= base_url(); ?>css/css1.css" type="text/css" rel="stylesheet" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>right</title>
</head>
<body>
	<div class="enterright">
    	<div class="enterrighttitle"><p>实习基地信息列表</p></div>
        <div class="enterrightlist">
        	<table width="100%" cellpadding="0" cellspacing="0">
            	<tr class="tabletitle">
                	<td class="line2">实习项目名称</td><td class="line2">实习项目模式</td><td class="line2">实习基地名称</td><td class="line2">负责人</td>
                </tr>  
                <?php if (is_array($company)) foreach ($company as $r): ?>
                <tr class="tablecontent">
                    <td class="line2"><?= $r['p_name'] ?></td>
                    <td class="line2"><?= $r['pattern'] ?></td>
                    <td class="line2"><?= $r['comName'] ?></td>
                    <td class="line2"><?= $r['realname'] ?></td>       
                </tr>
            <?php endforeach; ?>
                <tr>
        </tr>
            </table>
      </div>     
    </div>
</body>
</html>