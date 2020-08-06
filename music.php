<?php
	require_once('cores/connect.php');
	require_once('cores/functions.php');
	$pgt = "Music";
	$pg = "music.php";
	load_header($pg, $pgt);

	$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
	$per_page = 10;
	$start = ($page > 1) ? ($page * $per_page) - $per_page : 0;

	$total = $db->query("SELECT count(id) as total FROM tbl_audio")->fetch_assoc()['total'];
	$pages = ceil($total/$per_page);
	if($page>$pages){
		$page=$pages;
	}
	if($page<0){
		$page = 1;
	}
?>
<div class="row  container-fluid">
	<div class="row tn-section-content-wrap clearfix">
		<div id="main-content" class="tn-content-wrap col-sm-8 col-xs-12 clearfix" role="main"><div class="clearfix"></div>
			<div class="cate-page-title-wrap tn-category-5">
				<h1 class="cate-title">music mp3</h1>
					<div class="cate-description">
						<p>NOTE: All <b>audios</b> are of High Quality... download them all for free by clicking the link of respective audio.</p>
					</div>
			</div>
<?php
$qry = "SELECT * FROM tbl_audio ORDER BY created_on DESC LIMIT $start, $per_page";
$res = $db->query($qry) or die($qry);
$count = 1;

while ($row=mysqli_fetch_assoc($res)):
$title = strlen($row['title']) > 30 ? substr($row['title'], 0, 50).' ...' : $row['title'];
$name = $row['artist'].' - '.$title;
$url = 'plugins/music-player.php?id='.$row['id'].'&amp;artist='.$row['artist'];
$download = 'download/audio.php?id='.$row['id'].'&amp;artist='.$row['artist'];
$upload_on = date('jS F, Y', strtotime($row['created_on']));
$description = strlen($row['description']) > 30 ? substr($row['description'], 0, 200).' ...' : $row['description'];
$prod = $row['producer'];
$gen = $row['genre'];
$p = 'files/posters/audios/poster-'.$row['id'];
$poster = is_file($p) ? $p : 'files/posters/default.png';

$file = is_file($p) ? "src='$poster'" : "src='$poster' style='max-height: 200px; max-width:50%; margin-left: 25%;'";
?>
				<div class="module-blog-wrap">
					<div class="block2-wrap tn-block-wrap row clearfix">
						<div class="block-thumb-inner col-sm-6 col-xs-12">
							<div class="thumb-wrap">
								<a href="<?php echo $url; ?>" title="<?php echo $name; ?>" rel="bookmark"><span class="post-format"><i class="fa fa-youtube-play"></i></span><img width="320" height="180" <?php echo($file) ?> class="attachment-module_medium_thumb size-module_medium_thumb wp-post-image" alt="<?php echo $name; ?>" ></a>
							</div>
						</div>
						<div class="block2-content col-sm-6 col-xs-12">
							<h3 class="block-title"><a href="<?php echo $url; ?>" title="<?php echo $name; ?>">STREAM: <?php echo $name; ?> </a></h3>
							<div class="block1-meta-tag">
								<ul class="post-categories">
									<li><?php echo $gen; ?></li>
								</ul>
								<ul class="post-meta">
									<li class="date-post-meta"><span>|</span><time class="date updated" datetime="2018-01-16T07:59:54+00:00"><?php echo $upload_on; ?></time></li> 
								</ul> 
							</div>
							<p><b>Description:</b> <?php echo $description; ?> </p><br><hr>
							<h1 class="post-content-wrap">
								<ul class="post-meta more-details">
									<li class="pr-1">27 Downloads</li>
									<li class="pr-1"><i class="fa fa-eye"></i> 5</li>
									<li class="pr-1"><a class="no-decoration" href="<?php echo($download) ?>"><i class="fa fa-download"></i> Download</a></li>
									<li><a class="no-decoration hidden-xs" href="#"><i class="fa fa-share-alt"></i> Share</a></li>
								</ul>
							</h1>
						</div>
					</div>
				</div>
<?php
	if($count%4==0){
		echo "<div class='row'></div>";
	}
	$count++;
	endwhile;
?>
		<div class="pagination">
			<?php
				if ($page > 1): 
				$prev = $page-1;
			?>
				<a class="prev page-numbers" href="?page=<?php echo $prev; ?>"><i class="fa fa-angle-double-left"></i></a>
			<?php endif; ?>

			<?php for($x = $page-4; $x < $page; $x++) : ?>
				<?php if($x > 0): ?>
					<a class="page-numbers" href="?page=<?php echo $x; ?>"><?php echo $x; ?></a>
				<?php endif; ?>
			<?php endfor; ?>

			<span class="page-numbers current" aria-current="page"><a href="#"><?php echo $page ?></a></span>
			
			<?php for($x = $page + 1; $x <= $pages; $x++): ?>
			<a class="page-numbers" href="?page=<?php echo $x; ?>"><?php echo $x; ?></a>
				<?php if($x >= $page+4) { break; } ?>
			<?php endfor; ?>

			<?php if($page!=$pages): 
			$next = $page+1;
			?>
			<a class="next page-numbers" href="?page=<?php echo $next; ?>"><i class="fa fa-angle-double-right"></i></a>
			<?php endif; ?>
		</div>
		<div class="clearfix"></div>
	</div>
<?php require_once("includes/templates/page_aside.php") ?>
		</div>
	</div>
<?php load_footer(); ?>