<?php
session_start();

if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: panel.php');
		exit();
	}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <!-- kodowanie znaków, możemy używać polskich znaków -->
    <meta charset="UTF-8" />
    <!-- tytuł strony -->
    <title> Panel użytkownika </title>
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
            <a class="menu" href="Galeria.php">Galeria</a>
			<a class="menu" href="Panel_użytkownika.php">Panel użytkownika</a>
			<!-- <a class="menu" href="Kontakt.php">Kontakt</a> -->
            
        </nav>
        <section>
            <div class="panel">
                <form id="login" method="post" action="zaloguj.php">
                    <div class="header">
                        <h1>Zaloguj się</h1>
                        <p>Wypełnij poniższe pola by zalogować się do panelu</p>
                    </div>
                    <div class="sep"></div>
                    <div class="inputs">
                        <input name="email" type="email" placeholder="Adres e-mail"  />
                        <input name="haslo" type="password" placeholder="Hasło" />

                        <button type="submit">Zaloguj się</button>
                    </div>
                </form>
                <form id="rejestracja" method="post" action="rejestracja.php">
                    <div class="header">
                        <h1>Rejestracja</h1>
                        <p>Wypełnij poniższe pola by zarejstrować się do panelu</p>
                    </div>
                    <div class="sep"></div>
                    <div class="inputs">
                        <input name="imie" type="text" placeholder="Imię" /> <br />
						    <?php
			                  if (isset($_SESSION['e_imie']))
			                  {
				                echo '<div class="error">'.$_SESSION['e_imie'].'</div>';
				                unset($_SESSION['e_imie']);
			                  }
		                    ?>
						
                        <input name="nazwisko" type="text" placeholder="Nazwisko" /> <br />
                            <?php
			                  if (isset($_SESSION['e_nazwisko']))
			                  {
				                echo '<div class="error">'.$_SESSION['e_nazwisko'].'</div>';
				                unset($_SESSION['e_nazwisko']);
			                  }
		                    ?>
						
						<input name="email" type="email" placeholder="Adres e-mail" /> <br />
                        	<?php
			                  if (isset($_SESSION['e_email']))
			                  {
				                echo '<div class="error">'.$_SESSION['e_email'].'</div>';
				                unset($_SESSION['e_email']);
			                  }
		                    ?>
						
						<input name="haslo" type="password" placeholder="Hasło" /> <br />
							<?php
			                  if (isset($_SESSION['e_haslo']))
			                  {
				                echo '<div class="error">'.$_SESSION['e_haslo'].'</div>';
				                unset($_SESSION['e_haslo']);
			                  }
		                    ?>	
						
                        <button type="submit">Zarejestruj się </button>
                  
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