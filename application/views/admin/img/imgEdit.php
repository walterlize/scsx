<link href="<?=base_url()?>kindeditor/themes/default/default.css" rel="stylesheet" type="text/css" />
		
		<script src="<?=base_url()?>kindeditor/kindeditor.js"></script>
		<script src="<?=base_url()?>kindeditor/lang/zh_CN.js"></script>
		<script>
			KindEditor.ready(function(K) {
				var editor = K.editor({
					allowFileManager : true
				});
				
				K('#image3').click(function() {
					editor.loadPlugin('image', function() {
						editor.plugin.imageDialog({
							showRemote : false,
							imageUrl : K('#url3').val(),
							clickFn : function(url, title, width, height, border, align) {
								K('#url3').val(url);
								editor.hideDialog();
							}
						});
					});
				});
			});
		</script>



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
    	<div class="enterrighttitle"><p>实习风采内容编辑</p></div>
        <div class="enterrightlist">
        <form name="form1" method="post" action="<?= base_url() ?>index.php/admin/imgnews/save" id="form1">
        <input type="hidden" value="<?= $news->news_id ?>" name="news_id" id="news_id" />
        <input type="hidden" value="<?= date("Y-m-d H:m:s"); ?>" name="news_time" id="news_time" />
        <input type="hidden" value="<?= $news->news_keywords ?>" name="news_keywords" id="news_keywords" />
        <input type="hidden" value="<?= $news->news_auther_id ?>" name="news_auther_id" id="news_auther_id" />
        <input type="hidden" value="<?= $news->news_auther ?>" name="news_auther" id="news_auther" />
        <input type="hidden" value="<?= $news->news_auditer_id ?>" name="news_auditer_id" id="news_auditer_id" />
        <input type="hidden" value="<?= $news->news_auditer ?>" name="news_auditer" id="news_auditer" />
        <input type="hidden" value="<?= $news->news_audit ?>" name="news_audit" id="news_audit" />
        <input type="hidden" value="<?= $news->news_audit_date ?>" name="news_audit_date" id="news_audit_date" />
        <input type="hidden" value="<?= $news->news_type_id ?>" name="news_type_id" id="news_type_id" />
        <input type="hidden" value="<?= $news->news_college ?>" name="news_college" id="news_college" />
        <input type="hidden" value="<?= $news->news_count?>" name="news_count" id="news_count" />
        	
        	<table width="99%" cellpadding="0" cellspacing="0">
        	<tr>
                <td class="tabletitle" style="padding-left: 15px; width: 160px">类型</td>
                <td class="tablecontent" style="padding-left: 15px" >
                	实习风采
                </td>
            </tr>
            
            
        	<tr>
                <td class="tabletitle" style="padding-left: 15px; width: 160px">标题</td>
                <td class="tablecontent" style="padding-left: 15px" ><input name="news_title" type="text" id="news_title" value="<?= $news->news_title ?>" size="50"   isRequired="true" />
                    <font color="red">*</font><span id="news_titleMsg" class="MsgHide">标题不能为空！</span></td>
            </tr>
            <tr >
                <td class="tabletitle" style="padding-left: 15px; width: 160px">图片</td>
                <td class="tablecontent" style="padding-left: 15px" >
                    <input type="text" id="url3" name="news_img" value="<?=$news->news_img?>" /> 
                    <input type="button" id="image3" value="选择图片" /> 
                    
                </td>
            </tr>
            <tr style="<?php if(isset($show)) echo $show;?>">
                <td class="tabletitle" style="padding-left: 15px; width: 160px">原图片</td>
                <td class="tablecontent" style="padding-left: 15px" >
                    <img src="<?= $news->news_img ?>" style="width: 500px; height: 250px;">&nbsp;
                    
                </td>
            </tr>
            
            <tr>
                <td class="tabletitle" style="padding-left: 15px; width: 160px">内容</td>
                <td class="tablecontent" style="padding-left: 15px" >
                    <script type="text/javascript">
						KindEditor.ready(function(K) {
						var editor1 = K.create('textarea[name="news_content"]', {
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
                    <textarea name="news_content" id="news_content" style="visibility:hidden; width:90%; height:400px;"><?=$news->news_content?></textarea>
               </td>
            </tr>
            <tr>
                <td colspan="2" class="td3" align="center" style="text-align: center;">
                    <input type="submit" name="btnSave" value="保 存" onclick="return check('form1');" id="btnSave" class="input" />
                    <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/admin/imgnews/imgList';" id="btnReturn" class="input" />
                    <input type="button" name="btnCancel" value="取 消" onclick="window.location.href='<?= base_url() ?>index.php/admin/imgnews/imgDetail/<?= $news->news_id ?>';" id="btnCancel" class="input" style="<?php if (isset($show)) echo $show; ?>" />      </td>
            </tr>
            </table>
        </form>
        </div>     
</div>




