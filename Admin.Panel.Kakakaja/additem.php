<?php 
	if(!(include "template/css/fonts/config.php")){
		die("<center>FATAL ERROR: Arquivo de configuração não encontrado</center>");
	}
?>
<?php if(!(empty($passon)) && ($access < 40)){ ?>

<html>
	<head>
		<title>InfinityServers - AddItem</title>
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
							<li><a href="item.php" class=" active">Item</a></li>
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
						<h1><i class="fa fa-coffee animation-expandUp"></i>Dashboard<br><small>User <?php echo $useron; ?></small></h1>
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
											<strong><?php echo $conta_users; ?></strong><br><small>UserRegistered</small>
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
			<li><?php if(!(isset($_GET['edit']))){ ?>AddItem<?php }else{ ?>Edit Item<?php } ?></li>
		</ul>
		
		<div class="row gutter30">
		<?php if(!(isset($_GET['edit']))){ ?>
			<div style='padding: 10px 50px 10px 50px;'>
			<h2>Add Item</h2>
				<br />
				<?php
					if(isset($_POST['add'])){
						$id = addslashes($_POST['itid']);
						$nome = addslashes($_POST['add-term']);
						$member = addslashes($_POST['member']);
						$acs = addslashes($_POST['coins']);
						$temp = addslashes($_POST['temp']);
						$level = addslashes($_POST['level']);
						$preco = addslashes($_POST['preco']);
						$estoque = addslashes($_POST['estoque']);
						$tipo = addslashes($_POST['tipo']);
						$classid = addslashes($_POST['classid']);
						$file = addslashes($_POST['file']);
						$link = addslashes($_POST['link']);
						
						if($tipo == "Item" || $tipo == "Enhancement"){
							$file = "none";
							$link = "none";
						}
						$desc = addslashes($_POST['desc']);
						
						if(isset($_POST['acumular'])){
							$acumular = addslashes($_POST['acumular']);
						}else{
							$acumular = 1;
						}
						
						$busca_it_add = mysql_query("SELECT Name FROM meh_items WHERE id='$id'");
						$conta_it_add = mysql_num_rows($busca_it_add);
						
						if(empty($id) || empty($nome) || ($level <= 0) || ($preco < 0) || ($estoque < 0) || empty($file) || empty($link) || empty($desc) || ($acumular < 1)){
							echo "<b style='color: red'>Preencha todos os Campos Corretamente</b>";
						}else if($conta_it_add > 0){
							echo "<b style='color: red'>Já Existe um Item com esse ID e também selecione novamente o tipo de item e os arquivos para Upload</b>";
						}else{
							$continua = true;
							if($tipo == "Class" && $classid <= 0){
								$continua = false;
							}
							
							switch($tipo){
								case "Sword":
									//$destino_file = "items/swords/";
									$es = "Weapon";
									$icon = "iwsword";
								break;
								case "Dagger":
									//$destino_file = "items/daggers/";
									$es = "Weapon";
									$icon = "iwdagger";
								break;
								case "Staff":
									//$destino_file = "items/staves/";
									$es = "Weapon";
									$icon = "iwstaff";
								break;
								case "Polearm":
									//$destino_file = "items/polearms/";
									$es = "Weapon";
									$icon = "iwpolearm";
								break;
								case "Axe":
									//$destino_file = "items/axes/";
									$es = "Weapon";
									$icon = "iwaxe";
								break;
								case "Mace":
									//$destino_file = "items/maces/";
									$es = "Weapon";
									$icon = "iwmace";
								break;
								case "Armor":
									//$destino_file = "classes/";
									$es = "co";
									$icon = "iwarmor";
								break;
								case "Class":
									//$destino_file = "classes/";
									$es = "ar";
									$icon = "iiclass";
								break;
								case "Pet":
									//$destino_file = "items/pets/";
									$es = "pe";
									$icon = "iipet";
								break;
								case "Helm":
									//$destino_file = "items/helms/";
									$es = "he";
									$icon = "iihelm";
								break;
								case "Cape":
									//$destino_file = "items/capes/";
									$es = "ba";
									$icon = "iicape";
								break;
								case "Item":
									$es = "None";
									$icon = "iibag";
								break;
								default:
									$continua = false;
								break;
							}
							
							if($continua){
								if(mysql_query("INSERT INTO meh_items (`id`, `Name`, `Upg`, `Coins`, `Temp`, `Cost`, `QtyRemain`, `Lvl`, `ES`, `Type`, `Icon`, `File`, `Link`, `Desc`, `Stk`) VALUES ('$id', '$nome', '$member', '$acs', '$temp', '$preco', '$estoque', '$level', '$es', '$tipo', '$icon', '$file', '$link', '$desc', '$acumular')")){
									echo "<b style='color: green'>Item Added Suecces: $id</b>";
									
									mysql_query("INSERT INTO admin_logs (`Staff`, `Info`) VALUES ('$user', 'Adicionou um Item no ID: $id com o nome: $nome')");
									
								}else{
									echo "<b style='color: red'>There is Error somewhere</b>";
								}
							}else{
									echo "<b style='color: red'>There is an error in some Feald</b>";
							}
						}
						echo "<br /><br />";
					}
				?>
			</div>
			<form method="POST">
				<table>
					<tr>
						<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="right">Add Id: <font color="red" style="font-size: 10px;">(Only Number)</font>: </td><td><input type="text" name="itid" value="<?php echo $_POST['itid']; ?>" maxlength="8"></td>
					</tr>
					<tr>
						<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="right">Name: </td><td><input type="text" name="add-term" value="<?php echo $_POST['add-term']; ?>" maxlength="50"></td>
					</tr>
					<tr>
						<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="right">Members-Only: </td>
						<td>
							<select name="member">
								<?php if(isset($_POST['member']) && $_POST['member'] > 0){ ?>
									<option value="1">Yes</option>
									<option value="0">No</option>
								<?php }else{ ?>
									<option value="0">Yes</option>
									<option value="1">No</option>
								<?php } ?>
							</select>
						</td>
					</tr>
					<tr>
						<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="right">Acs: </td>
						<td>
							<select name="coins">
								<?php if(isset($_POST['coins']) && $_POST['coins'] > 0){ ?>
									<option value="1">YES</option>
									<option value="0">No</option>
								<?php }else{ ?>
									<option value="0">No</option>
									<option value="1">Yes</option>
								<?php } ?>
							</select>
						</td>
					</tr>
					<tr>
						<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="right">Temp Item: </td>
						<td>
							<select name="temp">
								<?php if(isset($_POST['temp']) && $_POST['temp'] > 0){ ?>
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
						<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="right">Price <font color="red" style="font-size: 10px;">(How much will it cost)</font>: </td><td><input type="text" value="<?php if(isset($_POST['preco'])){ echo $_POST['preco']; }else{ echo 0; } ?>" name="preco"></td>
					</tr>
					<tr>
						<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="right">Left in LQS <font color="red" style="font-size: 10px;">(How much left in LQS)</font>: </td><td><input type="text" value="<?php if(isset($_POST['estoque'])){ echo $_POST['estoque']; }else{ echo 0; } ?>" name="estoque"></td>
					</tr>
					<tr>
						<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="right">Level <font color="red" style="font-size: 10px;">(Level requirement)</font>: </td><td><input type="text" value="<?php if(isset($_POST['level'])){ echo $_POST['level']; }else{ echo 1; } ?>" name="level"></td>
					</tr>
					<tr>
						<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="right">Type: </td>
						<td>
							<select name="tipo" onchange="exibeMsg(this.value);">
								<option value="Sword">Sword</option>
								<option value="Dagger">Dagger</option>
								<option value="Staff">Staff</option>
								<option value="Polearm">Polearm</option>
								<option value="Axe">Axe</option>
								<option value="Mace">Mace</option>
								<option value="Armor">Armor</option>
								<option value="Class">Class</option>
								<option value="Pet">Pet</option>
								<option value="Helm">Helm</option>
								<option value="Cape">Cape</option>
								<option value="Item">Bag</option>
							</select>
						</td>
					</tr>
					<tr id="txt">
						<script>
							function exibeMsg(valor){
								switch (valor){
									case 'Class':
										document.getElementById('txt').innerHTML = '<td style="border: 1px #000; padding: 10px 50px 10px 50px;" align="right">Class ID <font color="red" style="font-size: 10px;">(Class id From Meh_classes)</font>: </td><td><input type="text" value="0" name="classid" /></td>';
									break;
									case 'Item':
										document.getElementById('txt').innerHTML = '<td style="border: 1px #000; padding: 10px 50px 10px 50px;" align="right">Acumular: <font color="red" style="font-size: 10px;">(Exemplo: Bone Dust x50)</font> </td><td><input type="text" value="1" name="acumular" /></td>';
										document.getElementById('sfile').innerHTML = '';
										document.getElementById('slink').innerHTML = '';
									break;
									case 'Enhancement':
										document.getElementById('sfile').innerHTML = '';
										document.getElementById('slink').innerHTML = '';
										document.getElementById('txt').innerHTML = '';
									break;
									default:
										document.getElementById('txt').innerHTML = '';
										document.getElementById('sfile').innerHTML = '<td style="border: 1px #000; padding: 10px 50px 10px 50px;" align="right">Swf File: </td><td><input type="text" name="file" value="<?php echo $_POST['file']; ?>" placeholder="Exemplo: items/swords/Caladbolg.swf"></td>';
										document.getElementById('slink').innerHTML = '<td style="border: 1px #000; padding: 10px 50px 10px 50px;" align="right">Linkage: </td><td><input type="text" name="link" value="<?php echo $_POST['link']; ?>" placeholder="Exemplo: Caladbolg"></td>';
									break;
								}
							}
						</script>
					</tr>
					<tr id="sfile">
						<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="right">Swf File: </td><td><input type="text" name="file" value="<?php echo $_POST['file']; ?>" placeholder="Example: items/swords/Caladbolg.swf"></td>
					</tr>
					<tr id="slink">
						<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="right">Linkage: </td><td><input type="text" name="link" value="<?php echo $_POST['link']; ?>" placeholder="Example: Caladbolg"></td>
					</tr>
					<tr>
						<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="right">Description: </td><td><textarea name="desc"><?php echo $_POST['desc']; ?></textarea></td>
					</tr>
					<tr><td style="border: 1px #000; padding: 10px 50px 10px 50px;"></td><td><input type="submit" name="add" value="Add Item"></td></tr>
				</table>
			</form>
		<?php }else{ ?>
			<div style='padding: 10px 50px 10px 50px;'>
				<h2>Edit Item</h2>
				<?php
					if(isset($_POST['edd'])){
						$ed_id = addslashes($_POST['ed_id']);
						$ed_name = addslashes($_POST['ed_name']);
						$ed_coins = addslashes($_POST['ed_coins']);
						$ed_member = addslashes($_POST['ed_member']);
						$ed_temp = addslashes($_POST['ed_temp']);
						$ed_preco = addslashes($_POST['ed_preco']);
						$ed_level = addslashes($_POST['ed_level']);
						$ed_estoque = addslashes($_POST['ed_estoque']);
						$ed_file = addslashes($_POST['ed_file']);
						$ed_link = addslashes($_POST['ed_link']);
						$ed_classid = addslashes($_POST['ed_classid']);
						$ed_stk = addslashes($_POST['ed_stk']);
						$ed_tipo = addslashes($_POST['ed_tipo']);
						
						switch($ed_tipo){
								case "Sword":
									$es = "Weapon";
									$icon = "iwsword";
								break;
								case "Dagger":
									$es = "Weapon";
									$icon = "iwdagger";
								break;
								case "Staff":
									$es = "Weapon";
									$icon = "iwstaff";
								break;
								case "Polearm":
									$es = "Weapon";
									$icon = "iwpolearm";
								break;
								case "Axe":
									$es = "Weapon";
									$icon = "iwaxe";
								break;
								case "Mace":
									$es = "Weapon";
									$icon = "iwmace";
								break;
								case "Armor":
									$es = "co";
									$icon = "iwarmor";
								break;
								case "Class":
									$es = "ar";
									$icon = "iiclass";
								break;
								case "Pet":
									$es = "pe";
									$icon = "iipet";
								break;
								case "Helm":
									$es = "he";
									$icon = "iihelm";
								break;
								case "Cape":
									$es = "ba";
									$icon = "iicape";
								break;
								case "Item":
									$es = "None";
									$icon = "iibag";
								break;
								case "Enhancement":
									$es = "Weapon";
									$icon = "none";
								break;
								case "House":
									$es = "ho";
									$icon = "ihhouse";
								break;
								case "Floor Item":
									$es = "hi";
									$icon = "ihfloor";
								break;
								case "Wall Item":
									$es = "hi";
									$icon = "ihwall";
								break;
								default:
									$continua = false;
								break;
							}
						
						if(empty($ed_name) || ($ed_preco < 0) || ($ed_level < 0) || ($ed_estoque < 0) || ($ed_stk < 0)){
							echo "<b style='color: red'>Preencha todos os Campos Corretamente</b><br /><br />";
						}else{
							if(mysql_query("UPDATE meh_items SET Name='$ed_name', Coins='$ed_coins', Upg='$ed_member', Temp='$ed_temp', Cost='$ed_preco', Lvl='$ed_level', QtyRemain='$ed_estoque', File='$ed_file', Link='$ed_link', ClassID='$ed_classid', Stk='$ed_stk', Type='$ed_tipo', ES='$es', Icon='$icon' WHERE id='$ed_id'")){
							
								mysql_query("INSERT INTO admin_logs (`Staff`, `Info`) VALUES ('$user', 'Change Item ID: $ed_id')");
							
								echo "<b style='color: green'>Item Edited succes</b><br /><br />";
								echo "<script>history.go(0)</script>";
							}else{
								echo "<b style='color: red'>There is an error in some Feald</b><br /><br />";
							}
						}
					}
				?>
			</div>
				<?php
					$edit = addslashes($_GET['edit']);
					$busca_edit = mysql_query("SELECT * FROM meh_items WHERE id=$edit");
					$conta_edit = mysql_num_rows($busca_edit);
					if($conta_edit > 0){
						$types = "Sword,Dagger,Staff,Polearm,Axe,Mace,Armor,Class,Pet,Helm,Cape,Item,Enhancement,House,Floor Item,Wall Item";
						$fetch_edit = mysql_fetch_array($busca_edit);
						$edit_id = $fetch_edit['id'];
						$edit_coins = $fetch_edit['Coins'];
						$edit_upg = $fetch_edit['Upg'];
						$edit_temp = $fetch_edit['Temp'];
						$edit_cost = $fetch_edit['Cost'];
						$edit_lvl = $fetch_edit['Lvl'];
						$edit_name = $fetch_edit['Name'];
						$edit_file = $fetch_edit['File'];
						$edit_link = $fetch_edit['Link'];
						$edit_desc = $fetch_edit['Desc'];
						$edit_estoque = $fetch_edit['QtyRemain'];
						$edit_es = $fetch_edit['ES'];
						$edit_classid = $fetch_edit['ClassID'];
						$edit_type = $fetch_edit['Type'];
						$edit_stk = $fetch_edit['Stk'];
				?>
					<form action="" method="POST">
						<table>
							<tr>
								<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="right">Item ID: </td><td><?php echo $edit_id; ?></td>
							</tr>
							<tr>
								<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="right">Name: </td><td><input type="text" name="ed_name" value="<?php echo $edit_name; ?>" maxlength="50"></td>
							</tr>
							<tr>
								<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="right">Acs: </td>
								<td>
									<select name="ed_coins">
										<?php if($edit_coins > 0){ ?>
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
								<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="right">Member: </td>
								<td>
									<select name="ed_member">
										<?php if($edit_upg > 0){ ?>
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
								<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="right">Temp Item: </td>
								<td>
									<select name="ed_temp">
										<?php if($edit_temp > 0){ ?>
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
								<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="right">Tipe: </td>
								<td>
									<select name="ed_tipo">
										<?php
											$tipos = explode(",", $types);
											for ($b = 0; $b < count($tipos); $b++) {
												if($edit_type == $tipos[$b]){
													if($edit_type == 'Item' || $edit_type == 'None')
														echo "<option value='Item'>{$tipos[$b]}</option>";
													else
														echo "<option value='{$tipos[$b]}'>{$tipos[$b]}</option>";
												}
											}
											for ($c = 0; $c < count($tipos); $c++) {
												if($edit_type != $tipos[$c]){
														if($edit_type == 'Item' || $edit_type == 'None')
															echo "<option value='Item'>{$tipos[$c]}</option>";
														else
															echo "<option value='{$tipos[$c]}'>{$tipos[$c]}</option>";
													}
											}
										?>
									</select>
								</td>
							</tr>
							<tr>
								<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="right">Price: </td><td><input type="text" name="ed_preco" value="<?php echo $edit_cost; ?>"></td>
							</tr>
							<tr>
								<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="right">Level: </td><td><input type="text" name="ed_level" value="<?php echo $edit_lvl; ?>"></td>
							</tr>
							<tr>
								<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="right">LQS <font color="red" style="font-size: 10px;">(Limited Shop)</font>: </td><td><input type="text" name="ed_estoque" value="<?php echo $edit_estoque; ?>"></td>
							</tr>
							<tr>
								<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="right">How much? <font color="red" style="font-size: 10px;">(This will be how much it give)</font>: </td><td><input type="text" name="ed_stk" value="<?php echo $edit_stk; ?>"></td>
							</tr>
							<tr>
								<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="right">File: </td><td><input type="text" name="ed_file" value="<?php echo $edit_file; ?>"></td>
							</tr>
							<tr>
								<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="right">Link: </td><td><input type="text" name="ed_link" value="<?php echo $edit_link; ?>"></td>
							</tr>
							<?php if($edit_es == 'ar'){ ?>
								<tr>
									<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="right">Class ID: </td><td><input type="text" name="ed_classid" value="<?php echo $edit_classid; ?>"></td>
								</tr>
							<?php }else{ ?>
								<input type="hidden" name="ed_classid" value="0">
							<?php } ?>
							<tr><td style="border: 1px #000; padding: 10px 50px 10px 50px;"></td><td><input type="hidden" name="ed_id" value="<?php echo $edit_id; ?>"><input type="submit" name="edd" value="Edit Item"></td></tr>
						</table>
					</form>
			<?php
				}else{
					echo "<b>Invalid ID</b>";
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