<?php
	require_once('cores/connect.php');
	require_once('cores/functions.php');
	$pgt = "E! News";
	$pg = "e_news.php";
	load_header($pg, $pgt);
	
	$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
	$per_page = 10;
	$start = ($page > 1) ? ($page * $per_page) - $per_page : 0;

	$total = $db->query("SELECT count(id) as total FROM e_news")->fetch_assoc()['total'];
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
					<h1 class="cate-title">Videos</h1>
						<div class="cate-description">
							<p>NOTE: All videos are of High Quality... download them all for free by clicking the link of respective video.</p>
						</div>
				</div>
<?php
	$qry = "SELECT * FROM e_news ORDER BY created_on DESC LIMIT $start,$per_page";
	$res = $db->query($qry) or die($qry);
	$count = 1;

	while ($row=mysqli_fetch_assoc($res)):
		$name = strlen($row['title']) > 30 ? substr($row['title'], 0,30).'...' : $row['title'];
		$url = 'plugins/news-player.php?id='.$row['id'].'&amp;title='.$row['title'];
		$download = 'download/event.php?id='.$row['id'].'&amp;title='.$row['title'];
		$upload_on = date('jS F, Y', strtotime($row['created_on']));
		$content = strlen($row['content']) > 30 ? substr($row['content'], 0,200).'...' : $row['content'];
		$rep = $row['reporter'];
		$p = 'files/news-posters/poster-'.$row['id'];
		$poster = is_file($p) ? $p : 'files/posters/default.png';

		$file = is_file($p) ? "src='$poster'" : "src='$poster' style='max-height: 200px; max-width:50%; margin-left: 25%;'";
?>
				<div class="module-blog-wrap">
					<div class="block2-wrap tn-block-wrap row clearfix">
						<div class="block-thumb-inner col-sm-6 col-xs-12">
							<div class="thumb-wrap">
								<a href="<?php echo $url; ?>" title="<?php echo $name; ?>" rel="bookmark"><span class="post-format"><i class="fa fa-youtube-play"></i></span><img <?php echo($file) ?> class="attachment-module_medium_thumb size-module_medium_thumb wp-post-image" alt="<?php echo $name; ?>" ></a>
							</div><!--#thumb wrap-->
						</div>
						<div class="block2-content col-sm-6 col-xs-12">
							<h3 class="block-title"><a href="<?php echo $url; ?>" title="<?php echo $name; ?>">WATCH VIDEO: <?php echo $name; ?></a></h3>
							<p><?php echo $content; ?> </p>
							<div class="block1-meta-tag">
								<ul class="post-meta">
									<li class="date-post-meta">Editor:: <?php echo $rep; ?></li> 
									<li class="date-post-meta"><time class="date updated" datetime="2018-01-16T07:59:54+00:00">On <?php echo $upload_on; ?></time></li>
								</ul> 
							</div>
						</div>
					</div>
				</div>
<?php 
	if($count%4==0){
		echo "<div class='row'></div>";
	}
	$count++;
	endwhile; ?>
		<div class="pagination">
			<?php if($pages>1): ?>
				<?php if ($page > 1): 
				$prev = $page-1;
				?>
					<a class="prev page-numbers" href="?page=<?php echo $prev; ?>"><i class="fa fa-angle-double-left"></i></a>
				<?php endif; ?>

				<?php for($x = $page-4; $x < $page; $x++) : ?>
					<?php if($x > 0): ?>
						<a class="page-numbers" href="?page=<?php echo $x; ?>"><?php echo $x; ?></a>
					<?php endif; ?>
				<?php endfor; ?>

			<?php endif; ?>

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


