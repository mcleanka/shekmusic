<div id="module1-widget-4" class="widget module1-widget">
	<div class="tn-category-3">
		<div class="widget-title">
			<h3>LATEST MUSIC</h3>
		</div>
	</div>
	<div id="module1_5a5db758c1e21" class="row">
		<div class="module1-wrap">
			<div class="col-sm-6 col-xs-12">
<?php 
	$qry = "SELECT * FROM tbl_audio ORDER BY created_on DESC LIMIT 1";
	$res = $db->query($qry) or die($qry);

	while ($row=mysqli_fetch_assoc($res)):
		$title = strlen($row['title']) > 30 ? substr($row['title'], 0,30).'...' : $row['title'];
		$name = $row['artist'].' - '.$title;
		$url = 'plugins/music-player.php?id='.$row['id'].'&amp;artist='.$row['artist'];
		$p = 'files/posters/audios/poster-'.$row['id'];
		$upload_on = date('jS F, Y', strtotime($row['created_on']));
		$prod = $row['producer'];
		$desc = strlen($row['description']) > 50 ? substr($row['description'], 0, 200).'...' : $row['description'];
		$genre = $row['genre'];
		$poster = is_file($p) ? $p : 'files/posters/default.png';

		$file = is_file($p) ? "src='$poster'" : "src='$poster' style='max-height: 149px; max-width: 44%; margin-left: 25%;'";
?>

<div class="block1-wrap tn-block-wrap tn-category-57 clearfix">
<div class="thumb-wrap">
<a href="<?php echo $url; ?>" title="<?php echo $name; ?>" rel="bookmark"><span class="post-format"><i class="fa fa-file-text"></i></span><img width="320" height="225" <?php echo $file; ?> class="attachment-module_big_thumb size-module_big_thumb wp-post-image" alt="<?php echo $name; ?>" sizes="(max-width: 320px) 100vw, 320px"> </a>
</div>
<div class="block1-content"><h3 class="block-title"><a href="<?php echo $url; ?>" title="<?php echo $name; ?>"><?php echo $name; ?></a></h3><div class="block1-meta-tag"><ul class="post-categories"><li>Music:</li></ul><ul class="post-meta"><li class="date-post-meta"><span><?php echo($genre) ?></span></li> <li class="comment-post-meta"><span> | <?php echo $upload_on; ?></span></li></ul> </div><p><?php echo $desc; ?></p>
</div>
</div>
<?php endwhile; ?>
</div>

<div class="col-sm-6 col-xs-12">
<?php 
	$qry = "SELECT * FROM tbl_audio ORDER BY created_on DESC LIMIT 1,5";
	$res = $db->query($qry) or die($qry);

	while ($row=mysqli_fetch_assoc($res)):
		$title = strlen($row['title']) > 30 ? substr($row['title'], 0,30).'...' : $row['title'];
		$name = $row['artist'].' - '.$title;
		$url = 'plugins/music-player.php?id='.$row['id'].'&amp;artist='.$row['artist'];
		$p = 'files/posters/audios/poster-'.$row['id'];
		$upload_on 	= date('jS F, Y', strtotime($row['created_on']));
		$poster = is_file($p) ? $p : 'files/posters/default.png';

		$file = is_file($p) ? "src='$poster'" : "src='$poster' style='max-height: 149px; max-width: 44%; margin-left: 25%;'";

?>
<div class="block6-wrap tn-block-wrap clearfix"><div class="thumb-wrap"><a href="<?php echo $url; ?>" title="Video: <?php echo $name; ?>" rel="bookmark"><img width="90" height="63" <?php echo($file) ?> class="attachment-small_thumb size-small_thumb wp-post-image" alt="<?php echo $name; ?>" sizes="(max-width: 90px) 100vw, 90px"></a></div>
<div class="block6-content"><h3 class="block-title"><a href="<?php echo $url; ?>" title="<?php echo $name; ?>"><?php echo $name; ?></a></h3><div class="block6-meta"><ul class="post-categories"><li>Music: </li></ul><ul class="post-meta"><li class="date-post-meta"><span><?php echo($genre) ?> | </span><time class="date updated"><?php echo $upload_on; ?></time></li></ul> </div></div></div>
<?php endwhile; ?>
</div></div></div>
		</div>
