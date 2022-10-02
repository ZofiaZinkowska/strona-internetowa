<?php
session_start();

if ((!isset($_POST['email'])) && (!isset($_POST['haslo'])))
	{
		header('Location: Panel_użytkownika.php');
		exit();
	}

require_once "baza.php";

$conn = @new mysqli('localhost', 'root', '', 'mydb');
if ($conn->connect_errno!=0)
	{
		echo "Error: ".$conn->connect_errno;
	}
	else
    {
	  $email = $_POST['email'];
	  $haslo = $_POST['haslo'];
	  $haslo=sha1($haslo);
	  
	  $stmt = $conn->prepare("SELECT haslo,imie,nazwisko,email,uprawnienia, idUzytkownik FROM uzytkownik WHERE email = ? AND haslo = ? ");
      $stmt->bind_param('ss', $email, $haslo);
	  
	 // if ($stmt->query())
	 $stmt->execute();
	 $stmt->store_result();
	
	    {
		   $ile_imion = $stmt->num_rows;
		   if($ile_imion>0)
		   {
		      //$wiersz = $stmt->fetch_assoc(); 
			  $stmt->bind_result($pass, $imie,$nazwisko,$email,$uprawnienia, $idUzytkownik);
			  $stmt->fetch();
		      //fetch_assoc - przenies dane i włóż je do tablicy asocjacyjnej
		      if ($haslo == $pass)
		       {
			      $_SESSION['zalogowany'] = true;
		          $_SESSION['imie'] = $imie;
		          $_SESSION['nazwisko'] = $nazwisko;
		          $_SESSION['email'] = $email;
		          $_SESSION['uprawnienia'] = $uprawnienia;
				  $_SESSION['idUzytkownik']=$idUzytkownik;

		          unset($_SESSION['blad']);
		          $stmt->close();
		          header("Location: panel.php");
	           }
	           else
	           {
                 $_SESSION['blad'] ='<span style="color:red">Nieprawidłowy email lub hasło</span>';
                 //header('Location: Panel_użytkownika.php');		
	           }	
	       }
	       else
	       {
		     $_SESSION['blad'] = '<span style="color:red">Nieprawidłowy email lub hasło!</span>';
		     //header('Location: Panel_użytkownika.php');
	       }
       }
       $conn->close();
   }
?>