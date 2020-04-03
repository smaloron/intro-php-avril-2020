<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <p><?=$message?></p>

    <form method="post" enctype="multipart/form-data">
        <div>
            <label>Titre de la page</label><br>
            <input type="text" name="title">
        </div>
        <div>
            <label>nom du fichier</label><br>
            <input type="text" name="fileName">
        </div>
        <div>
            <label>Texte de la page</label><br>
            <textarea name="text" rows="15" cols="25"></textarea>
        </div>
        <div>
            <label>Image</label><br>
            <input type="file" name="photo">
        </div>

        <div>
            <button type="submit" name="submit">Valider</button>
        </div>
    </form>

</body>
</html>