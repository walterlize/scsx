<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3 class="lz_title">课程基地信息 &nbsp;&nbsp;&nbsp;&nbsp;<span style="color: blue; ">课程：<?=$coursep->cour_no?>(<?=$coursep->cour_num?>)--<?=$coursep->cour_name?></span></h3>
    
    <br>
    <span >请您选择基地或
    
    	<input type="button" name="btnReturn" value="新增基地" onclick="window.location.href='<?= base_url() ?>index.php/teacher/company/companyNew/<?=$cour_id?>';" id="btnReturn" class="input" />
    </span><br><br>
    <table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th scope="col" class="td1">序号</th>
            <th scope="col" class="td3">实习基地名</th>
            <th scope="col" class="td1">实习基地地址</th>
            <th scope="col" class="td3">基地负责人</th>
            <th scope="col" class="td1">负责人联系方式</th>
            <th scope="col" class="td3">选为本课程基地</th>
            <th scope="col" class="td1">基地详情</th>
        </tr>
        <?php if (is_array($company)) foreach ($company as  $key => $r): ?>
                <tr class="RowStyle" align="center">
                    <td class="td1">
                        <?= $key + 1 ?>
                    </td>
                    <td class="td3"><?= $r['comp_name'] ?></td>
                    <td class="td1"><?= $r['comp_address'] ?></td>
                    <td class="td3"><?= $r['user_name'] ?></td>
                    <td class="td1"><?= $r['user_phone'] ?></td>
                    <td class="td3">
                    	<?php 
                    		if($r['coco']==1){
                    			echo "√";
                    		}else{
                    			echo "×";
                    		}
                    	?>
                        <?php
                        if($r['coco']==1){
                            ?>
                            <input type="button" name="btnReturn" value="已选择" onclick="window.location.href='<?= base_url() ?>index.php/teacher/company/companyCancel/<?=$cour_id?>/<?=$r['coco_id']?>/<?=$r['comp_id']?>';" id="btnReturn" class="input" style="color: red; background-image: url('<?=base_url()?>/images/btnbg1.gif')"/>
                        <?php
                        }else{
                            ?>
                            <input type="button" name="btnReturn" value="未选择" onclick="window.location.href='<?= base_url() ?>index.php/teacher/company/companySet/<?=$cour_id?>/<?=$r['comp_id']?>';" id="btnReturn" class="input" />
                        <?php
                        }
                        ?>
                    </td>
                    <td class="td1">
                        <a id="" href="<?= base_url() ?>index.php/teacher/company/companyDetail/<?=$cour_id?>/<?= $r['comp_id'] ?>">详细</a>
                    </td>

                </tr>
            <?php endforeach; ?>
            
            <tr>
            	<td colspan="8" class="td3" align="center">
            		<!--
            		<input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/teacher/course/coursePublish/<?=$o_id?>/<?=$cour_id?>';" id="btnReturn" class="input" />
            	     -->
                    <input type="button" name="btnReturn" value="返 回" onclick="window.history.go(-1)" id="btnReturn" class="input" />

                </td>
            </tr>
    </table>
    <div align="center">共有<?=$num?>条数据。<?= $page ?></div>
</div>