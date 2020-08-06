<?php 
require_once('../cores/connect.php');

$id = mysqli_real_escape_string($db, $_GET['id']);
$artist = mysqli_real_escape_string($db, $_GET['artist']);

$res = $db->query("SELECT * FROM tbl_audio WHERE id = $id AND artist = '$artist';");
while($row = mysqli_fetch_assoc($res)){
	$artist = $row['artist'];
	$filepath = '../files/'.$row['audio_path'];
	$type	= substr($row['audio_mime'], 6);
	$file= $artist.' - '.$row['title'].'| (www.shekmusic.com).'.$type;

	$p = '../files/posters/audios/poster-'.$row['id'];
	$poster = is_file($p) ? $p : '../files/posters/default.jpg';
}

if (is_file($filepath)){
	set_time_limit(0);
	header('Content-Description: File Transfer');
	header("Content-Disposition: attachment; filename=\"$file\";");
	header('Content-Type: audio/$type');
	header('Content-Length: ' . filesize($filepath));
	header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	header('Pragma: public');
	header('Expires: 0');

	readfile($filepath);
}else{
	header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404); 
}


?>