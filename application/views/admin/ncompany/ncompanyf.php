
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
    	<div class="enterrighttitle"><p>实习基地信息列表</p></div>
        <div class="enterrightlist">
        	<table width="100%" cellpadding="0" cellspacing="0">
            	<tr class="tabletitle">
            		<td class="line2" style="width: 10%">实习项目<br>课程号</td>
                	<td class="line2" style="width: 10%">实习项目<br>课序号</td>
                	<td class="line2" style="width: 10%">实习项目<br>课程名</td>
                	<td class="line2" style="width: 10%">实习基地<br>名称</td>
                	<td class="line2" style="width: 10%">实习基地<br>负责人</td>
                	<td class="line2" style="width: 10%">实习基地<br>上传人</td>
                	<td class="line2" style="width: 10%">实习基地<br>状态</td>
                	<td class="line2" style="width: 10%">操作</td>
                </tr>  
                <?php if (is_array($company)) foreach ($company as $r): ?>
                <tr class="tablecontent">
                	<td class="line2" style="width: 10%"><?= $r['courseId'] ?></td>
                    <td class="line2" style="width: 10%"><?= $r['courseNum'] ?></td>
                    <td class="line2" style="width: 10%"><?= $r['courseName'] ?></td>
                    <td class="line2" style="width: 10%"><?= $r['comName'] ?></td>
                    <td class="line2" style="width: 10%"><?= $r['u_name'] ?></td>
                    <td class="line2" style="width: 10%"><?= $r['addType'] ?></td>
                    <td class="line2" style="width: 10%">
                    <?php 
                    if($r['stateId']=='6')echo"审核失败";
                    if($r['stateId']=='7')echo"待审核";
                    ?>
                    </td>
                    <td class="line2" style="width: 10%">
                        <a id="" href="<?= base_url() ?>index.php/admin/ncompany/ncompanyDetailf/<?= $r['comId'] ?>/<?=$r['c_id']?>/<?=$r['course_id']?>">详细</a>
                    </td>        
                </tr>
            <?php endforeach; ?>
            <tr>
            <td colspan="8" style="text-align: center;">
            </td>
            </tr>
            </table>
      </div>
        <div class="pagenumber" align="center"><?=$page?></div>       
    </div>
