	<?php
		error_reporting(0);
		session_start();
		$page = 'Home';
		include('inc/overall-head.php');
	?>
		<div class="post-news">
			<div class="post-title">
				<ul class="post-title-list">
				</ul>
			  </div>
			<div class="post-content">
			<?php include 'config.inc.php' ?>
			
               <?php
				        /* IMPORT DATA FROM DATABASE */
				$query = "SELECT * FROM bse_news ORDER BY id DESC";
				$result = mysql_query($query) or die(mysql_error());
				          while($rows = mysql_fetch_array($result)) {
               ?>
            <div class="general-news">
                 <table>
				 <div class="news-title"><?php echo $rows['title'];?></div>
				 <td align="center" valign="top"><a href="#"><?php echo "<center><img src=\"img/avatar/" . $rows['avatar'] . "\" alt=\"" . $rows['author'] . "\" width=\"150\" height=\"155\" /></center>";?><?php echo $rows['rank'];?></a></td>
				 <td align="center"><h4><center><?php echo $rows['text'];?></center></h4><br><?php echo "<center><img style='border: 1px solid grey; margin-bottom:20px; border-radius: 10px;' src=\"img/events/" . $rows['image'] . "\" width=\"700\" height=\"400\" /></center>";?></td></br>
               <?php 	} ?>
			   </table>
            </div>
         </div>
	  </div>
	<?php
		include('inc/sidebar.php');
		include('inc/footer.php');
	?>

	</body>
</html>