	<?php
		error_reporting(0);
		$page = 'Signup';
		include('inc/overall-head - SignUp.php');
	?>
		<style>
			div.post-content table td, th {
				padding: 10px;
			}
			th {
				text-align: left;
			}	
			div.post-news {
				width: 100%;
			}
		</style>
		<div class="post-news">
			<div class="post-title">
				Sign up to play MinionProject!
			</div>
			<div class="post-content">
				<center>
					You are only allowed to register and play the game once you get to agree our Terms and Conditions. If you have not read it yet, please click <a href="terms.php" target="_blank">here</a>
					<embed src="playme/signup.php" style="width: 940; height: 550; background-color: f9f9f9; padding: 5px;"></embed>
				</center>
			</div>
		</div>
	<?php
		include('inc/footer.php');
	?>
	</body>
</html>