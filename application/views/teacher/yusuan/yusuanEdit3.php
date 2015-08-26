<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3 class="lz_title">实习预算明细——实习经费预算(不含带队教师差旅费)</h3>
    
    
        <input type="hidden" value="<?= $yusuan->ys_id ?>" name="ys_id" id="ys_id" />

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
                <td class="td1" style="width: 111px">操作</td>
            </tr>
             <?php 
             $ss = 0;
             if (is_array($feiyong)) foreach ($feiyong as $key=>$r): ?>
             <tr>
            	<td class="td1"  style="width: 111px"><?=$r->tf_type?></td>
                <td class="td2"><?=$r->fy_biaozhun?></td>
                <td class="td2"><?=$r->fy_renshu?></td>
                <td class="td2" ><?=$r->fy_days?></td>
                <td class="td2" ><?=$r->fy_sum?></td>
                <td class="td2">
                	<a id="" href="<?= base_url() ?>index.php/teacher/yusuan/feiyongDelete/<?= $yusuan->ys_id?>/<?= $r->fy_id ?>">删除</a>
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
            
            <form name="form1" method="post" action="<?= base_url() ?>index.php/teacher/yusuan/savefy/<?= $yusuan->ys_id ?>" id="form1">
            <input type="hidden" value="0" name="fy_id" id="fy_id" />
            <input type="hidden" value="<?= $yusuan->ys_id ?>" name="fy_ys" id="fy_ys" />
            <input type="hidden" value="stu" name="fy_tors" id="fy_tors" />
            <table cellpadding="0" cellspacing="1" class="tablist2"> 
             <tr>
                <td class="td1" style="width: 111px">项目</td>
                <td class="td1" style="width: 111px">标准</td>
                <td class="td1" style="width: 111px">人数</td>
                <td class="td1" style="width: 111px">天数</td>
                <td class="td1" style="width: 111px">金额</td>
                <td class="td1" style="width: 111px">操作</td>
                    
            </tr>
        	<tr>
                <td class="td1" style="width: 111px;text-align: left;">
	               <select name="fy_type_id">
		               <option value="11">交通费--火车硬席(硬座、硬卧)，高铁/动车二等座，全列软席列车二等软座</option>
		               <option value="12">交通费--轮船(不包括旅游船)</option>
		               <option value="13">交通费--其他交通工具(不包括出租小汽车)</option>
		               <option value="14">住宿费</option>
		               <option value="15">保险费</option>
		               <option value="16">材料费</option>
		               <option value="17">门票费</option>
		               <option value="18">讲课费(实习企业人员讲课培训费)</option>
		               <option value="19">打印复印费</option>
		               <option value="20">其他(含小型安全装置，医疗药品等)</option>
	               
	               </select>
                
                </td>
            	<td class="td2" > <input name="fy_biaozhun" type="text" id="fy_biaozhun" value="" size="10" isRequired="true" /> <font color="red">*</font></td>
                <td class="td2" > <input name="fy_renshu" type="text" id="fy_renshu" value="" size="8" isRequired="true" /> <font color="red">*</font></td>
                <td class="td2" > <input name="fy_days" type="text" id="fy_days" value="" size="8" isRequired="true"/> <font color="red">*</font></td>
                <td class="td2" > <input name="fy_sum" type="text" id="fy_sum" value="" size="5" isRequired="true"/>&nbsp;&nbsp;元 <font color="red">*</font></td>
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
                	<input type="button" name="btnReturn" value="上一步" onclick="window.location.href='<?= base_url() ?>index.php/teacher/yusuan/step2/<?= $yusuan->ys_id ?>';" id="btnReturn" class="input" />
                    <input type="button" name="btnReturn" value="下一步" onclick="window.location.href='<?= base_url() ?>index.php/teacher/yusuan/step4/<?= $yusuan->ys_id ?>';" id="btnReturn" class="input" />
                    <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/teacher/yusuan/yusuanList';" id="btnReturn" class="input" />
                    <input type="button" name="btnCancel" value="取 消" onclick="window.location.href='<?= base_url() ?>index.php/teacher/yusuan/yusuanDetail/<?= $yusuan->ys_id ?>';" id="btnCancel" class="input" style="<?php if (isset($show)) echo $show; ?>" />      </td>
            </div>
        
</div>