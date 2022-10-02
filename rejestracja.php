<?php

	session_start();
	
	require_once "baza.php";
	
	if (isset($_POST['email']))
	{
		//Udana walidacja? Załóżmy, że tak!
		$wszystko_OK=true;
		
		//Sprawdź poprawność imienia
		$imie = $_POST['imie'];
		
		//Sprawdzenie długości imienia
		if ((strlen($imie)<3) || (strlen($imie)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_imie']="Imie musi posiadać od 3 do 20 znaków!";
		}
		
		if (ctype_alnum($imie)==false)
		{
			$wszystko_OK=false;
			$_SESSION['e_imie']="Imie może składać się tylko z liter i cyfr (bez polskich znaków)";
		}
			//Sprawdź poprawność nazwiska
		$nazwisko = $_POST['nazwisko'];
		
		//Sprawdzenie długości nazwiska
		if ((strlen($nazwisko)<3) || (strlen($nazwisko)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_nazwisko']="Nazwisko musi posiadać od 3 do 20 znaków!";
		}
		
		if (ctype_alnum($nazwisko)==false)
		{
			$wszystko_OK=false;
			$_SESSION['e_nazwisko']="Nazwisko może składać się tylko z liter i cyfr (bez polskich znaków)";
		}
		
		// Sprawdź poprawność adresu email
		$email = $_POST['email'];
		$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
		
		if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
		{
			$wszystko_OK=false;
			$_SESSION['e_email']="Podaj poprawny adres e-mail!";
		}
		
		//Sprawdź poprawność hasła
		$haslo = $_POST['haslo'];
		
		if ((strlen($haslo)<3) || (strlen($haslo)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_haslo']="Hasło musi posiadać od 3 do 20 znaków!";
		}
		$haslo_hash = sha1($haslo);
		
		//Zapamiętaj wprowadzone dane
		$_SESSION['fr_imie'] = $imie;
		$_SESSION['fr_nazwisko'] = $nazwisko;
		$_SESSION['fr_email'] = $email;
		$_SESSION['fr_haslo'] = $haslo;

	
		require_once "baza.php";
		mysqli_report(MYSQLI_REPORT_STRICT);
		try 
		{
			$conn = new mysqli('localhost', 'root', '', 'mydb');
			if ($conn->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{
				//Czy email już istnieje?
				$stmt = $conn->prepare("SELECT idUzytkownik FROM uzytkownik WHERE email='$email'");
				
				if (!$stmt) throw new Exception($conn->error);
				
				$ile_takich_maili = $stmt->num_rows;
				if($ile_takich_maili>0)
				{
					$wszystko_OK=false;
					$_SESSION['e_email']="Istnieje już konto przypisane do tego adresu e-mail!";
				}		
				//var_dump($_SESSION);
				
				if ($wszystko_OK==true)
				{
					//Hurra, wszystkie testy zaliczone, dodajemy uzytkownika do bazy
					
					if ($conn->query("INSERT INTO uzytkownik VALUES (null,'$imie', '$nazwisko', '$email','$haslo_hash', 'uzytkownik')"))
					{
						$_SESSION['udanarejestracja']=true;
						echo "Dodano użytkownika";
						header('Location: Panel_użytkownika.php');
					}
					else
					{
						echo "Nie udało się dodać użytkownika";
						throw new Exception($conn->error);
					}
					
				}
				
				$conn->close();
			}
		}
		catch(Exception $e)
		{
			echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
			echo '<br />Informacja developerska: '.$e;
		}
	}
?>
