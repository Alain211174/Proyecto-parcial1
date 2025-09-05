<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registro_entradas";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$conn->set_charset("utf8");
?>