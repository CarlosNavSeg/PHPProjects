<?php
session_start();
$username = $_SESSION['username'];
$email = $_SESSION['email'];
$contraseña = $_SESSION['contraseña'];
$opciones = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_PERSISTENT => true
);
$pdo = new PDO(
    'mysql:host=localhost;dbname=agenda;charset=utf8',
    'root',
    'sa',
$opciones);
$query = "SELECT * FROM contactos WHERE username = $username, contraseña = $contraseña, email = $email";
$resultado = $pdo->exec($query);
header("Location:privada.php");
?>