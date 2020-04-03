<?php
/*
* Obtenir un nombre (GET) de l'utilisateur
* Si le nombre est un multiple de 5 afficher fiz
* Si le nombre est un multiple de 3 afficher buz
* Si le nombre est un multiple de 3 et 5 afficher fizbuz
* Sinon afficher le nombre

$nombre % 3 == 0 => divisible par 3
*/

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        //récupération de la saisie
        $number = $_GET["n"] ?? 0;

        var_dump($number);

        //définition du résultat
        $result = "";

        /*
        if($number % 5 == 0){
            $result = "fiz";
        }

        if ($number % 3 == 0){
            $result = $result . "buz";
        }

        if($result == ""){
            $result = $number;
        }
        */

        if($number % 5 == 0){
            $result = "fiz";
        }else if ($number % 3 == 0){
            $result = "buz";
        } else if ($number % 15 == 0){
            $result = "fizbuz";
        } else {
            $result = $number;
        }

        echo $result;

        //echo ($result=="")?$number:$result;

    ?>

    <ul>
        <?php for($i=1; $i <= 100; $i++): ?>
            <li><a href="fizbuz.php?n=<?= $i ?>">test avec <?= $i ?></a></li>
        <?php endfor; ?>    
    </ul>
</body>
</html>