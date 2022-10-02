<?php

	session_start();
?>
<!DOCTYPE html>
<html lang="pl" >
<head>
    <!-- kodowanie znaków, możemy używać polskich znaków -->
    <meta charset="UTF-8" />
	<!-- dodaje plik css.css -->
    <link rel="stylesheet" href="Panel_css.css" />
</head>
<body>
            <div class="panel">
                <form id="post" method="post" action="dodajpost.php">
                    <div class="header">
                        <h1>Dodaj post</h1>
                        <p>Wypełnij poniższe pola aby dodać post do strony</p>
                    </div>
                    <div class="sep"></div>
                    <div class="inputs">
                        <input name="tytul" type="text" placeholder="Tytuł" /> <br/>
                            <?php
			                  if (isset($_SESSION['e_tytul']))
			                  {
				                echo '<div class="error">'.$_SESSION['e_tytul'].'</div>';
				                unset($_SESSION['e_tytul']);
			                  }
		                    ?>
						<input name="data" type="date" placeholder="Data dodania" /> <br/>
                        	<?php
			                  if (isset($_SESSION['e_data']))
			                  {
				                echo '<div class="error">'.$_SESSION['e_data'].'</div>';
				                unset($_SESSION['e_data']);
			                  }
		                    ?>
						<input name="godzina" type="time" placeholder="Godzina dodania" /> <br/>
							<?php
			                  if (isset($_SESSION['e_godzina']))
			                  {
				                echo '<div class="error">'.$_SESSION['e_godzina'].'</div>';
				                unset($_SESSION['e_godzina']);
			                  }
		                    ?>	
						<input name="tresc" type="text" placeholder="Treść" /> <br/>
							<?php
			                  if (isset($_SESSION['e_tresc']))
			                  {
				                echo '<div class="error">'.$_SESSION['e_tresc'].'</div>';
				                unset($_SESSION['e_tresc']);
			                  }
		                    ?>	
                        <button type="submit">Dodaj</button>
                    </div>
                </form>
            </div>
<?php
        require_once "baza.php";
if (isset($_POST['tytul']))
	{
		//Udana walidacja? Załóżmy, że tak!
		$wszystko_OK=true;

		// TYTUŁ
		$tytul = $_POST['tytul'];
		
		//Sprawdź poprawność daty
		$data = $_POST['data'];
		
		//Sprawdź poprawność godziny
		$godzina = $_POST['godzina'];
		
		//Sprawdź poprawność treści
		$tresc = $_POST['tresc'];
	
		//Zapamiętaj wprowadzone dane
		$_SESSION['fr_tytul'] = $tytul;
		$_SESSION['fr_data'] = $data;
		$_SESSION['fr_godzina'] = $godzina;
		$_SESSION['fr_tresc'] = $tresc;
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
				echo "INSERT INTO post ( tytul,data, godzina,tresc,Uzytkownik_idUzytkownik) VALUES ('$tytul','$data','$godzina','$tresc','$idUzytkownik') ";
				if ($conn->query("INSERT INTO post ( tytul,data, godzina,tresc,Uzytkownik_idUzytkownik) VALUES ('$tytul','$data','$godzina','$tresc', '$idUzytkownik')")) 
					{
						$_SESSION['dodano']=true;
						echo "Post został dodany";
						header('Location: index.php');
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
			echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o dodanie posta w innym terminie!</span>';
			echo '<br />Informacja developerska: '.$e;
		}
	}
?>
</body>
</html>