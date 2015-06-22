<div style="margin-left:20px; margin-right:20px;width:900px;">
    <br />
    <h3>实习基地信息</h3>
    
        <table cellpadding="0" cellspacing="1" class="tablist2">
        	<tr>
                <td class="td1" colspan=2>课程信息</td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">课程号 课序号</td>
                <td class="td2" ><?=$comp->cour_no?> -- <?=$comp->cour_num?></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">课程名</td>
                <td class="td2" ><?=$comp->cour_name?></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">课程教师</td>
                <td class="td2" ><?=$comp->cour_teac_name?></td>
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
                	<input type="button" name="btnReturn" value="报 名" onclick="window.location.href='<?= base_url() ?>index.php/student/companyz/companySave/<?=$comp->cour_id?>/<?=$comp->comp_id?>';" id="btnReturn" class="input" />
                    <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/student/companyz/companyList/<?=$comp->cour_id?>';" id="btnReturn" class="input" />
                </td>
            </tr>
        </table>
    </form>
</div>