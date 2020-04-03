<?php
ob_start();

$name = "Béatrice";
$pageTitle = "Accueil";

//lecture d'un fichier json
$data = file_get_contents("data/persons.json");
$persons = json_decode($data, true);

var_dump($data);

//Traitement du formulaire des messages
$isPosted = filter_has_var(INPUT_POST, "submit");
if($isPosted){
    $text = filter_input(INPUT_POST, "messageText", FILTER_SANITIZE_STRING);
    if(! empty($text)){
        file_put_contents("data/messages.txt", "\n$text", FILE_APPEND | LOCK_EX);
    }
}

//traitement du formulaire des personnes
$isPersonPosted = filter_has_var(INPUT_POST, "submitPerson");
if($isPersonPosted){
    //Récupération de la saisie
    $personName = filter_input(INPUT_POST, "personName", FILTER_SANITIZE_STRING);
    $personAge = filter_input(INPUT_POST, "personAge", FILTER_SANITIZE_NUMBER_INT);
    //Contrôle de la saisie
    if(!empty($personName) && ! empty($personAge)){
        //création d'une nouvelle personne
        $newPerson = ["name" => $personName, "age" => $personAge];
        //Ajout de la nouvelle personne à la liste des personnes
        array_push($persons, $newPerson);
        //Enregistrement de la nouvelle liste dans le fichier
        file_put_contents("data/persons.json", json_encode($persons));
    }
}

//Lecture du fichier texte
$messages = file_get_contents("data/messages.txt");
$messages = nl2br($messages);

var_dump(glob("*.php"));

require "views/home.php";

$pageContent = ob_get_clean();

file_put_contents("test.html", $pageContent);

echo $pageContent;

//require "views/homeAlt.php";