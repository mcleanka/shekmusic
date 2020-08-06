<?php
	require_once('../cores/connect.php');
	require_once('../cores/functions.php');

	if (!isset($_GET['id'])) {
		echo "<div class='title-404'>Error! No Audio Selected</div>";
		exit();
	}

	$pg = "music.php";
	$id = $_GET['id'];
	$artist = $_GET['artist'];

	$res = $db->query("SELECT * FROM tbl_audio WHERE id = $id AND artist = '$artist';");

	if ($res->num_rows == 0) {
		die("<div class='title-404'>Error 404. Audio Not Found</div>");
	}

	while ($row = mysqli_fetch_assoc($res)) {
		$path 	= '../files/'.$row['audio_path'];
		$name = strlen($row['title']) > 30 ? substr($row['title'], 0,30).'...' : $row['title'];
		$type	= substr($row['audio_mime'], 6);
		$prod	= $row['producer'];
		$gen	= $row['genre'];
		$title	= $row['artist'].' - '.$row['title'];
		$desc 	= $row['description'];
		$upload_on 	= date('jS F, Y', strtotime($row['created_on']));
		$download_url = '../download/audio.php?id='.$row['id'].'&amp;artist='.$row['artist'];
	}

	$poster = is_file("../files/posters/audios/poster-$id") ? "../files/posters/audios/poster-$id" : '../files/posters/default.png';
	$file = is_file("../files/posters/audios/poster-$id") ? "src='$poster'" : "src='$poster' style='max-height: 197px; max-width: 50%; margin-left: 25%;'";
	$pgt = $title;
	load_plugins_header($pg, $pgt);
?>
<div id="main-wrapper">
	<div class="row main-content-wrap tn-section-content-wrap clearfix">
		<div id="main-content" class="tn-content-wrap col-sm-8 col-xs-12" role="main">
			<div class="clearfix"></div>
				<div id="module4-widget-8" class="widget module4-widget">
					<div class="widget-title"><h3>Music: <?php echo $title; ?></h3></div>
						<div id="module4_5a5db758b37e1">
							<div class="module4-wrap">
<?php if(file_exists($path)): ?>
<div class="row-fluid clearfix">
	<div class="col-sm-12 col-xs-12">
		<div class="block4-wrap tn-block-wrap clearfix">
			<div  class="row clearfix">
				<div class="col-sm-6 col-xs-12">
					<div class="mr-player-1">
						<div class="block4-content">
						<div class="block4-meta-tag">
							<div class="block4-left-meta-tag">
								<ul class="post-categories">
									<li>Uploaded on: <?php echo $upload_on; ?></li>
								</ul> 
							</div>
							<div class="block4-right-meta-tag">
								<ul class="post-meta">
									<li class="comment-post-meta"><span>|</span><?php echo $gen; ?></li>
								</ul>
							</div>
						</div>
					</div>
						<div class="thumb-wrap">
							<img <?php echo($file) ?> title="<?php echo($name) ?>" alt="<?php echo($name) ?>">
							<audio src="<?php echo $path ?>" class='w-full' type="<?php echo $type ?>"  controls></audio>
							<div class="input-group w-full">
								<pre class="w-full px-y-1 comment-wrap">
									<p class="pb-0"><span class="text-danger">*</span>Leave a comment <span class="text-danger">*</span></p>
                                <input id="btn-input" type="text" class="form-control input-sm input-comment" placeholder="Type your comment here..." />
                                <span class="input-group-btn pull-right comment-btn">
                                    <button class="btn btn-info btn-sm" id="btn-chat" title="Send comment">
                                        <i class="fa fa-send"></i>
                                    </button>
                                </span>
                                </pre>
                            </div>	
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-xs-12">
					<table class="table text-capitalize text-center" style="margin-top: 0px;  border: none;">
						<tbody>
						<tr><td><i class="fa fa-user pr-1"></i> Producer</td><td><?php echo($prod) ?></td></tr>
						<tr><td><i class="fa fa-music pr-1"></i> Genre</td><td><?php echo($gen) ?></td></tr>
						<tr><td><i class="fa fa-film pr-1"></i> Type</td><td><?php echo($type) ?></td></tr>
						<tr><td><i class="fa fa-download pr-1"></i> Downloads</td><td>748</td></tr>
						<tr><td><i class="fa fa-eye pr-1"></i> Views</td><td>84</td></tr>
						<tr><td><i class="fa fa-comment-o pr-1"></i> Comments</td><td>12</td></tr>

						<tr><td><i class="fa fa-smile-o pr-1"></i> likes </td><td> 9 <i class="fa fa-thumbs-o-up pr-2"></i> 0 <i class="fa fa-thumbs-o-down"></i></td></tr>

						<tr><td><i class="fa fa-fire  pr-1"></i> Rating</td><td><i class="fa  fa-star pr-1 text-warning"></i> <i class="fa  fa-star pr-1 text-warning"></i> <i class="fa  fa-star pr-1 text-warning"></i> <i class="fa  fa-star pr-1 text-warning"></i> <i class="fa  fa-star pr-1 text-warning"></i></td></tr>

						<tr><td><i class="fa fa-share-alt"></i> Share</td><td>
							<div class="shares-to-social-thumb-inner">
								<a class="" href="<?php echo($download_url) ?>"><i class="fa fa-download color-download" title="Download"></i></a>
								<a href="https://facebook.com/shekmusic" target="_blank" original-title="Facebook"><i class="fa fa-facebook color-facebook"></i></a>
								<a href="https://www.youtube.com/channel/#" target="_blank" original-title="Youtube"><i class="fa fa-youtube color-youtube"></i></a>
							</div>
						</td></tr>

						</tbody>
					</table>
				</div>
			</div>
			<div class="block4-content">
				<p class="block-title" style="color: #777; font-size: 15px;"><?php echo $desc; ?></p>
			</div>
			<div class="cate-page-title-wrap pt-4 hidden-xs mx--2">
				<div class="cate-title" style="margin: 0 30%;">
					<span>
						you may also like
					</span>
				</div>
				<div id="module3-widget-6" class="widget module3-widget row">
					<div id="module3_5a5db758ce5df">
						<div class="module3-wrap">
							<div class="row-fluid clearfix">
<?php 
	$qry = "SELECT * FROM tbl_audio WHERE artist = '$artist' AND id <> $id ORDER BY created_on DESC LIMIT 6";
	$res = $db->query($qry) or die($qry);
	 
	while ($row=mysqli_fetch_assoc($res)):
		$title = strlen($row['title']) > 30 ? substr($row['title'], 0,20).'...' : $row['title'];
		$name = $row['artist'].' - '.$title;
		$url = 'music-player.php?id='.$row['id'].'&amp;artist='.$row['artist'];
		$p = '../files/posters/audios/poster-'.$row['id'];
		$upload_on = date('jS F, Y', strtotime($row['created_on']));
		$poster = is_file($p) ? $p : '../files/posters/default.jpg';

?>
	<div class="col-sm-6 col-xs-12">
		<div class="block6-wrap tn-block-wrap tn-category-6 clearfix">
			<div class="thumb-wrap">
				<a href="<?php echo $url; ?>" title="<?php echo $name; ?>" rel="bookmark"><img width="90" height="30" src="<?php echo $poster; ?>" class="attachment-small_thumb size-small_thumb wp-post-image" alt="<?php echo $name; ?>"></a>
			</div>
			<div class="block6-content">
				<h3 class="block-title"><a href="<?php echo $url; ?>" title="<?php echo $name; ?>"><?php echo $name; ?></a></h3><div class="block6-meta"><ul class="post-categories"><li>Music</li></ul><ul class="post-meta"><li class="date-post-meta"><span>|</span><time class="date updated"><?php echo $upload_on; ?></time></li></ul> </div>
			</div>
		</div>
	</div>
<?php endwhile; ?>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 px-2">
        	<button type="button" class="btn btn-outline btn-default btn-lg btn-block">Read comments</button>
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
<?php include_once ("../includes/components/audio_player_aside.php") ?>
	</div>
</div>
<?php load_plugins_footer() ?>
