<div style="margin-left:20px; margin-right:20px;">
    <br />
    <h3>实习报名信息</h3>
    <table cellpadding="0" cellspacing="1" class="tablist2">
        <tr>
            <td class="td1" style="width: 111px">实习项目模式</td>
            <td class="td2" >志愿式</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习项目课程号</td>
            <td class="td2" ><?= $comcou->courseId ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习项目课序号</td>
            <td class="td2" ><?= $comcou->courseNum ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习项目课程名</td>
            <td class="td2" ><?= $comcou->courseName ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习项目英文名</td>
            <td class="td2" ><?= $comcou->courseNameEn ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">指导教师姓名</td>
            <td class="td2" ><?= $course->courseTeaName ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习基地名称</td>
            <td class="td2" ><?= $company->comName ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习基地地址</td>
            <td class="td2" ><?= $company->address ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习基地主页</td>
            <td class="td2" ><?= $company->url ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习基地简介</td>
            <td class="td2" ><?= $company->content ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习基地计划</td>
            <td class="td2" ><?= $company->plan ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习基地负责人</td>
            <td class="td2" ><?= $comuser->realname ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">负责人电话</td>
            <td class="td2" ><?= $comuser->phone ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">负责人邮箱</td>
            <td class="td2" ><?= $comuser->email ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">负责人地址</td>
            <td class="td2" ><?= $comuser->address ?>&nbsp;</td>
        </tr>
        
        
        <tr  style="<?= $show1 ?>" align="center">
             <td class="td2" colspan="2" align="center"><font color="red" size="4px" >已提交</font>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2" class="td3" align="center">
                <input type="button" style="<?= $show ?>" name="btnReturn" value="报 名" onclick="window.location.href='<?= base_url() ?>index.php/student/baoming/save/<?= $comcou->id ?>';" id="btnReturn" class="input" />       
                <input type="button" style="<?= $show2 ?>" name="btnReturn" value="取消报名" onclick="cancelInfo('<?= base_url() ?>index.php/student/baoming/delete/<?= $b_id ?>')" id="btnReturn" class="input" />         
                <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/student/baoming/baomingList';" id="btnReturn" class="input" />      
            </td>
        </tr>
    </table>
</div>