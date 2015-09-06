<link href="<?= base_url(); ?>css/css1.css" type="text/css" rel="stylesheet" />

<div class="enterright" style="background-color: #F8F8F8">
    	<div class="enterrighttitle">
    		<p style="float: left;">当前学期</p>
    		
    	</div>
        <div class="enterrightlist" style="margin-top: 10px;">
        
        
        	<table width="99%" cellpadding="0" cellspacing="0">
            	<tr class="tabletitle">
                	<td class="line1"  style="padding-left: 10px">当前学期</td>
                	<td style="width: 30%; padding-left: 10px;">操作</td>
                </tr>
                <?php if ($nowterm) ?>
                <tr class="tablecontent">
                	<td class="line1" style="padding-left: 10px"><?= $nowterm->term ?></td>

                	<td style="width: 40px; padding-left: 10px;">
                		<a id="" href="<?= base_url() ?>index.php/superadmin/term/termNowEdit/<?= $nowterm->id ?>">设置</a>
                	</td>
                </tr>
               
                
            </table>
        </div>
        
</div>
