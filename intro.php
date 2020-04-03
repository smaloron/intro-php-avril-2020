<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intro</title>
    <style> 
        body {
            background-color: <?php echo $_GET["color"] ?? "orange" ?>;
        }
    </style>
</head>
<body>
    <?php 
        //Déclaration des variables
        $name = $_GET["name"] ?? "John"; 
        $firstName = "Bob";
        $now = date('d/m/Y');
        $job = "Développeur";

        $age = $_GET["age"];

        echo $age +3;

        echo $name;
    ?>
    <h1>Hello <?php echo "$firstName $name vous êtes $job"; ?></h1>

    <p> <?php echo "Cliquez ici pour rencontrer d'autres {$job}s"; ?></p>

    <?php
        /*********************** 
         * Affichage de la date
        *************************/
        echo "nous sommes le ";
        echo $now;

        if($age < 18 and $color == "red"){
            echo "Cette couleur est trop chaude pour vous";
        } else if($age > 50 && $color == "red"){
            echo "Cette couleur risque d'abimer vos yeux";
        } else {
            echo "cette couleur vous convient parfaitement";
        }
    ?> 

    <pre>
        <?php var_dump($_SERVER) ?>
    </pre>
</body>
</html>
