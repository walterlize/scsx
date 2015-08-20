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
    		<p style="float: left;">课程基地统计</p>
    		
    	</div>
        <div class="enterrightlist" style="margin-top: 10px;">
        
        
        	<table width="950px;" cellpadding="0" cellspacing="0">

	        	<tr>
	                <td class="tabletitle" style="padding-left: 15px; width: 160px">课程编号</td>
	                <td class="tablecontent" style="padding-left: 15px" >
	                <?= $cour->cour_no ?>(<?= $cour->cour_num ?>)&nbsp;
	                </td>
	            </tr>
	        	<tr>
	                <td class="tabletitle" style="padding-left: 15px; width: 160px">课程名</td>
	                <td class="tablecontent" style="padding-left: 15px" >
	                <?= $cour->cour_name ?>&nbsp;(<?= $cour->cour_name_en ?>&nbsp;)
	                </td>
	            </tr>
	            <tr>
	                <td class="tabletitle" style="padding-left: 15px; width: 160px">教师</td>
	                <td class="tablecontent" style="padding-left: 15px" >
	                <?= $cour->cour_teac_name ?>&nbsp;
	                </td>
	            </tr>
	            
            
            </table>
        <br>
        	<table width="100%" cellpadding="0" cellspacing="0">
            	<tr class="tabletitle">
            		<td  >基地名</td>
            		<td  >基地地址</td>
                	<td  >基地负责人</td>
                	<td  >负责人电话</td>
                	<td  >负责人邮箱</td>
                	
                	
                </tr>
                
                <?php if (is_array($coco)) foreach ($coco as $r): ?>
                <tr class="tablecontent">
                	
                	<td  ><?=$r->comp_name?></td>
                	<td  ><?=$r->comp_address?></td>
               		<td  ><?=$r->user_name?></td>
               		<td  ><?=$r->user_phone?></td>
               		<td  ><?=$r->user_email?></td>
                	
                </tr>
                <?php endforeach; ?>
            
                
            </table>
            <div class="page"><?= $page ?></div>
        </div>
        
</div>