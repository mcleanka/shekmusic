<?php
require_once('connections/connect.php');
require_once('connections/functions.php');

if (!isset($_GET['id'])) {
	echo "ERROR! No Video Selected";
	exit();
}
$id = mysqli_real_escape_string($db,$_GET['id']);
$res = $db->query("SELECT * FROM hot_ten WHERE id=$id");

if ($res->num_rows == 0) {
	die("Error 404. Video Not Found");
}
while ($row = mysqli_fetch_assoc($res)) {
	$name 	= $row['title'];
	$path 	= $row['video_path'];
	$type	= $row['video_mime'];
	$gen	= $row['genre'];
	$prod	= $row['producer'];
	$desc	= $row['description'];
	$time 	= date('jS F, Y', strtotime($row['created_on']));
}

//get poster
$poster = is_file("hot_ten_posters/poster-$id") ? "hot_ten_posters/poster-$id" : 'posters/default.png';

$pt = $name;
require_once 'includes/header.php'; 
?>
<div class="tn-main-page-wrap"> 
<?php include_once("./includes/mobile_mainnav.php") ?>
<div class="tn-main-container">
<?php include_once("./includes/mainnav.php") ?>
<div id="main-wrapper" class="tn-container">
	<div class="row  container-fluid">
		<div class="row tn-section-content-wrap clearfix">
			<div id="main-content" class="tn-content-wrap col-sm-8 col-xs-12 clearfix" role="main">
				<div class="clearfix"></div>
				<div class="cate-page-title-wrap tn-category-5">
					<h1 class="cate-title">Events</h1>
						<div class="cate-description">
							<p>NOTE: All videos are of High Quality... download them all for free by clicking the link of respective video.</p>
						</div>
				</div>
				<div class="right-content-heading-right">
					<div class="social-icons" style="margin-top:17px; border-bottom:solid #f2f2f2 1px ">
		                <ul>
		                    <li><a class="facebook" href="#" target="_blank"> </a></li>
		                    <li><a class="twitter" href="#" target="_blank"></a></li>
		                    <li><a class="googleplus" href="#" target="_blank"></a></li>
		                    <li><a class="pinterest" href="#" target="_blank"></a></li>
		                    <li><a class="dribbble" href="#" target="_blank"></a></li>
		                    <li><a class="vimeo" href="#" target="_blank"></a></li>
		                </ul>
					</div>
				</div>
				<?php if(file_exists($path)): ?>	
				<div class="module-blog-wrap">
					<div class="block2-wrap tn-block-wrap row clearfix">
						<div class="block-thumb-inner col-sm-6 col-xs-12">
							<div class="thumb-wrap">
								<a href="<?php echo $url; ?>" title="<?php echo $name; ?>" rel="bookmark"><span class="post-format"><i class="fa fa-file-text"></i></span><img width="320" height="180" src="<?php echo $poster; ?>" class="attachment-module_medium_thumb size-module_medium_thumb wp-post-image" alt="<?php echo $name; ?>" ></a>
							</div><!--#thumb wrap-->
						</div>
						<div class="block2-content col-sm-6 col-xs-12">
							<h3 class="block-title"><a href="<?php echo $url; ?>" title="<?php echo $name; ?>">DOWNLOAD: <?php echo $name; ?></a></h3>
							<div class="block1-meta-tag">
								<ul class="post-meta">
									<li class="date-post-meta"><span>/</span><time class="date updated" datetime="2018-01-16T07:59:54+00:00"><?php echo $time; ?></time></li> 
								</ul> 
							</div>
							<p><?php echo $desc; ?> </p> <br>
							<p>Produced by <?php echo $gen; ?> </p>
						</div>
					</div>
				</div><!-- #blog-wrap -->

				<?php $size = filesize($path)/1024/1024; if ($size <= 128): ?>
					<a class="btn btn-sm btn-success pull-right" href="download-video?id=<?php echo $id; ?>"><span class="glyphicon glyphicon-download"></span> Download</a>
				<?php endif; ?>	 				
			</p>

			<?php $size = filesize($path)/1024/1024; if ($size > 128): ?>
				<div class="alert alert-danger alert-dismissable">  
				    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>  
				    Video Too Large for Direct Download. Try Using <a href="http://www.eagleget.com/download">Eagle Get</a> Downloader
				 </div>  
					<?php endif; ?>
				</div>
			<?php else: ?>
				Error 404. Video Cannot Be Found
			<?php endif; ?>
		</div>
	</div>
<div class="clearfix"></div><!--#main-content-->

<?php include_once("includes/page_aside.php") ?>
		</div><!--#row-->

</div>
	</div>
</div>
<?php load_footer(); ?>