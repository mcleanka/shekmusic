<aside id="module-post-widget-15" class="sidebar-widget widget module-post-widget">
<div class="widget-title"><h3>Most Popular</h3></div>
<?php 
$qry = "SELECT * FROM tbl_video ORDER BY created_on DESC LIMIT 8";
$res = $db->query($qry) or die($qry); 
while ($row=mysqli_fetch_assoc($res)):
$name = strlen($row['title']) > 30 ? substr($row['title'], 0,30).'...' : $row['title'];
$url = 'watch-video.php?id='.$row['id'];
$p = 'files/posters/poster-'.$row['id'];
$upload_on = date('jS F, Y', strtotime($row['created_on']));
$poster = is_file($p) ? $p : 'file/posters/default.jpg';

?>
<div id="moduleP_5a5db7590632a">
<div class="module-post-wrap">
	<ul class="module-post-content">
		<li><div class="block6-wrap tn-block-wrap tn-category-2 clearfix"><div class="thumb-wrap"><a href="<?php echo $url; ?>" title="<?php echo $name; ?>" rel="bookmark"><img width="90" height="63" src="<?php echo $poster; ?>" class="attachment-small_thumb size-small_thumb" alt="<?php echo $name; ?>"></a></div><div class="block6-content text-capitalize"><h3 class="block-title"><a class="text-capitalize" href="<?php echo $url; ?>" title="<?php echo $name; ?>"><?php echo $name; ?></a></h3><div class="block6-meta">
			<ul class="post-categories"><li>Music Video</li></ul>
			<ul class="post-meta"><li class="date-post-meta"><span> | </span><time class="date updated" datetime="2018-01-15T23:13:28+00:00"><?php echo $upload_on; ?></time></li> <li><span>/</span><i class="fa fa-eye"></i> 8</li></ul></div></div></div>
	</li>
</ul>

</div>
</div>
<?php endwhile; ?>
</aside>