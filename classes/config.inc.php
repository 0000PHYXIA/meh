<?php
	mysql_connect('localhost', 'root', '');
	mysql_select_db('infinity');
	echo mysql_error();
	
	define('MYSQL_HOST', 'localhost');
	define('MYSQL_USER', 'root');
	define('MYSQL_PASS', '');
	define('MYSQL_DATA', 'infinity');
?>