<?php
//calling a session function tag
	session_start();
//connecting to database
	$db = new mysqli('localhost', 'root', '', 'shekmusic') or die("couldn't connect to sql server");
//declaring variables to avoid errors
	$fname = '';
	$username = '';
	$phone = '';
	$email = '';
	$genre = '';
	$password = '';
	$password2 = '';
	$join_on = ''; // sign Up Date
	$errors = array(); //displayed errors
?>