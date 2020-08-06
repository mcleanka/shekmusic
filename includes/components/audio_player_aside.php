<div id="sidebar" class="tn-sidebar-wrap col-sm-4 hidden-xs" role="complementary">
	<div class="tn-sidebar-sticky" style="width: auto; position: static; top: auto; bottom: auto;">
		<div class="clearfix"></div>
		<div class="widget-area">
			<aside id="module-post-widget-15 " class="sidebar-widget widget module-post-widget clearfix">
				<div class="widget-title">
					<h3>Favour Wedding Designers</h3>
				</div>
				<div id="moduleP_5a5db7590632a">
					<div class="module-post-wrap col-sm-4 col-xs-12">
						<div class="adv-img">
							<img class="size-medium  thumb-wrap" src="../assets/images/shekmusic (5).jpg" id="image_container" alt="Favour Wedding Designers">
<script>var myImage = document.getElementById("image_container"); var imageArray = ["../assets/images/shekmusic (5).jpg","../assets/images/shekmusic (9).jpg", "../assets/images/shekmusic (6).jpg","../assets/images/shekmusic (8).jpg","../assets/images/shekmusic (2).jpg"];var imageIndex = 0; function changeImage() {myImage.setAttribute("src",imageArray[imageIndex]); imageIndex++; if (imageIndex >= imageArray.length) {imageIndex = 0; } } var intervalHandle = setInterval(changeImage,5000); myImage.onclick = function() {clearInterval (intervalHandle); }
</script>
						</div>
					</div>
				</div>
			</aside>
			<aside id="module-post-widget-15" class="sidebar-widget widget module-post-widget">
				<div class="widget-title"><h3>recent music</h3></div>
<?php 
	$qry = "SELECT * FROM tbl_audio ORDER BY created_on DESC LIMIT 10";
	$res = $db->query($qry) or die($qry);

	while ($row=mysqli_fetch_assoc($res)):
		$title = strlen($row['title']) > 30 ? substr($row['title'], 0,20).'...' : $row['title'];
		$name = $row['artist'].' - '.$title;
		$url = '../plugins/music-player.php?id='.$row['id'].'&amp;artist='.$row['artist'];
		$p = '../files/posters/audios/poster-'.$row['id'];
		$upload_on = date('jS F, Y', strtotime($row['created_on']));

		$poster = is_file($p) ? $p : '../files/posters/default.png';
		$file = is_file($p) ? "src='$poster'" : "src='$poster' style='max-height: 149px; max-width: 44%; margin-left: 25%;'";
?>
				<div id="moduleP_5a5db7590632a">
				<div class="module-post-wrap">
					<ul class="module-post-content">
						<li><div class="block6-wrap tn-block-wrap tn-category-2 clearfix"><div class="thumb-wrap"><a href="<?php echo $url; ?>" title="<?php echo $name; ?>" rel="bookmark"><img width="90" height="63" <?php echo $file; ?> class="attachment-small_thumb size-small_thumb" alt="<?php echo $name; ?>"></a></div><div class="block6-content"><h3 class="block-title"><a href="<?php echo $url; ?>" title="<?php echo $name; ?>"><?php echo $name; ?></a></h3><div class="block6-meta"><ul class="post-categories"><li>Music</li></ul><ul class="post-meta"><li class="date-post-meta"><span>|</span><time class="date updated" datetime="2018-01-15T23:13:28+00:00"><?php echo $upload_on; ?></time></li></ul> </div></div></div>
					</li>
				</ul>

				</div>
				</div>
				<?php endwhile; ?>
				</aside>
			</div>
	<div class="clearfix"></div></div>
</div>