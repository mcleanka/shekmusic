<?php 
require_once '../connect.php';
if(!isset($_FILES['news'])){
	echo "No Video Selected";
	die();
}

$videoTitle = $_POST['title'];
$cont 		= $_POST['content'];
$rep 		= $_POST['reporter'];
$fileName 	= $_FILES[ "news" ][ "name" ];
$fileTmpLoc = $_FILES[ "news" ][ "tmp_name" ];
$type 	= $_FILES[ "news" ][ "type" ];
$size 	= $_FILES[ "news" ][ "size" ];

$allowed_types = array('video/mp4', 'video/webm', 'video/ogg');

if (!in_array($type, $allowed_types)) {
	echo "File Type not Supported";
	die();
}

if ($size>(160*1024*1024)) {
	echo "File Too Large";
	die();
}


$res=$db->query("SELECT max(id) as high FROM e_news");

while ($row=mysqli_fetch_assoc($res)) {
	$num = $row['high'];
}

$num++;
$VID = 'VID'.sprintf('%06d',$num);

$ext = substr($type, strripos($type, "/")+1,strlen($type));

$saveName = $VID.'_'.time().'.'.$ext;
$videoTitle = str_replace(array(',','\'',';','"','<','>'),'', $videoTitle);  

if(move_uploaded_file($fileTmpLoc, "../../../news/$saveName" )){
	$qry = "INSERT INTO e_news (title,video_mime,video_path,content,reporter,created_on)
	VALUES ('$videoTitle','$type','news/$saveName','$cont','$rep',now())";

	$db->query($qry) or die($qry);
	$res =  $db->query("SELECT id FROM e_news WHERE video_path='news/$saveName'");
	while ($row = mysqli_fetch_assoc($res)) {
		$vid = $row['id'];
	}
	if (isset($_FILES['poster'])) {				
		$fileName 	= $_FILES[ "poster" ][ "name" ];
		$fileTmpLoc = $_FILES[ "poster" ][ "tmp_name" ];
		$type 		= $_FILES[ "poster" ][ "type" ];

		$allowed_types = ['image/jpeg','image/png','image/gif'];
		if (in_array($type, $allowed_types)) {
			move_uploaded_file($fileTmpLoc, "../../../news-posters/poster-$vid");
		}
	}
	echo $vid;
	exit();
}
else {
	echo "move_uploaded_file function failed" ;
}
?>