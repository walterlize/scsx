<!--
<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3>回帖列表</h3>
    <table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th scope="col">发帖类别</th><th scope="col">发帖主题</th><th scope="col">发帖时间</th><th scope="col">教师姓名</th><th scope="col">回帖时间</th><th scope="col">操作</th>
        </tr>
        <?php if (is_array($luntan)) foreach ($luntan as $r): ?>
                <tr class="RowStyle" align="center">                      
                    <td><?= $r['type'] ?></td>
                    <td><?= $r['theme'] ?></td>
                    <td><?= $r['time1'] ?></td>
                    <td><?= $r['trealname'] ?></td>
                    <td><?= $r['time2'] ?></td>
                    <td>
                        <a id="" href="<?= base_url() ?>index.php/admin/luntan/luntanDetail/<?= $r['l_id'] ?>">详细</a>
                    </td>
                </tr>
            <?php endforeach; ?>
    </table>
    <div align="center"><?= $page ?></div>
</div>
-->
<link href="<?= base_url(); ?>css/css1.css" type="text/css" rel="stylesheet" />
<style>
<!--
td{
text-align: left;
padding-left: 10px;
}
-->
</style>
<body>
	<div class="enterright">
    	<div class="enterrighttitle"><p>回帖列表</p></div>
        <div class="enterrightlist">
        	<table width="100%" cellpadding="0" cellspacing="0">
            	<tr class="tabletitle">
                	<td class="line2" style="width: 10%">发帖类别</td>
                	<td class="line2" style="width: 50%">发帖主题</td>
                	<td class="line2" style="width: 20%">发帖时间</td>
                	<td class="line2">教师工号</td>
                	<td class="line2" style="width:20xp;">操作</td>
                </tr>  
                <?php if (is_array($luntan)) foreach ($luntan as $r): ?>
                <tr class="tablecontent">
                    <td class="line2" style="width: 10%"><?= $r['type'] ?></td>
                    <td class="line2" style="width: 50%"><?= $r['theme'] ?></td>
                    <td class="line2" style="width: 20%"><?= $r['time1'] ?></td>
                    <td class="line2" ><?=$r['teaId']?></td>
                    <td class="line2" style="width:20px;" >
                        <a id="" href="<?= base_url() ?>index.php/admin/luntan/luntanDetail/<?= $r['l_id'] ?>">详细</a>
                    </td>        
                </tr>
            <?php endforeach; ?>
                <tr>
        </tr>
            </table>
      </div>
        <div class="pagenumber" align="center"><?= $page ?></div>       
    </div>
</body>
</html>