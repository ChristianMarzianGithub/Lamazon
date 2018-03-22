<?php

	function db_connect($dnName)
	{	
		return  mysqli_connect("localhost","root","",$dnName);
	}

	function db_query($sql, $dbh)
	{
		$result = mysqli_query($dbh, $sql);
		return $result;
	}

	function db_show_query($sql, $dbh)
	{
			$counter = 1;
			$dbh = db_connect("marzian_ws");		
			$output = "<div class='container'>
						<table border = '1' class='table table-hover'>";		
			$result = db_query($sql,$dbh);
										while($row = mysqli_fetch_row($result))				{									$output = $output."<tr>";					for($i= 0; $i <= (count($row)-1); $i++)					{											$output = $output."<td>" . $row[$i]. "</td>";										}					$output = $output."<td><input type='checkbox' name='$counter'></input></td>";					$output = $output."</tr>";						++$counter;					}							$output = $output."</table>										</div>";				
			
			return $output;
	}

	function db_create_checkbox($sql,$dbh,$name)
	{		
		$dbh = db_connect("marzian_ws");		
			$output = "<div class='container'>
						<table border = '1' class='table table-hover'>";		
			$result = db_query($sql,$dbh);
			
			while($row = mysqli_fetch_row($result))
			{
				$output = $output."<tr>";
				for($i= 0; $i <= (count($row)-1); $i++)
				{					
					$output = $output."<td>" . $row[$i]. "</td>";					
				}
				$output = $output."<td><input type='checkbox' name='$name'></td>";
				$output = $output."</tr>";			
				
			}		
			$output = $output."</table>
								</div>";
			return $output;
	}
	function db_exist($sql, $dbh)
	{
		$result = db_query($sql,$dbh);
		$output = false;
		while($row = mysqli_fetch_row($result))
			{
				$output = true;
			}
		return $output;		
	}
	function db_close($dbh)
	{
		mysqli_close($dbh);
	}
	function zeigeParameter()
	{
		if(isset($_POST)){
			print_r($_POST);
		}		
		if(isset($_SESSION)){
			print_r($_SESSION);
		}
	}
	function login($kennung, $password, $dbh)
	{
		$loginCorrect = false;
		$sql = "SELECT PASSWORT FROM KUNDE WHERE KENNUNG ='".$kennung."'";
		$resultPassword = db_query($sql, $dbh);
		$resultPasswordString = mysqli_fetch_row($resultPassword);		
		if($password == $resultPasswordString[0]){
			$loginCorrect = true;
		}
		return $loginCorrect;
	}
	function loginForm($kennung, $password)
	{
		if($kennung&&$password)
		{
			$output = "Anmeldung nicht erfolgreich </br><a href='ws1.php'>zur&uuml;ck zum Login</a>";		
			$dbh = db_connect('marzian_ws');
			if(login($kennung,$password,$dbh)){
				$output = "Anmeldung erfolgreich";
				$output = $output."</br><a href='shop1.php'>zur Produktauswahl</a>";
				$_SESSION['kennung'] = $_POST['kennung'];
			}
		}
		else
		{
			$output = "Fehler: keine Eingabe";
		}
		
		return $output;
	}
	function Anmeldung()
	{
		$output = "<form method='post' action='ws2.php'>
			  <div class='form-group'>
				<label for='exampleInputEmail1'>Kennung</label>
				<input type='text' name='kennung' class='form-control' aria-describedby='emailHelp' id='exampleInputEmail1'  placeholder='Kennung'>		
			  </div>
			  <div class='form-group'>
				<label for='exampleInputPassword1'>Password</label>
				<input type='password' name='password' class='form-control' id='exampleInputPassword1' placeholder='Password'>
			  </div>
			  <div class='form-check'>
				<input type='checkbox' name='eingeloggtBleiben' class='form-check-input' id='exampleCheck1'>
				<label class='form-check-label' for='exampleCheck1'>Eingeloggt bleiben</label>
			  </div>
			  <button type='submit' class='btn btn-primary'>Login</button>
			</form>";
		return $output;
	}
	function neuAnmeldung()
	{
		if((isset($_POST['kennungNeu'])&&(isset($_POST['passwordNeu'])))&&(($_POST['kennungNeu']!=""))&&($_POST['passwordNeu']!="")){	
			if(legeNeuenKundenAn($_POST['kennungNeu'],$_POST['passwordNeu'])){
				$_SESSION['AnmeldungOK'] = 1;
			}else{
				$_SESSION['AnmeldungOK'] = 2;
			}
		}		
		$output = "
			<h5>oder:</h5></br><h5>Neuanmeldung</h5></br>
			<form method='post' action='".$_SERVER["PHP_SELF"]."'>
			  <div class='form-group'>
				<label for='exampleInputEmail1'>Kennung</label>
				<input type='text' name='kennungNeu' class='form-control' aria-describedby='emailHelp' id='exampleInputEmail1'  placeholder='Kennung'>		
			  </div>
			  <div class='form-group'>
				<label for='exampleInputPassword1'>Password</label>
				<input type='password' name='passwordNeu' class='form-control' id='exampleInputPassword1' placeholder='Password'>
			  </div>
			  <button type='submit' class='btn btn-primary'>Anmelden</button>
			</form>
		";
		if(isset($_SESSION['AnmeldungOK'])){
			if($_SESSION['AnmeldungOK']==1){
				$output = $output."</br>neuer Kunde erfolgreich angelegt.";
			}else if($_SESSION['AnmeldungOK']==2){
				$output = $output."</br>neuen Kunden anlegen fehlgeschlagen.";
			}
		}
		
		return $output;
	}
	function legeNeuenKundenAn($kennungNeu,$passwordNeu){
		$dbh = db_connect("marzian_ws");
		$output = false;
		$sql = "INSERT INTO kunde(Kennung,Passwort)VALUES('".$kennungNeu."','".$passwordNeu."')";
		db_query($sql, $dbh);		
		return db_exist("SELECT * FROM KUNDE WHERE Kennung='".$kennungNeu."' AND Passwort='".$passwordNeu."'", $dbh);
	}
	
	function getAnzahlWerteInTabelle($table,$pk)
	{	$output = 0;	
		$sql = "SELECT COUNT(".$pk.") AS ANZAHL FROM ".$table;
		$dbh = db_connect("marzian_ws");		
		$result = db_query($sql, $dbh);		
		
		$row = mysqli_fetch_row($result);
		$output = $row[0];		
		
		return $output;
	}	
	
	function gibProdukteArrayAlsTabelleAus($produkteArray)
	{
		$sql = "SELECT * FROM PRODUKT WHERE ARTNR in(";		$count = Count($produkteArray);				if(isset($produkteArray))		{			for($i = 0;$i < $count; $i++)			{				if($i == 0)				{					$sql = $sql.$produkteArray[$i];				}				else				{					$sql = $sql.",".$produkteArray[$i];				}			}					}		$sql = $sql.");";						$dbh = db_connect("marzian_ws");		echo db_show_query($sql, $dbh);
	}			function zeigeWarenkorbZumBestellenAn($produkteArray)	{		$sql = "SELECT * FROM PRODUKT WHERE ARTNR in(";		$count = Count($produkteArray);		if(isset($produkteArray))		{			for($i = 0;$i < $count; $i++)			{				if($i == 0)				{					$sql = $sql.$produkteArray[$i];				}				else				{					$sql = $sql.",".$produkteArray[$i];				}			}					}		$sql = $sql.");";					$dbh = db_connect("marzian_ws");		$counter = 1;			$dbh = db_connect("marzian_ws");				$output = "<div class='container'>						<form method='POST' action='verabschiedung.php'>						<table border = '1' class='table table-hover'>						<tr>							<th>ArtNr</th>							<th>Bezeichnung</th>							<th>Kategorie</th>							<th>Preis</th>							<th>Anzahl</th>						</tr>												";											$result = db_query($sql,$dbh);										while($row = mysqli_fetch_row($result))				{									$output = $output."<tr>";										for($i= 0; $i <= (count($row)-1); $i++)					{											$output = $output."<td>" . $row[$i]. "</td>";					}										$output = $output."<td><input type='number' value='1' name='$counter'></input></td>";					$output = $output."</tr>";						++$counter;				}							$output = $output."					</table>										<button type='submit' class='btn btn-primary'>Produkte jetzt bestellen !</button>					</form>					</div>";				return $output;	}		function getNewBID()	{		$sql = "SELECT max(BID)+1 from Bestellung";		$dbh = db_connect("marzian_ws");		$result = db_query($sql,$dbh);				db_close($dbh);						$row = mysqli_fetch_row($result);				return $row[0];	}		function getKID($kennung)	{		$sql = "SELECT KID FROM KUNDE WHERE Kennung = '".$kennung."'";		$dbh = db_connect("marzian_ws");		$result = db_query($sql,$dbh);				db_close($dbh);				$row = mysqli_fetch_row($result);				return $row[0];	}	function insertBestellung($produkteArray,$AnzahlProdukteArray,$BID,$KID)	{		//erste freie BestellungsID bekommen								for($i = 0; $i < count($produkteArray); $i++)		{			$sql = "INSERT INTO BESTELLUNG (BID,KundeID,ArtNr,Anzahl) VALUES(".$BID.",".$KID.",".$produkteArray[$i].",".$AnzahlProdukteArray[$i];			$sql = $sql.");";										$dbh = db_connect("marzian_ws");			$sql."<br>";			db_query($sql, $dbh);					db_close($dbh);		}	}	function insertRechnung($BID)	{		$uhrzeit = date("H:i");		$datum = date("d.m.Y");		$sql = "INSERT INTO Rechnung(BID,DATUM,UHRZEITERSTELLUNG)VALUES(".$BID.",'".$datum."','".$uhrzeit."')"; 					$dbh = db_connect("marzian_ws");		$sql."<br>";		db_query($sql, $dbh);				db_close($dbh);	}		
?>