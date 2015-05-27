<html>
<head>

<title>BaiduEcharts</title>


</head>
<body>

			<div id="bdchart" style="height:500px"></div>
        	<script src="<?=base_url()?>echarts/build/dist/echarts.js"></script>
        	<script type="text/javascript">

	        // 路径配置
	        require.config({
	            paths: {
	                echarts: '<?=base_url()?>echarts/build/dist'
	            }
	        });
	        // 使用
	        require(
	            [
	                'echarts',
	                'echarts/chart/bar' // 使用柱状图就加载bar模块，按需加载
	            ],
	            DrawEChart //异步加载的回调函数绘制图表
	        );


	        var myChart = require('echarts').init(bdchart);
	        
	        function DrawEChart(ec) {
	            //--- 折柱 ---
	            myChart = ec.init(document.getElementById('bdchart'));
	            //图表显示提示信息
	            myChart.showLoading({
	                text: "图表数据正在努力加载..."
	            });
	            //定义图表options
	            var options = {
	                title: {
	                    text: "各学院学生统计",
	                    
	                },
	                tooltip: {
	                    trigger: 'axis'
	                },
	                legend: {
	                	data:['男生人数','女生人数']
	                },
	                grid:{
		                x:160,
		                y2:60
	                },
	                toolbox: {
	                    show: true,
	                    feature: {
	                        mark: false
	                    }
	                },
	                calculable: true,
	                xAxis: [
		                    {
		                    	type: 'category',
		                    	axisLabel : {	
		                    		rotate: 30,
			                    	} ,
		                        data: [],
		                        
		                    }
		                ],
	                yAxis: [
	                    {
	                    	type: 'value',
	                        splitArea: { show: true }	                    	
	                    }
	                ],
	                
	                series: [{
                        name:"男生人数",
                        type:"bar",
                        itemStyle: {
                        	normal: {
                        		barBorderRadius:[0,3,3,0],
                        		color :'#0000FF'            		
                        	},
	                		emphasis: {
	                			barBorderRadius:[0,3,3,0],
	                			color :'#9999FF'
	                		}
                        }
	                },
                        {
                            name:"女生人数",
                            type:"bar",
                            itemStyle: {
                            	normal: {
                            		barBorderRadius:[0,3,3,0],   
                            		color :'#FF3366'         		
                            	},
    	                		emphasis: {
    	                			barBorderRadius:[0,3,3,0],
    	                			color :'#FF66FF'
    	                		}
                            }
                    }]
	            };

	            var urla = '<?=base_url();?>index.php/superadmin/sum/ajaxSum2';
	            //通过Ajax获取数据
	            $.ajax({
	                type: "get",
	                async: false, //同步执行
	                url: urla,
	                dataType: "json", //返回数据形式为json	
	                              
	                success: function (data) {
		                                				                
	                    if (data) {                        
	                        //将返回的category和series对象赋值给options对象内的category和series
	                        //因为xAxis是一个数组 这里需要是xAxis[i]的形式

	                        options.xAxis[0].data = data.collegeName;
	                        options.series[0].data = data.stuBNum;   
	                        options.series[1].data = data.stuGNum;   
	                        
	                        myChart.hideLoading();
	                        myChart.setOption(options);
	                    }
	                },
	                error: function(XMLHttpRequest, textStatus, errorThrown) {
		                //以下代码供测试
                        alert(XMLHttpRequest.status);
                        alert(XMLHttpRequest.readyState);
                        alert(textStatus);
                        alert("数据加载失败");
                    }
	            });
	        }
	        
		    </script>


</body>
</html>