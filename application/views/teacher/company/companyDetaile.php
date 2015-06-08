<!--  
<div style="margin-left:20px; margin-right:20px;">
    <br />
    <h3>基地信息</h3>
    <table cellpadding="0" cellspacing="1" class="tablist2">
        
        
	        <tr>
                <td class="td1" colspan=2>所提交基地信息</td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">实习基地名称</td>
                <td class="td2" ><?= $elecom->comp_name ?></td>
            </tr>
            
            <tr>
                <td class="td1" style="width: 111px">基地地址</td>
                <td class="td2" >
                	<?= $elecom->comp_address ?>
                </td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">基地主页</td>
                <td class="td2" ><?= $elecom->comp_url ?></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">实习基地简介</td>
                <td class="td2" >
                    <?=$elecom->comp_content?>
                </td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">实习基地计划</td>
                <td class="td2" >
                    <?=$elecom->comp_plan?>
                </td>
            </tr>
            <tr>
                <td class="td1" colspan=2>基地负责人信息</td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">基地负责人姓名</td>
                <td class="td2" ><?= $elecom->user_name ?></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">基地负责人电话</td>
                <td class="td2" ><?= $elecom->user_phone ?></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">基地负责人邮箱</td>
                <td class="td2" ><?= $elecom->user_email ?></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">基地负责人地址</td>
                <td class="td2" >
                	<?= $elecom->user_address ?>
                </td>
            </tr>
            <tr>
            <td colspan="2" class="td3" align="center">
            <?php 
            	if($elecom->elco_state != 6 ){
            		if($elecom->comp_add_num == $stu_num){
            ?>
            <input type="button" name="btnReturn" value="修 改" onclick="window.location.href='<?= base_url() ?>index.php/teacher/company/companyEdit/<?=$elecom->elco_cour_id?>/<?=$elecom->elco_comp_id?>/<?=$elecom->elco_id?>';" id="btnReturn" class="input" />
            <input type="button" name="btnReturn" value="删 除" onclick="window.location.href='<?= base_url() ?>index.php/teacher/variablebm/variableDeleteALL/<?=$elecom->elco_cour_id?>/<?=$elecom->elco_comp_id?>/<?=$elecom->elco_id?>';" id="btnReturn" class="input" />
            <?php 
            		}else{
            ?>
            <input type="button" name="btnReturn" value="删 除" onclick="window.location.href='<?= base_url() ?>index.php/teacher/variablebm/variableDelete/<?=$elecom->elco_id?>';" id="btnReturn" class="input" />
            <?php 
            		}
            	}
            ?>
            	
                <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/teacher/variablebm/variableList';" id="btnReturn" class="input" />      
            </td>
        </tr>
    </table>
    <br><br><br>
</div>
-->