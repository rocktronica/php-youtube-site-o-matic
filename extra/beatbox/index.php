<?php 

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Beatbox Experiment - Tommy and the Tommies</title>
<link href="/style.css" type="text/css" rel="stylesheet" media="screen" />
<link href="beatbox.css" type="text/css" rel="stylesheet" media="screen" />
<link rel="shortcut icon" href="/favicon.ico" />
</head>

<body>

<div class="row one">
	<div class="swfvid" id="one" rel="z--B1HXQsS8">You need Flash player 8+ and JavaScript enabled to view this video.</div>
	<div class="cell off cell_1" rel="one"></div>
	<div class="cell off cell_2" rel="one"></div>
	<div class="cell off cell_3" rel="one"></div>
	<div class="cell off cell_4" rel="one"></div>
	<div class="cell off cell_5" rel="one"></div>
	<div class="cell off cell_6" rel="one"></div>
	<div class="cell off cell_7" rel="one"></div>
	<div class="cell off cell_8" rel="one"></div>
</div>

<div class="row two">
	<div class="swfvid" id="two" rel="-W3eUlrGzyA">You need Flash player 8+ and JavaScript enabled to view this video.</div>
	<div class="cell off cell_1" rel="two"></div>
	<div class="cell off cell_2" rel="two"></div>
	<div class="cell off cell_3" rel="two"></div>
	<div class="cell off cell_4" rel="two"></div>
	<div class="cell off cell_5" rel="two"></div>
	<div class="cell off cell_6" rel="two"></div>
	<div class="cell off cell_7" rel="two"></div>
	<div class="cell off cell_8" rel="two"></div>
</div>

<div class="row three">
	<div class="swfvid" id="three" rel="JOAcNI8xE6I">You need Flash player 8+ and JavaScript enabled to view this video.</div>
	<div class="cell off cell_1" rel="three"></div>
	<div class="cell off cell_2" rel="three"></div>
	<div class="cell off cell_3" rel="three"></div>
	<div class="cell off cell_4" rel="three"></div>
	<div class="cell off cell_5" rel="three"></div>
	<div class="cell off cell_6" rel="three"></div>
	<div class="cell off cell_7" rel="three"></div>
	<div class="cell off cell_8" rel="three"></div>
</div>

<div class="row four">
	<div class="swfvid" id="four" rel="u40MlIPACT4">You need Flash player 8+ and JavaScript enabled to view this video.</div>
	<div class="cell off cell_1" rel="four"></div>
	<div class="cell off cell_2" rel="four"></div>
	<div class="cell off cell_3" rel="four"></div>
	<div class="cell off cell_4" rel="four"></div>
	<div class="cell off cell_5" rel="four"></div>
	<div class="cell off cell_6" rel="four"></div>
	<div class="cell off cell_7" rel="four"></div>
	<div class="cell off cell_8" rel="four"></div>
</div>

<!--<ul>
	<li><a href="#" id="vid_play">Play</a></li>
	<li><a href="#" id="vid_pause">Pause</a></li>
	<li><a href="#" id="vid_5">5</a></li>
	<li><a href="#" id="vid_10">10</a></li>
</ul>-->

<script src="http://www.google.com/jsapi" type="text/javascript"></script>
<script type="text/javascript">
	google.load("jquery", "1");
	google.load("swfobject", "2.2");
</script>

<script type="text/javascript">

//var params = { allowScriptAccess: "always" };
//var atts = { id: "one" };
//swfobject.embedSWF("http://www.youtube.com/v/dFMtQ5UKz-I?enablejsapi=1&playerapiid=one", "one", "280", "210", "8", null, null, { allowScriptAccess: "always" }, { id: "one" });

// gotta be a better way to do this
// idk how to create a new variable with a variable name

function onYouTubePlayerReady(playerId) {
	one = document.getElementById("one");
	two = document.getElementById("two");
	three = document.getElementById("three");
	four = document.getElementById("four");
}

function poke(v,sec) {
	if (v=="one") { one.seekTo(0, true); }
	if (v=="two") { two.seekTo(4, true); }
	if (v=="three") { three.seekTo(8, true); }
	if (v=="four") { four.seekTo(12, true); }
}

function nextbeat() {
	beat++;
	if (beat == 9) { beat = 1; }
	document.title = beat;
	$(".cell").removeClass("onbeat");
	$(".cell_"+beat).addClass("onbeat");
	$(".cell_"+beat).each(function(index) {
		if (!($(this).hasClass("off"))) {
			$(this).html($(this).attr("rel"));
			poke($(this).attr("rel"),10);
//			poke(one,5);
		}
	});	
}

$(document).ready(function(){
	beat = 1;
	setInterval("nextbeat()",250);
//	$(".cell_"+beat).addClass("onbeat");
	$(".swfvid").each(function(index) {
		var vidid = $(this).attr("id");
		swfobject.embedSWF("http://www.youtube.com/v/o5ft_l0mNtU?enablejsapi=1&playerapiid="+vidid, vidid, "200", "150", "8", null, null, { allowScriptAccess: "always" }, { id: vidid });
	});
 	$("#vid_play").click(function(event){
 		one.playVideo();
	});
 	$("#vid_pause").click(function(event){
 		one.pauseVideo();
	});
 	$("#vid_5").click(function(event){
// 		one.seekTo(5);
		poke(one,5);
	});
 	$(".cell").click(function(event){
		$(this).toggleClass("off");
	});
});

</script>

</body>
</html>