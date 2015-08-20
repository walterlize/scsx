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
            		<td  >学期</td>
            		<td  >课程编号</td>
                	<td  >课程</td>
                	
                	<td  >教师基地数</td>
                	<td  >学生基地数</td>
                	<td  >基地总数</td>
                	
                </tr>
                
                <?php if (is_array($comp)) foreach ($comp as $key=>$val): ?>
                <tr class="tablecontent">
                	
                	<td  ><?=$val['cour_term']?></td>
                	<td   ><?=$val['cour_no']?>--<?=$val['cour_num']?></td>
               		<td  >
               		  <a href="<?=base_url()?>index.php/admin/sum/courcomp/<?=$val['cour_id']?>">
               		<?=$val['cour_name']?>
               		</a>
               		</td>
                	
                	<td  ><?=$val[0]?></td>
                	<td ><?=$val[1]?></td>
                	<td  ><?=$val[2]?></td>
                	
	
                </tr>
                <?php endforeach; ?>
            
                
            </table>
            
        </div>
        
</div>