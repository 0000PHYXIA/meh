	<?php
		error_reporting(0);
		$page = 'Rankings';
		include('inc/overall-head.php')
	?>
		<style>
			div.post-content table td, th {
				padding: 10px;
			}
			th {
				text-align: center;
			}	

		</style>
		<div class="post-news">
			<div class="post-title">
				Guilds Ranking:
			</div>
			<div class="post-content">
				<center>
                <?php

                         mysql_connect("localhost", "root", "") or die(mysql_error());
                         mysql_select_db("infinity") or die(mysql_error()); 
                             $sql = "SELECT GuildName, Description, GuildMOTD, GuildFounder FROM `meh_guilds`"; 
                             $result = mysql_query($sql)or die(mysql_error());
                             $i = 0;
                    echo "<center><table>"; 
                    echo "<th>#</th><th>Guild Name</th><th>Description</th><th>MOTD</th><th>Guild Founder</th>";
                  while($row = mysql_fetch_array($result)){ $i = $i + 1; $guildname = $row['GuildName']; $description = $row['Description']; $motd = $row['GuildMOTD']; $guildfounder = $row['GuildFounder']; echo "<tr><td>".$i."</td><td style='width: 200px;'>".$guildname."</td><td style='width: 200px;'>".$description."</td><td style='width: 200px;'>".$motd."</td><td style='width: 200px;'>".$guildfounder."</td></tr>"; } echo "</table></center>";

                ?>
				</center>
			</div>
		</div>
	<?php
		include('inc/sidebar.php');
		include('inc/footer.php');
	?>
	</body>
</html>