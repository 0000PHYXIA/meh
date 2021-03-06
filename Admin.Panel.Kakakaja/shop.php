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
							<li><a href="shop.php" class=" active">Shop</a></li>
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
											<strong><?php echo $conta_ban; ?></strong><br><small>Baned</small>
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
			<li>Search Shop: <?php echo $_POST['search-term']; ?></li>
		</ul>
		
		<div class="row gutter30">
			<div class="block full">
				<div class="block-title">
					<h2><i class="fa fa-search"></i> Add Shop</h2>
				</div>
				<form action="addshop.php" method="POST">
					<div class="input-group">
						<input type="text" id="search-term" value="<?php echo addslashes($_POST['add-term']); ?>" name="add-term" class="form-control" placeholder="Shop Name">
						<span class="input-group-btn">
							<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
						</span>
					</div>
				</form>
			</div>
		
			<div class="block full">
				<div class="block-title">
					<h2><i class="fa fa-search"></i> Find Shop</h2>
				</div>
				<form action="" method="post">
					<div class="input-group">
						<input type="text" id="search-term" value="<?php echo addslashes($_POST['search-term']); ?>" name="search-term" class="form-control" placeholder="Shop Name">
						<span class="input-group-btn">
							<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
						</span>
					</div>
				</form>
			</div>
		
		<table align="center">
		<tr>
			<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="center"><b>ID</b></td>
			<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="center"><b>Name</b></td>
			<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="center"><b>Edit</b></td>
		</tr>
			
		<?php
			if(!(isset($_POST['search-term']))){
				$_BS['PorPagina'] = 70;

				$sql = "SELECT COUNT(*) AS total FROM `meh_items_shops`";
				$query = mysql_query($sql);
				$total = mysql_result($query, 0, 'total');

				$paginas =  (($total % $_BS['PorPagina']) > 0) ? (int)($total / $_BS['PorPagina']) + 1 : ($total / $_BS['PorPagina']);

				if (isset($_GET['pagina'])) {
					$pagina = (int)$_GET['pagina'];
				} else {
					$pagina = 1;
				}

				$pagina = max(min($paginas, $pagina), 1);
				$inicio = ($pagina - 1) * $_BS['PorPagina'];
				$sql = "SELECT * FROM `meh_items_shops` ORDER BY `id` ASC LIMIT ".$inicio.", ".$_BS['PorPagina'];
				$query = mysql_query($sql);

				while ($resultado = mysql_fetch_assoc($query)) {
					$id = $resultado['id'];
					$name = $resultado['Name'];
					echo "
						<tr>
							<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align='center'>$id</td>
							<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align='center'>$name</td>
							<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align='center'>
								<a href='addshop.php?edit=$id'><img src='template/edit.jpg' width='16px' alt='Função Editar'></a>
							</td>
						</tr>
					";
				}
				
				echo "</table>";

				if ($total > 0) {
					echo "<br /><br /><center>Outros Itens: ";
					for($n = 1; $n <= $paginas; $n++) {
						echo '<a href="?pagina='.$n.'">'.$n.'</a>&nbsp;&nbsp;';
					}
					echo "</center>";
				}
			}else{
				$busca_prot = addslashes($_POST['search-term']);
				$busca_it = mysql_query("SELECT * FROM meh_items_shops WHERE ((`Name` LIKE '%".$busca_prot."%') OR ('%".$busca_prot."%'))");
				$conta_it = mysql_num_rows($busca_it);
				if($conta_it > 0){
					while($fetch_it = mysql_fetch_array($busca_it)){
						$id = $fetch_it['id'];
						$name = $fetch_it['Name'];
						echo "
							<tr>
								<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align='center'>$id</td>
								<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align='center'>$name</td>
								<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align='center'>
									<a href='addshop.php?edit=$id'><img src='template/edit.jpg' width='16px' alt='Função Editar'></a>
								</td>
							</tr>
						";
					}
				}else{
					echo "
						<tr>
							<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align='center'>Nenhum Shop</td>
							<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align='center'>com esse</td>
							<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align='center'>Nome</td>
						</tr>";
				}
				echo "</table>
				<center><a href='shop.php'><br /><br />Lista Completa de Shops</a></center>
				";
			}
		?>
		
		<br /><br /><br />
		</div>
	</div>
	<!--[if IE 8]><script src="js/helpers/excanvas.min.js"></script><![endif]-->

	<footer class="clearfix">
		<div class="pull-right">
			Co-owner <a href="https://www.facebook.com/julius.kar" target="_blank">kakakaja</a>
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