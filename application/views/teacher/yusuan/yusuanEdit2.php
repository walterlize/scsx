<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3 class="lz_title">实习预算明细——带队教师差旅费</h3>
    
    
        <input type="hidden" value="<?= $yusuan->ys_id ?>" name="ys_id" id="ys_id" />

        <table cellpadding="0" cellspacing="1" class="tablist2"> 
        	<tr>
                <td class="td1" style="width: 111px" colspan=6>带队教师差旅费</td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">项目</td>
                <td class="td1" style="width: 111px">标准</td>
                <td class="td1" style="width: 111px">人数</td>
                <td class="td1" style="width: 111px">天数</td>
                <td class="td1" style="width: 111px">金额</td>
                <td class="td1" style="width: 111px">操作</td>
            </tr>
             <?php 
	              $ss = 0;
	              if (is_array($feiyong)) foreach ($feiyong as $key=>$r): 
              ?>
             <tr>
            	<td class="td1"  style="width: 111px"><?=$r->tf_type?></td>
                <td class="td2"><?=$r->fy_biaozhun?></td>
                <td class="td2"><?=$r->fy_renshu?></td>
                <td class="td2" ><?=$r->fy_days?></td>
                <td class="td2" ><?=$r->fy_sum?></td>
                <td class="td2">
                	<a id="" href="<?= base_url() ?>index.php/teacher/yusuan/feiyongDeletet/<?= $yusuan->ys_id?>/<?= $r->fy_id ?>">删除</a>
                </td>
                <tr>
             <?php 
	             $ss = $ss+$r->fy_sum;
	             endforeach; 
             ?>
             <tr>
                <td class="td1" style="width: 111px" colspan=6>合计：<?=$ss?>元</td>
            </tr>
            </table>
            <br><br>
            
            <form name="form1" method="post" action="<?= base_url() ?>index.php/teacher/yusuan/savefyt/<?= $yusuan->ys_id ?>" id="form1">
            <input type="hidden" value="0" name="fy_id" id="fy_id" />
            <input type="hidden" value="<?= $yusuan->ys_id ?>" name="fy_ys" id="fy_ys" />
            <input type="hidden" value="tea" name="fy_tors" id="fy_tors" />
            <table cellpadding="0" cellspacing="1" class="tablist2"> 
             <tr>
                <td class="td1" >项目</td>
                <td class="td1" >标准</td>
                <td class="td1" >人数</td>
                <td class="td1" >天数</td>
                <td class="td1" >金额</td>
                <td class="td1" >操作</td>
                    
            </tr>
        	<tr>
                <td class="td1" style="text-align: left;">
	               <select name="fy_type_id">
	               	   <option value="1">城市间交通费--飞机票</option>
		               <option value="2">城市间交通费--火车(含高铁、动车、全列软席列车)</option>
		               <option value="3">城市间交通费--轮船(不包括旅游船)</option>
		               <option value="4">交通费--其他交通工具(不包括出租小汽车)</option>
		               <option value="5">住宿费</option>
		               <option value="6">差旅补助费</option>
		               <option value="7">其他费用</option>
		               
	               
	               </select>
                
                </td>
            	<td class="td2" > <input name="fy_biaozhun" type="text" id="fy_biaozhun" value="" size="13" isRequired="true" /> <font color="red">*</font></td>
                <td class="td2" > <input name="fy_renshu" type="text" id="fy_renshu" value="" size="13" isRequired="true" /> <font color="red">*</font></td>
                <td class="td2" > <input name="fy_days" type="text" id="fy_days" value="" size="13" isRequired="true"/> <font color="red">*</font></td>
                <td class="td2" > <input name="fy_sum" type="text" id="fy_sum" value="" size="13" isRequired="true"/>&nbsp;&nbsp;元 <font color="red">*</font></td>
                 <td class="td2" > <input type="submit" name="btnSave" value="保存" onclick="return check('form1');" id="btnSave" class="input" /></td>
            </tr>
            <tr>
            	<td>
            	<span id="fy_biaozhunMsg" class="MsgHide">标准不能为空！<br></span>
            	<span id="fy_renshuMsg" class="MsgHide">人数不能为空！<br></span>
            	<span id="fy_daysMsg" class="MsgHide">天数不能为空！<br></span>
            	<span id="fy_sumMsg" class="MsgHide">金额不能为空！<br></span>
            	
            	</td>
            </tr>
            </table>
    </form>
            
            
            <div style="text-align: center;">
            <br>
                	<input type="button" name="btnReturn" value="上一步" onclick="window.location.href='<?= base_url() ?>index.php/teacher/yusuan/step1/<?= $yusuan->ys_id ?>';" id="btnReturn" class="input" />
                    <input type="button" name="btnReturn" value="下一步" onclick="window.location.href='<?= base_url() ?>index.php/teacher/yusuan/step3/<?= $yusuan->ys_id ?>';" id="btnReturn" class="input" />
                    <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/teacher/yusuan/yusuanList';" id="btnReturn" class="input" />
                    <input type="button" name="btnCancel" value="取 消" onclick="window.location.href='<?= base_url() ?>index.php/teacher/yusuan/yusuanDetail/<?= $yusuan->ys_id ?>';" id="btnCancel" class="input" style="<?php if (isset($show)) echo $show; ?>" />      </td>
            </div>
        
</div>