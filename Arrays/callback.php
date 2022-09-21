<?php
function el_mas_alto()  {
    $aray_Valores = array("hola", "adios", "hallo wie geth's", "auf Wiedershen", "Bonjour");
    $a = max($aray_Valores);
    return $a;
}
function el_mas_bajo() {
    $aray_Valores = array("hola", "adios", "hallo wie geth's", "auf Wiedershen", "Bonjour");
    $b = min($aray_Valores);
    return $b;
}
print(el_mas_alto());
print(el_mas_bajo());
?>