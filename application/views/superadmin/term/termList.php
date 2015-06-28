<link href="<?= base_url(); ?>css/css1.css" type="text/css" rel="stylesheet" />
<div class="enterright" style="background-color: #F8F8F8">
    	<div class="enterrighttitle">
    		<p style="float: left;">学期列表</p>
    		
    	</div>
        <div class="enterrightlist" style="margin-top: 10px;">
        <div style="text-align: right; margin-bottom: 10px">
	        <input type="button" name="btnDelete" value="新 增" onclick="window.location.href='<?= base_url() ?>index.php/superadmin/term/termNew';" id="btnDelete" class="input" />
        </div>
        
        	<table width="698px" cellpadding="0" cellspacing="0">
            	<tr class="tabletitle">
                	<td class="line1"  style="padding-left: 10px">学期名</td>
                	<td style=" padding-left: 10px; text-align: center;">操作</td>
                </tr>
                <?php if (is_array($term)) foreach ($term as $r): ?>
                <tr class="tablecontent">
                	<td class="line1" style="padding-left: 10px"><?= $r->term ?></td>

                	<td style="padding-left: 10px; text-align: center;">
                		<a id="" href="<?= base_url() ?>index.php/superadmin/term/termEdit/<?= $r->id ?>">编辑</a>&nbsp;&nbsp;
                		<a id="" onclick="deleteInfo('<?= base_url() ?>index.php/superadmin/term/termDelete/<?= $r->id ?>')">删除</a>
                		
                	</td>
                </tr>
                <?php endforeach; ?>
                <tr>
                <td colspan = 2 style="text-align: center;">
                <input type="button" name="btnDelete" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/superadmin/term/termNowEdit/1';" id="btnDelete" class="input" />
                </td>
                
                </tr>
                
            </table>
        </div>
        <div class="pagenumber">
        	
        </div>
</div>
