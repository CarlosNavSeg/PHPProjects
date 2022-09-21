<?php
    $alumnos = [
        ["nombre" => "Pepe", "edad" => 20],
        ["nombre" => "Pedro", "edad" => 21],
        ["nombre" => "Andrés", "edad" => 22],
        ["nombre" => "Ana", "edad" => 23],
        ["nombre" => "Lola", "edad" => 20]
    ];
    print_r($alumnos);
    echo '<br>';
    $filtrarPor = strtolower($_GET["filtrarPor"] ?? "Pepe");
    $filtrados = array_filter($alumnos, 
        function($alumno) use ($filtrarPor){
            return strpos(strtolower($alumno["nombre"]), $filtrarPor) !== FALSE;
        });
    print_r($filtrados);
?>
<?php
$contactos = array(
    array("codigo" => 1, "nombre" => "Juan Pérez",
    "telefono" => "966112233", "email" => "juanp@gmail.com"),
    array("codigo" => 2, "nombre" => "Ana López",
    "telefono" => "965667788", "email" => "anita@hotmail.com"),
    array("codigo" => 3, "nombre" => "Mario Montero",
    "telefono" => "965929190", "email" => "mario.mont@gmail.com"),
    array("codigo" => 4, "nombre" => "Laura Martínez",
    "telefono" => "611223344", "email" => "lm2000@gmail.com"),
    array("codigo" => 5, "nombre" => "Nora Jover",
    "telefono" => "638765432", "email" => "norajover@hotmail.com"),
    );
    print_r($contactos);
    echo '<br>';
    $filtarPor = $_GET["domimio"] ?? "loco";
    $filtradors = array_filter($contactos, function ($contactos) use ($filtrarPor) {
        return strpos($contactos["email"], $filtarPor) !== FALSE;
    });
    print_r($filtadors);
?>