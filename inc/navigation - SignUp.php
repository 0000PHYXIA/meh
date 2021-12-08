
		<ul class="navigation-menu" id="menu">
			<li><a href="home.php">Home</a></li>
			<li><a href="rank.php"><span class="nav-title"><img src="img/icons/rank-icon.ico" align="center" valign="middle" width="12" height="12"> This is where users are ranked, top 30 users are often the strongest in game.</span>Rankings</a></li>
			<li><a href="terms.php"><span class="nav-title"><img src="img/icons/explore.png" align="center" valign="middle" width="12" height="12"> Read the Terms and Services to avoid misunderstanding, you have to agree with this before playing.</span>Terms</a></li>
			<li><a href="play.php"><span class="nav-title"><img src="img/icons/play.png" align="center" valign="middle" width="12" height="12"> Start the game, have fun!</span>Play</a></li>
			<?php if(isset($_SESSION['username'])) { echo '<li><a href="logout.php">Logout</a></li></li>'; } ?>
		  <div class="navigation-social-bar">
				<a href="https://www.facebook.com/MinionsProject" target="_blank"><img src="img/facebook.png" class="social-icon"></a>
            </div>
		</ul>