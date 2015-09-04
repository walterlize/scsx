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
    		<p style="float: left;"><?=$title?>列表</p>
    		
    	</div>
        <div class="enterrightlist" style="margin-top: 10px;">
        
        
        	<table width="100%" cellpadding="0" cellspacing="0">
            	<tr class="tabletitle">
            		
                	<td class="line2"  >标题</td>
                	<td class="line2"  >发布时间</td>
                	<!-- 
                	<td class="line2"  >审核状态</th>
                	-->
                	<td class="line2"  >操作</td>
                </tr>
                
                <?php if (is_array($news)) foreach ($news as $r): ?>
                <tr class="tablecontent">
               		 
                	<td class="line1" ><?= $r['news_title'] ?></td>
                	<td class="line2"><?= $r['news_time'] ?></td>
                	<!-- 
                	<td class="line2"><?= $r['usta_type']?></td>
                    -->
                	<td class="line2">
                		<a id="" href="<?= base_url() ?>index.php/admin/news/newsDetail/<?= $r['news_id'] ?>">详细</a>
                	</td>
                </tr>
                <?php endforeach; ?>
                <tr>
                <td colspan="5" align="center" style="text-align: center">
                <input type="button" name="btnDelete" value="新 增" onclick="window.location.href='<?= base_url() ?>index.php/admin/news/newsNew/<?=$type?>';" id="btnDelete" class="input" />
                <input type="button" name="btnReturn" value="删 除" onclick="window.location.href='<?= base_url() ?>index.php/admin/news/newsList';" id="btnReturn" class="input"  style="display:none"/>
            </td>
            </tr>
          
                
            </table>
            <div align="center"><?= $page ?></div>
        </div>
        
</div>