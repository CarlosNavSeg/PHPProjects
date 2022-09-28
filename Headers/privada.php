<?php
$dejame_entrar = $_GET['opcion'] ?? null;
if($dejame_entrar < 50) {
    header("Location:login.php?mostrarONo=0");
}
else {
    echo('Bienvenido');
}
?>