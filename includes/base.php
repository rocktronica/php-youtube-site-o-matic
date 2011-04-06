<?php

ini_set('display_errors',1);
error_reporting (E_ALL ^ E_NOTICE);

if (!function_exists("simplexml_load_file")) { exit("Require function 'simplexml_load_file' not found."); }

if (isset($_GET["id"])) {
	$id = $_GET["id"];
	$youtube->username=$uservar_account;
	$url="http://gdata.youtube.com/feeds/api/users/".$uservar_account."/uploads/".$id;
	$youtube->feed=simplexml_load_file($url);
} else {
	if ((isset($_GET["p"])) && (intval($_GET["p"])) !== 0) {
		$start = (intval($_GET["p"])-1)*$uservar_count+2;
		$page = $_GET["p"];
	} else {
		$start = 1;
		$page = 1;
	}
	$youtube->username=$uservar_account;
	if ($page == 1) {
		$url="http://gdata.youtube.com/feeds/api/users/".$uservar_account."/uploads?&start-index=".$start."&max-results=".($uservar_count+1);
	} else {
		$url="http://gdata.youtube.com/feeds/api/users/".$uservar_account."/uploads?&start-index=".$start."&max-results=".$uservar_count;	
	}
	$youtube->feed=simplexml_load_file($url);
}

function firstp($str) {
	if (strpos($str,"\n") != "") {
		return "<p>".substr($str, 0, strpos($str,"\n")."</p>");
	} else {
		return "<p>".$str."</p>";
	}
}

// http://ma.tt/scripts/autop/
function wpautop($pee, $br = 1) {
	if ( trim($pee) === '' )
		return '';
	$pee = $pee . "\n"; // just to make things a little easier, pad the end
	$pee = preg_replace('|<br />\s*<br />|', "\n\n", $pee);
	// Space things out a little
	$allblocks = '(?:table|thead|tfoot|caption|col|colgroup|tbody|tr|td|th|div|dl|dd|dt|ul|ol|li|pre|select|option|form|map|area|blockquote|address|math|style|input|p|h[1-6]|hr|fieldset|legend|section|article|aside|hgroup|header|footer|nav|figure|figcaption|details|menu|summary)';
	$pee = preg_replace('!(<' . $allblocks . '[^>]*>)!', "\n$1", $pee);
	$pee = preg_replace('!(</' . $allblocks . '>)!', "$1\n\n", $pee);
	$pee = str_replace(array("\r\n", "\r"), "\n", $pee); // cross-platform newlines
	if ( strpos($pee, '<object') !== false ) {
		$pee = preg_replace('|\s*<param([^>]*)>\s*|', "<param$1>", $pee); // no pee inside object/embed
		$pee = preg_replace('|\s*</embed>\s*|', '</embed>', $pee);
	}
	$pee = preg_replace("/\n\n+/", "\n\n", $pee); // take care of duplicates
	// make paragraphs, including one at the end
	$pees = preg_split('/\n\s*\n/', $pee, -1, PREG_SPLIT_NO_EMPTY);
	$pee = '';
	foreach ( $pees as $tinkle )
		$pee .= '<p>' . trim($tinkle, "\n") . "</p>\n";
	$pee = preg_replace('|<p>\s*</p>|', '', $pee); // under certain strange conditions it could create a P of entirely whitespace
	$pee = preg_replace('!<p>([^<]+)</(div|address|form)>!', "<p>$1</p></$2>", $pee);
	$pee = preg_replace('!<p>\s*(</?' . $allblocks . '[^>]*>)\s*</p>!', "$1", $pee); // don't pee all over a tag
	$pee = preg_replace("|<p>(<li.+?)</p>|", "$1", $pee); // problem with nested lists
	$pee = preg_replace('|<p><blockquote([^>]*)>|i', "<blockquote$1><p>", $pee);
	$pee = str_replace('</blockquote></p>', '</p></blockquote>', $pee);
	$pee = preg_replace('!<p>\s*(</?' . $allblocks . '[^>]*>)!', "$1", $pee);
	$pee = preg_replace('!(</?' . $allblocks . '[^>]*>)\s*</p>!', "$1", $pee);
	if ($br) {
		$pee = preg_replace_callback('/<(script|style).*?<\/\\1>/s', create_function('$matches', 'return str_replace("\n", "<WPPreserveNewline />", $matches[0]);'), $pee);
		$pee = preg_replace('|(?<!<br />)\s*\n|', "<br />\n", $pee); // optionally make line breaks
		$pee = str_replace('<WPPreserveNewline />', "\n", $pee);
	}
	$pee = preg_replace('!(</?' . $allblocks . '[^>]*>)\s*<br />!', "$1", $pee);
	$pee = preg_replace('!<br />(\s*</?(?:p|li|div|dl|dd|dt|th|pre|td|ul|ol)[^>]*>)!', '$1', $pee);
	if (strpos($pee, '<pre') !== false)
		$pee = preg_replace_callback('!(<pre[^>]*>)(.*?)</pre>!is', 'clean_pre', $pee );
	$pee = preg_replace( "|\n</p>$|", '</p>', $pee );

	return $pee;
}

if ($page == 1) {
	$h2orh3 = "h3";
} else {
	$h2orh3 = "h2";
}

?>