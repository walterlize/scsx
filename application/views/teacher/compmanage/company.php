<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3 class="lz_title">基地信息</h3>
    
    
    	<input type="button" name="btnReturn" value="新增基地" onclick="window.location.href='<?= base_url() ?>index.php/teacher/compmanage/companyNew';" id="btnReturn" class="input" />
    <br><br>
    <table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            
            <th scope="col" class="td1">实习基地名</th>
            <th scope="col" class="td3">实习基地地址</th>
            <th scope="col" class="td1">基地负责人</th>
            <th scope="col" class="td3">负责人联系方式</th>
            
            <th scope="col"class="td1">详情</th>
            
        </tr>
        <?php if (is_array($company)) foreach ($company as $r): ?>
                <tr class="RowStyle" align="center">
                    
                    <td class="td1"><?= $r['comp_name'] ?></td>
                    <td class="td3"><?= $r['comp_address'] ?></td>
                    <td class="td1"><?= $r['user_name'] ?></td>
                    <td class="td3"><?= $r['user_phone'] ?></td>
                    
                    <td class="td1">
                        <a id="" href="<?= base_url() ?>index.php/teacher/compmanage/companyDetail/<?= $r['comp_id'] ?>">详细</a>
                    </td>
                    
                </tr>
            <?php endforeach; ?>
    </table>
    <div align="center"><?= $page ?></div>
</div>