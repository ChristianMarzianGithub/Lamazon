<?php

	function db_connect($dnName)
	{	
		return  mysqli_connect("localhost","root","",$dnName);
	}

	function db_query($sql, $dbh)
	{
		return mysqli_query($dbh, $sql);
	}

	function db_show_query($sql, $dbh)
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
				$output = $output."</tr>";				
			}		
			$output = $output."</table>
								</div>";
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
	function db_exist($sql, $dbh)	{
		$result = db_query($sql,$dbh);
		$output = false;
		while($row = mysqli_fetch_row($result))
			{
				$output = true;
			}
		return $output;		
	}
	function db_close($dbh){
		mysqli_close($dbh);
	}
	function zeigeParameter(){
		if(isset($_POST)){
			print_r($_POST);
		}		
		if(isset($_SESSION)){
			print_r($_SESSION);
		}
	}
	function login($kennung, $password, $dbh)	{
		$loginCorrect = false;
		
		$resultPassword = db_query("SELECT PASSWORT FROM KUNDE WHERE KENNUNG ='test'", $dbh);
		$resultPasswordString = mysqli_fetch_row($resultPassword);		
		if($password == $resultPasswordString[0]){
			$loginCorrect = true;
		}
		return $loginCorrect;
	}
	function loginForm(){
		$output = "Anmeldung nicht erfolgreich </br><a href='ws1.php'>zur&uuml;ck zum Login</a>";		
		$dbh = db_connect('marzian_ws');
		if(login($_POST['kennung'],$_POST['password'],$dbh)){
			$output = "Anmeldung erfolgreich";
			$output = $output."</br><a href='shop1.php'>zur Produktauswahl</a>";
			$_SESSION['kennung'] = $_POST['kennung'];
		}
		return $output;
	}
?>