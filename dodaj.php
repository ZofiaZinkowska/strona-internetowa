<?php

	session_start();

	
	require_once "baza.php";
	
	if (isset($_POST['tytul']))
	{
		//Udana walidacja? Załóżmy, że tak!
		$wszystko_OK=true;
		
		//Sprawdź poprawność tytul
		$tytul = $_POST['tytul'];
		
		//Sprawdź poprawność wiadomości
		$wiadomosc = $_POST['wiadomosc'];
	
		//Zapamiętaj wprowadzone dane
		$_SESSION['fr_tytul'] = $tytul;
		$_SESSION['fr_wiadomosc'] = $wiadomosc;
		$idUzytkownik = $_SESSION['idUzytkownik'];

		mysqli_report(MYSQLI_REPORT_STRICT);
		try 
		{
			$conn = new mysqli('localhost', 'root', '', 'mydb');
			if ($conn->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
				if ($conn->query("INSERT INTO wiadomosc ( tytul, wiadomosc,Uzytkownik_idUzytkownik) VALUES ('$tytul','$wiadomosc','$idUzytkownik')")) 
					//query() - Wykonuje zapytanie w bazie danych
					{
						$_SESSION['wyslano']=true;
						echo "Wiadomość została wysłana";
						header('Location: panel.php');
					}
					else
					{
						echo "Nie udało się wysłać wiadomości";
						throw new Exception($conn->error);
					}
				$conn->close();
		}
		catch(Exception $e)
		{
			echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o wiadomość w innym terminie!</span>';
			echo '<br />Informacja developerska: '.$e;
		}
	}
?>