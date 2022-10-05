<?php
session_start();
$nomusuario = trim($_POST['nombre']);
$contraseña = trim($_POST['contraseña']);
$email = trim($_POST['email']);
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
if(strlen($_POST['nombre'] >= 1) && strlen($_POST['email'] >= 1) && strlen($_POST['contraseña'] >= 1)) {
    $sentencia = "SELECT * FROM contactos WHERE password = '$contraseña' and email = '$email'";
    $result = $pdo->prepare($sentencia);
    $result->execute();
    $gsent = $result->fetch(PDO::FETCH_ASSOC);
    if($gsent == null) {
        $query = "INSERT INTO contactos (username,password,email) VALUES ('$nomusuario', '$contraseña', '$email')";
        $resultado = $pdo->exec($query);
        echo('Te has inscrito correctamente');
        header('Location:/Formulario/login.html');
    }
    else{
        echo('Usuario registrado');
    }
}
else {
    echo('Completa los campos');
}
