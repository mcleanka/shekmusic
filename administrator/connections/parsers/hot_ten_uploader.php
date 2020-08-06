<?php
require_once '../connect.php';
if(!isset($_FILES['file'])){
	echo "No Video Selected";
	die();
}

$videoTitle = $_POST['title'];
$desc 		= $_POST['description'];
$prod 		= $_POST['producer'];
$gen 		= $_POST['genre'];
$fileName 	= $_FILES[ "file" ][ "name" ];
$fileTmpLoc = $_FILES[ "file" ][ "tmp_name" ];
$type 	= $_FILES[ "file" ][ "type" ];
$size 	= $_FILES[ "file" ][ "size" ];

$allowed_types = array('video/mp4', 'video/webm', 'video/ogg');

if (!in_array($type, $allowed_types)) {
	echo "File Type not Supported";
	die();
}

if ($size>(160*1024*1024)) {
	echo "File Too Large";
	die();
}

$res=$db->query("SELECT max(id) as high FROM hot_ten");

while ($row=mysqli_fetch_assoc($res)) {
	$num = $row['high'];
}

$num++;
$VID = 'VID'.sprintf('%06d',$num);

$ext = substr($type, strripos($type, "/")+1,strlen($type));

$saveName = $VID.'_'.time().'.'.$ext;
$videoTitle = str_replace(array(',','\'',';','"','<','>'),'', $videoTitle);  

if(move_uploaded_file($fileTmpLoc, "../../../hot_ten_videos/$saveName" )){
	$qry = "INSERT INTO hot_ten (title,video_mime,video_path,genre,producer,description,created_on)
	VALUES ('$videoTitle','$type','hot_ten_videos/$saveName','$gen','$prod','$desc',now())";

	$db->query($qry) or die($qry);
	$res =  $db->query("SELECT id FROM hot_ten WHERE video_path='hot_ten_videos/$saveName'");
	while ($row = mysqli_fetch_assoc($res)) {
		$vid = $row['id'];
	}
	if (isset($_FILES['poster'])) {				
		$fileName 	= $_FILES[ "poster" ][ "name" ];
		$fileTmpLoc = $_FILES[ "poster" ][ "tmp_name" ];
		$type 		= $_FILES[ "poster" ][ "type" ];

		$allowed_types = ['image/jpeg','image/png','image/gif'];
		if (in_array($type, $allowed_types)) {
			move_uploaded_file($fileTmpLoc, "../../../hot_ten_posters/poster-$vid");
		}
	}
	echo $vid;
	exit();
}
else {
	echo "move_uploaded_file function failed" ;
}
?>