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
                	
                	<td class="line2"  >教师基地数</td>
                	<td class="line2"  >学生基地数</td>
                	<td class="line2"  >基地总数</td>
                	
                </tr>
                
                <?php if (is_array($comp)) foreach ($comp as $key=>$val): ?>
                <tr class="tablecontent">
               		<td class="line2"  ><?=$key?></td>
                	
                	<td class="line2"  ><?=$val[0]?></td>
                	<td class="line2"  ><?=$val[1]?></td>
                	<td class="line2"  ><?=$val[2]?></td>
                	
	
                </tr>
                <?php endforeach; ?>
            
                
            </table>
            
        </div>
        
</div>