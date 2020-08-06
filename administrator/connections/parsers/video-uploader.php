<?php 
require_once '../connect.php';
if(!isset($_FILES['file1'])){
	echo "No Video Selected";
	die();
}

$videoTitle = $_POST['title'];
$desc 		= $_POST['description'];
$prod 		= $_POST['producer'];
$gen 		= $_POST['genre'];
$fileName 	= $_FILES[ "file1" ][ "name" ];
$fileTmpLoc = $_FILES[ "file1" ][ "tmp_name" ];
$type 	= $_FILES[ "file1" ][ "type" ];
$size 	= $_FILES[ "file1" ][ "size" ];

$allowed_types = array('video/mp4', 'video/webm', 'video/ogg');

if (!in_array($type, $allowed_types)) {
	echo "File Type not Supported";
	die();
}

if ($size>(160*1024*1024)) {
	echo "File Too Large";
	die();
}


$res=$db->query("SELECT max(id) as high FROM tbl_video");

while ($row=mysqli_fetch_assoc($res)) {
	$num = $row['high'];
}

$num++;
$VID = 'VID'.sprintf('%06d',$num);

$ext = substr($type, strripos($type, "/")+1,strlen($type));

$saveName = $VID.'_'.time().'.'.$ext;
$videoTitle = str_replace(array(',','\'',';','"','<','>'),'', $videoTitle);  

if(move_uploaded_file($fileTmpLoc, "../../../videos/$saveName" )){
	$qry = "INSERT INTO tbl_video (title,video_mime,video_path,producer,genre,description,created_on)
	VALUES ('$videoTitle','$type','videos/$saveName','$prod','$gen','$desc',now())";

	$db->query($qry) or die($qry);
	$res =  $db->query("SELECT id FROM tbl_video WHERE video_path='videos/$saveName'");
	while ($row = mysqli_fetch_assoc($res)) {
		$vid = $row['id'];
	}
	if (isset($_FILES['poster'])) {				
		$fileName 	= $_FILES[ "poster" ][ "name" ];
		$fileTmpLoc = $_FILES[ "poster" ][ "tmp_name" ];
		$type 		= $_FILES[ "poster" ][ "type" ];

		$allowed_types = ['image/jpeg','image/png','image/gif'];
		if (in_array($type, $allowed_types)) {
			move_uploaded_file($fileTmpLoc, "../../../posters/poster-$vid");
		}
	}
	echo $vid;
	exit();
}
else {
	echo "move_uploaded_file function failed" ;
}
?>