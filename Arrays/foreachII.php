<?php
$color = array('blanco'=>'blanco.html', 'verde' => 'verde.html', 'rojo' => 'rojo.html');
echo('<ul>');
foreach ($color as $color => $link) {
    echo('<li>');
    echo('<a href="');
    echo($link);
    echo('">');
    echo('</a>');
    echo ($color);
    echo('</li>');
} 
echo ('</ul>')
?>