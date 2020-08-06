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
	$upload_on 	= date('jS F, Y', strtotime($row['created_on']));
}

//get poster
$poster = is_file("hot_ten_posters/poster-$id") ? "hot_ten_posters/poster-$id" : 'posters/default.png';

$pt = $name;
require_once 'includes/header.php'; 
?>
<div class="tn-main-page-wrap">
	<?php include_once ("includes/mobile_mainnav.php") ?>
		<div class="tn-main-container">
			<?php include_once ("includes/mainnav.php") ?>
			<div id="main-wrapper" class="tn-container">
				<div class="row main-content-wrap tn-section-content-wrap clearfix">
					<?php include_once ("includes/watch_hot_ten.php") ?>
				</div>
			</div>
			<?php include_once ("includes/hot_ten_aside.php") ?>
		</div><!--#mid -->
<?php load_footer() ?>
