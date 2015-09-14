

<div style="margin-left:20px; margin-right:20px;width:900px;">
    <br />
    <div>

        <h3 class="lz_title">实习基地信息</h3>

    </div>
    <table cellpadding="0" cellspacing="1" class="tablist2">

        <tr>
            <td class="td1" colspan=2>基地信息</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习基地名称</td>
            <td class="td2" ><?= $comp->comp_name ?></td>
        </tr>

        <tr>
            <td class="td1" style="width: 111px">基地地址</td>
            <td class="td2" >
                <?= $comp->comp_address ?>
            </td>
        </tr>

        <tr>
            <td class="td1" style="width: 111px">基地负责人姓名</td>
            <td class="td2" ><?= $comp->user_name ?></td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">基地负责人电话</td>
            <td class="td2" ><?= $comp->user_phone ?></td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">基地负责人邮箱</td>
            <td class="td2" ><?= $comp->user_email ?></td>
        </tr>



    </table>
    <br><br>

    <h4 class="lz_title_2">未分配学生</h4>
    <form name="form1" method="post" action="<?= base_url() ?>index.php/teacher/compcourdist/companystuSet/<?=$cour->cour_id?>/<?=$comp->comp_id?>" id="form1">
        <table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
            <tr class="HeaderStyle">
                <th  class="td1"scope="col">

                    选择
                </th>
                <th  class="td3" scope="col">学生学号</th>
                <th class="td1" scope="col">学生姓名</th>
                <th class="td3" scope="col">学生班级</th>
                <!--<th scope="col">详情</th>-->
                <th class="td1" scope="col">操作</th>
            </tr>
            <?php
            if (is_array($stuf)) foreach ($stuf as $r):
                $stuStr = $r['stu_num'].'@'.$r['stu_name'].'@'.$r['stu_class'];
                $stuStr1 = $r['stu_num'].'__'.$r['stu_name'].'__'.$r['stu_class'];

                ?>
                <tr class="RowStyle" align="center">
                    <td class="td1">
                        <input type="checkbox" name="stu_num[]" value="<?=$stuStr?>" />
                    </td>
                    <td class="td3"><?= $r['stu_num'] ?></td>
                    <td class="td1"><?= $r['stu_name'] ?></td>
                    <td class="td3"><?= $r['stu_class'] ?></td>

                    <td class="td1">
                        <a id="" href="<?= base_url() ?>index.php/teacher/compcourdist/companystuSetByOne/<?=$cour->cour_id?>/<?=$comp->comp_id?>/<?=$stuStr1?>">添加</a>
                    </td>
                </tr>
            <?php endforeach;?>
            <tr>
                <td class="td3" colspan=6>
                    <input type="submit" name="btnReturn" value="添 加" id="btnReturn" class="input" />
                </td>
            </tr>
        </table>
    </form>
    <br><br>

    <h4 class="lz_title_2">已分配学生信息</h4>
    <form name="form1" method="post" action="<?= base_url() ?>index.php/teacher/compcourdist/companystuCan/<?=$cour->cour_id?>/<?=$comp->comp_id?>" id="form1">
        <table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
            <tr class="HeaderStyle">
                <th class="td1" scope="col">
                    选择
                </th>
                <th class="td3" scope="col">学生学号</th>
                <th class="td1" scope="col">学生姓名</th>
                <th class="td3" scope="col">学生班级</th>
                <th class="td1" scope="col">操作</th>
            </tr>
            <?php
            if (is_array($stuc)) foreach ($stuc as $r):
                $stuStr = $r['elco_id'];
                ?>
                <tr class="RowStyle" align="center">
                    <td class="td1">
                        <input type="checkbox" name="stu_numc[]" value="<?=$stuStr?>" />
                    </td>
                    <td class="td3"><?= $r['stu_num'] ?></td>
                    <td class="td1"><?= $r['stu_name'] ?></td>
                    <td class="td3"><?= $r['stu_class'] ?></td>
                    <td class="td1">
                        <a id="" href="<?= base_url() ?>index.php/teacher/compcourdist/companystuCanByOne/<?=$cour->cour_id?>/<?=$comp->comp_id?>/<?=$stuStr?>">删除</a>
                    </td>
                </tr>
            <?php endforeach;?>
            <tr>
                <td  class="td3" colspan=6>
                    <input type="submit" name="btnReturn" value="删 除" id="btnReturn" class="input" />
                </td>
            </tr>
        </table>
    </form>
    <br><br>

    <div style="text-align: center;">
        <input type="button" name="btnReturn" value="返回" onclick="window.location.href='<?= base_url() ?>index.php/teacher/compcourdist/companyDetail/<?=$cour->cour_id?>/<?=$comp->comp_id?>';" id="btnReturn" class="input" />
    </div>
</div>