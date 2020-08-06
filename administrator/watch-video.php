<?php
require_once('connections/connect.php');
require_once('connections/functions.php');

if (!isset($_GET['id'])) {
	echo "ERROR! No Video Selected";
	exit();
}
$id = mysqli_real_escape_string($db,$_GET['id']);
$res = $db->query("SELECT * FROM tbl_video WHERE id=$id");

if ($res->num_rows == 0) {
	die("Error 404. Video Not Found");
}
while ($row = mysqli_fetch_assoc($res)) {
	$path 	= $row['video_path'];
	$name 	= $row['title'];
	$type	= $row['video_mime'];
	$prod	= $row['producer'];
	$gen	= $row['genre'];
	$desc 	= $row['description'];
	$time 	= date('jS F, Y', strtotime($row['created_on']));
}
//get poster
$poster = is_file("posters/poster-$id") ? "posters/poster-$id" : 'posters/default.png';

$pt = $name;
require_once 'includes/header.php'; 
	

?>
<?php require_once 'includes/mainnav.php'; ?>
<div class="main-content">
	<div class="wrap">
		<div class="left-sidebar" style="margin-top:10px;">				
			<?php // include("includes/sidebar.php");  ?>				
		</div>

		<div class="right-content" style="margin-top:15px; border-left: #ccc solid 1px;">
			<div class="right-content-heading">
				<div class="right-content-heading-left">
					<h3 style="color:#555; width:640px;"><?php echo $name; ?></h3>
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

				<div class="clear"></div>
			</div>

			<div class="inner-page">
				<?php if(file_exists($path)): ?>	

				<div class="video-inner">
					<video src="<?php echo $path ?>" width="640px" height="360px" poster="<?php echo $poster ?>" controls style="background-color:#000" type="<?php echo $type ?>"></video>
				</div>
<div class="right-content-heading-left">
					<h3 style="color:#555; width:640px;"><?php echo $desc; ?></h3>
				</div>
<div class="right-content-heading-left">
					<h3 style="color:#555; width:640px;"><?php echo $gen; ?></h3>
				</div>
<div class="right-content-heading-left">
					<h3 style="color:#555; width:640px;"><?php echo $prod; ?></h3>
				</div>
				<div class="controls" style="width:640px;">
					<p>
						<?php $size = filesize($path)/1024/1024; if ($size <= 128): ?>
							<a style="margin-left:10px; width:100px;" class="btn btn-sm btn-success pull-right" href="download?id=<?php echo $id; ?>"><span class="glyphicon glyphicon-download"></span> Download</a>
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
	</div>
</div>	

<div class="clear"></div></div></div><div class="clear"> </div>
<?php load_footer(); ?>