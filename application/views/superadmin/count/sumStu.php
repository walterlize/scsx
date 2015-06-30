<link href="<?= base_url(); ?>css/css1.css" type="text/css" rel="stylesheet" />
<style>
<!--
td{
text-align: left;
padding-left: 10px;
}
-->
</style>
<div class="enterright" style="background-color: #F8F8F8">
    	<div class="enterrighttitle">
    		<p style="float: left;">学生人数统计</p>
    		
    	</div>
    	<!--  
    	<div style="text-align: right; margin-top: 10px; margin-bottom: 10px;margin-right: 40px;">
	        
	        <input type="submit" value="统计表" onClick="javascript:tab1_onclick()"class="input" />
	        <input type="submit" value="统计图" onClick="javascript:tab2_onclick()"class="input" />	     
        </div>
        -->
        <div class="enterrightlist" style="margin-top: 10px;">
        
        <div id="contabtable" style="width: 100%; ">
        	<table width="100%" cellpadding="0" cellspacing="0">
            	<tr class="tabletitle">
            		
                	<td class="line2"  >学院</td>
                	<td class="line2"  >年级</td>
                	<td class="line2"  >人数</td>
                	
                </tr>
                
                <?php if (is_array($stu)) foreach ($stu as $r): ?>
                <tr class="tablecontent">
               		 
                	<td class="line1" ><?= $r->XSM ?></td>
                	<td class="line2"><?= $r->NJMC ?></td>
                	<td class="line2"><?= $r->COSTU ?></td>

                	
                </tr>
                <?php endforeach; ?>
            
                
            </table>
        </div>
        
        <!--  
        <div id="contabchart" style="display: none;">
	           <div id="bdchart" style="height:400px"></div>     
	    	</div>
	    <script src="<?=base_url()?>echarts/build/dist/echarts.js"></script>
        
        <script type="text/javascript">

	        function tab1_onclick(){
	    		var tab1 = document.getElementById("contabtable");
	        	var tab2 = document.getElementById("contabchart");
	        	tab1.style.display="block";
	        	tab2.style.display="none";
	    	}
        	function tab2_onclick(){
        		var urla = '<?=base_url();?>index.php/superadmin/sum/ajaxSum1';
        		
        		//通过Ajax获取数据
	            $.ajax({
	                type: "get",               
	                url: urla,
	                dataType: "json", //返回数据形式为json	
	                              
	                success: function (data) {
		                if(data){	        
		                		
		                	
		                	alert("a");
		                	var seriesList = new Array();
		                	alert("a");
		                	for(var i=0;i<data.stuYear.length;i++){	  
		                		var item={
							               name:data.stuYear[i],
							               type:'bar',
							               data:data.stuNum[data.stuYear[i]]
							           }              		
		                		seriesList.push(item);
			                }
			                alert(data.stuNum[data.stuYear[1]]);

		                	//myChart.setSeries(seriesList,false);
							setMap(data.stuYear,data.collegeName,seriesList);
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

	            function setMap(ldata,xdata,sdata){
	            	
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
	    	            function (ec) {
							// 基于准备好的dom，初始化echarts图表
							var myChart = ec.init(document.getElementById('bdchart')); 
							
							var option = {
									
								    title : {
								        text: "各院学生人数",
								        x:'center',								        
								    },
								    tooltip : {
								        trigger: 'axis'
								    },
								    
								    toolbox: {
								        show : true,
								        feature : {
								            mark : {show: true},								            
								            saveAsImage : {show: true}
								        }
								    },
								    calculable : true,
								    grid:{
						                x:60,
						                y2:60
					                },
					                legend: {
					                    x: 'right',
					                    data:ldata
					                },
								    xAxis : [
								        {
								            type : 'category',
								            data : xdata
								        }
								    ],
								    yAxis : [
								        {
								            type : 'value',
								            axisLine : {    // 轴线
								                show: true,
								            },
								        }
								    ],
								    series:
									    [sdata]
								              
								};
							// 为echarts对象加载数据 
							myChart.setOption(option); 
						}
					);
	            }

            	var tab1 = document.getElementById("contabtable");
            	var tab2 = document.getElementById("contabchart");
            	tab1.style.display="none";
            	tab2.style.display="block";
        	}

        </script>

        </div> 
        -->   
        
        </div>
        
</div>