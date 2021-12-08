<?php 
	if(!(include "template/css/fonts/config.php")){
		die("<center>FATAL ERROR: Arquivo de configuração não encontrado</center>");
	}
?>
<?php if(!(empty($passon)) && ($access < 40)){ ?>

<html>
	<head>
		<title>InfinityServers - Panel</title>
		<link rel="stylesheet" href="template/css/style.css">
		<link rel='stylesheet' id='open-sans-css'  href='//fonts.googleapis.com/css?family=Open+Sans%3A300italic%2C400italic%2C600italic%2C300%2C400%2C600&#038;subset=latin%2Clatin-ext&#038;ver=4.0-alpha' type='text/css' media='all' />
	</head>
	<body>
		<div id="tudo">
			<div>&nbsp </div>
			<div id="conteudo" class="shadow">
				<p> &nbsp </p>
				<div style="height: 30px;">&nbsp </div>
				<p><center>Apenas Pessoal Autorizado <3</center></p>
				<p><a href="../"><center>&raquo Voltar ao Jogo</center></a></p>
			</div>
		</div>
	</body>
</html>

<?php }else if(!(empty($passon))){ ?>
<!DOCTYPE html>
<html class=" js no-touch">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
	<meta charset="iso-8858-1">
	<title>InfinityServers - Panel</title>
	<meta name="robots" content="noindex, nofollow">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">
	<link rel="shortcut icon" href="http://pixelcave.com/demo/freshui/img/favicon.ico">
	<link rel="apple-touch-icon" href="http://pixelcave.com/demo/freshui/img/icon57.png" sizes="57x57">
	<link rel="apple-touch-icon" href="http://pixelcave.com/demo/freshui/img/icon72.png" sizes="72x72">
	<link rel="apple-touch-icon" href="http://pixelcave.com/demo/freshui/img/icon76.png" sizes="76x76">
	<link rel="apple-touch-icon" href="http://pixelcave.com/demo/freshui/img/icon114.png" sizes="114x114">
	<link rel="apple-touch-icon" href="http://pixelcave.com/demo/freshui/img/icon120.png" sizes="120x120">
	<link rel="apple-touch-icon" href="http://pixelcave.com/demo/freshui/img/icon144.png" sizes="144x144">
	<link rel="apple-touch-icon" href="http://pixelcave.com/demo/freshui/img/icon152.png" sizes="152x152">

	<link rel="stylesheet" href="template/css/bootstrap-1.5.css">
	<link rel="stylesheet" href="template/css/plugins-1.5.css">
	<link rel="stylesheet" href="template/css/main-1.5.css">
	<link rel="stylesheet" href="template/css/themes.css">
	<script type="text/javascript" async="" src="template/js/ga.js"></script>
	<script src="template/js/modernizr-2.7.1-respond-1.4.2.min.js"></script>
</head>

<body class="header-fixed-top sidebar-left-pinned">
<div id="sidebar-left" class="enable-hover">
	<div class="sidebar-content">
		<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 573px;">
		
			<div class="sidebar-left-scroll" style="overflow: hidden; width: auto; height: 573px;">
				<ul class="sidebar-nav">
					<li><h2 class="sidebar-header">Home</h2></li>
					<li><a href="index.php" class=" active"><i class="fa fa-coffee"></i>Home</a></li>

					<li><h2 class="sidebar-header">GAME</h2></li>
					<li><a style="cursor: pointer;" class="menu-link"><i class="fa fa-rocket"></i>In Game</a>
						<ul>
							<li><a href="item.php">Item</a></li>
							<li><a href="shop.php">Shop</a></li>
							<li><a href="upload.php">Add SWF</a></li>
						</ul>
					</li>
	
					<li><a href="busca.php"><i class="fa fa-th"></i>Players</a></li>

					<li><h2 class="sidebar-header">You want to Leave?</h2></li>
					<li><a href="?logout"><i class="fa fa-power-off"></i>Logout</a></li>
				</ul>
			</div>

			<div class="slimScrollBar" style="width: 3px; position: absolute; top: 0px; opacity: 0.4; display: block; border-top-left-radius: 7px; border-top-right-radius: 7px; border-bottom-right-radius: 7px; border-bottom-left-radius: 7px; z-index: 99; right: 1px; height: 598.5110410094637px; background: rgb(255, 255, 255);"></div>
			<div class="slimScrollRail" style="width: 3px; height: 100%; position: absolute; top: 0px; display: none; border-top-left-radius: 7px; border-top-right-radius: 7px; border-bottom-right-radius: 7px; border-bottom-left-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(51, 51, 51);"></div>
		</div>
	</div>
</div>


<div id="page-container" class="full-width">
	<div id="fx-container" class="fx-opacity"><div id="page-content" class="block">
		<div class="block-header">
			<div class="row remove-margin">
				<div class="col-md-4">
					<a href="" class="header-title-link">
						<h1><i class="fa fa-coffee animation-expandUp"></i>Dashboard<br><small>User: <?php echo $useron; ?></small></h1>
					</a>
				</div>
				
				<div class="col-md-8">
					<div class="row">
						<div class="col-sm-6">
							<div class="row">
								<div class="col-xs-6">
									<a href="lista.php?online" class="header-link">
										<h1 class="animation-pullDown">
											<strong><?php echo $fetch_servers[0]; ?></strong><br><small>Online</small>
										</h1>
									</a>
								</div>

								<div class="col-xs-6">
									<a class="header-link">
										<h1 class="animation-pullDown">
											<strong><?php echo $conta_users; ?></strong><br><small>User-Registered</small>
										</h1>
									</a>
								</div>
							</div>
						</div>
						
						<div class="col-sm-6">
							<div class="row">
								<div class="col-xs-6">
									<a href="lista.php?staffs" class="header-link">
										<h1 class="animation-pullDown">
											<strong><?php echo $conta_staff; ?></strong><br><small>Staffs</small>
										</h1>
									</a>
								</div>

								<div class="col-xs-6">
									<a href="lista.php?ban" class="header-link">
										<h1 class="animation-pullDown">
											<strong><?php echo $conta_ban; ?></strong><br><small>Banned</small>
										</h1>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<ul class="breadcrumb breadcrumb-top">
			<li><i class="fa fa-coffee"></i></li>
			<li><a href="index.php">Dashboard</a></li>
			<li>List</li>
		</ul>
		
		<div class="row gutter30">
			
			<?php if(isset($_GET['online'])){ ?>
				<h2 style='border: 1px #000; padding: 10px 50px 10px 50px;'>Players Online</h2>
				<br />
				<?php
				
					$busca_all_on = mysql_query("SELECT id,Username,Level,Access FROM meh_users WHERE CurrentServer!='Offline'");
					if(mysql_num_rows($busca_all_on) <= 0){
						echo "<b style='border: 1px #000; padding: 10px 50px 10px 50px;'>No one is Online</b>";
					}else{
				?>
					
					<table>
						<tr>
							<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align='center'><b>ID</b></td>
							<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align='center'><b>Username</b></td>
							<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align='center'><b>Level</b></td>
							<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align='center'><b>Access</b></td>
						</tr>
						<?php 
							while($fetch_all = mysql_fetch_array($busca_all_on)){
								if($fetch_all[3] >= 100)
									$cargo = "<font color='purple'>Owner</font>";
								if($fetch_all[3] >= 60)
									$cargo = "<font color='red'>Administrator</font>";
								else if($fetch_all[3] >= 40)
									$cargo = "<font color='gold'>Moderador</font>";
								else if($fetch_all[3] >= 1)
									$cargo = "Player";
								else
									$cargo = "Banned";
								
								echo "
									<tr>
										<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align='center'>$fetch_all[0]</td>
										<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align='center'>$fetch_all[1]</td>
										<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align='center'>$fetch_all[2]</td>
										<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align='center'>$cargo</td>
									</tr>
								";
							}
						?>
					</table>
					
				<?php } ?>
			<?php }else if(isset($_GET['staffs'])){ ?>
				<h2 style='border: 1px #000; padding: 10px 50px 10px 50px;'>Players</h2>
				<br />
				<?php
				
					$busca_all_on = mysql_query("SELECT id,Username,Level,CurrentServer,Access FROM meh_users WHERE Access>39");
					if(mysql_num_rows($busca_all_on) <= 0){
						echo "<b style='border: 1px #000; padding: 10px 50px 10px 50px;'>Nenhum Jogador Staff</b>";
					}else{
				?>
					
					<table>
						<tr>
							<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align='center'><b>ID</b></td>
							<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align='center'><b>Username</b></td>
							<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align='center'><b>Level</b></td>
							<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align='center'><b>Status</b></td>
							<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align='center'><b>Access</b></td>
						</tr>
						<?php 
							while($fetch_all = mysql_fetch_array($busca_all_on)){
								if($fetch_all[3] == 'Offline')
									$sts = "<font color='red'>Offline</font>";
								else
									$sts = "<font color='green'>Online</font>";
									
								if($fetch_all[4] > 40)
									$cargo = "<font color='red'>Admin</font>";
								else
									$cargo = "<font color='gold'>Moderator</font>";
									
								echo "
									<tr>
										<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align='center'>$fetch_all[0]</td>
										<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align='center'>$fetch_all[1]</td>
										<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align='center'>$fetch_all[2]</td>
										<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align='center'>$sts</td>
										<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align='center'>$cargo</td>
									</tr>
								";
							}
						?>
					</table>
					
				<?php } ?>
			<?php }else if(isset($_GET['ban'])){ ?>
				<h2 style='border: 1px #000; padding: 10px 50px 10px 50px;'>Players: </h2>
				<br />
				<?php
				
					$busca_all_on = mysql_query("SELECT id,Username,Level,CurrentServer FROM meh_users WHERE Access<1");
					if(mysql_num_rows($busca_all_on) <= 0){
						echo "<b style='border: 1px #000; padding: 10px 50px 10px 50px;'>Player Banned</b>";
					}else{
				?>
					
					<table>
						<tr>
							<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align='center'><b>ID</b></td>
							<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align='center'><b>Username</b></td>
							<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align='center'><b>Level</b></td>
						</tr>
						<?php 
							while($fetch_all = mysql_fetch_array($busca_all_on)){
								echo "
									<tr>
										<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align='center'>$fetch_all[0]</td>
										<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align='center'>$fetch_all[1]</td>
										<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align='center'>$fetch_all[2]</td>
									</tr>
								";
							}
						?>
					</table>
					
				<?php } ?>
			<?php }else{ ?>
				<b>No list found</b>
			<?php } ?>
			
			<br /><br /><br />
		</div>
	</div>
	<!--[if IE 8]><script src="js/helpers/excanvas.min.js"></script><![endif]-->

	<footer class="clearfix">
		<div class="pull-right">
			Co-owner <a href="https://www.facebook.com/julius.kar" target="_blank">Kakakaja</a>
		</div>
		<div class="pull-left">
			<span>2014</span> © <a href="https://www.facebook.com/MinionsProject" target="_blank">InfinityServers</a>
		</div>
	</footer>
	</div>
</div>

<a href="javascript:void(0)" id="to-top" style="display: none;"><i class="fa fa-angle-up"></i></a>
	<script src="template/js/jquery.min.js"></script>
	<script src="template/js/bootstrap.min-1.5.js"></script>
	<script src="template/js/plugins-1.5.js"></script>
	<script src="template/js/main-1.5.js"></script>

</body>
</html>

<?php }else{ ?>
	<?php include "login.php"; ?>
<?php } ?>