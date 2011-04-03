<?php if ($page == 1) { 
	$video = $youtube->feed->entry[0];
	$id = basename($video->id); ?>
	<div class="bigvideo">
		<div class="video">
			<p><object width="<?php echo $width; ?>" height="<?php echo $height; ?>"><param name="movie" value="http://www.youtube.com/v/<?php echo $id; ?>&hl=en_US&fs=1&rel=0&showinfo=0"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/<?php echo $id; ?>&hl=en_US&fs=1&rel=0&showinfo=0" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="<?php echo $width; ?>" height="<?php echo $height; ?>"></embed></object></p>
		</div>
		<div class="content">
			<h2><a href="?id=<?php echo $id; ?>"><?php echo $video->title; ?></a></h2>
			<?php echo firstp($video->content); ?>
			<p class="published"><?php echo date("F j, Y",strtotime(substr($video->published,0,10))); ?>.</p>
			<p><a href="?id=<?php echo $id; ?>">More...</a></p>
		</div>
	</div>
	<h2 class="clear">Other Videos</h2>
<?php } ?>
<ul id="videos">
	<?php $i = 1;
	foreach ($youtube->feed->entry as $video) {
		if (($i !== 1) || ($page !== 1)) {
			$id = basename($video->id); ?> 
			<li>
				<div class="thumbnail">
					<a href="?id=<?php echo $id; ?>"><img src="http://i.ytimg.com/vi/<?php echo $id; ?>/default.jpg" alt="<?php echo $video->title; ?>" width="120" height="90" /></a>
				</div>
				<div class="content">
					<<?php echo $h2orh3; ?>><a href="?id=<?php echo $id; ?>"><?php echo $video->title; ?></a></<?php echo $h2orh3; ?>>
					<?php echo firstp($video->content); ?>
					<p class="published"><?php echo date("F j, Y",strtotime(substr($video->published,0,10))); ?></p>
				</div>
			</li>
		<?php }
		$i++;
	}?>
</ul>
<div class="navigation clear">
	<?php if (!(count($youtube->feed->entry) < $uservar_count)) { ?><p class="alignleft"><a href="/?p=<?php echo $page+1;?>">Previous Videos</a></p><?php } ?>
	<?php if ($page !== 1) { ?><p class="alignright"><a href="/<?php if ($page > 2) { echo "?p=".($page-1); } ?>">Next Videos</a></p><?php } ?>
</div>
