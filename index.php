<?php
	require_once('cores/connect.php');
	require_once('cores/functions.php');
	$pgt = "Home";
	$pg = "index.php";
	load_header($pg, $pgt);

	include_once ("includes/components/slider_hot_10.php");
	include_once ("includes/components/new_videos.php");
	include_once ("includes/components/latest_music.php");
	include_once ("includes/components/e_news.php");
	include_once ("includes/components/sidebar.php");

	load_footer();
?>