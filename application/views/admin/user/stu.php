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
    		
    	</div>
        <div class="enterrightlist" style="margin-top: 10px;">
        
        
        	<table width="100%" cellpadding="0" cellspacing="0">
            	<tr class="tabletitle">
            		
                	
           	 		<td class="line2" style="width: 20%">登录名</td>
            		<td class="line2" style="width: 23%">真实姓名</td>
            		<td class="line2" style="width: 23%">密码</td>
            		<td class="line2" style="width: 23%">系别</td>
            		<td class="line2" style="width: 10%">班级</td>
                </tr>
                
                 <?php if (is_array($user)) foreach ($user as $r): ?>
                <tr class="tablecontent">
               		
                	
                    <td class="line2" style="width: 20%"><?= $r['stuId'] ?></td>
                    <td class="line2" style="width: 23%" ><?= $r['stuName'] ?></td>
                    <td class="line2" style="width: 23%"><?= $r['password'] ?></td>
                    <td class="line2" style="width: 23%"><?= $r['stuMajor'] ?></td>
                    <td class="line2" style="width: 10%"><?= $r['stuClass'] ?></td>
                    
                </tr>
                <?php endforeach; ?>

          
                
            </table>
            <div align="center"><?= $page ?></div>
        </div>
        
</div>

























