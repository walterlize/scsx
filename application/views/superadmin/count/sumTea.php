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
            		
                	<td class="line2"  >学院/部门</td>
                	
                	<td class="line2"  >人数</td>
                	
                </tr>
                
                <?php if (is_array($tea)) foreach ($tea as $r): ?>
                <tr class="tablecontent">
               		 
                	<td class="line1" ><?= $r->XSM ?></td>
                	
                	<td class="line2"><?= $r->COTEA ?></td>

                	
                </tr>
                <?php endforeach; ?>
            
                
            </table>
            
        </div>
        
</div>