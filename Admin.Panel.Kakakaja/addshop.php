<?php 
	if(!(include "template/css/fonts/config.php")){
		die("<center>FATAL ERROR: Arquivo de configuração não encontrado</center>");
	}
?>
<?php if(!(empty($passon)) && ($access < 40)){ ?>

<html>
	<head>
		<title>InfinityServers - AddShop</title>
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
			<li><?php if(!(isset($_GET['edit']))){ ?>Add Shop<?php }else{ ?>Edit Shop<?php } ?></li>
		</ul>
		
		<div class="row gutter30">
		<?php if(!(isset($_GET['edit']))){ ?>
			<div style='padding: 10px 50px 10px 50px;'>
			<h2>Add Shop</h2>
				<br />
				<?php
					if(isset($_POST['add'])){
						$id = addslashes($_POST['id']);
						$nome = addslashes($_POST['add-term']);
						$items = addslashes($_POST['items']);
						$staff = addslashes($_POST['staff']);
						$upgrade = addslashes($_POST['upgrade']);
						$house = addslashes($_POST['house']);
						$level = addslashes($_POST['level']);
						$limited = addslashes($_POST['limited']);
						
						$busca_it_add = mysql_query("SELECT Name FROM meh_items_shops WHERE id='$id'");
						$conta_it_add = mysql_num_rows($busca_it_add);
						
						if(empty($id) || empty($nome) || ($id <= 0) || empty($items)){
							echo "<b style='color: red'>Make every feald correct</b>";
						}else if($conta_it_add > 0){
							echo "<b style='color: red'>There is alredy shop whit this Shop ID</b>";
						}else{
							if(mysql_query("INSERT INTO meh_items_shops (`id`, `Name`, `Items`, `Staff`, `Upgrade`, `House`, `Limited`) VALUES ('$id', '$nome', '$items', '$staff', '$upgrade', '$house', '$limited')")){
								
								mysql_query("INSERT INTO admin_logs (`Staff`, `Info`) VALUES ('$user', 'Criou um Shop com ID: $id e com o nome: $nome')");
								
								echo "<b style='color: green'>Succes Added id: $id</b>";
							}else{
								echo "<b style='color: red'>There was error adding shop</b>";
							}
						}
						echo "<br /><br />";
					}
				?>
			</div>
			<form action="" method="POST">
				<table>
					<tr>
						<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="right">Shop ID <font color="red" style="font-size: 10px;">(Only Number)</font>: </td><td><input type="text" name="id" value="<?php echo $_POST['id']; ?>"></td>
					</tr>
					<tr>
						<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="right">Name: </td><td><input type="text" name="add-term" value="<?php echo $_POST['add-term']; ?>"></td>
					</tr>
					
					<tr>
						<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="right">Staff: </td>
						<td>
							<select name="staff">
								<?php if(isset($_POST['staff']) && $_POST['staff'] > 0){ ?>
									<option value="1">Yes</option>
									<option value="0">No</option>
								<?php }else{ ?>
								    <option value="1">Yes</option>
									<option value="0">No</option>
								<?php } ?>
							</select>
						</td>
					</tr>
					
					<tr>
						<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="right">Member's Shop: </td>
						<td>
							<select name="upgrade">
								<?php if(isset($_POST['upgrade']) && $_POST['upgrade'] > 0){ ?>
									<option value="1">Yes</option>
									<option value="0">No</option>
								<?php }else{ ?>
									<option value="0">No</option>
									<option value="1">Yes</option>
								<?php } ?>
							</select>
						</td>
					</tr>
					<tr>
						<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="right">House: </td>
						<td>
							<select name="house">
								<?php if(isset($_POST['house']) && $_POST['house'] > 0){ ?>
									<option value="1">Yes</option>
									<option value="0">No</option>
								<?php }else{ ?>
									<option value="0">No</option>
									<option value="1">Yes</option>
								<?php } ?>
							</select>
						</td>
					</tr>
					<tr>
						<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="right">Limited: </td>
						<td>
							<select name="limited">
								<?php if(isset($_POST['limited']) && $_POST['limited'] > 0){ ?>
									<option value="1">Yes</option>
									<option value="0">No</option>
								<?php }else{ ?>
									<option value="0">No</option>
									<option value="1">Yes</option>
								<?php } ?>
							</select>
						</td>
					</tr>
					<tr>
						<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="right">Items <font color="red" style="font-size: 10px;">(Tipe item Ids Example: 1,2,3)</font>: </td><td><textarea name="items" cols="40" rows="5"><?php echo $_POST['items']; ?></textarea></td>
					</tr>
					<tr><td style="border: 1px #000; padding: 10px 50px 10px 50px;"></td><td><input type="submit" name="add" value="Add Shop"></td></tr>
				</table>
			</form>
		<?php }else{ ?>
			<div style='padding: 10px 50px 10px 50px;'>
				<h2>Edit Shop</h2>
				<?php
					if(isset($_POST['edd'])){
						$ed_id = addslashes($_POST['ed_id']);
						$ed_name = addslashes($_POST['ed_name']);
						$ed_staff = addslashes($_POST['ed_staff']);
						$ed_upgrade = addslashes($_POST['ed_upgrade']);
						$ed_house = addslashes($_POST['ed_house']);
						$ed_limited = addslashes($_POST['ed_limited']);
						$ed_items = addslashes($_POST['ed_items']);
						
						if(empty($ed_name) || ($ed_preco < 0) || ($ed_level < 0) || ($ed_estoque < 0)){
							echo "<b style='color: red'>Something went wrong</b><br /><br />";
						}else{
							if(mysql_query("UPDATE meh_items_shops SET Name='$ed_name', Items='$ed_items', Staff='$ed_staff', Upgrade='$ed_upgrade', House='$ed_house', Limited='$ed_limited' WHERE id='$ed_id'")){
								
								mysql_query("INSERT INTO admin_logs (`Staff`, `Info`) VALUES ('$user', 'Change shop ID: $ed_id')");
								
								echo "<b style='color: green'></b><br /><br />";
								echo "<script>history.go(0)</script>";
							}else{
								echo "<b style='color: red'>There is Error in some Feald</b><br /><br />";
							}
						}
					}
				?>
			</div>
				<?php
					$edit = addslashes($_GET['edit']);
					$busca_edit = mysql_query("SELECT * FROM meh_items_shops WHERE id=$edit");
					$conta_edit = mysql_num_rows($busca_edit);
					if($conta_edit > 0){
						$fetch_edit = mysql_fetch_array($busca_edit);
						$edit_id = $fetch_edit['id'];
						$edit_name = $fetch_edit['Name'];
						$edit_item = $fetch_edit['Items'];
						$edit_staff = $fetch_edit['Staff'];
						$edit_upgrade = $fetch_edit['Upgrade'];
						$edit_house = $fetch_edit['House'];
						$edit_limited = $fetch_edit['Limited'];
				?>
					<form action="" method="POST">
						<table>
							<tr>
								<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="right">Shop ID: </td><td><?php echo $edit_id; ?></td>
							</tr>
							<tr>
								<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="right">Name: </td><td><input type="text" name="ed_name" value="<?php echo $edit_name; ?>"></td>
							</tr>
							<tr>
									</select>
								</td>
							</tr>
							<tr>
								<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="right">Member: </td>
								<td>
									<select name="ed_upgrade">
										<?php if($edit_upgrade > 0){ ?>
											<option value="1">Yes</option>
											<option value="0">No</option>
										<?php }else{ ?>
											<option value="0">No</option>
											<option value="1">Yes</option>
										<?php } ?>
									</select>
								</td>
							</tr>
							<tr>
								<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="right">House: </td>
								<td>
									<select name="ed_house">
										<?php if($edit_house > 0){ ?>
											<option value="1">Yes</option>
											<option value="0">No</option>
										<?php }else{ ?>
											<option value="0">No</option>
											<option value="1">Yes</option>
										<?php } ?>
									</select>
								</td>
							</tr>
							<tr>
								<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="right">Limited: </td>
								<td>
									<select name="ed_limited">
										<?php if($edit_limited > 0){ ?>
											<option value="1">Yes</option>
											<option value="0">No</option>
										<?php }else{ ?>
											<option value="0">No</option>
											<option value="1">Yes</option>
										<?php } ?>
									</select>
								</td>
							</tr>
							<tr>
								<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="right">Items: </td><td><textarea name="ed_items" cols="40" rows="5"><?php echo $edit_item; ?></textarea></td>
							</tr>
							<tr><td style="border: 1px #000; padding: 10px 50px 10px 50px;"></td><td><input type="hidden" name="ed_id" value="<?php echo $edit_id; ?>"><input type="submit" name="edd" value="Edit Shop"></td></tr>
						</table>
					</form>
			<?php
				}else{
					echo "<b>Wrong Shop ID</b>";
				}
			?>
		
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
			<span>2014</span> © <a href="https://www.facebook.com/MinionsProject?fref=ts" target="_blank">InfinityServers</a>
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