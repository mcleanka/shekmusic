<?php
require_once('connections/connect.php');
require_once('connections/functions.php');

//initiating pagination 
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$per_page = 10;
$start = ($page > 1) ? ($page * $per_page) - $per_page : 0;

$total = $db->query("SELECT count(id) as total FROM events")->fetch_assoc()['total'];
$pages = ceil($total/$per_page);
if($page>$pages){
	$page=$pages;
}
if($page<0){
	$page = 1;
}
#intitiating pagination
?>

<?php load_header('Home'); ?>

<div class="tn-main-page-wrap"> 
<?php include_once("./includes/mobile_mainnav.php") ?>
<div class="tn-main-container">
<?php include_once("./includes/mainnav.php") ?>
<div id="main-wrapper" class="tn-container">
	<div class="row  container-fluid">
		<div class="row tn-section-content-wrap clearfix">
			<div id="main-content" class="tn-content-wrap col-sm-8 col-xs-12 clearfix" role="main"><div class="clearfix"></div>
				<div class="cate-page-title-wrap tn-category-5">
					<h1 class="cate-title">Events</h1>
						<div class="cate-description">
							<p>NOTE: All videos are of High Quality... download them all for free by clicking the link of respective video.</p>
						</div>
				</div>
<?php
// connecting to database
$qry = "SELECT * FROM events ORDER BY created_on DESC LIMIT $start,$per_page";
$res = $db->query($qry) or die($qry);
$count = 1;
?>

<?php 
while ($row=mysqli_fetch_assoc($res)):
$name = strlen($row['title']) > 50 ? substr($row['title'], 0,50).'...' : $row['title'];
$url = 'watch-event.php?id='.$row['id'];
$upload_on = date('jS F, Y', strtotime($row['created_on']));
$description = $row['description'];
$spon = $row['sponsors'];
$p = 'posters/events/poster-'.$row['id'];
$poster = is_file($p) ? $p : 'posters/default.png';

# connecting to database
?>
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
									<li class="date-post-meta"><span>/</span><time class="date updated" datetime="2018-01-16T07:59:54+00:00"><?php echo $upload_on; ?></time></li> 
								</ul> 
							</div>
							<p><?php echo $description; ?> </p> <br>
							<p>Produced by <?php echo $spon; ?> </p>
						</div>
					</div>
				</div><!-- #blog-wrap -->
<?php 
	if($count%4==0){
		echo "<div class='row'></div>";
	}
	$count++;
	endwhile; ?>
	<!--pagination-->
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
		</div><!--#pagination -->
<div class="clearfix"></div></div><!--#main-content-->

<?php include_once("includes/page_aside.php") ?>
		</div><!--#row-->
	</div>
</div>
<?php load_footer(); ?>