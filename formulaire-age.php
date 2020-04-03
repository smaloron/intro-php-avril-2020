
<?php

var_dump($_POST);

//récupération des données
$person = $_POST["person"] ?? [];
$address = $_POST["address"] ?? [];

$skill = $_POST["skills"];

$hobbies = $_POST["hobbies"];


$age = $person["age"] ?? null;
$isPosted = isset($_POST["submit"]);

//validation des données

//Initialisation du message d'erreur
$error = "";
//Test uniquement si les données sont postées
if($isPosted){
    //Age compris entre 7 et 77

    if($age < 7 || $age > 77){
        $error = "L'âge doit être compris entre 7 et 77 ans";
    }
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php if ($isPosted and empty($error)): ?>
        <h1>Bonjour <?=$person["name"]?> Vous avez <?= $age ?></h1>
        <h2>Vous habitez à <?= $address["city"]?></h2>
    <?php else: ?>

        <p><?= $error ?></p>

        <form method="POST">

            <div>
                <label>Votre âge :</label>
                <input type="number" name="person[age]" value="<?=$age?>">
            </div>
            <div>
                <label>Votre Nom</label>
                <input type="text" name="person[name]">
            </div>

            <div>
                <label>Votre Ville</label>
                <input type="text" name="address[city]">
            </div>
            <div>
                <label>Votre Code postal</label>
                <input type="text" name="address[zipCode]">
            </div>

            <div>
                <h3>Vos compétences</h3>
                <input type="checkbox" name="skills[]" value="java"> <label>Java</label> <br>
                <input type="checkbox" name="skills[]" value="php"> <label>PHP</label> <br>
                <input type="checkbox" name="skills[]" value="python"> <label>Python</label> <br>
                <input type="checkbox" name="skills[]" value="Ruby"> <label>Ruby</label> <br>
            </div>

            <div>
                <h3>Vos loisirs</h3>
                <select multiple name="hobbies[]">
                    <option>Dessin</option>
                    <option>Danse</option>
                    <option>Foot</option>
                </select>
            </div>
            <button type="submit" value="submit" name="submit">Envoyer</button>
        </form>
    <?php endif ?>
</body>

</html>