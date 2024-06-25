<?php

$servername = "localhost";
$username = "id20691374_manuchomoren0"; 
$password = "Garfield2.0"; 
$dbname = "id20691374_hospital"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
