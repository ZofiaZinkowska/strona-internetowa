<!DOCTYPE html>
<html lang="pl">
<head>
    <!-- kodowanie znaków, możemy używać polskich znaków -->
    <meta charset="UTF-8" />
    <!-- tytuł strony -->
    <title> Kontakt </title>
    <!-- importuje czcionkę, którą chce użyć -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&family=Zen+Kaku+Gothic+Antique:wght@300&display=swap" rel="stylesheet">
    <!-- ikonka strony -->
    <link rel="shortcut icon" href="ikona.ico" type="image/x-icon">

    <!-- dodaje plik css.css -->
    <link rel="stylesheet" href="kontaktcss.css" />
</head>
<body>
    <div id="container">
        <header>
            <img src="photo.png" alt="photo - header" />
        </header>
        <nav>
            <a class="menu" href="index.php">Forum</a>
            <a class="menu" href="Galeria.php">Galeria</a>
			<a class="menu" href="Panel_użytkownika.php">Panel użytkownika</a>
            <a class="menu" href="Kontakt.php">Kontakt</a>
            
        </nav>
        <section>
            <div class="panel">
                <form id="formularz" method="post" action="dodaj.php">
                    <div class="header">
                        <h1>Formularz kontaktowy</h1>
                        <p>Wypełnij poniższe pola aby się z nami skontaktować</p>
                    </div>
                    <div class="sep"></div>
                    <div class="inputs">
						<input name="tytul" type="text" placeholder="Tytuł wiadomości" /> <br/>
                        	<?php
			                  if (isset($_SESSION['e_tytul']))
			                  {
				                echo '<div class="error">'.$_SESSION['e_tytul'].'</div>';
				                unset($_SESSION['e_tytul']);
			                  }
		                    ?>
						<input name="wiadomosc" type="text" placeholder="Wiadomość" /> <br/>
							<?php
			                  if (isset($_SESSION['e_wiadomosc']))
			                  {
				                echo '<div class="error">'.$_SESSION['e_wiadomosc'].'</div>';
				                unset($_SESSION['e_wiadomosc']);
			                  }
		                    ?>	
                        <button type="submit">Wyślij </button>
						
                    </div>
                </form>
            </div>
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