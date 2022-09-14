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
     echo '<table border = 1>';
     $contador = 1;
     for($n=1; $n<=10; $n++){
     echo "<tr>";
        for($n2 = 1; $n2 <= 10; $n2++) {
            echo "<td>", $contador, "</td>";
            $contador++;
        }
     }
     echo "</table>";
    ?>
</body>
</html>