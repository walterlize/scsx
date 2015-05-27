
<link href="<?= base_url(); ?>css/css1.css" type="text/css" rel="stylesheet" />
<style>
<!--
td{
	text-align: left;
	padding-left: 10px;
}
-->
</style>
	<div class="enterright">
    	<div class="enterrighttitle"><p>学生实习报名审核列表</p></div>
        <div class="enterrightlist">
        	<table width="100%" cellpadding="0" cellspacing="0">
            	<tr class="tabletitle">
                	<td class="line2" style="width: 15%">实习项目名称</td>
                	<td class="line2" style="width: 25%">实习基地名称</td>
                	<td class="line2" style="width: 10%">教师姓名</td>
                	<td class="line2" style="width: 10%">学生学号</td>
                	<td class="line2" style="width: 10%">学生姓名</td>
                	<td class="line2" style="width: 10%">报名状态</td>
                	<td class="line2" style="width: 30%">操作</td>
                </tr>  
            
            <?php if (is_array($shenhe)) foreach ($shenhe as $r): ?>
                <tr class="RowStyle" align="center">
                    <td class="line2" style="width: 15%"><?= $r['courseName'] ?></td>
                    <td class="line2" style="width: 25%"><?= $r['comName'] ?></td>
                    <td class="line2" style="width: 10%"><?= $r['courseTeaName'] ?></td>
                    <td class="line2" style="width: 10%"><?= $r['stuId'] ?></td>
                    <td class="line2" style="width: 10%"><?= $r['stuName'] ?></td>
                    
                    <td><font color="red" class="line2" style="width: 10%"><?= $r['state'] ?></font></td>
                    <td class="line2" style="width: 30%">
                        <input type="button" value="通 过" class="input" onclick="window.location.href='<?= base_url(); ?>index.php/admin/shenhe/updateState/<?= $r['b_id'] ?>/3'">
                        <input type="button" value="整 改" class="input" onclick="window.location.href='<?= base_url(); ?>index.php/admin/shenhe/updateState/<?= $r['b_id'] ?>/4'">
                    </td>
                </tr>
            <?php endforeach; ?>
            <tr>
            <td colspan="7" style="text-align: center;">
            </td>
            </tr>
            </table>
      </div>
        <div class="pagenumber" align="center"><?=$page?></div>       
    </div>









