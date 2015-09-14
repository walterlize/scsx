<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3 class="lz_title">课程基地信息 &nbsp;&nbsp;&nbsp;&nbsp;
        <span style="color: blue; "><?=$coursep->cour_no?>(<?=$coursep->cour_num?>)--<?=$coursep->cour_name?>
        </span>
        </br>
        <div style="color: red"><?php if(isset($btn)) echo $btn;?></div>
    </h3>
    
    <br>
    <span >请选择基地或
    
    	<input type="button" name="btnReturn" value="新增基地" onclick="window.location.href='<?= base_url() ?>index.php/teacher/compcourdist/companyNew/<?=$cour_id?>';" id="btnReturn" class="input" />
    </span><br><br>
    

    <table class="tablist2" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            
            <th class="td1" scope="col">实习基地名</th>
            <th class="td3" scope="col">实习基地地址</th>
            <th class="td1" scope="col">基地负责人</th>
            <th class="td3" scope="col">负责人联系方式</th>
            <th class="td1" scope="col">本课程基地</th>
            <th class="td3" scope="col">详情</th>
            
        </tr>
        <?php if (is_array($company)) foreach ($company as $r): ?>
                <tr class="RowStyle" align="center">
                    
                    <td class="td1" ><?= $r['comp_name'] ?></td>
                    <td class="td3" ><?= $r['comp_address'] ?></td>
                    <td class="td1" ><?= $r['user_name'] ?></td>
                    <td class="td3" ><?= $r['user_phone'] ?></td>
                    <td class="td1" >
                    	<?php 
                    		if($r['coco']==1){
                    			echo "√";
                    		}else{
                    			echo "×";
                    		}
                    	?>
                    </td>
                    <td class="td3" >
                        <a id="" href="<?= base_url() ?>index.php/teacher/compcourdist/companyDetail/<?=$cour_id?>/<?= $r['comp_id'] ?>">详细</a>
                    </td>
                    <!-- 
                    <td>
                    	<?php 
                    		if($r['coco']==1){
                    	?>
                    	<input type="button" name="btnReturn" value="取消设置" onclick="window.location.href='<?= base_url() ?>index.php/teacher/compcourdist/companyCancel/<?=$cour_id?>/<?=$r['coco_id']?>/<?=$r['comp_id']?>/<?=$o_id?>';" id="btnReturn" class="input" style="background-image: url('<?=base_url()?>/images/btnbg1.gif')"/>
                    	<?php 
                    		}else{
                    	?>
                    	<input type="button" name="btnReturn" value="设置基地" onclick="window.location.href='<?= base_url() ?>index.php/teacher/compcourdist/companySet/<?=$cour_id?>/<?=$r['comp_id']?>/<?=$o_id?>';" id="btnReturn" class="input" />
                    	<?php 
                    		}
                    	?>
                    	                                                 
                    </td> -->
                </tr>
            <?php endforeach; ?>
            <tr>
            	<td colspan="7" class="td3" align="center">
            		<?php 
                    		if($flag>0){
                    	?>
                    	<input type="button" name="btnReturn" value="发布课程" onclick="window.location.href='<?= base_url() ?>index.php/teacher/course/coursePublish3/<?=$cour_id?>';" id="btnReturn" class="input" />
                    	<?php 
                    		}else{
                    	?>
                    	<input type="button" name="btnReturn" value="发布课程"  id="btnReturn" class="input" style="background-image: url('<?=base_url()?>/images/btnbg2.gif')"/>
                    	<?php 
                    		}
                    	?>
                    	<input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/teacher/course/coursePublish/<?=$cour_id?>';" id="btnReturn" class="input" />
                    	
            	</td>
            </tr>
    </table>
    <div align="center"><?= $page ?></div>
</div>