<?php

function connect_to_db()
{
	$servername = "localhost";
    $username = "root";
    $password = "";
	$db_name = "mydb";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $db_name);

    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    //echo "Connected successfully";

    // // Create database
    // $sql = "CREATE DATABASE stronainternetowa";
    // if ($conn->query($sql) === TRUE) {
    // echo "Database created successfully";
    // } else {
    // echo "Error creating database: " . $conn->error;
    // }

    // $conn->close();
	return $conn; 
}
?>
