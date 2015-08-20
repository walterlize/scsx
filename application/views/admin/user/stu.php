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
                <form action="<?=  base_url()?>index.php/admin/user/searchStu" method="post">
                    查询方式：
                    <select name="selectType" id="selectType">
                        <option value="1">学号</option>
                        <option value="2">姓名</option>
                        <option value="3">班级</option>
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
            		
                	
           	 		<td class="line2" >学号</td>
            		<td class="line2" >姓名</td>
                    
            		<td class="line2" >系别</td>
            		<td class="line2" >班级</td>
            		
                </tr>
                
                 <?php if (is_array($stu)) foreach ($stu as $r): ?>
                <tr class="tablecontent">
               		
                	
                    <td class="line2" ><?= $r['stu_num'] ?></td>
                    <td class="line2" ><?= $r['stu_name'] ?></td>
                    <td class="line2" ><?= $r['stu_major'] ?></td>
                    <td class="line2" ><?= $r['stu_class'] ?></td>
                    
                    
                </tr>
                <?php endforeach; ?>

          
                
            </table>
            <div align="center"><?= $page ?></div>
        </div>
        
</div>

























