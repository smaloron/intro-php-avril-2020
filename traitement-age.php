<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        //Récupération des données
        $age = $_POST["age"];

        var_dump($_POST);
    ?>

    <h1>Vous avez <?=$age?> ans</h1>
</body>
</html>