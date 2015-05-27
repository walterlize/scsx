



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
    		<p style="float: left;">新闻公告规定总结列表查询结果</p>
    		<div style="float: right; height: 100%; margin-top: 10px; margin-right: 10px;">
	    		<form action="<?=  base_url()?>index.php/admin/news/results" method="post">
				        查询类型：
				        <select name="searchtype">
				            <option value="kind">类型</option>
				            <option value="title">标题</option>
				        </select>
				        查询内容：
				        <input name="searchterm" type="text" size="30"/>
				        <input type="submit" name="submit" value="查询"/>
				        <br/><br/>
				    </form>
    		</div>
    	</div>
        <div class="enterrightlist" style="margin-top: 10px;">
        
        
        	<table width="100%" cellpadding="0" cellspacing="0">
            	<tr class="tabletitle">
            		<td class="line1" style="width: 15%" >类型</th>
                	<td class="line2" style="width: 55%">新闻标题</td>
                	<td class="line2" style="width: 15%">发布时间</td>
                	<td style="width: 15%">操作</td>
                </tr>
                
                <?php if (is_array($jieguo)) foreach ($jieguo as $r): ?>
                <tr class="tablecontent">
               		 <td class="line1" style="width: 10%" ><?= $r['kind'] ?></td>
                	<td class="line1" ><?= $r['title'] ?></td>
                	<td class="line2"><?= $r['sendTime'] ?></td>

                	<td >
                		<a id="" href="<?= base_url() ?>index.php/admin/news/newsDetail/<?= $r['newsId'] ?>">详细</a>
                	</td>
                </tr>
                <?php endforeach; ?>
                <tr>
                <td colspan="5" align="center" style="text-align: center">
                <input type="button" name="btnDelete" value="新 增" onclick="window.location.href='<?= base_url() ?>index.php/admin/news/newsNew';" id="btnDelete" class="input" />
                <input type="button" name="btnReturn" value="删 除" onclick="window.location.href='<?= base_url() ?>index.php/admin/news/newsList';" id="btnReturn" class="input"  style="display:none"/>
            </td>
            </tr>
          
                
            </table>
            
        </div>
        
</div>
