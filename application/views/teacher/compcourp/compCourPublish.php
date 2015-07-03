<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3 class="lz_title">课程基地信息 &nbsp;&nbsp;&nbsp;&nbsp;<span style="color: blue; "><?=$coursep->cour_no?>(<?=$coursep->cour_num?>)--<?=$coursep->cour_name?></span></h3>
    
    <br>
    <span >请选择基地或
    
    	<input type="button" name="btnReturn" value="新增基地" onclick="window.location.href='<?= base_url() ?>index.php/teacher/compcourpublish/companyNew/<?=$cour_id?>';" id="btnReturn" class="input" />
    </span><br><br>
    <div style="color: red"><?php if(isset($btn)) echo $btn;?></div>
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
                    	<?php 
                    		if($r['coco']==1){
                    			echo "√";
                    		}else{
                    			echo "×";
                    		}
                    	?>
                    </td>
                    <td>
                        <a id="" href="<?= base_url() ?>index.php/teacher/compcourpublish/companyDetail/<?=$cour_id?>/<?= $r['comp_id'] ?>">详细</a>
                    </td>
                    <td>
                    	<?php 
                    		if($r['coco']==1){
                    	?>
                    	<input type="button" name="btnReturn" value="取消设置" onclick="window.location.href='<?= base_url() ?>index.php/teacher/compcourpublish/companyCancel/<?=$cour_id?>/<?=$r['coco_id']?>/<?=$r['comp_id']?>';" id="btnReturn" class="input" style="background-image: url('<?=base_url()?>/images/btnbg1.gif')"/>
                    	<?php 
                    		}else{
                    	?>
                    	<input type="button" name="btnReturn" value="设置基地" onclick="window.location.href='<?= base_url() ?>index.php/teacher/compcourpublish/companySet/<?=$cour_id?>/<?=$r['comp_id']?>';" id="btnReturn" class="input" />
                    	<?php 
                    		}
                    	?>
                    	                                                 
                    </td>
                </tr>
            <?php endforeach; ?>
            <tr>
            	<td colspan="7" class="td3" align="center">
            		<?php 
                    		if($flag>0){
                    	?>
                    	<input type="button" name="btnReturn" value="发布课程" onclick="window.location.href='<?= base_url() ?>index.php/teacher/course/coursePublish2/<?=$cour_id?>';" id="btnReturn" class="input" />
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