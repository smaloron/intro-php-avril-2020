<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$pageTitle?></title>
</head>
<body>

    <?php require "fragments/menu.php" ?>

    <h1>Bonjour <?=$name?></h1>

    <form method="post">
        <input type="text" name="messageText" placeholder="Votre message ici" size="40">
        <button type="submit" name="submit">Valider</button>
    </form>

    <div>
        <?= $messages ?>
    </div>

    <form method="post">
        <input type="text" name="personName" placeholder="Votre nom">
        <input type="number" name="personAge" placeholder="Votre âge">
        <button type="submit" name="submitPerson">Valider</button>
    </form>

    <ul>
        <?php foreach($persons as $item): ?>
            <li><?= $item["name"]?></li>
        <?php endforeach ?>
    </ul>
</body>
</html>