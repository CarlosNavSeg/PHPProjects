<?php
function catalogoOrdenador($a, $b) {
    return (strlen($a) > strlen($b)) ? -1 : 1;
}
$catalogo=array('TornilloA12'=>'12cm','TornilloJavier'=>'Es de Javier','TornilloLoco'=>'Es de revensito','TornilloPedo'=>'Es de biden');
usort($catalogo, "catalogoOrdenador");
foreach($catalogo as $clave => $valor) {
    echo("$clave:$valor\n");
}
?>