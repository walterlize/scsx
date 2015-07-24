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
    		<p style="float: left;">用户列表</p>
    		<div style="float: right; height: 100%; margin-top: 10px; margin-right: 10px;">
	    		<form action="<?=  base_url()?>index.php/admin/user/searchTea" method="post">
				     
				        <select name="selectType" id="selectType">
                        <option value="1">教师号</option>
                        <option value="2">教师名</option>
                        
                    </select>
                    <input name="searchTerm" type="text" size="10" id="searchTerm" />
                    <input type="submit" name="submit" value="查询"/>
                    <br/><br/>
				    </form>
    		</div>
    	</div>
        <div class="enterrightlist" style="margin-top: 10px;">
        
        
        	<table width="100%" cellpadding="0" cellspacing="0">
            	<tr class="tabletitle">
            		
                	
           	 		<td class="line2" >教师号</td>
            		<td class="line2" >姓名</td>
                    
            		<td class="line2" >职称</td>
            		
                </tr>
                
                 <?php if (is_array($tea)) foreach ($tea as $r): ?>
                <tr class="tablecontent">
               		
                	
                    <td class="line2" ><?= $r['tea_num'] ?></td>
                    <td class="line2" ><?= $r['tea_name'] ?></td>
                    
                    <td class="line2" ><?= $r['tea_title'] ?></td>
                    
                    
                </tr>
                <?php endforeach; ?>

          
                
            </table>
            <div align="center"><?= $page ?></div>
        </div>
        
</div>

























