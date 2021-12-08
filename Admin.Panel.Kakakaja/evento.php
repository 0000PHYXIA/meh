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
	<title>Saga Worlds - Panel</title>
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
					<li><a href="index.php"><i class="fa fa-coffee"></i>Home</a></li>

					<li><h2 class="sidebar-header">GAME</h2></li>
					<li><a style="cursor: pointer;" class="menu-link"><i class="fa fa-rocket"></i>In Game</a>
						<ul>
							<li><a href="item.php">Item</a></li>
							<li><a href="shop.php">Shop</a></li>
							<li><a href="upload.php">Add SWF</a></li>
						</ul>
					</li>
	
					<li><a href="busca.php"  class=" active"><i class="fa fa-th"></i>Players</a></li>

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
											<strong><?php echo $conta_users; ?></strong><br><small>Registered-Users</small>
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
			<li>Event</li>
		</ul>
		
		<div class="row gutter30">
			
			
			<h3>Evento</h3>
			<hr>
			
			<div style="float: right" width="45%">
				<h2>Add ACS to Online Players</h2>
				<form action="" method="POST">
					How much ACS: <input type="text" maxlength="8" name="coins_ev" />
					<input type="submit" name="addac" value="Add ACS To Online Players">
				</form>
				
			</div>
			<div style="float: left" width="45%">
				<h2>Add item to Online Persons</h2>
				
				<?php
					if(isset($_POST['addit2'])){
						$itemid = addslashes($_POST['item_ev']);
						$busca_it = mysql_query("SELECT ES FROM meh_items WHERE id='$itemid'");
						$conta_it = mysql_num_rows($busca_it);
						
						$sucesso = 0;
						$falhas = 0;
						
						if(empty($itemid)){
							echo "<p style='color: red;'>ERROR: Item added succes</p>";
						}else if($conta_it < 1){
							echo "<p style='color: red;'>ERROR: The item id Isint Existing</p>";
						}else{
							$busca_po = mysql_query("SELECT id FROM meh_users WHERE CurrentServer!='Offline'");
							$conta_po = mysql_num_rows($busca_po);
							
							if($conta_po > 0){
							
								$fetch_it = mysql_fetch_array($busca_it);
								$ES_add = $fetch_it[0];
								while($fetch_po = mysql_fetch_array($busca_po)){
									$user_id_ev = $fetch_po[0];
									
									$data = "20" . date("y/m/d") . " " . date("H:i:s");
									
									if(mysql_query("INSERT INTO `meh_users_items` (`id`, `userid`, `itemid`, `equipped`, `equipment`, `level`, `quantity`, `inbank`, `enhid`, `dPurchase`) VALUES (NULL, '$user_id_ev', '$itemid', '0', '$ES_add', '1', '1', '0', '1', '$data')")){
										$sucesso++;
									}else{
										$falhas++;
									}
								}
								
								echo "<p><font color='green'><b>STATUS: </b></font>Item Added Success, em $falhas</p>";
								
							}
						}
					}
				?>
				
				<form action="" method="POST">
					Item ID: <input type="text" maxlength="10" name="item_ev" />
					<input type="submit" name="addit" value="Add item To Online Players">
				</form>
				<br /><br /><br /><br /><br /><br /><br />
			</div>
			
			<br /><br /><br />
		</div>
	</div>
	<!--[if IE 8]><script src="js/helpers/excanvas.min.js"></script><![endif]-->

	<footer class="clearfix">
		<div class="pull-right">
			InfinityServer <a href="https://www.facebook.com/MinionsProject" target="_blank">Facebook</a>
		</div>
		<div class="pull-left">
			<span>2014</span> © <a href="https://www.facebook.com/julius.kar" target="_blank">Co-owner Kakakaja</a>
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