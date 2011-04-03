<?php

// USER VARIABLES
$uservar_sitename = "Rocktronica";			// Title of site
$uservar_account = "rocktronica";			// YouTube username
$uservar_url = "tommyandthetommies.com";	// For RSS feed
$uservar_count = 10;						// # of videos to show
$uservar_embedwidth = 613;					// Width of embed

$width = $uservar_embedwidth;
$height = $width*.5625+25;

error_reporting (E_ALL ^ E_NOTICE);

include "includes/base.php";

if ($_GET["page"] == "rss") {
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
		<h1><a href="/"><?php echo $uservar_sitename; ?></a></h1>
		<ul>
			<li><a href="/">Home</a></li>
			<li><a href="/?page=about">About</a></li>
			<li><a href="http://feeds.feedburner.com/TommyAndTheTommies">RSS</a></li>
			<li><a href="http://www.youtube.com/user/<?php echo $uservar_account; ?>" class="external">Channel &#187;</a></li>
			<li><a href="http://www.youtube.com/inbox?to_users=<?php echo $uservar_account; ?>&action_compose=1" class="external">Send Message &#187;</a></li>
		</ul>
	</div>
	<div id="content">
		<?php if (isset($_GET["id"])) { 
			include "includes/id.php";
		} elseif (isset($_GET["page"])) {
			switch ($_GET["page"]) {
				case "about":
					include "includes/about.php";
					break;
				default:
					include "includes/404.php";
					break;			
			}
		} else {
			include "includes/list.php";
		} ?>
	</div>
	<div id="footer">
		<p><?php echo date("Y");?> <a href="/"><?php echo $uservar_sitename; ?></a>. An <a href="http://iamnotagoodartist.com">iamnotagoodartist</a> project. Hosted by <a href="http://www.dreamhost.com/r.cgi?314167">DreamHost</a>.</p>
	</div>
</div>

<script src="http://www.google.com/jsapi" type="text/javascript"></script>
<script type="text/javascript">google.load("jquery", "1.5.1");</script>
<script src="javascript.js" type="text/javascript"></script>

</body>
</html>