<?php 
session_start();
if(isset($_SESSION['username'])) {
		
} else {
	header("Location:..");
}

require('../config.inc.php');
session_start();
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$data = mysql_query("Select * from meh_users where username = '$username'");
$row = mysql_fetch_array($data);

$guildid = $row['guild']; 
$guild = mysql_query("SELECT * FROM meh_guilds WHERE guild= '$guildid' "); 
$guildrow = mysql_fetch_array($guild);
?>
<html>
	<head>
		<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
		<title>Game Title - Guild Dashboard</title>
		<style>
		html {
		    background: url('../img/bg/body-background.jpg') fixed no-repeat center;
			font-family: 'Segoe';
			font-size: 15;
		}
		input {
			font-family: 'Segoe';
		}
		@font-face {
				font-family: 'Oswald';
				font-style: normal;
				font-weight: 400;
				src: local('Montserrat-Regular'), url(../fonts/Oswald.woff) format('woff');
		}
		@font-face {
				font-family: 'Segoe';
				src: url('http://themes.googleusercontent.com/static/fonts/opensans/v6/DXI1ORHCpsQm3Vp6mXoaTXhCUOGz7vYGh680lGh-uXM.woff');
		}
		.header {
			background-color: black;
			color: white;
			position: fixed;
			top: 0;
			margin: 0;
			padding: 12px;
			left: 0;
			right: 0;
			text-align: center;
		}
		h1 {
			margin: 0;
			font-weight: 300;
			font-size: 50px;
			font-family: 'Ultra';
		}
		.wrapper {
			margin-left: 25px;
			margin-right: 25px;
		}
		.introduction {
			background-color: #a60505;
			color: fff;
			padding: 10px;
			font-weight: normal;
		}
		hr {
			background-color: white;
			color: white;
			margin-top: 5px;
			margin-bottom: 5px;
		}
		input {
			background-color: lightgreen;
			color: green;
			border: 0;
			border-radius:5px;
			padding: 12px;
		}
		div {
			margin-bottom: 12px;
		}
		.content {
			padding: 12px;
			margin-left: 30%;
		}
		.content, .left {
			background-color: white;
			font-weight: normal;
			-webkit-box-shadow: 0px 0px 15px 5px rgba(170, 170, 170, .75);
			-moz-box-shadow: 0px 0px 15px 5px rgba(170, 170, 170, .75);
			box-shadow: 0px 0px 15px 5px rgba(170, 170, 170, .75);
		}
		hr {
			width: 70%;
		}
		.left {
			margin-right: 12px;
			padding: 12px;
			width: 25%;
			float: left;
			font-weight: 300;
		}
		p {
			margin: 0 auto;
		}
		.p-header {
			text-align: center;
			font-weight: normal;
		}
		tr {
			font-weight: normal;
		}
		b {
			font-weight: normal;
			color: 9f0e0e;
		}
		th {
			color: 008fff;
			font-weight: normal;
		}
		table {
			font-size: 14px;
		}
		.command {
			border-radius: 5px;
			float: left;
			margin-right: 12px;
		}
		#command-side { 
			font-family: 'bd-merced'; 
			text-transform: uppercase; 
			color: green; 
			font-size: 25px; 
			background-color: e4f7ff; 
			text-align: center; 
			padding: 12px;
			-moz-border-radius: 15px;
            -webkit-border-radius: 15px;
            border-radius: 5px;
            -moz-box-shadow: 0px 0px 20px #000000;
            -webkit-box-shadow: 0px 0px 20px #000000;
            box-shadow: 0px 0px 20px #000000;
            opacity: 0.92;
            -ms-filter: progid: DXImageTransform.Microsoft.Alpha(Opacity = 92);
            filter: alpha(opacity = 92);			
		}
		</style>
		<link href='http://fonts.googleapis.com/css?family=Ultra' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" href="../img/icon.png">
	</head>
	<body><b>
	<a href="../home.php" style="text-decoration: none; padding: 12px; color: black; margin-bottom: 5px;"><< Go back home</a><br />