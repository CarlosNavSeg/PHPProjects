<?php
$nombres = ['Juan', 'Carlos', 'Pepe', 'Jose Luis', 'Jose Carlos', 'Jose Maria'];
echo (count($nombres));
echo '<br/>';
$cadenaNombres = implode($nombres);
echo($cadenaNombres);
echo '<br/>';
asort($nombres);
$cadenaNombres2 = implode($nombres);
echo ($cadenaNombres2);
?>