	<?php
		$page = 'Play';
		error_reporting(0);
		session_start();
		include('inc/overall-head - play.php');
		if(isset($_SESSION['username'])) {
			$status = 'width: 1000px; height: 600px; -moz-border-radius: 15px; -webkit-border-radius: 10px; -moz-box-shadow: 0px 0px 20px #000000; -webkit-box-shadow: 0px 0px 20px #000000; box-shadow: 0px 0px 20px #000000;';
		} else {
			$status = 'display: none;';
		}
	?>
		<style>
			div.post-news {
				width: 100%;
			}
			p.login-notice {
				position:relative;
				display:block;
				float: center;
				background: url(img/loading.gif) no-repeat center;
				padding:100px 50px 20px 40px;
				font-family: "BD Merced", Verdana, Arial, "Bitstream Vera Sans", BD Merced;
				font-size: 30px;
				text-align: center;
			}
		</style>
		<div class="post-news">
			<div class="post-title">
			</div>
			<div class="post-content">
				<center>
					<embed style="<?php echo $status; ?>" src="/game/game.php" style="width: 940px; height: 550px; background-color: f9f9f9; padding: 5px;"></embed>
		         </div>
					<?php include 'scripts.php'; ?><?php if($status=='display: none;') { echo '<div class="warning"><center><h1>You are not logged in, you have to login first before you get to play.</h2></center></div></brs><meta http-equiv="refresh" content="3;home.php"></meta><p class="login-notice" id="fadeobject"><br>Redirecting you to our Homepage...</br></p>';  } ?>
					<img style="visibility:hidden;width:0px;height:0px;" border=0 width=0 height=0 src="http://c.gigcount.com/wildfire/IMP/CXNID=2000002.0NXC/bT*xJmx*PTEzODUyOTUyMTI2NTYmcHQ9MTM4NTI5NTIxNjQ3OSZwPTUzMTUxJmQ9Jmc9MiZvPTZlNTE5NmUzYTM*NDQ4ZTA4YTQ2/MjhkZWIzYWM*NjVlJm9mPTA=.gif" /><br>
				</center>
				</div>
			</div>
		</div>
	<?php
		include('inc/footer.php');
	?>
	</body>
</html>