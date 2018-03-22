

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
		
		$sql = "select * from produkt";
		
		
		
		if(isset($_POST['FilterKatid']))
		{
			if($_POST['FilterKatid'] != 0)
			{
				$sql = $sql." where katid =".$_POST['FilterKatid'];
			}
		}
		
		echo "<div class='wrapperLogin'>";			
			echo "<div class='Aligner'>
		
					<a href='index.html'>
						<img src='Unbenannt.png' alt='im Shop anmelden'>
					</a>

					</div>";							
			
			
			
			echo "<br><a href='warenkorbAnzeigen.php'> Warenkorb anzeigen</a>				
					<br>
						<a href = 'Kasse.php'>zur Kasse</a>
					<br>	
					<a href='ws1.php'>Log Out</a>
				";
				
		echo showAlteRechnungen();
		echo "</div>";		
		
	  ?>
</body>
</html>






















