<div style="margin-left:20px; margin-right:20px;width:900px;">
    <br />
    <h3 class="lz_title">实习基地信息</h3>
    
        <table cellpadding="0" cellspacing="1" class="tablist2">
        	<tr>
                <td class="td1" colspan=2>基地共有<?=$all ?>学生报名，<?=$succ?>人审核成功</td>
            </tr>
            <tr>
                <td class="td1" colspan=2>基地信息</td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">实习基地名称</td>
                <td class="td2" ><?= $comp->comp_name ?></td>
            </tr>
            
            <tr>
                <td class="td1" style="width: 111px">基地地址</td>
                <td class="td2" >
                	<?= $comp->comp_address ?>
                </td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">基地主页</td>
                <td class="td2" ><?= $comp->comp_url ?></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">实习基地简介</td>
                <td class="td2" >
                    <?=$comp->comp_content?>
                </td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">实习基地计划</td>
                <td class="td2" >
                    <?=$comp->comp_plan?>
                </td>
            </tr>
            <tr>
                <td class="td1" colspan=2>基地负责人信息</td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">基地负责人姓名</td>
                <td class="td2" ><?= $comp->user_name ?></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">基地负责人电话</td>
                <td class="td2" ><?= $comp->user_phone ?></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">基地负责人邮箱</td>
                <td class="td2" ><?= $comp->user_email ?></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">基地负责人地址</td>
                <td class="td2" >
                	<?= $comp->user_address ?>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="td3" align="center">
                <input type="button" name="btnReturn" value="修 改" onclick="window.location.href='<?= base_url() ?>index.php/teacher/compmanage/companyEdit/<?=$comp->comp_id?>';" id="btnReturn" class="input" />
                <input type="button" name="btnReturn" value="删 除" onclick="window.location.href='<?= base_url() ?>index.php/teacher/compmanage/companyDelete/<?=$comp->comp_id?>';" id="btnReturn" class="input" style="<?php if(isset($show)) echo $show;?> " />
                    <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/teacher/compmanage/companyList';" id="btnReturn" class="input" />
                </td>
            </tr>
        </table>
    </form>
</div>