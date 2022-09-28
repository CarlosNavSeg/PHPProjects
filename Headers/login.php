<?php
$mostrarONo = $_GET['mostrarONo'] ?? 1;
$opcionDecidir = rand(1 , 100);
if($mostrarONo == 0) {
    print("debes logearte");
}
else{
header("Location: privada.php?opcion=$opcionDecidir");
}
?>