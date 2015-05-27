function qhbj(obj)
{
	for(i=1;i<=3;i++)
	{
		if(i==obj)
		{
			$('#qhbj'+i).addClass('cur_headR');	
		}
		else
		{
			$('#qhbj'+i).removeClass('cur_headR');	
		}
	}	
}
var object=$('.vol').offset();
$('#login').css({'left':object.left+100})