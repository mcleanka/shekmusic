<?php 
require_once '../connect.php';
if(!isset($_FILES['file1'])){
	echo "No Audio Selected";
	die();
}

$audioTitle = $_POST['title'];
$desc 		= $_POST['description'];
$prod 		= $_POST['producer'];
$gen 		= $_POST['genre'];
$fileName 	= $_FILES[ "file1" ][ "name" ];
$fileTmpLoc = $_FILES[ "file1" ][ "tmp_name" ];
$type 	= $_FILES[ "file1" ][ "type" ];
$size 	= $_FILES[ "file1" ][ "size" ];

$allowed_types = array('audio/mpeg','audio/mp3', 'audio/wav', 'audio/ogg');

if (!in_array($type, $allowed_types)) {
	echo "File Type not Supported";
	die();
}

if ($size>(160*1024*1024)) {
	echo "File Too Large";
	die();
}


$res=$db->query("SELECT max(id) as high FROM tbl_audio");

while ($row=mysqli_fetch_assoc($res)) {
	$num = $row['high'];
}

$num++;
$VID = 'VID'.sprintf('%06d',$num);

$ext = substr($type, strripos($type, "/")+1,strlen($type));

$saveName = $VID.'_'.time().'.'.$ext;
$audioTitle = str_replace(array(',','\'',';','"','<','>'),'', $audioTitle);  

if(move_uploaded_file($fileTmpLoc, "../../../audios/$saveName" )){
	$qry = "INSERT INTO tbl_audio (title,audio_mime,audio_path,producer,genre,description,created_on)
	VALUES ('$audioTitle','$type','audios/$saveName','$prod','$gen','$desc',now())";

	$db->query($qry) or die($qry);
	$res =  $db->query("SELECT id FROM tbl_audio WHERE audio_path='audios/$saveName'");
	while ($row = mysqli_fetch_assoc($res)) {
		$vid = $row['id'];
	}
	if (isset($_FILES['poster'])) {				
		$fileName 	= $_FILES[ "poster" ][ "name" ];
		$fileTmpLoc = $_FILES[ "poster" ][ "tmp_name" ];
		$type 		= $_FILES[ "poster" ][ "type" ];

		$allowed_types = ['image/jpeg','image/png','image/gif'];
		if (in_array($type, $allowed_types)) {
			move_uploaded_file($fileTmpLoc, "../../../posters/audios/poster-$vid");
		}
	}
	echo $vid;
	exit();
}
else {
	echo "move_uploaded_file function failed" ;
}
?>