<html>
<head>

<title>JSChart</title>

<script type="text/javascript" src="<?= base_url(); ?>/js/jscharts.js"></script>

</head>
<body>

<div id="graph">Loading graph...</div>

<script type="text/javascript">
	var myData = new Array(['优', 126], ['良', 324], ['中', 444], ['差', 143]);
	var colors = ['#0673B8', '#0091F1', '#F85900', '#C32121'];
	var myChart = new JSChart('graph', 'pie');
	myChart.setDataArray(myData);
	myChart.colorizePie(colors);
	myChart.setTitle('实习成绩统计');
	myChart.setTitleColor('#8E8E8E');
	myChart.setTitleFontSize(11);
	myChart.setTextPaddingTop(280);
	myChart.setPieValuesDecimals(0);
	myChart.setPieUnitsFontSize(9);
	myChart.setPieValuesFontSize(8);
	myChart.setPieValuesColor('#fff');
	myChart.setPieUnitsColor('#969696');
	myChart.setSize(616, 321);
	myChart.setPiePosition(308, 145);
	myChart.setPieRadius(95);
	myChart.setFlagColor('#fff');
	myChart.setFlagRadius(4);
	myChart.setTooltip(['Firefox','Including Mozilla and all Gecko browsers']);
	myChart.setTooltip(['IE6','Including IE5 and older browsers']);
	myChart.setTooltipOpacity(1);
	myChart.setTooltipBackground('#ddf');
	myChart.setTooltipPosition('ne');
	myChart.setTooltipOffset(2);
	myChart.setBackgroundImage('chart_bg.jpg');
	myChart.draw();
</script>

</body>
</html>