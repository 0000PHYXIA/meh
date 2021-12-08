<?php
	#NÃO ALTERE O ARQUIVO SE NÃO SOUBER O QUE ESTÁ FAZENDO!
	error_reporting(0);
	session_start();
	
	include "geral.php";
	
	$con = mysql_connect(DB_HOST, DB_USER, DB_PASS);
	$db = mysql_select_db(DB_DATA);
	

	
	#CONFIGURAÇÕES DA SESSION
	$useron = $_SESSION['userlog'];
	$passon = $_SESSION['passlog'];
	
	if(!(empty($passon))){
		$user = addslashes($useron);
		$pass = addslashes($passon);
		$busca_user = mysql_query("SELECT * FROM meh_users WHERE Username='$user' AND Password='$pass'");
		$fetch_user = mysql_fetch_array($busca_user);
		
		$access = $fetch_user['Access'];
		if($user == "master"){
			$access = 60;
		}else{
			$dadosBRUTO = $locked;
			$dadosBREAK = explode(",", $dadosBRUTO);
			for ($i = 0; $i < count($dadosBREAK); $i++) {
				if($user == $dadosBREAK[$i]){
					$access = 1;
				}
			}
		}
	
	$busca_servers = mysql_query("SELECT SUM(Count) FROM meh_servers WHERE Online>0");
	$fetch_servers = mysql_fetch_array($busca_servers);
	
	$busca_max = mysql_query("SELECT SUM(Max) FROM meh_servers WHERE Online>0");
	$fetch_max = mysql_fetch_array($busca_max);
	
	$busca_users = mysql_query("SELECT id FROM meh_users");
	$conta_users = mysql_num_rows($busca_users);
	
	$busca_staff = mysql_query("SELECT id FROM meh_users WHERE Access>=40");
	$conta_staff = mysql_num_rows($busca_staff);
	
	$busca_staff_on = mysql_query("SELECT id FROM meh_users WHERE Access>=40 AND CurrentServer!='Offline'");
	$conta_staff_on = mysql_num_rows($busca_staff_on);
	
	$busca_ban = mysql_query("SELECT id FROM meh_users WHERE Access<1");
	$conta_ban = mysql_num_rows($busca_ban);
	
	}
	
	if(isset($_GET['logout'])){
		unset($_SESSION['userlog']);
		unset($_SESSION['passlog']);
		echo "<script>history.go(-1)</script>";
	}
?>