<div class="row main-content-wrap tn-section-content-wrap clearfix">
	<div id="main-content" class="tn-content-wrap col-sm-8 col-xs-12" role="main">
		<div class="clearfix"></div>
		<div id="module4-widget-8" class="widget module4-widget">
			<div class="widget-title"><h3>NEW VIDEOS</h3></div>
				<div id="module4_5a5db758b37e1">
					<div class="module4-wrap">
						<div class="row-fluid clearfix">
<?php 
	$qry = "SELECT * FROM tbl_video ORDER BY created_on DESC LIMIT 6";
	$res = $db->query($qry) or die($qry);

	while ($row=mysqli_fetch_assoc($res)):
		$title = strlen($row['title']) > 30 ? substr($row['title'], 0,30).'...' : $row['title'];
		$name = $row['artist'].' - '.$title;
		$url = 'plugins/video-player.php?id='.$row['id'].'&amp;artist='.$row['artist'];
		$p = 'files/posters/poster-'.$row['id'];
		$upload_on = date('jS F, Y', strtotime($row['created_on']));
		$prod = $row['producer'];
		$desc = strlen($row['description']) > 50 ? substr($row['description'], 0, 200).'...' : $row['description'];
		$genre = $row['genre'];
		$poster = is_file($p) ? $p : 'files/posters/default.png';

		$file = is_file($p) ? "src='$poster'" : "src='$poster' style='max-height: 140px; max-width: 44%; margin-left: 25%;'";
?>
		<div class="col-sm-4 col-xs-12"> <div class="block4-wrap tn-block-wrap clearfix"> <div class="thumb-wrap"> <a href="<?php echo $url; ?>" title="Download <?php echo $name; ?>" rel="bookmark"> <span class="post-format"><i class="fa fa-play"></i></span>
			<img <?php echo($file) ?> class="attachment-module_medium_thumb size-module_medium_thumb" alt="<?php echo $name; ?>"> </a> </div> <div class="block4-content"> <div class="block4-meta-tag"> <div class="block4-left-meta-tag"> <ul class="post-categories"><li><?php echo $gen; ?></li></ul> <ul class="post-meta"> <li class="date-post-meta"><span>/</span><time class="date updated" datetime="2018-01-16T08:13:05+00:00"><?php echo $upload_on; ?></time></li> </ul> </div> <div class="block4-right-meta-tag"> <ul class="post-meta"><li class="comment-post-meta"><span>/</span><?php echo $gen; ?></li></ul> </div> </div> <h3 class="block-title"><a href="<?php echo $url ?>" title="<?php echo $name; ?>">Download <?php echo $name; ?></a></h3></div> </div> </div>
<?php endwhile; ?>
	</div>
<div class="row-fluid clearfix">
<?php 
	$qry = "SELECT * FROM tbl_video ORDER BY created_on DESC LIMIT 6, 3";
	$res = $db->query($qry) or die($qry);

	while ($row=mysqli_fetch_assoc($res)):
		$title = strlen($row['title']) > 30 ? substr($row['title'], 0,30).'...' : $row['title'];
		$name = $row['artist'].' - '.$title;
		$url = 'plugins/video-player.php?id='.$row['id'].'&amp;artist='.$row['artist'];
		$p = 'files/posters/poster-'.$row['id'];
		$upload_on = date('jS F, Y', strtotime($row['created_on']));
		$prod = $row['producer'];
		$desc = strlen($row['description']) > 50 ? substr($row['description'], 0, 200).'...' : $row['description'];
		$genre = $row['genre'];
		$poster = is_file($p) ? $p : 'files/posters/default.png';

		$file = is_file($p) ? "src='$poster'" : "src='$poster' style='max-height: 140px; max-width: 44%; margin-left: 25%;'";
?>
		<div class="col-sm-4 col-xs-12"> <div class="block4-wrap tn-block-wrap clearfix"> <div class="thumb-wrap"> <a href="<?php echo $url; ?>" title="Download <?php echo $name; ?>" rel="bookmark"> <span class="post-format"><i class="fa fa-play"></i></span>
			<img <?php echo($file) ?> class="attachment-module_medium_thumb size-module_medium_thumb" alt="<?php echo $name; ?>"> </a> </div> <div class="block4-content"> <div class="block4-meta-tag"> <div class="block4-left-meta-tag"> <ul class="post-categories"><li><?php echo $gen; ?></li></ul> <ul class="post-meta"> <li class="date-post-meta"><span>/</span><time class="date updated" datetime="2018-01-16T08:13:05+00:00"><?php echo $upload_on; ?></time></li> </ul> </div> <div class="block4-right-meta-tag"> <ul class="post-meta"><li class="comment-post-meta"><span>/</span><?php echo $gen; ?></li></ul> </div> </div> <h3 class="block-title"><a href="<?php echo $url ?>" title="<?php echo $name; ?>">Download <?php echo $name; ?></a></h3></div> </div> </div>
<?php endwhile; ?>
	</div>
		</div>
	</div>
</div>
