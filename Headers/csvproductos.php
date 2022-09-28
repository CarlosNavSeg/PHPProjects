<?php
header("Content-Type:text/csv");
header("Content-disposition: attachment; filename=productos.csv");
$productos = ["1" => "Producto 1", "2" => "Producto 2", "3" => "Producto 3"];
foreach($productos as $key => $valor) {
    print("$key;$valor");
    print('<br>');
}

?>