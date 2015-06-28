<link href="<?= base_url(); ?>css/css1.css" type="text/css" rel="stylesheet" />
<style>
<!--
td{
text-align: left;
padding-left: 10px;
}
-->
</style>
<div class="enterright" style="background-color: #F8F8F8">
    	<div class="enterrighttitle">
    		<p style="float: left;">学生人数统计</p>
    		
    	</div>
        <div class="enterrightlist" style="margin-top: 10px;">
        
        
        	<table width="100%" cellpadding="0" cellspacing="0">
            	<tr class="tabletitle">
            		
                	<td class="line2"  >学院</td>
                	<td class="line2"  >人数</td>
                	<td class="line2"  >操作</td>
                </tr>
                
                <?php if (is_array($collegeName)) foreach ($collegeName as $key=>$val): ?>
                <tr class="tablecontent">
               		 
                	<td class="line1" ><?= $val ?></td>
                	<td class="line2"><?= $stuNum[$key] ?></td>

                	<td class="line2">
                		<a id="" href="<?= base_url() ?>index.php/superadmin/sum/sumDetail1/">详细</a>
                	</td>
                </tr>
                <?php endforeach; ?>
            
                
            </table>
            
        </div>
        
</div>