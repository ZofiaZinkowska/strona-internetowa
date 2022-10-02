<?php

	session_start();
	if ($_SESSION['uprawnienia'] != "admin")
            header("location:panel.php");
        require_once "baza.php";

        $conn = @new mysqli('localhost', 'root', '', 'mydb');
        if ($conn->connect_errno!=0)
        {
           echo "Error: ".$conn->connect_errno;
        }
        else
        {
            $stmt = $conn->prepare("DELETE FROM wiadomosc WHERE idWiadomosc=?");
	        $stmt->bind_param('i', $_POST['usunId']);
            $stmt->execute();
            unset($_SESSION['blad']);
            $stmt->close();
            header("Location: panel.php");
        }
        $conn->close();
?>