

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
    	<div class="enterrighttitle"><p>新闻公告规定总结内容编辑</p></div>
        <div class="enterrightlist">
   	
        	<table width="99%" cellpadding="0" cellspacing="0">


            
        	<tr>
                <td class="tabletitle" style="padding-left: 15px; width: 160px">发布时间</td>
                <td class="tablecontent" style="padding-left: 15px" >
                <?= $sendTime ?>&nbsp;
                </td>
            </tr>
            <tr>
                <td class="tabletitle" style="padding-left: 15px; width: 160px">类型</td>
                <td class="tablecontent" style="padding-left: 15px" >
               <?= $kind ?>&nbsp;
                </td>
            </tr>
            <tr>
                <td class="tabletitle" style="padding-left: 15px; width: 160px">标题</td>
                <td class="tablecontent" style="padding-left: 15px" >
                <?= $title ?>&nbsp;&nbsp;
                </td>
            </tr>
            <tr>
                <td class="tabletitle" style="padding-left: 15px; width: 160px">发布时间</td>
                <td class="tablecontent" style="padding-left: 15px" >
                <?= $sendTime ?>&nbsp;
                </td>
            </tr>
            <tr>
                <td class="tabletitle" style="padding-left: 15px; width: 160px">内容</td>
                <td class="tablecontent" style="padding-left: 15px" >
                    <?= $content ?>&nbsp;               
                    </td>
            </tr>
            <tr>
                <td colspan="2" class="td3" align="center" style="text-align: center;">
                    <input type="button" name="btnEdit" value="编 辑" onclick="window.location.href='<?= base_url() ?>index.php/admin/news/newsEdit/<?= $newsId ?>';" id="btnEdit" class="input" />
                <input type="button" name="btnDelete" value="删 除" onclick="deleteInfo('<?= base_url() ?>index.php/admin/news/newsDelete/<?= $newsId ?>')" id="btnDelete" class="input" />
                <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/admin/news/newsList';" id="btnReturn" class="input" />            </tr>
            </table>
        </form>
        </div>     
</div>




