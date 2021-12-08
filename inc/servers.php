<br><br>
<?php
        $result = mysql_query("SELECT * FROM meh_servers ORDER BY id") 
                  or die(mysql_error());
            $i = 0;
                  while($chr = mysql_fetch_array($result)){
            $i = $i + 1;
?>
<td><h2><?php echo $chr["Name"]; ?></h2></a></td>
<td><h2><?php echo $chr["Count"]; ?></h2></a></td>
<td><?php 
            if ($chr["Online"] != 0) {
			    echo "<h3><font style=\"color: gold; font-weight: bold;\">Server Online!</font></h3>";
		            } else {
			          echo "<h3><font style=\"color: red; font-weight: bold;\">Server Offline.</font></h3>"; 
	                  }
?></td></br></br><?php } ?>