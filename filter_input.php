<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

        $isPosted = filter_has_var(INPUT_POST, "submit");

        $number = filter_input(INPUT_POST, "numberOfPersons", FILTER_SANITIZE_STRING);

        var_dump($number);

    ?>
    
    <form method="POST" novalidate>

        <div>
            <label>Nombre de personnes</label>
            <input type="text" name="numberOfPersons">
        </div>

        <div>
            <button type="submit" name="submit">Valider</button>
        </div>    
    </form>

</body>
</html>