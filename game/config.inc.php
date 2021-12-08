<?php
	mysql_connect('meh', 'mysqlc', '$Rafa1234');
	mysql_select_db('meh');
	echo mysql_error();
	
	define('MYSQL_HOST', 'localhost');
	define('MYSQL_USER', 'mysqlc');
	define('MYSQL_PASS', '$Rafa1234');
	define('MYSQL_DATA', 'meh');
?>