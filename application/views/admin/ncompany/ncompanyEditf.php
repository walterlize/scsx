<style>
<!--
td{
text-align: left;
}
-->
</style>
<link href="<?= base_url(); ?>css/css1.css" type="text/css" rel="stylesheet" />

<div class="enterright" style="background-color: #F8F8F8;" >
    	<div class="enterrighttitle" ><p>实习基地编辑</p></div>
        <div class="enterrightlist" >
        <form name="form1" method="post" action="<?= base_url() ?>index.php/admin/ncompany/update" id="form1">
            <input type="hidden" value="<?= $company->comId?>" name="comId" id="comId" />
            <input type="hidden" value="<?= $company->addType?>" name="addType" id="addType" />
            <input type="hidden" value="<?= $b_id?>" name="b_id" id="b_id" />
            <input type="hidden" value="<?= $c_id?>" name="c_id" id="c_id" />
            
            
     
        	<table width="99%" cellpadding="0" cellspacing="0">

		        <tr>
		            <td class="tabletitle" style="padding-left: 15px; width: 160px">实习基地名</td>
		            <td class="tablecontent" style="padding-left: 15px" >
		            	<?= $company->comName ?>
		            </td>
		        </tr>
		        <tr>
		            <td class="tabletitle" style="padding-left: 15px; width: 160px">实习基地负责人</td>
		            <td class="tablecontent" style="padding-left: 15px" >
		            	
		            	
		            	<?= $company->u_name?>
		            	
		            </td>
		        </tr>
		        <tr>
		            <td class="tabletitle" style="padding-left: 15px; width: 160px">实习基地地址</td>
		            <td class="tablecontent" style="padding-left: 15px" >
		            	<?= $company->address ?>
		            </td>
		        </tr>
		        <tr>
		            <td class="tabletitle" style="padding-left: 15px; width: 160px">实习基地主页</td>
		            <td class="tablecontent" style="padding-left: 15px" >
		            <?=$company->url?>
		            </td>
		        </tr>
		        <tr>
		            <td class="tabletitle" style="padding-left: 15px; width: 160px">实习基地简介</td>
		            <td class="tablecontent" style="padding-left: 15px" >
		            	<?= $company->content ?>
		            </td>
		        </tr>
		        <tr>
		            <td class="tabletitle" style="padding-left: 15px; width: 160px">实习基地计划</td>
		            <td class="tablecontent" style="padding-left: 15px" >
		            	<?= $company->plan ?>
		            </td>
		        </tr>
		        <tr>
		            <td class="tabletitle" style="padding-left: 15px; width: 160px">实习基地状态</td>
		            <td class="tablecontent" style="padding-left: 15px" >
		            <select name="stateId" style="width:150px;" onchange="stuState()">
		            
		            <option value="5" <?php if($company->stateId=='5') echo "selected"?>>审核通过</option>
		            <option value="6" <?php if($company->stateId=='6') echo "selected"?>>审核失败</option>
		            <option value="7" <?php if($company->stateId=='7') echo "selected"?>>待审核</option>
		            </select>
		            </td>
		        </tr>

		       
		        
		        <tr>
		            <td colspan="2" class="td3" style="text-align: center;">
		                <input type="submit" name="btnSave" value="保 存" onclick="return check('form1');" id="btnSave" class="input" />
		                <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/admin/ncompany/ncompanyDetailf/<?= $company->comId ?>';" id="btnReturn" class="input" style="<?=$show?>" />      </td>
		        </tr>
            </table>
        </div>     
</div>

