<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

        $fruits = ["Pommes", "Poires", "Oranges"];

    ?>

    <select>
        <?php foreach($fruits as $item): ?>
            <option><?=$item?></option>
        <?php endforeach ?>
    </select>
    
</body>
</html>