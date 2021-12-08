<?php include ('head.php'); ?>

	
		<div class="wrapper">
			<div class="introduction" style="font-family:'Segoe'; font-size: 20px;">
				<center>Please be noted that you need 1,500 ACs to make a guild. <?php echo $status; ?><?php if($row['Coins']<1500) { $status = '<p class="error">You do not have sufficient amount of ACs to make guild.</p>'; } else ?></center>
			</div>
			<?php include ('sidebar.php'); ?>
			<div class="content">
				<p class="p-header"><center><h1>Guild Controls: </center></h3></p>
				  <br>
					<div id="create">
						<div id="command-side">
							+ Create
						</div>
						<form method="POST" action="create-confirm.php">
						<br /><br />
							<table align="center">
								<tr>
									<td>Guild Name:</td>
									<td><input type="text" name="createname" placeholder="Name of Guild..."></td>
								</tr>
								<tr>
									<td>Guild Description:</td>
									<td><input type="text" name="createdesc" placeholder="Guild Description"></td>
								</tr>
								<tr>
									<td>Guild's Message of the Day:</td>
									<td><input type="text" name="createmotd" placeholder="Message of the day..."></td>
								</tr>
								<tr>
									<td style="text-align: center;" colspan=2><input type="submit" value="Create"><input type="reset" value="Reset"></td>
								</tr>
							</table>
						</form>
					</div>
					
					<div id="leave">
						<div id="command-side">
							+ Leave Guild
						</div>
						<form method="POST" action="leave-confirm.php">
						<br />
							<table align="center">
								<tr>
									<td>Please remember that once you leave your guild, you can not join back again, unless you join them back.</td>
									<td><input type="submit" value="Leave Guild">
								</tr>
							</table>
						</form>
					</div>
					<div id="invite">
						<div id="command-side">
							+ Invite
						</div>
							<br />
							<form method="POST" action="invite-confirm.php">
								<table align="center">
								<tr>
									<th colspan=3>
										<center>Only Guild Masters can invite.</center>
									</th>
								</tr>
									<tr>
										<td>Name to Invite:</td>
										<td><input type="text" name="invitename" placeholder="Player to invite.."></td>
										<td colspan=2><input type="submit" value="Send Invitation"></td>
									</tr>
								</table>
							</form>	
					</div>
					
					<div id="kick">
						<div id="command-side">
							+ Kick
						</div>
						<br />
						<form method="POST" action="kick-confirm.php">
							<table align="center">
								<tr>
									<th colspan=3>Please be noted that only Guild Masters are allowed to kick members.</th>
								</tr>
								<tr>
									<td>User in your guild to kick:</td>
									<td><input type="text" name="kickname" placeholder="User to kick.."></td>
									<td><input type="submit" value="Kick User"></td>
								</tr>
							</table>
						</form>
					</div>
					<div id="pass">
						<div id="command-side">
							+ Pass Leadership
						</div>
						<br />
						<form method="POST" action="pass-confirm.php">
							<table align="center">
								<tr>
									<th colspan=3>Please be noted that only Guild Leaders/Masters are allowed to pass guild leadership.</th>
								</tr>
								<tr>
									<td>To whom will you pass this?</td>
									<td><input type="text" name="passname" placeholder="User to pass on.."></td>
									<td><input type="submit" value="Pass Leadership"></td>
								</tr>
							</table>
						</form>
					</div>
					
				</div>
			</div>
			
		</div>
	</body>
</html>