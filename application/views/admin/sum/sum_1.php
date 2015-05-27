<html>
    <head>

        <title>班级人数统计</title>

        <script type="text/javascript" src="<?= base_url(); ?>/js/jscharts.js"></script>
 <!--        <script type="text/javascript" src="<?= base_url(); ?>/js/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="<?= base_url(); ?>/js/statistics.js"></script>
        <script type="text/javascript" src="<?= base_url(); ?>/js/json2.js"></script>
       <script type="text/javascript">
        $(document).ready(function (){
            alert('a');
            b();
        })
        </script>-->
    </head>
    <body>        
        <div id="graph">Loading graph...</div>
        <script type="text/javascript">
           // var myData = new Array(['农学1班', 0], ['农学2班', 2], ['昆虫学1班', 1], ['果树学1班', 1]);
            /*
            var data1=$sum[0]['class'];
            alert(data1); 
            var mychartData = new Array()
            
           function filterByDay($sum){
                alert($sum);
                for(var i = 0;i < $length;i++){		             
                    mychartData[i]=[$sum[i]['class'],$sum[i]['sum']*1];		
                } 
                return mychartData;
            }
            //var myData = array();      
           ;
            
            for(var i = 0;i < $length;i++){		             
                mychartData[i]=[$sum[i]['class'],$sum[i]['sum']*1];		
            }      
                    
            //var myData = mychartData;      
            var myData =filterByDay($sum);*/
    
            //$sumJson = json_encode($sum);
            /*
            $sumJson = json_encode($data['sum']);
            var myData= $sumJson;
            alert(myData[0]);*/
            //var json_js = $helloJson;
            //var json_js= <?php echo $hello; ?>
            //alert(json_js[0]);
            var myData = new Array(['Mar04-Mar05', 21], ['Mar05-Mar06', 28], ['Mar06-Mar07', 12], ['Mar07-Mar08', 17]);
            var colors = ['#AF0202', '#EC7A00', '#FCD200', '#81C714'];
            var myChart = new JSChart('graph', 'bar');
            myChart.setDataArray(myData);
            myChart.colorizeBars(colors);
            myChart.setTitle('Year-to-year growth in home broadband penetration in U.S.');
            myChart.setTitleColor('#8E8E8E');
            myChart.setAxisNameX('');
            myChart.setAxisNameY('%');
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
        </script>
        <!--
               <table width="100%" cellpadding="0" cellspacing="0">
                   <tr class="tablecontent">
                   <td class="line2" >
        <?php if (is_array($sum)) foreach ($sum as $r): ?>
                                                                                               <tr class="RowStyle" align="center">
                                                                                                   <td><?= $r['class'] ?></td>
                                                                                                   <td><?= $r['sum'] ?></td>
                                                                                               </tr>
            <?php endforeach; ?>
                   </td></tr>-->
    </body>
</html>