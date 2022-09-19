<?php
$nombre = $_GET['nombre'] ?? 'Hello';
$prefijo = $_GET['prefijo'] ?? 'Pref';
$nombreCorrecto = trim($nombre, " / ");
echo (strlen($nombre));
?>
<br>
<?php
echo (strtoupper($nombreCorrecto));
?>
<br>
<?php
echo (strtolower($nombreCorrecto));
?>
<br>
<?php
if(strpos($nombreCorrecto, $prefijo) === false) {
    echo ('No se encontró la cadena');
}
else {
    echo('la cadena está');
}
?>
<br>
<?php
echo (substr_count(strtolower($nombre), 'a'));
?>
<br>
<?php
echo(strpos($nombre, 'a'));
?>
<br>
<?php
$nombreCon0 = str_ireplace('o', 0, $nombreCorrecto);
echo ($nombreCon0);
?>
<br>
<?php
$url = 'http://username:password@hostname:9090/path?arg=value';
echo (parse_url($url, 3));
echo '<br/>';
echo (parse_url($url, 0));
echo '<br/>';
echo(parse_url($url, 5));
echo '<br/>';
echo (parse_url($url, 6));
?>