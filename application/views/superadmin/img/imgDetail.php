

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
    	<div class="enterrighttitle"><p>实习风采</p></div>
        <div class="enterrightlist">
   	
        	<table width="99%" cellpadding="0" cellspacing="0">


            
        	<tr>
                <td class="tabletitle" style="padding-left: 15px; width: 160px">标题</td>
                <td class="tablecontent" style="padding-left: 15px" >
                <?= $news->news_title ?>&nbsp;
                </td>
            </tr>
        	<tr>
                <td class="tabletitle" style="padding-left: 15px; width: 160px">发布时间</td>
                <td class="tablecontent" style="padding-left: 15px" >
                <?= $news->news_time ?>&nbsp;
                </td>
            </tr>
            
            <tr>
                <td class="tabletitle" style="padding-left: 15px; width: 160px">图片</td>
                <td class="tablecontent" style="padding-left: 15px" >
                <img src="<?= $news->news_img ?>" width="500px;" height="250px;">&nbsp;&nbsp;
                </td>
            </tr>
            
            <tr>
                <td class="tabletitle" style="padding-left: 15px; width: 160px">内容</td>
                <td class="tablecontent" style="padding-left: 15px" >
                    <?= $news->news_content ?>&nbsp;               
                    </td>
            </tr>
           <tr>
                <td class="tabletitle" style="padding-left: 15px; width: 160px">添加人</td>
                <td class="tablecontent" style="padding-left: 15px" >
                    <?=$news->news_auther?>&nbsp;  (<?=$news->news_auther_id?>)             
                    </td>
            </tr>
            <!--
            <tr>
                <td class="tabletitle" style="padding-left: 15px; width: 160px">状态</td>
                <td class="tablecontent" style="padding-left: 15px" >
                    <?=$news->usta_type?>&nbsp;               
                    </td>
            </tr>
            <tr>
                <td class="tabletitle" style="padding-left: 15px; width: 160px">审核人</td>
                <td class="tablecontent" style="padding-left: 15px" >
                    <?=$news->news_auditer?>&nbsp;               
                    </td>
            </tr>
            -->
            </table>
            <br><br>
        	<div style="text-align: center;">
                <?php if($flag == 1){?>
                <input type="button" name="btnEdit" value="编 辑" onclick="window.location.href='<?= base_url() ?>index.php/superadmin/imgnews/imgEdit/<?= $news->news_id ?>';" id="btnEdit" class="input" />
                <input type="button" name="btnDelete" value="删 除" onclick="deleteInfo('<?= base_url() ?>index.php/superadmin/imgnews/imgDelete/<?= $news->news_id ?>')" id="btnDelete" class="input" />
                
                <?php }else{?>
                <!--
                <input type="button" name="btnEdit" value="通过" onclick="window.location.href='<?= base_url() ?>index.php/superadmin/imgnews/imgSuccess/<?= $news->news_id ?>';" id="btnEdit" class="input" />
                <input type="button" name="btnEdit" value="不通过" onclick="window.location.href='<?= base_url() ?>index.php/superadmin/imgnews/imgFail/<?= $news->news_id ?>';" id="btnEdit" class="input" />
                -->
                    <?php }?>
                <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/superadmin/imgnews/imgList';" id="btnReturn" class="input" />  
            </div>
        </div>     
</div>




