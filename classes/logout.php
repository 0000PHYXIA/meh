<?php
	session_start();
	session_destroy();
	$page = 'Logout';
	include('inc/core.php');
	include('inc/overall-head.php');
	include('inc/head.php');
	echo '<p class="notice">You have successfully logged out, redirecting you to our homepage.</p><meta http-equiv="refresh" content="3;.."></meta>';
?>