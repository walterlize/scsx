<html>
<head>

<title>JSChart</title>

<script type="text/javascript" src="<?= base_url(); ?>/js/jscharts.js"></script>

</head>
<body>

<div id="graph">Loading graph...</div>

<script type="text/javascript">
	//var myData = new Array(['Mar04-Mar05', 21], ['Mar05-Mar06', 28], ['Mar06-Mar07', 12], ['Mar07-Mar08', 17]);
        var myData = new Array(['农学1班', 0], ['农学2班', 2], ['昆虫学1班', 1], ['果树学1班', 1]);
	var colors = ['#AF0202', '#EC7A00', '#FCD200', '#81C714'];
	var myChart = new JSChart('graph', 'bar');
	myChart.setDataArray(myData);
	myChart.colorizeBars(colors);
	myChart.setTitle('本学院班级人数统计');
	myChart.setTitleColor('#8E8E8E');
	myChart.setAxisNameX('班级');
	myChart.setAxisNameY('人数');
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

</body>
</html>