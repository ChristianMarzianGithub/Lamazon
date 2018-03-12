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

		
		

		$AnzahlWerte = getAnzahlWerteInTabelle('produkt','ArtNr');

		$counter = 0;

		for($i = 1; $i <= getAnzahlWerteInTabelle('produkt','ArtNr');$i++)
		{

			if(isset($_POST[$i]))
			{					
				$warenKorb[$counter] = $i;
				++$counter;
			}
		}		

		
				

		
		$var = $_SESSION['warenkorb'];
		


		/*
			beginnend bei count(warenkorbSessionVariableArray)

		*/
		$appendix= count($var) + $counter;
		$c = count($var);
		
		$zaehler = 0;
		for($i = count($var); $i < $appendix;$i++)
		{
			//echo $i;
			$var[$i] = $warenKorb[$zaehler];
			++$zaehler;
		}
		echo "<br>";
		echo gibProdukteArrayAlsTabelleAus($warenKorb);
		$_SESSION['warenkorb'] = $var;
	  ?>

	  <br><a href='warenkorbAnzeigen.php'> Warenkorb anzeigen</a>
	  <br><a href='shop1.php'> zur Produktauswahl</a>

</body>

</html>