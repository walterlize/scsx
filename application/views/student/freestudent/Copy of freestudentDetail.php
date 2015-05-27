<div style="margin-left:20px; margin-right:20px;">
    <br />
    <h3>查看报名结果信息</h3>
    <?php if($show==1){?>
    <table cellpadding="0" cellspacing="1" class="tablist2">
        <tr>
            <td class="td1" style="width: 111px">实习项目名称</td>
            <td class="td2" ><?= $free->p_name ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习项目模式</td>
            <td class="td2" ><?= $free->pattern ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习项目基地</td>
            <td class="td2" ><?= $free->comName ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">基地负责人</td>
            <td class="td2" ><?= $free->yrealname ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">指导老师</td>
            <td class="td2" ><?= $free->trealname ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">带队老师</td>
            <td class="td2" ><?= $free->realname ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">带队老师电话</td>
            <td class="td2" ><?= $free->phone ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">带队老师邮箱</td>
            <td class="td2" ><?= $free->email ?>&nbsp;</td>
        </tr>
    </table>
    <?php 
    }else{
    	echo "<span style='color:red;font-weight: bold;'>";
        echo "指导教师分配中···";
        echo "</span>";
    }?>
</div>