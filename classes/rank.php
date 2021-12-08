	<?php
		error_reporting(0);
		$page = 'Ranking';
		include('inc/overall-head - Rank.php')
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
			<div class="post-content">
				<center>
                <?php

                         mysql_connect("localhost", "root", "") or die(mysql_error());
                         mysql_select_db("infinity") or die(mysql_error()); 
                             $sql = "SELECT Username, Level, Exp , Gold, Coins, Kills ,Deaths FROM `meh_users` WHERE access < 40 ORDER BY `Level` DESC, `Exp` DESC LIMIT 30"; 
                             $result = mysql_query($sql)or die(mysql_error());
                    echo "<table>";
                    echo "<th>#</th><th>Username</th><th>Level</th><th>Exp</th><th>Gold</th><th>Coins</th><th>PvP Kills</th><th>PvP Deaths</th>"; 
                  while($row = mysql_fetch_array($result)){ $i = $i + 1; $name = $row['Username']; $lvl = $row['Level']; $exp = $row['Exp']; $gold = $row['Gold']; $coin = $row['Coins']; $pvpkills = $row['Kills']; $pvpdeath = $row['Deaths']; $rebirth = $row['Rebirth']; echo "<tr><td>".$i."</td><td>".$name."</td><td>".$lvl."</td><td>".$exp."</td><td>".$gold."</td><td>".$coin."</td><td>".$pvpkills."</td><td>".$pvpdeath."</td><td>".$rebirth."</td></tr>"; } echo "</table>";
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