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
            		
                	<td class="line2"  >基地名</td>
                	<td class="line2"  >班级</td>
                	<td class="line2"  >基地人数</td>
                	
                	
                </tr>
                
                <?php if (is_array($comp)) for($i=0;$i<count($comp);$i++): ?>
                <tr class="tablecontent">
               		<td class="line2"  ><?=$comp[$i]->comp_name?></td>
                	<td class="line2"  ><?=$comp[$i]->elco_stu_class?></td>
                	<td class="line2"  ><?=$comp[$i]->c_comp?></td>
                	
                	
	
                </tr>
                <?php endfor; ?>
            
                
            </table>
            
        </div>
        
</div>