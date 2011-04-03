<?php

if ((isset($_GET["page"])) && (intval($_GET["page"])) == 0) {
	echo ucwords($_GET["page"])." - ";
}

if (isset($id)) {
	echo $youtube->feed->title." - ";
}

echo $uservar_sitename;

if ((isset($page)) && ($page !== 1)) {
	echo " - Page ".$page; 
}

?>