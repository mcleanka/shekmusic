<div class="tn-container">
	<div class="module-ticker-wrap clearfix">
		<div class="module-ticker-inner">
			<div id="ticker-wrapper-1516098552212" class="ticker-wrapper has-js left">
				<div id="ticker-1516098552212" class="ticker">
					<p id="ticker-content-1516098552212" class="ticker-content">
						<div class="tn-category-6">
							<div class="widget-title">
								<h3>trending this month &gt; &gt;</h3>
								<span id="tn-ticker-bar"></span>
							</div>
						</div>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
<br><br>
<div class="row">
	<div id="full-top" class="row clearfix">
		<div class="col-xs-12">
			<div id="tn-carousel-2" class="widget module-carousel-widget">
				<div id="tnslider_5a5db7589e4c7">
					<div class="module-carousel-wrap">
						<div class="tn-flexslider clearfix">
							<div class="tn-viewport">
								<ul class="tn-slides">
<?php 
	$qry = "SELECT * FROM hot_ten ORDER BY created_on DESC LIMIT 10";
	$res = $db->query($qry) or die($qry);

	while ($row=mysqli_fetch_assoc($res)):
		$name = strlen($row['title']) > 30 ? substr($row['title'], 0,30).'...' : $row['title'];
		$url = 'hot-ten-watch.php?id='.$row['id'];
		$p = 'files/hot_ten_posters/poster-'.$row['id'];
		$upload_on = date('jS F, Y', strtotime($row['created_on']));
		$gen = $row['genre'];
		$poster = is_file($p) ? $p : 'files/posters/default.jpg';

?>
	<li style="width: 225.75px !important; float: left; display: block;">
		<div class="block-carousel-wrap">
			<div class="thumb-wrap">
				<div class="thumb-overlay"></div>
				<a href="<?php echo $url ?>" title="<?php echo $name ?>" rel="bookmark">
					<img width="320" height="400" src="<?php echo $poster ?>" class="attachment-module_5_thumb size-module_5_thumb wp-post-image" alt="<?php echo $name ?>">
				</a>
				<div class="block-carousel-content">
					<h3 class="block-title">
						<a href="<?php echo $url ?>" title="DOWNLOAD <?php echo $name ?>">DOWNLOAD <?php echo $name ?></a>
					</h3>
					<div class="block1-meta-tag">
						<ul class="post-categories">
							<li><?php echo $gen; ?></li>
						</ul>
						<ul class="post-meta">
							<li class="date-post-meta"><span>/</span><time class="date updated" datetime="2016-10-27T09:15:30+00:00"><?php echo $upload_on ?></time></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</li>
<?php endwhile; ?>
	</ul>
</div>
					<ul class="tn-direction-nav">
						<li><a class="tn-prev" href="#"><i class="fa fa-angle-double-left"></i></a></li>
						<li><a class="tn-next" href="#"><i class="fa fa-angle-double-right"></i></a></li>
					</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
