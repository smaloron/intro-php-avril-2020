<!--
Inscription à un site

- email
- confirmation de l'email
- mot de passe
- confirmation du mot de passe

Règles de validation :
- Les confirmations doivent être identiques aux infos
- L'email doit être validé
- Le mot de passe doit avoir plus de 5 caractères (mb_strlen)

-->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

    //récupération des données
    $isPosted = filter_has_var(INPUT_POST, "submit");
    $isValid = true;

    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
    $emailConfirm = filter_input(INPUT_POST, "emailConfirm", FILTER_VALIDATE_EMAIL);

    $pwd = filter_input(INPUT_POST, "pwd", FILTER_DEFAULT);
    $pwdConfirm = filter_input(INPUT_POST, "pwdConfirm", FILTER_DEFAULT);

    //Validation des saisies
    $error = "";
    //uniquement si les données ont été postées
    if($isPosted){
        //Validation de l'email
        if(! $email){
            $isValid = false;
        } else if( $email != $emailConfirm){
            $isValid = false;
        }

        //Validation du mot de passe
        if(mb_strlen($pwd) <= 5){
            $isValid = false;
        } else if( $pwd != $pwdConfirm){
            $isValid = false;
        }

        //Définition du message d'erreur

        if(! $isValid){
            $error = "La saisie est invalide, veuillez corriger abruti !";
        }
    }
    


    ?>

    <?php if(! $isPosted || ! $isValid): ?>

        <p><?= $error ?></p>

        <form method="POST">
            <div>
                <label for="">Votre email</label>
                <input type="email" name="email" value="moi@moi.com">
            </div>
            <div>
                <label for="">Confirmer votre email</label>
                <input type="email" name="emailConfirm"  value="moi@moi.com">
            </div>

            <div>
                <label for="">Votre mot de passe</label>
                <input type="password" name="pwd" value="123456">
            </div>

            <div>
                <label for="">Confirmer votre mot de passe</label>
                <input type="password" name="pwdConfirm" value="123456">
            </div>
            
            <div>
                <button type="submit" name="submit">Valider</button>
            </div>
        </form>

    <?php else: ?>
        <h1>Merci pour votre inscription on va pouvoir vous spamer</h1>
    <?php endif ?>


</body>
</html>
