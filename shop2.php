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
		session_start();		unset($_SESSION['warenkorb']);
		echo "Es wurden folgende Artikel zum Warenkorb hinzugef&uuml;gt:";
		$counter = 0;
		$AnzahlWerteTabelleProdukt = getAnzahlWerteInTabelle('produkt','ArtNr');				$warenkorb = array();						for($r = 0; $r <= $AnzahlWerteTabelleProdukt; $r++)			{				if(isset($_POST[$r]))				{					$warenkorb[] = $r;				}				++$counter;			}				$_SESSION['warenkorb'] = $warenkorb;		if(isset($warenkorb))		{						echo gibProdukteArrayAlsTabelleAus($warenkorb);		}		
	  ?>
	  <br><a href='warenkorbAnzeigen.php'> Warenkorb anzeigen</a>
</body>
</html>