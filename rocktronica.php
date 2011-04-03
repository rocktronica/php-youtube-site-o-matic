<?php

// USER CONSTANTS
define ("SITENAME", "Rocktronica's Videos");
define ("ACCOUNT", "rocktronica");
define ("EMBEDWIDTH", 613);

$width = EMBEDWIDTH;
$height = $width*.5625+25;

include "includes/base.php";

// UNCOMMENT THIS TO ENABLE DEBUG MODE
//if (debug()) { exit("Under construction... be back soon!"); }

if ((isset($_GET["page"]) && ($_GET["page"] == "rss")) {
	include "includes/rss.php";
	exit();
}

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php include "includes/title.php"; ?></title>
<link href="style.css" type="text/css" rel="stylesheet" media="screen" />
<link rel="shortcut icon" href="/favicon.ico" />
<link rel="icon" href="/favicon.gif" type="image/gif" >
</head>

<body>

<div id="container">
	<div id="header">
		<h1><a href="/"><?php echo SITENAME; ?></a></h1>
		<ul>
			<li><a href="/">Home</a></li>
			<li><a href="/?page=about">About</a></li>
			<li><a href="http://feeds.feedburner.com/TommyAndTheTommies">RSS</a></li>
			<li><a href="http://www.youtube.com/user/<?php echo ACCOUNT; ?>" class="external">Channel &#187;</a></li>
			<li><a href="http://www.youtube.com/inbox?to_users=<?php echo ACCOUNT; ?>&action_compose=1" class="external">Send Message &#187;</a></li>
		</ul>
	</div>
	<div id="content">
		<?php if (isset($_GET["id"])) { 
			include "includes/id.php";
		} else {
			if ($_GET["page"] == "about") {
				include "includes/about.php";
			} elseif (isset($_GET["page"])) {
				include "includes/404.php";
			} else {
				include "includes/list.php";
			}
		} ?>
	</div>
	<div id="footer">
		<p><?php echo date("Y");?> <a href="/"><?php echo SITENAME; ?></a>. An <a href="http://iamnotagoodartist.com">iamnotagoodartist</a> project. Hosted by <a href="http://www.dreamhost.com/r.cgi?314167">DreamHost</a>.</p>
	</div>
</div>

<script src="http://www.google.com/jsapi" type="text/javascript"></script>
<script type="text/javascript">google.load("jquery", "1");</script>
<script src="javascript.js" type="text/javascript"></script>

</body>
</html>