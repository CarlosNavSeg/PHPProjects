<?php
$productos = ["1" => "Producto 1", "2" => "Producto 2", "3" => "Producto 3"];
$id_respuesta= $_GET['id'] ?? null;
if(is_null($productos[$id_respuesta])) {
    echo('Producto no definido');
    header("HTTP/1.0 404 Not Found");
}  
else {
    echo ($productos[$id_respuesta]);
}
?>