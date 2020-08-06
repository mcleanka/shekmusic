<div id="module3-widget-6" class="widget module3-widget">
<div class="tn-category-6"><div class="widget-title"><h3>E! NEWS</h3></div></div><!--#color title-->
<div id="module3_5a5db758ce5df">
	<div class="module3-wrap">
		<div class="row-fluid clearfix"><!--row fluid -->
<?php 
$qry = "SELECT * FROM e_news ORDER BY created_on DESC LIMIT 2";
$res = $db->query($qry) or die($qry);
?>

<?php 
while ($row=mysqli_fetch_assoc($res)):
$name = strlen($row['title']) > 30 ? substr($row['title'], 0, 40).'...' : $row['title'];
$url = 'watch-news.php?id='.$row['id'];
$p = 'files/news-posters/poster-'.$row['id'];
$cont = strlen($row['content']) > 100 ? substr($row['content'], 0, 250).'<div class="readmore"><a href="'.$url.'">Read more</a></div>' : $row['content'];
$upload_on = date('jS F, Y', strtotime($row['created_on']));
		$poster = is_file($p) ? $p : 'files/posters/default.png';

		$file = is_file($p) ? "src='$poster'" : "src='$poster' style='max-height: 149px; max-width: 44%; margin-left: 25%;'";

?>
		<div class="col-sm-6 col-xs-12">
				<div class="block1-wrap tn-block-wrap tn-category-6 clearfix">
					<div class="thumb-wrap"><a href="<?php echo $url; ?>" title="<?php echo $name; ?>"><span class="post-format"><i class="fa fa-file-text"></i></span><img <?php echo $file ?> class="attachment-module_medium_thumb size-module_medium_thumb wp-post-image" alt="<?php echo $name; ?>"></a></div>
					<div class="block1-content"><h3 class="block-title"><a href="<?php echo $url; ?>" title="<?php echo $name; ?>"><?php echo $name; ?></a></h3><div class="block1-meta-tag"><ul class="post-categories"><li>E! News</li></ul><ul class="post-meta"><li class="date-post-meta"><span>/</span><time class="date updated"><?php echo $upload_on; ?></time></li></ul> </div><p><?php echo $cont; ?></p>

		</div>
	</div>
</div>
<?php endwhile; ?>
		</div>

	<div class="row-fluid clearfix">
<?php 
	$qry = "SELECT * FROM e_news ORDER BY created_on DESC LIMIT 2,6";
	$res = $db->query($qry) or die($qry);
 
	while ($row=mysqli_fetch_assoc($res)):
		$name = strlen($row['title']) > 100 ? substr($row['title'], 0,100).'...' : $row['title'];
		$url = 'plugins/news-player.php?id='.$row['id'].'&amp;title='.$row['title'];
		$p = 'files/posters/news/poster-'.$row['id'];
		$upload_on = date('jS F, Y', strtotime($row['created_on']));
		$poster = is_file($p) ? $p : 'files/posters/default.png';

		$file = is_file($p) ? "src='$poster'" : "src='$poster' style='max-height: 149px; max-width: 44%; margin-left: 25%;'";

?>
	<div class="col-sm-6 col-xs-12">
		<div class="block6-wrap tn-block-wrap tn-category-6 clearfix"><div class="thumb-wrap"><a href="<?php echo $url; ?>" title="<?php echo $name; ?>" rel="bookmark"><img <?php echo $file ?> class="attachment-small_thumb size-small_thumb wp-post-image" alt="<?php echo $name; ?>"></a></div><div class="block6-content"><h3 class="block-title"><a href="<?php echo $url; ?>" title="<?php echo $name; ?>"><?php echo $name; ?></a></h3><div class="block6-meta"><ul class="post-categories"><li>E! News</li></ul><ul class="post-meta"><li class="date-post-meta"><span>/</span><time class="date updated"><?php echo $upload_on; ?></time></li></ul> </div></div></div>
	</div>
<?php endwhile; ?>
</div>
</div></div>
</div></div>