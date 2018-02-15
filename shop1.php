<html>

<head>
	<title>Lamazon - Worlds No.1 Online-Shop</title>	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="style.css">
</head>

<body id="globalBody">
	  <?php
		include_once('hilfs_funktionen.php');
		$dbh = db_connect("marzian_ws");
		echo "<div class='wrapperLogin'>";
			echo "<div class='Aligner'></div>";
			echo "<div class='Aligner'>
					<a href='index.html'>
						<img src='Unbenannt.png' alt='im Shop anmelden'>
					</a>
					</div>";		
			echo "<div class='Aligner'>";
			echo db_show_query("select * from produkt",$dbh);
			echo "</div>";
		echo "</div>";
		db_close($dbh);
		session_write_close();
	  ?>
</body>
</html>