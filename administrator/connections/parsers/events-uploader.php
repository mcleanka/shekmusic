<?php 
require_once '../connect.php';
if(!isset($_FILES['myEvent'])){
	echo "No Video Selected";
	die();
}

$videoTitle = $_POST['title'];
$desc 		= $_POST['description'];
$spon 		= $_POST['sponsor'];
$fileName 	= $_FILES[ "myEvent" ][ "name" ];
$fileTmpLoc = $_FILES[ "myEvent" ][ "tmp_name" ];
$type 	= $_FILES[ "myEvent" ][ "type" ];
$size 	= $_FILES[ "myEvent" ][ "size" ];

$allowed_types = array('video/mp4', 'video/webm', 'video/ogg');

if (!in_array($type, $allowed_types)) {
	echo "File Type not Supported";
	die();
}

if ($size>(160*1024*1024)) {
	echo "File Too Large";
	die();
}


$res=$db->query("SELECT max(id) as high FROM events");

while ($row=mysqli_fetch_assoc($res)) {
	$num = $row['high'];
}

$num++;
$VID = 'VID'.sprintf('%06d',$num);

$ext = substr($type, strripos($type, "/")+1,strlen($type));

$saveName = $VID.'_'.time().'.'.$ext;
$videoTitle = str_replace(array(',','\'',';','"','<','>'),'', $videoTitle);  

if(move_uploaded_file($fileTmpLoc, "../../../events/$saveName" )){
	$qry = "INSERT INTO events (title,video_mime,video_path,sponsors,description,created_on)
	VALUES ('$videoTitle','$type','events/$saveName','$spon','$desc',now())";

	$db->query($qry) or die($qry);
	$res =  $db->query("SELECT id FROM events WHERE video_path='events/$saveName'");
	while ($row = mysqli_fetch_assoc($res)) {
		$vid = $row['id'];
	}
	if (isset($_FILES['myPoster'])) {				
		$fileName 	= $_FILES[ "myPoster" ][ "name" ];
		$fileTmpLoc = $_FILES[ "myPoster" ][ "tmp_name" ];
		$type 		= $_FILES[ "myPoster" ][ "type" ];

		$allowed_types = ['image/jpeg','image/png','image/gif'];
		if (in_array($type, $allowed_types)) {
			move_uploaded_file($fileTmpLoc, "../../../posters/events/poster-$vid");
		}
	}
	echo $vid;
	exit();
}
else {
	echo "move_uploaded_file function failed" ;
}
?>