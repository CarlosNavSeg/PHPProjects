<?php
session_start();
header('AddHandler application/x-httpd-php52.php');
$opciones = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_PERSISTENT => true,
);
$pdo = new PDO(
    'mysql:host=localhost;dbname=agenda;charset=utf8',
    'root',
    'sa',
$opciones);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
if(strlen($_POST['nombre'] >= 1) && strlen($_POST['email'] >= 1)) {
        $nomusuario = trim($_POST['nombre']);
        $contraseña = trim($_POST['contraseña']);
        $email = trim($_POST['email']);
        echo('Te has inscrito correctamente');
}
else {
    echo('Completa los campos');
}
$query = "INSERT INTO contactos (username,password,email) VALUES ('$nomusuario', '$contraseña', '$email')";
$resultado = $pdo->exec($query);
header('Location:/Formulario/login.html');
?>