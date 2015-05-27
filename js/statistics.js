/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function b(){
    var my_data="";  //参数
     
    var url1 = "http://localhost/campus/js/test.php"

    $.ajax({
        url: url1,  
        type: "POST",
        data:{
            trans_data:my_data
        },
        //dataType: "json",
        error: function(){  
            alert('aaaa Error loading XML document');  
        },  
        success: function(data){//如果调用php成功    
            alert(unescape(data));//解码，显示汉字
        }
    });
     
}
/*
$.getJSON("http://localhost/campus/js/test.php",function(data){
    if(data!=null){			
        //alert("处理每日数据！");

        tabList=[];
        for(var i = 0;i < data.length;i++)
        {
            tabList.push("<tr><td>"+data[i].picktime +"</td><td>"+data[i].intemperature +"</td><td>"+data[i].inhumidity+"</td><td>"+data[i].inradiation+"</td><td>"+data[i].incardioxide+"</td><td>"+data[i].inammonia+"</td><td>"+data[i].inpressure+"</td><td>"+data[i].inwindspeed+"</td><td>"+data[i].indust+"</td></tr>");

        }
        $("#tabList").append(tabList.join(""));
        //绘制报表
        alert(data);
	var myData = data;		
        var colors = ['#AF0202', '#EC7A00', '#FCD200', '#81C714'];
        var myChart = new JSChart('graph', 'bar');
        myChart.setDataArray(myData);
        myChart.colorizeBars(colors);
        myChart.setTitle('本学院每班人数统计');
        myChart.setTitleColor('#8E8E8E');
        myChart.setAxisNameX('');
        myChart.setAxisNameY('人数/个');
        myChart.setAxisColor('#C4C4C4');
        myChart.setAxisNameFontSize(16);
        myChart.setAxisNameColor('#999');
        myChart.setAxisValuesColor('#7E7E7E');
        myChart.setBarValuesColor('#7E7E7E');
        myChart.setAxisPaddingTop(60);
        myChart.setAxisPaddingRight(140);
        myChart.setAxisPaddingLeft(150);
        myChart.setAxisPaddingBottom(40);
        myChart.setTextPaddingLeft(105);
        myChart.setTitleFontSize(11);
        myChart.setBarBorderWidth(1);
        myChart.setBarBorderColor('#C4C4C4');
        myChart.setBarSpacingRatio(50);
        myChart.setGrid(false);
        myChart.setSize(616, 321);
        myChart.setBackgroundImage('chart_bg.jpg');
        myChart.draw();
			
    }else{
        alert("该学院没有班级人数数据！");
    }
});*/
	//*/

