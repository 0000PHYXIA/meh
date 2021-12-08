<?php
DEFINE("MYSQL_HOST", "mysqlc"); 
DEFINE("MYSQL_USER", "root"); 
DEFINE("MYSQL_PASS", "$Rafa1234"); 
DEFINE("MYSQL_DB", "meh"); 
mysql_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASS) or die ("Y CANNOT CONNECT NUGGUR"); 
mysql_select_db(MYSQL_DB) or die ("Can't connect you bastard"); 

?>