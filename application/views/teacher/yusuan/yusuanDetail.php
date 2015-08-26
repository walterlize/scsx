<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3 class="lz_title">实习预算明细</h3>
        <input type="hidden" value="<?= $yusuan->ys_id ?>" name="ys_id" id="ys_id" />

        <table cellpadding="0" cellspacing="1" class="tablist2"> 
        	<tr>
                <td class="td1" style="width: 111px">学院</td>
            	<td class="td2" ><?= $yusuan->ys_college ?></td>
            	<td class="td1" style="width: 111px">实习名称</td>
                <td class="td2" ><?= $yusuan->ys_name ?></td>
            </tr>
            
            <tr>
                <td class="td1" style="width: 111px">带队教师</td>
            	<td class="td2"><?=$yusuan->ys_teac_name?></td>
            	<td class="td1" style="width: 111px">实习编号</td>
            	<td class="td2"><?=$yusuan->ys_no?></td>
            </tr>
           
            <tr>
                <td class="td1" style="width: 111px">实习内容</td>
            	<td class="td2" colspan=3><?=$yusuan->ys_content?></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">实习班级</td>
            	<td class="td2"><?=$yusuan->ys_class?></td>
            	<td class="td1" style="width: 111px">实习地点</td>
            	<td class="td2"><?=$yusuan->ys_address?></td>
            </tr>
            
            <tr>
                <td class="td1" style="width: 111px">学生人数</td>
            	<td class="td2"><?=$yusuan->ys_stu_num?></td>
            	<td class="td1" style="width: 111px">实习天数</td>
            	<td class="td2"><?=$yusuan->ys_days?></td>
            </tr>
            </table>
            
            <table cellpadding="0" cellspacing="1" class="tablist2"> 
        	<tr>
                <td class="td1" style="width: 111px" colspan=5>带队教师差旅费</td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">项目</td>
                <td class="td1" style="width: 111px">标准</td>
                <td class="td1" style="width: 111px">人数</td>
                <td class="td1" style="width: 111px">天数</td>
                <td class="td1" style="width: 111px">金额</td>
            </tr>
             <?php 
	              $ss1 = 0;
	              if (is_array($feiyong1)) foreach ($feiyong1 as $key=>$r): 
              ?>
             <tr>
            	<td class="td1"  style="width: 111px"><?=$r->tf_type?></td>
                <td class="td2"><?=$r->fy_biaozhun?></td>
                <td class="td2"><?=$r->fy_renshu?></td>
                <td class="td2" ><?=$r->fy_days?></td>
                <td class="td2" ><?=$r->fy_sum?></td>
                <tr>
             <?php 
	             $ss1 = $ss1+$r->fy_sum;
	             endforeach; 
             ?>
             <tr>
                <td class="td1" style="width: 111px;text-align: right;" colspan=5>合计：<?=$ss1?>元</td>
            </tr>
            </table>
            
            <table cellpadding="0" cellspacing="1" class="tablist2"> 
        	<tr>
                <td class="td1" style="width: 111px" colspan=6>实习经费预算(不含带队教师差旅费)</td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">项目</td>
                <td class="td1" style="width: 111px">标准</td>
                <td class="td1" style="width: 111px">人数</td>
                <td class="td1" style="width: 111px">天数</td>
                <td class="td1" style="width: 111px">金额</td>
                
            </tr>
             <?php 
	              $ss2 = 0;
	              if (is_array($feiyong2)) foreach ($feiyong2 as $key=>$r): 
              ?>
             <tr>
            	<td class="td1"  style="width: 111px"><?=$r->tf_type?></td>
                <td class="td2"><?=$r->fy_biaozhun?></td>
                <td class="td2"><?=$r->fy_renshu?></td>
                <td class="td2" ><?=$r->fy_days?></td>
                <td class="td2" ><?=$r->fy_sum?></td>
                <tr>
             <?php 
	             $ss2 = $ss2+$r->fy_sum;
	             endforeach; 
             ?>
             <tr>
                <td class="td1" style="width: 111px;text-align: right;" colspan=6>合计：<?=$ss2?>元</td>
                
            </tr>
            <tr>
                <td class="td1" style="width: 111px;text-align: right;" colspan=6>总计：<?=$ss2+$ss1?>元</td>
                
            </tr>
            </table>
            
            <table cellpadding="0" cellspacing="1" class="tablist2"> 
            <tr>
           		 <td class="td1" style="width: 111px">实习预算状态</td>
            	<td class="td2" >
            	<?php 
            	    if($yusuan->ys_state == 0) echo"未提交";
            	    if($yusuan->ys_state == 1) echo"已提交等待审核";
            	    if($yusuan->ys_state == 2) echo"院级管理员审核成功";
            	    if($yusuan->ys_state == 3) echo"院级管理员审核失败";
            	    if($yusuan->ys_state == 4) echo"校级管理员审核成功";
            	    if($yusuan->ys_state == 5) echo"校级管理员审核失败";
            	
            	?>
            	</td>
            </tr>
            <tr>
            	<td class="td1" style="width: 111px">学院意见</td>
            	<td class="td2" ><?=$yusuan->ys_coll_idea?>
            	</td>
            </tr>	
            <tr>
            	<td class="td1" style="width: 111px">学校意见</td>
            	<td class="td2" ><?=$yusuan->ys_idea?>
            	</td>
            </tr>
            </table>
           <div style="text-align: center;">
            <br>
            		<input type="button" name="btnReturn" value="提 交" onclick="window.location.href='<?= base_url() ?>index.php/teacher/yusuan/updateYusuan/<?= $yusuan->ys_id ?>';" id="btnReturn" class="input" <?php if($yusuan->ys_state != 0 )echo 'style="display:none;"'; ?>/>
            		<input type="button" name="btnReturn" value="修 改" onclick="window.location.href='<?= base_url() ?>index.php/teacher/yusuan/yusuanEdit/<?= $yusuan->ys_id ?>';" id="btnReturn" class="input" <?php if($yusuan->ys_state != 0 )echo 'style="display:none;"'; ?>/>
                    <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/teacher/yusuan/yusuanList';" id="btnReturn" class="input" />
                    <input type="button" name="btnCancel" value="取 消" onclick="window.location.href='<?= base_url() ?>index.php/teacher/yusuan/yusuanDetail/<?= $yusuan->ys_id ?>';" id="btnCancel" class="input" style="<?php if (isset($show)) echo $show; ?>" />      </td>
            </div>
        
</div>