<?php 
	if(!(include "template/css/fonts/config.php")){
		die("<center>FATAL ERROR: Arquivo de configuração não encontrado</center>");
	}
?>
<?php if(!(empty($passon)) && ($access < 40)){ ?>

	<html>
		<head>
			<title>InfinityServer - Upluad SWF</title>
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
	<head>
		<title>InfinityServer - Upluad SWF</title>
		<link rel="stylesheet" href="template/css/style.css">
		<link rel='stylesheet' id='open-sans-css'  href='//fonts.googleapis.com/css?family=Open+Sans%3A300italic%2C400italic%2C600italic%2C300%2C400%2C600&#038;subset=latin%2Clatin-ext&#038;ver=4.0-alpha' type='text/css' media='all' />
		<script>
			function exibeMsg(valor){
				switch (valor){
					case 'Class':
						document.getElementById('upload').innerHTML = '<b>Male:</b> <input type="file" name="arquivo" /><br /><b>Female:</b> <input type="file" name="arquivo1" />';
					break;
					case 'Armor':
						document.getElementById('upload').innerHTML = '<b>Male:</b> <input type="file" name="arquivo" /><br /><b>Female:</b> <input type="file" name="arquivo1" />';
					break;
					default:
						document.getElementById('upload').innerHTML = '<b>Arquivo:</b> <input type="file" name="arquivo" />';
					break;
				}
			}
		</script>
	</head>

	<h2>File Upload</h2>
	
	<?php if(isset($_GET['tipo'])){ ?>
	
		Diretório Atual
		<br />
	
	<?php }else{ ?>
		<?php
			if(isset($_POST['manda'])){
				$continua = true;
				$tipo = $_POST['tipo'];
				switch($tipo){
					case "Sword":
						$destino_file = "items/swords/";
					break;
					case "Dagger":
						$destino_file = "items/daggers/";
					break;
					case "Staff":
						$destino_file = "items/staves/";
					break;
					case "Polearm":
						$destino_file = "items/polearms/";
					break;
					case "Axe":
						$destino_file = "items/axes/";
					break;
					case "Mace":
						$destino_file = "items/maces/";
					break;
					case "Armor":
						$destino_file = "classes/";
					break;
					case "Class":
						$destino_file = "classes/";
					break;
					case "Pet":
						$destino_file = "items/pets/";
					break;
					case "Helm":
						$destino_file = "items/helms/";
					break;
					case "Cape":
						$destino_file = "items/capes/";
					break;
					default:
						$continua = false;
					break;
				}
				
				$_UP['pasta'] = '../game/gamefiles/' . $destino_file;
				if(($tipo == "Class") || ($tipo == "Armor")){
					$_UP['pasta'] = '../gamefiles/' . $destino_file . 'M/';
				}

				$_UP['tamanho'] = 1024 * 1024 * 10;
				$_UP['extensoes'] = array('swf');
				$_UP['renomeia'] = false;

				if ($_FILES['arquivo']['error'] != 0) {
					$continua = false;
				}
				
				if($continua){
					$extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
					if (array_search($extensao, $_UP['extensoes']) === false) {
						$continua = false;
					}else if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {
						$continua = false;
					}else {
						if ($_UP['renomeia'] == true) {
							$nome_final = time().'.swf';
						} else {
							$nome_final = $_FILES['arquivo']['name'];
						}
						
						if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) {
							#Sucesso
						} else {
							$continua = false;
						}
					}
				}
				
				if($continua && ($tipo == "Class" || $tipo == "Armor")){
					$_UP['pasta'] = '../gamefiles/' . $destino_file . 'F/';

					$_UP['tamanho'] = 1024 * 1024 * 10;
					$_UP['extensoes'] = array('swf');
					$_UP['renomeia'] = false;

					if ($_FILES['arquivo1']['error'] != 0) {
						$continua = false;
					}
					
					if($continua){
						$extensao = strtolower(end(explode('.', $_FILES['arquivo1']['name'])));
						if (array_search($extensao, $_UP['extensoes']) === false) {
							$continua = false;
						}else if ($_UP['tamanho'] < $_FILES['arquivo1']['size']) {
							$continua = false;
						}else {
							if ($_UP['renomeia'] == true) {
								$nome_final = time().'.swf';
							} else {
								$nome_final = $_FILES['arquivo1']['name'];
							}
							
							if (move_uploaded_file($_FILES['arquivo1']['tmp_name'], $_UP['pasta'] . $nome_final)) {
								#Sucesso
							} else {
								$continua = false;
							}
						}
					}
				}
				
				if($continua){
					echo "<b style='color: green;'>Success<br /></b>";
				}else{
					echo "<b style='color: red;'>Error<br /></b>";
				}
			}
		?>

		<form method="post" action="" enctype="multipart/form-data">
			<label>Tipo: </label>

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
			</select>
			<br /><br />
			<p id="upload">
				<b>File:</b> <input type="file" name="arquivo" />
			</p>
			<br />
			<input type="submit" name="manda" value="Enviar" />
			</form>
	<?php } ?>
<?php }else{ ?>
	<?php include "login.php"; ?>
<?php } ?>