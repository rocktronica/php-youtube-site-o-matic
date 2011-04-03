<?php 

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Beatbox Experiment - Tommy and the Tommies</title>
<link href="/style.css" type="text/css" rel="stylesheet" media="screen" />
<link rel="shortcut icon" href="/favicon.ico" />
<style type="">

#container { width: 560px; margin-top: 20px; }

p { text-align: center; }

table {
	margin-bottom: 20px;
}

table, td {
	border: 5px solid #5C5C5C;
}

td.head {
	background-color: #5C5C5C;
	color: white;
	vertical-align: top;
	font-weight: bold;
	font-size: 16px;
	line-height: 14px;
	width: 60px;
}

.cell {
	display: block;
	cursor: pointer;
	width: 40px;
	height: 40px;
	background-color: #DFDFDF;
	margin: 5px;
	text-align: center;
	line-height: 40px;
	font-weight: bold;
	color: #5C5C5C;
}

.cell.on { background-color: #0099FF; }
.onbeat { background-color: yellow; }

#vid {
	margin-bottom: 20px;
}
</style>
</head>

<body>

<div id="container">
	<div class="swfvid" id="vid" rel="z--B1HXQsS8">You need Flash player 8+ and JavaScript enabled to view this video.</div>
	<table>
		<tr>
			<td class="head">Kick Drum</td>
			<td class="1"><a class="cell" rel="kick">1</a></td>
			<td class="2"><a class="cell" rel="kick">2</a></td>
			<td class="3"><a class="cell" rel="kick">3</a></td>
			<td class="4"><a class="cell" rel="kick">4</a></td>
			<td class="5"><a class="cell" rel="kick">5</a></td>
			<td class="6"><a class="cell" rel="kick">6</a></td>
			<td class="7"><a class="cell" rel="kick">7</a></td>
			<td class="8"><a class="cell" rel="kick">8</a></td>
		</tr>
		<tr>
			<td class="head">Snare Drum</td>
			<td class="1"><a class="cell" rel="snare">1</a></td>
			<td class="2"><a class="cell" rel="snare">2</a></td>
			<td class="3"><a class="cell" rel="snare">3</a></td>
			<td class="4"><a class="cell" rel="snare">4</a></td>
			<td class="5"><a class="cell" rel="snare">5</a></td>
			<td class="6"><a class="cell" rel="snare">6</a></td>
			<td class="7"><a class="cell" rel="snare">7</a></td>
			<td class="8"><a class="cell" rel="snare">8</a></td>
		</tr>
		<tr>
			<td class="head">Hihat Closed</td>
			<td class="1"><a class="cell" rel="closed">1</a></td>
			<td class="2"><a class="cell" rel="closed">2</a></td>
			<td class="3"><a class="cell" rel="closed">3</a></td>
			<td class="4"><a class="cell" rel="closed">4</a></td>
			<td class="5"><a class="cell" rel="closed">5</a></td>
			<td class="6"><a class="cell" rel="closed">6</a></td>
			<td class="7"><a class="cell" rel="closed">7</a></td>
			<td class="8"><a class="cell" rel="closed">8</a></td>
		</tr>
		<tr>
			<td class="head">Hihat Open</td>
			<td class="1"><a class="cell" rel="open">1</a></td>
			<td class="2"><a class="cell" rel="open">2</a></td>
			<td class="3"><a class="cell" rel="open">3</a></td>
			<td class="4"><a class="cell" rel="open">4</a></td>
			<td class="5"><a class="cell" rel="open">5</a></td>
			<td class="6"><a class="cell" rel="open">6</a></td>
			<td class="7"><a class="cell" rel="open">7</a></td>
			<td class="8"><a class="cell" rel="open">8</a></td>
		</tr>
	</table>
	<p><?php echo date("Y");?> <a href="/">Tommy and the Tommies</a>. An <a href="http://iamnotagoodartist.com">iamnotagoodartist</a> project. Hosted by <a href="http://www.dreamhost.com/r.cgi?314167">DreamHost</a>.</p>

</div>

<script src="http://www.google.com/jsapi" type="text/javascript"></script>
<script type="text/javascript">
	google.load("jquery", "1");
	google.load("swfobject", "2.2");
</script>

<script type="text/javascript">

swfobject.embedSWF("http://www.youtube.com/v/o5ft_l0mNtU?enablejsapi=1&playerapiid=vid", "vid", "560", "445", "8", null, null, { allowScriptAccess: "always" }, { id: "vid" });

function onYouTubePlayerReady(playerId) {
	vid = document.getElementById("vid");
	vid.playVideo();
}

function poke(v) {
	if (v=="kick") { vid.seekTo(0, true); }
	if (v=="snare") { vid.seekTo(4, true); }
	if (v=="closed") { vid.seekTo(8, true); }
	if (v=="open") { vid.seekTo(12, true); }
}

function nextbeat() {
	beat++;
	if (beat == 9) { beat = 1; }
	document.title = beat;
	$("td").removeClass("onbeat");
	$("td."+beat).addClass("onbeat");
	$(".onbeat .on").each(function(index) {
		poke($(this).attr("rel"));
	});	
}

$(document).ready(function(){
	beat = 1;
	setInterval("nextbeat()",250);
 	$(".cell").click(function(event){
 		$(".cell:contains('"+$(this).html()+"')").not(this).removeClass("on");
		$(this).toggleClass("on");
	});
});

</script>

</body>
</html>