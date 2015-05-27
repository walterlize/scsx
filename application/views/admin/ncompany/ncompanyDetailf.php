<style>
<!--
td{
text-align: left;
}
-->
</style>
<link href="<?= base_url(); ?>css/css1.css" type="text/css" rel="stylesheet" />

<div class="enterright" style="background-color: #F8F8F8;" >
    	<div class="enterrighttitle" ><p>实习基地管理</p></div>
        <div class="enterrightlist" >
     
        	<table width="600px;" cellpadding="0" cellspacing="0">
        		<tr>
		            <td class="tabletitle" style="padding-left: 15px; width: 160px;">实习基地名称</td>
		            <td class="tablecontent" style="padding-left: 15px" ><?= $company->comName ?>&nbsp;</td>
		        </tr>
		        <tr>
		            <td class="tabletitle" style="padding-left: 15px; width: 160px;">实习基地负责人</td>
		            <td class="tablecontent" style="padding-left: 15px" ><?= $company->u_name ?>&nbsp;</td>
		        </tr>
		        <tr>
		            <td class="tabletitle" style="padding-left: 15px; width: 160px">实习基地地址</td>
		            <td class="tablecontent" style="padding-left: 15px" ><?= $company->address ?>&nbsp;</td>
		        </tr>
		        <tr>
		            <td class="tabletitle" style="padding-left: 15px; width: 160px">实习基地主页</td>
		            <td class="tablecontent" style="padding-left: 15px" ><?= $company->url ?>&nbsp;</td>
		        </tr>
		        <tr>
		            <td class="tabletitle" style="padding-left: 15px; width: 160px">实习基地简介</td>
		            <td class="tablecontent" style="padding-left: 15px" ><?= $company->content ?>&nbsp;</td>
		        </tr>
		        <tr>
		            <td class="tabletitle" style="padding-left: 15px; width: 160px">实习基地计划</td>
		            <td class="tablecontent" style="padding-left: 15px" ><?= $company->plan ?>&nbsp;</td>
		        </tr>
		        <tr>
		            <td class="tabletitle" style="padding-left: 15px; width: 160px">实习基地状态</td>
		            <td class="tablecontent" style="padding-left: 15px" ><?= $state->state ?>&nbsp;</td>
		        </tr>
		        <?php 
			        if($company->addType == '2'){
			        	$addType="管理员";
			        	$addId = $add->teaId;
			        	$addName = $add->teaName;
			        }elseif($company->addType == '5'){
			        	$addType="学生";
			        	$addId = $add->stuId;
			        	$addName = $add->stuName;
			        }else{
			        	$addType="";
			        	$addId = '';
			        	$addName = '';
			        }
		        ?>
		        <tr>
		            <td class="tabletitle" style="padding-left: 15px; width: 160px">实习基地上传人类别</td>
		            <td class="tablecontent" style="padding-left: 15px" ><?= $addType ?>&nbsp;</td>
		        </tr>
		        <tr>
		            <td class="tabletitle" style="padding-left: 15px; width: 160px">实习基地上传人编号</td>
		            <td class="tablecontent" style="padding-left: 15px" ><?= $addId ?>&nbsp;</td>
		        </tr>
		        <tr>
		            <td class="tabletitle" style="padding-left: 15px; width: 160px">实习基地上传人姓名</td>
		            <td class="tablecontent" style="padding-left: 15px" ><?= $addName ?>&nbsp;</td>
		        </tr>
		        <tr>
		            <td colspan="2" class="td3" style="text-align: center;">
		                <input type="button" name="btnSave" value="编 辑" onclick="window.location.href='<?= base_url() ?>index.php/admin/ncompany/ncompanyEditf/<?= $company->comId?>/<?=$baoming->b_id?>/<?=$baoming->c_id?>';" id="btnSave" class="input" />
                        <input type="button" name="btnSave" value="删 除" onclick="deleteInfo('<?= base_url() ?>index.php/admin/ncompany/ncompanyDelete/<?= $company->comId ?>')" id="btnSave" class="input">
		                <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/admin/ncompany/ncompanyListf';" id="btnReturn" class="input" />      </td>
		        </tr>
            </table>
        </div>     
</div>
