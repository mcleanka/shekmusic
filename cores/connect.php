<?php
	define('APP_ROOT', __DIR__);
	define('INC_ROOT', APP_ROOT.'../includes');
	define('BASE_URL','http://localhost/shekmusic');
	define('ASSET_ROOT', BASE_URL.'../assets/');
	define('FILES_ROOT', BASE_URL.'../files/');

	$db = new mysqli("localhost","root","password","shekmusic");
?>