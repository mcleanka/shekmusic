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
	$upload_on = date('jS F, Y', strtotime($row['created_on']));
}
//get poster
$poster = is_file("posters/poster-$id") ? "posters/poster-$id" : 'posters/default.png';

$pt = $name;
require_once 'includes/header.php'; 
	

?>
<div class="tn-main-page-wrap">
	<?php include_once ("includes/mobile_mainnav.php") ?>
		<div class="tn-main-container">
			<?php include_once ("includes/mainnav.php") ?>
			<div id="main-wrapper" class="tn-container">
				<div class="row main-content-wrap tn-section-content-wrap clearfix">
					<?php include_once ("includes/watch_video.php") ?>
				</div>
			</div>
			<?php include_once ("includes/watch_video_aside.php") ?>
		</div><!--#mid -->
<?php load_footer() ?>
