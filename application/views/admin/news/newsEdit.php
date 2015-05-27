



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
        	<form name="form1" method="post" action="<?= base_url() ?>index.php/admin/news/save" id="form1">
        <input type="hidden" value="<?= $news->newsId ?>" name="newsId" id="newsId" />
        <input type="hidden" value="<?= $news->addName ?>" name="addName" id="addName" />
        <input type="hidden" value="<?= $news->addCollege ?>" name="addCollege" id="addCollege" />
        <input type="hidden" value="<?= $news->browse ?>" name="browse" id="browse" />
        	
        	<table width="99%" cellpadding="0" cellspacing="0">
        	<tr>
                <td class="tabletitle" style="padding-left: 15px; width: 160px">类型</td>
                <td class="tablecontent" style="padding-left: 15px" >
                <select id="k_id" name="k_id" >
                        <?php foreach ($kind as $r): ?>
                            <option value="<?= $r->k_id ?>"
                            <?php
                            if (isset($news->k_id) && $r->k_id == $news->k_id)
                                echo 'selected';
                            else
                                echo '';
                            ?>
                                    >
                                        <?= $r->kind ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    </td>
            </tr>
            
            
        	<tr>
                <td class="tabletitle" style="padding-left: 15px; width: 160px">标题</td>
                <td class="tablecontent" style="padding-left: 15px" ><input name="title" type="text" id="title" value="<?= $news->title ?>" size="50"   isRequired="true" />
                    <font color="red">*</font><span id="titleMsg" class="MsgHide">标题不能为空！</span></td>
            </tr>
            <tr>
                <td class="tabletitle" style="padding-left: 15px; width: 160px">内容</td>
                <td class="tablecontent" style="padding-left: 15px" >
                    <script type="text/javascript">
			KindEditor.ready(function(K) {
			var editor1 = K.create('textarea[name="content"]', {
				cssPath : '<?=base_url()?>kindeditor/plugins/code/prettify.css',
				uploadJson : '<?=base_url()?>kindeditor/php/upload_json.php',
				fileManagerJson : '<?=base_url()?>kindeditor/php/file_manager_json.php',
				allowFileManager : true,
				afterCreate : function() {
					var self = this;
					K.ctrl(document, 13, function() {
						self.sync();
						K('form[name=content]')[0].submit();
					});
					K.ctrl(self.edit.doc, 13, function() {
						self.sync();
						K('form[name=content]')[0].submit();
					});
				}
			});
			prettyPrint();
		});
		</script>
                    <textarea name="content" id="content" style="visibility:hidden; width:90%; height:400px;"><?=$news->content?></textarea>
               </td>
            </tr>
            <tr>
                <td colspan="2" class="td3" align="center" style="text-align: center;">
                    <input type="submit" name="btnSave" value="保 存" onclick="return check('form1');" id="btnSave" class="input" />
                    <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/admin/news/newsList';" id="btnReturn" class="input" />
                    <input type="button" name="btnCancel" value="取 消" onclick="window.location.href='<?= base_url() ?>index.php/admin/news/newsDetail/<?= $news->newsId ?>';" id="btnCancel" class="input" style="<?php if (isset($show)) echo $show; ?>" />      </td>
            </tr>
            </table>
        </form>
        </div>     
</div>




