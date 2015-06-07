<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3>课程基地信息 &nbsp;&nbsp;&nbsp;&nbsp;<span style="color: blue; "><?=$coursep->cour_no?>(<?=$coursep->cour_num?>)--<?=$coursep->cour_name?></span></h3>
    
    <br>
    <span >请选择基地或
    
    	<input type="button" name="btnReturn" value="新增基地" onclick="window.location.href='<?= base_url() ?>index.php/teacher/company/companyNew/<?=$cour_id?>';" id="btnReturn" class="input" />
    </span><br><br>
    <table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            
            <th scope="col">实习基地名</th>
            <th scope="col">实习基地地址</th>
            <th scope="col">基地负责人</th>
            <th scope="col">负责人联系方式</th>
            <th scope="col">本课程基地</th>
            <th scope="col">详情</th>
            <th scope="col">操作</th>
        </tr>
        <?php if (is_array($company)) foreach ($company as $r): ?>
                <tr class="RowStyle" align="center">
                    
                    <td><?= $r['comp_name'] ?></td>
                    <td><?= $r['comp_address'] ?></td>
                    <td><?= $r['user_name'] ?></td>
                    <td><?= $r['user_phone'] ?></td>
                    <td>
                        <a id="" href="<?= base_url() ?>index.php/teacher/company/companyDetail/<?=$cour_id?>/<?= $r['comp_id'] ?>">详细</a>
                    </td>
                    <td>
                        <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/teacher/company/companySet/<?=$r['comp_id']?>';" id="btnReturn" class="input" />
                    </td>
                </tr>
            <?php endforeach; ?>
    </table>
    <div align="center"><?= $page ?></div>
</div>