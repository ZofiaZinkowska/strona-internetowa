<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: zaloguj.php');
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
<?php
    echo" <p> Witaj".$_SESSION['imie']."</p>";
	echo" <p> <b>Nazwisko</b>:".$_SESSION['nazwisko']."</p>";
	echo" <p> <b>E-mail</b>:".$_SESSION['e-mail']."</p>";
	echo" <p> <b>Uprawnienia</b>:".$_SESSION['uprawnienia']."</p>";
?>
</body>
</html>