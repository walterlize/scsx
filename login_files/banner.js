var currentindex=1;
$("#flashBg").css("background",$("#flash1").attr("name"));
function changeflash(i) {	
currentindex=i;
for (j=1;j<=3;j++){
	if (j==i) 
	{$("#flash"+j).fadeIn("normal");
	$("#flash"+j).css("display","block");
	$("#f"+j).removeClass();
	$("#f"+j).addClass("dq");
	$("#flashBg").css("background",$("#flash"+j).attr("name"));
	}
	else
	{$("#flash"+j).css("display","none");
	$("#f"+j).removeClass();
	$("#f"+j).addClass("no");}
}}

function startAm(){
timerID = setInterval("timer_tick()",3000);
}

function stopAm(){
clearInterval(timerID);
}

function timer_tick() {
    currentindex=currentindex>=3?1:currentindex+1;
	changeflash(currentindex);
}

//$(document).ready(function(){
//$(".flash_bar div").mouseover(function(){stopAm();}).mouseout(function(){startAm();});
//startAm();
//});