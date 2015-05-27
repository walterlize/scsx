<style>
<!--
td{
text-align: left;
padding-left: 50px;
}
-->
</style>
<link href="<?= base_url(); ?>css/css1.css" type="text/css" rel="stylesheet" />

	<div class="enterright">
    	<div class="enterrighttitle"><p>班级名称管理列表</p></div>
        <div class="enterrightlist">
        	<table width="100%" cellpadding="0" cellspacing="0">
            	<tr class="tabletitle">
                	
            	
                	<td class="line2">系名称</td>
                	<td class="line2">班级名称</td>
                	
                </tr>  
                <?php if (is_array($class)) foreach ($class as $r): ?>
                <tr class="tablecontent">                  
                    <td class="line2"><?= $r['major'] ?></td>
                    <td class="line2"><?= $r['class'] ?></td>                    
                          
                </tr>
            <?php endforeach; ?>
                <tr>
            <td class="tablecontent" colspan="6" align="center">
            </td>
        </tr>
            </table>
      </div>
        
    </div>
