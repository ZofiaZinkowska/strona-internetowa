<?php

	session_start();

	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: Panel_użytkownika.php');
		exit();
	}
	
?>
<!DOCTYPE html>
<html lang="pl" >
<head>
    <!-- kodowanie znaków, możemy używać polskich znaków -->
    <meta charset="UTF-8" />
    <!-- tytuł strony -->
    <title> Zielono mi </title>
    <!-- importuje czcionkę, którą chce użyć -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&family=Zen+Kaku+Gothic+Antique:wght@300&display=swap" rel="stylesheet">
    <!-- ikonka strony -->
    <link rel="shortcut icon" href="ikona.ico" type="image/x-icon">

    <!-- dodaje plik css.css -->
    <link rel="stylesheet" href="Panel_css.css" />
</head>
<body>
    <div id="container">
        <header>
            <img src="photo.png" alt="photo - header" />
        </header>
        <nav>
            <a class="menu" href="index.php">Forum</a>
            <a class="menu" href="galeria.php">Galeria</a>
            <a class="menu" href="Panel_użytkownika.php">Panel użytkownika</a>
			<a class="menu" href="Kontakt.php">Kontakt</a>
			
        </nav>
        <section>
		        <form id="wyloguj" method="post" action="wyloguj.php">
                    <div class="inputs">
                        <button type="submit">Wyloguj się</button>
                    </div>
				</form>
				 <form id="dodaj" method="post" action="dodajpost.php">
                    <div class="inputs">
                        <button type="submit">Dodaj post</button>
                    </div>
				</form>
	<?php
    echo"<p>Witaj ".$_SESSION['imie']."!</p>";
	echo"<p><b>Nazwisko</b>: ".$_SESSION['nazwisko']."</p>";
	echo"<p><b>Email</b>: ".$_SESSION['email']."</p>";
	echo"<p><b>Uprawnienia</b>: ".$_SESSION['uprawnienia']."</p>";
	
	$dataczas = new DateTime();
	echo $dataczas->format('Y-m-d H:i:s')."<br>";
	?>
	
	
    <?php
	if (isset($_SESSION['uprawnienia']) && ($_SESSION['uprawnienia'] == "admin"))
	{
    require_once "baza.php";

	$conn = @new mysqli('localhost', 'root', '', 'mydb');
	if ($conn->connect_errno!=0)
	{
	  echo "Error: ".$conn->connect_errno;
	}
	else
        {
	 $stmt = $conn->prepare("SELECT idWiadomosc,tytul,wiadomosc,Uzytkownik_idUzytkownik FROM wiadomosc"); 
	 //za pomocą prepare() przygotowuje instrukcje sql do wykonania
	 //(przygotowujemy jedynie szkielet zapytania zamiast całego zapytania uzupełnianego wartością pobraną ze zmiennej)
	 

	 $stmt->execute();
     //execute() wysyła całość do bazy danych - wykonuje przygotowaną instrukcję
 
	 $stmt->store_result();
	 //Przesyła zestaw wyników z ostatniego zapytania

	 $ile_postow = $stmt->num_rows;

	 $stmt->bind_result($id, $tytul, $wiadomosc, $idUzytkownik);
	 //bind_result() - wiąże kolumny w zestawie wyników ze zmiennymi
	 
	 while($stmt->fetch())
		 //pobieranie wyników z przygotowanej instrukcji do powiązanych zmiennych
	 {
	         echo "<div class=\"wiadomosc\">";
             echo "<h2>$tytul,$idUzytkownik <br>$wiadomosc </h2>";
			 echo "<form id=\"usun\" method=\"post\" action=\"usunpanel.php\">";
             echo "<input name=\"usunId\" type=\"hidden\" value=\"$id\"/>";
             echo "<button type=\"submit\">Usun</button></form>";
         }
	 unset($_SESSION['blad']);
	 $stmt->close();
	 //header("Location: panel.php");
	}
	 $conn->close();
	}
    ?>
	
            <div class="gallery">
                <a target="_blank" href="1.jpg">
                    <img src="1.jpg" alt="1">
                </a>
            </div>
            <div class="gallery">
                <a target="_blank" href="2.jpg">
                    <img src="2.jpg" alt="2">
                </a>
            </div>
            <div class="gallery">
                <a target="_blank" href="3.jpg">
                    <img src="3.jpg" alt="3">
                </a>
            </div>
            <div class="gallery">
                <a target="_blank" href="4.jpg">
                    <img src="4.jpg" alt="4">
                </a>
            </div>
            <div class="gallery">
                <a target="_blank" href="5.jpg">
                    <img src="5.jpg" alt="5">
                </a>
            </div>

            <article>
                <p>
                    o życiu wśród roślin • forum o roślinach doniczkowych • pielęgnacja roślin • uprawa roślin w domu
                    • pielęgnacja roślin • rośliny • rośliny doniczkowe • rośliny do mieszkania • rośliny domowe
                    • inspiracje roślinne • kwiaty doniczkowe • kwiaty • kwiaty domowe • palmiarnie • podróże
                </p>
            </article>
        </section>
        <footer>
            <address>
                Copyright 2021, Zofia Zinkowska<br />
                E-mail: <a href="mailto:zinkowskazosia20@gmail.com">zinkowskazosia20@gmail.com</a>
            </address>
        </footer>
    </div>
</body>
</html>