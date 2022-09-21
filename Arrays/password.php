<?php
function rand_Pass($upper=2, $lower=8, $numeric=11, $other=13){
    $caracteresContraseña = array();
    for($i = 0; $i<$upper; $i++) {
        $caracteresContraseña[$i] = chr(rand(65, 90));
    }
    for($i = 2; $i<$lower; $i++) {
        $caracteresContraseña[$i] = chr(rand(97, 122));
    }
    for($i = 8; $i<$numeric; $i++) {
        $caracteresContraseña[$i] = rand(1, 100);
    }
    for($i = 11; $i<$other; $i++) {
        $caracteresContraseña[$i] = chr(rand(33, 47));
    }
    shuffle($caracteresContraseña);
    $a = implode($caracteresContraseña);
    return $a;
}
    print(rand_Pass());
?>