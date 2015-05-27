<html>
<head>

<title>JSChart</title>

<script type="text/javascript" src="<?= base_url(); ?>/js/jscharts.js"></script>

</head>
<body>

<div id="graph">Loading...</div>


<script type="text/javascript">
	
	var myChart = new JSChart('graph', 'line');
	myChart.setDataArray([['农院', 80],['生院', 56],['动科院', 60],['动医院', 65],['食院', 50],['资环院', 50],['信电院', 60],['工院', 80],['水院', 54],['理院', 62]], 'blue');
	myChart.setDataArray([['农院', 68],['生院', 54],['动科院', 53],['动医院', 65],['食院', 43],['资环院', 50],['信电院', 43],['工院', 78],['水院', 50],['理院', 70]], 'green');
	myChart.setDataArray([['农院', 148],['生院', 110],['动科院', 113],['动医院', 130],['食院', 93],['资环院', 100],['信电院', 103],['工院', 158],['水院', 104],['理院', 132]], 'gray');
	myChart.setSize(550, 300);
	myChart.setAxisValuesNumberY(5);
	myChart.setIntervalStartY(0);
	myChart.setIntervalEndY(200);
	myChart.setAxisValuesNumberX(5);
	myChart.setShowXValues(false);
	myChart.setTitleColor('#454545');
	myChart.setAxisValuesColor('#454545');
	myChart.setLineColor('#A4D314', 'green');
	myChart.setLineColor('#BBBBBB', 'gray');
	myChart.setTooltip([1,' ']);
	myChart.setTooltip([2,' ']);
	myChart.setTooltip([3,' ']);
	myChart.setTooltip([4,' ']);
	myChart.setTooltip([5,' ']);
	myChart.setTooltip([6,' ']);
	myChart.setTooltip([7,' ']);
	myChart.setTooltip([8,' ']);
	myChart.setTooltip([9,' ']);
	myChart.setTooltip([10,' ']);
	myChart.setFlagColor('#9D16FC');
	myChart.setFlagRadius(4);
	myChart.setAxisPaddingRight(100);
	myChart.setLegendShow(true);
	myChart.setLegendPosition(490, 80);
	myChart.setLegendForLine('blue', '男生人数');
	myChart.setLegendForLine('green', '女生人数');
	myChart.setLegendForLine('gray', '总人数');
	myChart.draw();
	
</script>

</body>
</html>