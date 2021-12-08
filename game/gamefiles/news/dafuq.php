<?php
	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASS', '');
	define('DB_DATA', 'saga');
	
	$con = mysql_connect(DB_HOST, DB_USER, DB_PASS);
	$db = mysql_select_db(DB_DATA);
	
	$user = $_GET['id'];
?>

<?php
				$sql = "SELECT * FROM `meh_items` ORDER BY `id` ASC";
				$query = mysql_query($sql);

				while ($resultado = mysql_fetch_assoc($query)) {
					$id = $resultado['id'];
					$name = $resultado['Name'];
					echo "$id - $name<br />";
				}
?>