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
                	<td class="line2">成绩分段</td><td class="line2">人数</td>
                </tr>  
                <?php for($i=0;$i<count($scoNum);$i++): ?>
                <tr class="tablecontent">
                    <td class="line2"><?= $scoName[$i] ?></td>
                    <td class="line2"><?= $scoNum[$i] ?></td>     
                </tr>
            <?php endfor; ?>
                <tr>
        </tr>
            </table>
      </div>     
    </div>
</body>
</html>