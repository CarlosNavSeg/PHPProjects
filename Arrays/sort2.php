<?php
$temperaturasDeLosMeses='30.5,32.6,27.5,23.2,26.5,24.5,17.5,44.9,22.5,312.423,312.5,12.6';
$cadenaArray=explode(",", $temperaturasDeLosMeses);
sort($cadenaArray);
print_r($cadenaArray);
print('<br/>');
for($i=0; $i<12;$i++) {
    if($i==5 || $i==6) {

    }
    else{
        print($cadenaArray[$i]);
        print('<br/>');
    }
}
?>