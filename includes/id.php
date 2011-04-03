<div class="bigvideo">
	<div class="video">
		<p><object width="<?php echo $width; ?>" height="<?php echo $height; ?>"><param name="movie" value="http://www.youtube.com/v/<?php echo $id; ?>&hl=en_US&fs=1&rel=0&showinfo=0"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/<?php echo $id; ?>&hl=en_US&fs=1&rel=0&showinfo=0" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="<?php echo $width; ?>" height="<?php echo $height; ?>"></embed></object></p>
	</div>
	<div class="content">
		<h2><a href="?id=<?php echo $id; ?>"><?php echo stripbranding($youtube->feed->title); ?></a></h2>
		<?php echo wpautop(stripbranding($youtube->feed->content)); ?>
		<p class="published"><?php echo date("F j, Y",strtotime(substr($youtube->feed->published,0,10))); ?>.</p>
	</div>
</div>
<div class="commentsbox">
	<h3>YouTube Comments</h3>
	<?php $comments->username=$uservar_account;
	$comments->feedUrl=$url="http://gdata.youtube.com/feeds/api/videos/$id/comments";
	$comments->feed=simplexml_load_file($url);
	if (count($comments->feed->entry) > 0) { ?>
		<ol class="comments"><?php 	for ($i = count($comments->feed->entry)-1; $i >= 0; $i--) { ?>
		<li>
			<blockquote>
				<?php echo wpautop($comments->feed->entry[$i]->content); ?>
			</blockquote>
			<p class="em"><cite><a href="http://youtube.com/<?php echo basename($comments->feed->entry[$i]->author->uri); ?>"><?php echo $comments->feed->entry[$i]->author->name; ?></a></cite> on <?php echo date("F j, Y",strtotime(substr($comments->feed->entry[$i]->published,0,10))); ?></p>
		</li>
		<?php } ?></ol>
	<?php } else { ?>
		<p>None yet. :(</p>
	<?php } ?>
</div>
<div class="embedbox">
	<h3>Embed</h3>
	<p><textarea class="textinput embedcode">&lt;object width="640" height="385"&gt;&lt;param name="movie" value="http://www.youtube.com/v/<?php echo $id; ?>&hl=en_US&fs=1"&gt;&lt;/param&gt;&lt;param name="allowFullScreen" value="true"&gt;&lt;/param&gt;&lt;param name="allowscriptaccess" value="always"&gt;&lt;/param&gt;&lt;embed src="http://www.youtube.com/v/<?php echo $id; ?>&hl=en_US&fs=1" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="640" height="385"&gt;&lt;/embed&gt;&lt;/object&gt;</textarea></p>
	<p>Visit <a href="http://www.youtube.com/watch?v=<?php echo $id; ?>"><?php echo stripbranding($youtube->feed->title); ?></a> on YouTube to rate, comment, or get a customizable embed.</p>
</div>
<?php echo $video->published; ?>