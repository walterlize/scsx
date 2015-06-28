<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3 class="lz_title">课程基地信息</h3>
    <span style="<?php if(isset($show)) echo $show?>">请选择基地或
    
    	<input type="button" name="btnReturn" value="新增基地" onclick="window.location.href='<?= base_url() ?>index.php/student/company/companyNew/<?=$cour_id?>';" id="btnReturn" class="input"  />
    </span><br><br>
    <table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th scope="col" class="td1">课程号</th>
            <th scope="col" class="td3">课序号</th>
            <th scope="col" class="td1">课程名</th>
            <th scope="col" class="td3">实习基地名</th>
            <th scope="col" class="td1">基地负责人</th>
            <th scope="col" class="td3">负责人联系方式</th>
            <th scope="col" class="td1">操作</th>
        </tr>
        <?php if (is_array($company)) foreach ($company as $r): ?>
                <tr class="RowStyle" align="center">
                    <td class="td1"><?= $r['cour_no'] ?></td>
                    <td class="td3"><?= $r['cour_num'] ?></td>
                    <td class="td1"><?= $r['cour_name'] ?></td>
                    <td class="td3"><?= $r['comp_name'] ?></td>
                    <td class="td1"><?= $r['user_name'] ?></td>
                    <td class="td3"><?= $r['user_phone'] ?></td>
                    <td class="td1">
                        <a id="" href="<?= base_url() ?>index.php/student/companyz/companyDetail/<?= $r['coco_id'] ?>">详细</a>
                    </td>
                </tr>
            <?php endforeach; ?>
    </table>
    <div align="center"><?= $page ?></div>
</div>