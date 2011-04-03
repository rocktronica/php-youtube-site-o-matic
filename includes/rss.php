<?php header("Content-Type: text/xml"); ?>
<rss version="2.0"
	xmlns:content="http://purl.org/rss/1.0/modules/content/"
	xmlns:wfw="http://wellformedweb.org/CommentAPI/"
	xmlns:dc="http://purl.org/dc/elements/1.1/"
	xmlns:atom="http://www.w3.org/2005/Atom"
	xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
	xmlns:slash="http://purl.org/rss/1.0/modules/slash/">
	<channel>
		<title><?php echo $uservar_sitename; ?></title>
		<atom:link href="http://<?php echo $uservar_url; ?>/?page=rss" rel="self" type="application/rss+xml" />
		<link><?php echo $uservar_url; ?></link>
		<language>en</language>
		<?php foreach ($youtube->feed->entry as $video) {
			$id = basename($video->id); ?> 
			<item>
				<title><?php echo stripbranding($video->title); ?></title>
				<link>http://<?php echo $uservar_url."/?id=".$id; ?></link>
				<pubDate><?php echo $video->published; ?></pubDate>
				<description><![CDATA[
					<p><object width="640" height="385"><param name="movie" value="http://www.youtube.com/v/<?php echo $id; ?>&hl=en_US&fs=1"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/<?php echo $id; ?>&hl=en_US&fs=1" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="640" height="385"></embed></object></description>
					<?php echo wpautop(stripbranding($video->content)); ?>
				]]></description>
			</item>
		<?php } ?>
	</channel>
</rss>
