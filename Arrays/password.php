<?php
function rand_Pass($upper=2, $lower=5, $numeric=3, $other=2){
    $caracteresNumeros = 0;
    $caracteresUpper = 0;
    $caracteresLower = 0;
    $caracteresEspeciales = 0;
    $caracteresContraseña = array();
    for($i = 0; $i<2; $i++) {
        $caracteresContraseña[$i] = chr(rand(65, 90));
    }
    for($i = 2; $i<7; $i++) {
        $caracteresContraseña[$i] = chr(rand(97, 122));
    }
    for($i = 8; $i<11; $i++) {
        $caracteresContraseña[$i] = rand(1, 100);
    }
    for($i = 11; $i<13; $i++) {
        $caracteresContraseña[$i] = chr(rand(33, 47));
    }
    $a = $caracteresContraseña;
    shuffle($caracteresContraseña);
    foreach($a as  $caracter) {
        if(is_numeric($caracter)) {
            $caracteresNumeros = $caracteresNumeros + 1;
        }
        else if(is_string($caracter)) {
            if(ctype_upper($caracter) == true) {
                $caracteresUpper = $caracteresUpper + 1;
            }
            else if(ctype_lower($caracter)) {
                $caracteresLower = $caracteresLower + 1;
            }
            else if(ctype_punct($caracter) == true) {
                $caracteresEspeciales = $caracteresEspeciales + 1;
            }
        }
    }
    if($caracteresNumeros == $numeric && $caracteresUpper == $upper && $caracteresLower == $lower && $caracteresEspeciales == $other) {
        $b = implode($caracteresContraseña);
        return $b;
    }
    else  {
        return 'No cumple las condiciones';
    }

}
print(rand_Pass());
?>