<?php
session_start();
header('AddHandler application/x-httpd-php52.php');
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
if(isset($_POST['registro'])) {
    if(strlen($_POST['nombre'] >= 1) && strlen($_POST['email'] >= 1)) {
        $username = trim($_POST['nombre']);
        $password = trim($_POST['contraseña']);
        $email = trim($_POST['email']);
        echo('Te has inscrito correctamente');
    }
}
else {
    echo('Completa los campos');
}
$query = "INSERT INTO USERS(username,email,password) VALUES($username, $email, $contraseña)";
$resultado = $pdo->exec($query);
header('Location:/home/alumno/Repos/introduccionPHP/Formulario/login.html');
?>