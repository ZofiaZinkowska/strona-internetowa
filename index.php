<?php

	session_start();
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
    <link rel="stylesheet" href="css.css" />
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
			<!-- <a class="menu" href="Kontakt.php">Kontakt</a> -->
            
        </nav>
        
	        <article>
				<h1>Zielono mi</h1>
                <p>
                    Forum "Zielono mi" to wirtualna przestrzeń otwarta na Ciebie i Twoje potrzeby. Znajdziesz tu najważniejsze informacje
                    dotyczące roślin oraz ich pielęgnacji, inspiracje roślinne oraz najważniejsze wskazówki dotyczące uprawy roślin w domu.
                </p>
			</article>
        <section>
			<?php
            require_once "baza.php";

	        $conn = @new mysqli('localhost', 'root', '', 'mydb');
	        if ($conn->connect_errno!=0)
	        {
	           echo "Error: ".$conn->connect_errno;
	        }
	        else
            {
	        $stmt = $conn->prepare("SELECT idPost,tytul,data,godzina,tresc,Uzytkownik_idUzytkownik FROM post"); 
	        //za pomocą prepare() przygotowuje instrukcje sql do wykonania
			//(przygotowujemy jedynie szkielet zapytania zamiast całego zapytania uzupełnianego wartością pobraną ze zmiennej)
			
	        $stmt->execute();
			//execute() wysyła całość do bazy danych - wykonuje przygotowaną instrukcję
			
	        $stmt->store_result();
			//Przesyła zestaw wyników z ostatniego zapytania

	        $ile_postow = $stmt->num_rows;

	        $stmt->bind_result($id, $tytul,$data,$godzina,$tresc, $idUzytkownik);
			//bind_result() - wiąże kolumny w zestawie wyników ze zmiennymi
			
	      	while($stmt->fetch())
				//pobieranie wyników z przygotowanej instrukcji do powiązanych zmiennych
	        {
		    echo "<form id=\"edytuj\" method=\"post\" action=\"edytuj.php\">";
				    echo "<div class=\"post\">";
                    echo "<h2>$tytul, $data, $godzina,$idUzytkownik <br>$tresc</h2>";
                    echo "<input name=\"edytujTytul\" type=\"hidden\" value=\"$tytul\"/>";
					echo "<input name=\"edytujTresc\" type=\"hidden\" value=\"$tresc\"/>";
                    echo "<input name=\"edytujId\" type=\"hidden\" value=\"$id\"/>";
                    echo "<div class=\"inputs\">";
		    if (isset($_SESSION['uprawnienia']) && ($_SESSION['uprawnienia'] == "admin"))
				//isset - Określa, czy zmienna jest zadeklarowana i jest inna niż null
           	    {
                        echo "<button type=\"submit\">Edytuj</button>";
       		    }
                    echo "</div></div>";
		    echo "</form>";
		    if (isset($_SESSION['uprawnienia']) && ($_SESSION['uprawnienia'] == "admin"))
           	    {
		                echo "<form id=\"usun\" method=\"post\" action=\"usun.php\">";
                        echo "<input name=\"usunId\" type=\"hidden\" value=\"$id\"/>";
                        echo "<button type=\"submit\">Usun</button></form>";
       		    }
            }
	        unset($_SESSION['blad']);
	        // unset - Usuwa ustawienie danej zmiennej
			
			$stmt->close();
	        //header("Location: panel.php");
	        }
	        $conn->close();
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

            <article1>
                <p>
                    o życiu wśród roślin • forum o roślinach doniczkowych • pielęgnacja roślin • uprawa roślin w domu
                    • pielęgnacja roślin • rośliny • rośliny doniczkowe • rośliny do mieszkania • rośliny domowe
                    • inspiracje roślinne • kwiaty doniczkowe • kwiaty • kwiaty domowe • palmiarnie • podróże
                </p>
            </article1>
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