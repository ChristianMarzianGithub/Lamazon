
<html>
<head>
	<title>Lamazon - Worlds No.1 Online-Shop</title>	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="style.css">
</head>

<body id="globalBody">
	  <?php
		session_start();
		include_once('hilfs_funktionen.php');
		$dbh = db_connect("marzian_ws");		
		echo "<div class='wrapperLogin'>";
			echo "<div class='Aligner'></div>";
			echo "<div class='Aligner'>
					<a href='index.html'>
						<img src='Unbenannt.png' alt='im Shop anmelden'>
					</a>
					</div>";										echo "<br><a href='warenkorbAnzeigen.php'> Warenkorb anzeigen</a>									<br>						<a href = 'Kasse.php'>zur Kasse</a>					<br>					";
			echo "<div class='Aligner'>";
				echo "<form action='shop2.php' method='POST'>";
					echo "<input type='submit' value='Warenkorb hinzuf&uuml;gen'></input>";
					echo db_show_query("select * from produkt",$dbh);
				echo "</form>";
			echo "</div>";
		echo "</div>";
		db_close($dbh);
		
		$_SESSION['var'] = "af";
		$var = $_SESSION['var'];
		//echo $var;
	  ?>
</body>
</html>