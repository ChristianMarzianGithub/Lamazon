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

		session_start();
		
		//alles an Verabschiedung.php schicken
		
		if(isset($_SESSION['warenkorb']))
		{
			$var = $_SESSION['warenkorb'];
			echo zeigeWarenkorbZumBestellenAn($var);	
		}		
	  ?>

	  
	  <br>
	  <a href = "shop1.php">zur&uuml;ck zur Produkt&uuml;bersicht</a>
	  <br>
	  <a href = "warenKorbKomplettLoeschen.php">Warenkorb komplett l&ouml;schen</a>
	  <br>
</body>

</html>