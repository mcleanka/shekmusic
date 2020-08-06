<?php 
require_once('connections/connect.php');
require_once('connections/functions.php');

$id = mysqli_real_escape_string($db,$_GET['id']);

$res = $db->query("SELECT * FROM hot_ten WHERE id=$id");
while($row = mysqli_fetch_assoc($res)){
$filepath = $row['video_path'];
$file= $row['title'].'.mp4';
}

if (is_file($filepath)){
	set_time_limit(0);
	header('Content-Description: File Transfer');
	header("Content-Disposition: attachment; filename=\"$file\"");
	header('Content-Type: video/mp4');
	header('Content-Length: ' . filesize($filepath));
	header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	header('Pragma: public');
	header('Expires: 0');

readfile($filepath);
} 
else{
	header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404); 
}


?>