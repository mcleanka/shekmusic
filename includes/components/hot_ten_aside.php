<div id="sidebar" class="tn-sidebar-wrap col-sm-4 hidden-xs" role="complementary">
	<div class="tn-sidebar-sticky" style="width: auto; position: static; top: auto; bottom: auto;">
		<div class="clearfix"></div>
		<div class="widget-area"> 
			<aside id="module-post-widget-15" class="sidebar-widget widget module-post-widget">
				<div class="widget-title"><h3>more artists</h3></div>
<?php 
	$qry = "SELECT * FROM hot_ten ORDER BY created_on DESC LIMIT 10";
	$res = $db->query($qry) or die($qry);
	while ($row=mysqli_fetch_assoc($res)):
		$name = strlen($row['title']) > 30 ? substr($row['title'], 0,30).'...' : $row['title'];
		$url = 'hot-ten-watch.php?id='.$row['id'];
		$p = 'hot_ten_posters/poster-'.$row['id'];
		$upload_on = date('jS F, Y', strtotime($row['created_on']));
		$poster = is_file($p) ? $p : 'posters/default.jpg';
		$desc = strlen($row['description']) > 10 ? substr($row['description'], 0,84).'...' : $row['description'];
?>
				<div id="moduleP_5a5db7590632a">
					<div class="module-post-wrap">
						<ul class="module-post-content">
							<li>
								<div class="block6-wrap tn-block-wrap tn-category-2 clearfix">
									<div class="thumb-wrap">
										<a href="<?php echo $url; ?>" title="<?php echo $name; ?>" rel="bookmark">
											<img width="90" height="63" src="<?php echo $poster; ?>" class="attachment-small_thumb size-small_thumb" alt="<?php echo $name; ?>">
										</a>
									</div>
									<div class="block6-content">
										<h3 class="block-title">
											<a href="<?php echo $url; ?>" title="<?php echo $name; ?>"><?php echo $name; ?></a>
										</h3>
										<div class="block6-meta">
											<ul class="post-categories"><li>Music</li></ul>
											<ul class="post-meta">
												<li class="date-post-meta">
													<span>/</span><time class="date updated" datetime="2018-01-15T23:13:28+00:00"><?php echo $upload_on; ?></time>
												</li>
											</ul>
											<ul class="post-categories"><li> <?php echo $desc; ?> </li>
											</ul>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
<?php endwhile; ?>
			</aside>
		</div>
		<div class="clearfix"></div>
	</div>
</div>