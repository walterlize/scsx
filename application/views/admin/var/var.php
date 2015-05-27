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
	    		<form action="<?=  base_url()?>index.php/admin/variable/searchVariable" method="post">
				     
				        <input name="courseId" type="text" size="20"/>
				        <input name="courseNum" type="text" size="10"/>
				        <input type="submit" name="submit" value="查询"/>
				        <br/><br/>
				    </form>
    		</div>
    	</div>
        <div class="enterrightlist" style="margin-top: 10px;">
        
        
        	<table width="100%" cellpadding="0" cellspacing="0">
            	<tr class="tabletitle">
            		
                	
           	 		<td class="line2" style="width: 20%">课程号</td>
            		<td class="line2" style="width: 23%">课序号</td>
            		<td class="line2" style="width: 23%">课程名</td>
            		<td class="line2" style="width: 23%">学号</td>
            		<td class="line2" style="width: 10%">姓名</td>
                </tr>
                
                 <?php if (is_array($var)) foreach ($var as $r): ?>
                <tr class="tablecontent">
               		
                	
                    <td class="line2" style="width: 20%"><?= $r['courseId'] ?></td>
                    <td class="line2" style="width: 23%" ><?= $r['courseNum'] ?></td>
                    <td class="line2" style="width: 23%"><?= $r['courseName'] ?></td>
                    <td class="line2" style="width: 23%"><?= $r['stuId'] ?></td>
                    <td class="line2" style="width: 10%"><?= $r['stuName'] ?></td>
                    
                </tr>
                <?php endforeach; ?>

          
                
            </table>
            <div align="center"><?= $page ?></div>
        </div>
        
</div>

























