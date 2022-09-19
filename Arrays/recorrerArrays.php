<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $meteoris = array(
            'Hoba' => 60000,
            'Cape York' => 5820000,
            'Campo del Cielo' => 2317893,
            'Canyon Diablo' => 12312312
        );
        print_r($meteoris);
        echo "<hr>";
        foreach($meteoris as $meteori){
            echo $meteori . "<br>";
        }
    ?>
</body>
</html>