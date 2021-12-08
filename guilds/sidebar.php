			<div class="left" >
				<p class="p-header">Guild Dashboard: </p>
				<hr />
					<table>
						<tr>
							<td>Username:</td>
							<td><?php echo $username; ?> </td>
						</tr>
						<tr>
							<td>Guild:</td>
							<td><?php echo $guildrow['GuildName']; ?> </td>
						</tr>
						<tr>
							<td>Guild Master:</td>
							<td><?php $founder = $guildrow['Founder']; $query = mysql_query("SELECT * from meh_users where id='$founder'"); $gmrow = mysql_fetch_array($query); echo $gmrow['Username']; ?></td>
						</tr>
						<tr>
							<td>Coins:</td>
							<td><?php echo $row['Coins']; ?></td>
						</tr>
						<tr>
							<td>Guild MOTD:</td>
							<td><font color="red"><?php echo $guildrow['GuildMOTD']; ?></td>
						</tr>
						<tr>
							<td>Hangout Map:</td>
							<td>/join guilds-<?php echo $guildrow['GuildName']; ?></td>
						</tr>
					</table>
				<?php 
	
				
					
					if ($row['GuildInvite']==0) {
						echo '<br /><font color="008fff">You do not have guild invitations as of the moment.</font>';
					} else {
						$guildinvid = $row['GuildInvite'];
						$guildinv = mysql_query("SELECT * FROM meh_guilds WHERE guild='$guildinvid'");
						$guildinvrow = mysql_fetch_array($guildinv);
						$guildnameinv = $guildinvrow['GuildName'];
						echo "<br /><b>You got an invitation from the guild named ";
						echo $guildnameinv;
						echo " <br /><center><a href='invite-accept.php'><button>Accept</button></a> <a href='invite-decline.php'><button>Decline</button></center></a>";
					}
				?>
			</div>
			
			