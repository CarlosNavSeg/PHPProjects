<?php
session_start();
$contraseña = trim($_POST['contraseña']);
$email = trim($_POST['email']);
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
$query = "SELECT * FROM contactos WHERE password = '$contraseña' and email = '$email'";
$resultado = $pdo->prepare($query);
$resultado->execute();
$gsent = $resultado->fetch(PDO::FETCH_ASSOC);
if($gsent == null) {
    echo('No hemos encontrado el usuario en nuestra base de datos');
}
print_r($gsent);
?>