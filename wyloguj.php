<?php

	session_start();
	
	session_unset();
	
	header('Location: Panel_użytkownika.php');

?>