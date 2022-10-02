<?php

	session_start();
	if ($_SESSION['uprawnienia'] != "admin")
    header("location:index.php");
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
        <form id="post" method="post" action="edytuj.php">
        <div class="header">
            <h1>Edytuj post</h1>
            <p>Wypełnij poniższe pola aby edytować post do strony</p>
        </div>
        <div class="sep"></div>
        <div class="inputs">
			
	    <input name="zapiszTytul" type="text" value="<?php echo $_POST['edytujTytul'] ?>"/> <br/>
	    <input name="zapiszTresc" type="text" value="<?php echo $_POST['edytujTresc'] ?>"/> <br/>
	    <input name="zapiszId" type="hidden" value="<?php echo $_POST['edytujId'] ?>"/> </br>
        <button type="submit">Zapisz</button>
        </div>
        </form>
<?php
        if (isset($_POST['zapiszTytul']))
        {
		    require_once "baza.php";

        	$tresc = $_POST['zapiszTresc'];
		    $tytul = $_POST['zapiszTytul'];
		    $id = $_POST['zapiszId'];
		    $conn = @new mysqli('localhost', 'root', '', 'mydb');
		    if ($conn->connect_errno!=0)
		    {
		        echo "Error: ".$conn->connect_errno;
		    }
		    else
		    {
                echo "UPDATE post SET tresc='".$tresc."', tytul='".$tytul."' WHERE idPost=".$id;
		        if ($conn->query("UPDATE post SET tresc='".$tresc."', tytul='".$tytul."' WHERE idPost=".$id))
		    {
		        header("Location: index.php");
		    }
		    else
		    {
			    echo "Nie udało się wysłać wiadomości";
			    throw new Exception($conn->error);
		    }	
			}			
		    $conn->close();
	    }
?>
</body>
</html>