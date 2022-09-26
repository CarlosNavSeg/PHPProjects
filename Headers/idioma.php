<?php
$a = "";
$server_host=$_SERVER['HTTP_HOST'];
foreach(getallheaders() as $key => $value) {
    if($key == "Accept-Language") {
        $a = $value;
    }
}
header("Accept_Language: $a");
if(strpos($a, "es-ES") === 0) {
    echo ('Hola buenas');
}
else if(strpos($a, "en-US") === 0) {
    echo ('Greetings');
}
else if(strpos($a, 'de') === 0) {
    echo('Hallo wie Gehts');
}
else {
    echo('Hola buenas <br/> Tu idioma no está soportado estoy mostrandote un lenguaje por defecto');
}
?>