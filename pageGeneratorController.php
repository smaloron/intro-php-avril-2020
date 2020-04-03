<?php
//mise en mémoire tampon de la sortie php
ob_start();

//ouverture de la session
session_start();

/************************* 
 * Fonctions utiles au traitement
***************************/

function manageUpload(&$message, &$uploadOk, &$filePath){
    $upload = $_FILES["photo"];
    $isValid = $upload["type"] == "image/jpeg" && $upload["error"] == "0";
    $filePath = "img/". uniqid("photo_").".jpg";
    if($isValid){
        $uploadOk = move_uploaded_file($upload["tmp_name"], $filePath);
        if($uploadOk){
            $message = "Upload réussi ";
        } else {
            $message = "Echec de l'upload";
        }
    }
}

function getImageCode($uploadOk, $filePath){
    if($uploadOk){
        $img = "<img src=\"../$filePath\">";
    } else {
        $img = "";
    }

    return $img;
}

function saveHtmlFile($fileName, $title, $img, $text, &$message){
    //inclusion du modèle
    require "templates/article.php";
    //récupération de la mémoire tampon dans une variable
    $htmlCode = ob_get_clean();

    //Enregistrement de la page
    $fileOk = file_put_contents("sorties/$fileName.html", $htmlCode);
    if($fileOk){
        $message .= "Enregistrement réussi <a href='sorties/$fileName.html'>Lien vers la page </a>";
        
        //Enregistrement du message dans la session
        session_regenerate_id(true);
        
        $_SESSION["message"] = $message;
        //redirection en cas succès
        header("location:pageGeneratorController.php");
    } else {
        $message .= "Echec de l'enregistrement";
    }
}

//Les données sont elles postées
$isPosted = filter_has_var(INPUT_POST, "submit");
$hasUpload = isset($_FILES["photo"]["tmp_name"]);

//message de succès ou d'erreur
$message = $_SESSION["message"] ?? "";

//Initialisation du test de l'upload
$uploadOk = false;

if($isPosted){
    //récupération des données
    $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
    $text = filter_input(INPUT_POST, "text", FILTER_SANITIZE_STRING);
    $fileName = filter_input(INPUT_POST, "fileName", FILTER_SANITIZE_STRING);
    $fileName = str_replace("'", "-", $fileName);

    var_dump($fileName);

    //Chemin de l'image
    $filePath = "";

    //Traitement du fichier téléchargé
    if($hasUpload){
        manageUpload($message, $uploadOk, $filePath);
    }

    $img = getImageCode($uploadOk, $filePath);

    //Génération du code html de la page avec ou sans image
    saveHtmlFile($fileName, $title, $img, $text, $message);

    
}

require "views/pageGenerator.php";