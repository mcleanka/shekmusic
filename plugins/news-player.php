<?php
	require_once('../cores/connect.php');
	require_once('../cores/functions.php');

	if (!isset($_GET['id'])) {
		echo "<div class='title-404'>Error! No Audio Selected</div>";
		exit();
	}

	$pg = "e_news.php";
	$id = $_GET['id'];
	$title = $_GET['title'];

	$res = $db->query("SELECT * FROM e_news WHERE id = $id AND title = '$title';");

	if ($res->num_rows == 0) {
		die("<div class='title-404'>Error 404. Audio Not Found</div>");
	}

	while ($row = mysqli_fetch_assoc($res)) {
		$path 	= '../files/'.$row['video_path'];
		$type	= substr($row['video_mime'], 6);
		$name = strlen($row['title']) > 30 ? substr($row['title'], 0,30).'...' : $row['title'];
		$url = 'plugins/news-player.php?id='.$row['id'].'&amp;title='.$row['title'];
		$download = 'download/event.php?id='.$row['id'].'&amp;title='.$row['title'];
		$upload_on = date('jS F, Y', strtotime($row['created_on']));
		$content = $row['content'];
		$rep = $row['reporter'];
		$upload_on 	= date('jS F, Y', strtotime($row['created_on']));
		$download_url = '../download/news.php?id='.$row['id'].'&amp;title='.$row['title'];
	}

	$poster = is_file("../files/news-posters/poster-$id") ? "../files/news-posters/poster-$id" : '../files/posters/default.png';
	$file = is_file("../files/news-posters/poster-$id") ? "src='$poster'" : "src='$poster' style='max-height: 197px; max-width: 50%; margin-left: 25%;'";
	$pgt = $title;
	load_plugins_header($pg, $pgt);
?>
<div id="main-wrapper">
	<div class="row main-content-wrap tn-section-content-wrap clearfix">
		<div id="main-content" class="tn-content-wrap col-sm-8 col-xs-12" role="main"><div class="clearfix"></div>
	<div id="module4-widget-8" class="widget module4-widget">
		<div class="widget-title"><h3>WATCH E!_NEWS: <?php echo $name; ?></h3></div>
	<div id="module4_5a5db758b37e1">
		<div class="module4-wrap">
<?php if(file_exists($path)): ?>
			<div class="row-fluid clearfix">
				<div class="col-sm-12 col-xs-12">
					<div class="block4-wrap tn-block-wrap clearfix">
				<div class="block4-content">
					<div class="block4-meta-tag">
						<div class="block4-left-meta-tag">
							<ul class="post-categories"><li>Posted On: <?php echo $upload_on; ?></li></ul> 
						</div>
						<div class="block4-right-meta-tag"><ul class="post-meta"> <li class="comment-post-meta"><span>/</span>Entertainment News</li></ul> </div>
					</div>
				</div>

						<div class="hidden-xs">
						<div class="thumb-wrap ">
							<video src="<?php echo $path ?>" width="640px" height="360px" poster="<?php echo $poster ?>" controls style="background-color:#000" type="<?php echo $type ?>"></video>
						</div><!--#thumb wrap --></div>
						<div class="col-xs-12 hidden-sm hidden-md hidden-lg">
						<div class="thumb-wrap ">
							<video src="<?php echo $path ?>" width="320" height="180" poster="<?php echo $poster ?>" controls style="background-color:#000" type="<?php echo $type ?>"></video>
						</div><!--#thumb wrap --></div>
						<div class="block4-content">
							<div class="block4-meta-tag">
								<div class="block4-left-meta-tag">
									<ul class="post-categories"><li>
										<?php $size = filesize($path)/1024/1024; if ($size <= 128): ?>
											<a style="margin-left:10px; width:100px;" class="btn btn-xs btn-info pull-right" href="download_event.php?id=<?php echo $id; ?>"><span class="fa fa-download"></span> Download</a>
										<?php endif; ?>
									</li></ul> 
								</div>
								<div class="col-sm-6 col-sm-offset-4 hidden-xs shares-to-social-thumb-inner">
											<a href="http://facebook.com/shekmusic" target="_blank" original-title="Facebook"><i class="fa fa-facebook color-facebook"></i></a>
											<a href="http://twitter.com/#" target="_blank" original-title="Twitter"><i class="fa fa-twitter color-twitter"></i></a>
											<a href="https://www.youtube.com/channel/#" target="_blank" original-title="Youtube"><i class="fa fa-youtube color-youtube"></i></a>
										</div>
							</div><br>
							<div class="widget-title"><h2>
								<?php echo $title; ?>
								<span class='hidden-sm hidden-lg hidden-md pull-right'>
								<?php $size = filesize($path)/1024/1024; if ($size <= 128): ?>
									<a href="download_event.php?id=<?php echo $id; ?>"><span class="fa fa-download"></span></a>
								<?php endif; ?>
							</span>
							</h2>
						</div>
						<span class='hidden-sm hidden-md hidden-lg'>
							<br><br><br>
						</span>
							<p class="block-title" style="color: #777; font-size: 15px;"><?php echo $content; ?></p>
						</div>
						</div>
			</div>
<?php else: ?>
<div class="row-fluid clearfix">
	<div class="col-sm-12 col-xs-12">
		<div class="block4-wrap tn-block-wrap clearfix">
			<div  class="row clearfix">
				<div class="title-404">
					Error 404. Audio not Found
				</div>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>
						</div> 
					</div>
				</div> 
			</div>
		</div>
<?php include_once ("../includes/components/related_news.php") ?>
	</div>
</div>
<?php load_plugins_footer() ?>