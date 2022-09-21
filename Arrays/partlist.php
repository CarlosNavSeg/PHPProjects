<?php
function partlist($a = array()) {
    for($i = 1; $i<count($a); $i++) {
        $b = array_slice($a, $i, count($a));
        $f = array_slice($a, 0, $i);
        $c = implode($b);
        $d = implode ($f);
        $e = array($d , $c);
        print_r($e);
        print('<br/>');
    }
}
partlist(array("Hola ", "que ", "tal ", "estas ", "hoy ", "cariño "))
?>