<?php
include "libraries/tools.php";

echo htmlTag("div", "Hello", ["style" => "color:red"]);
echo htmlTag(
    "img", "", 
    [
        "src" => "img/5e83376e03a2b.jpg", 
        "alt" => "texte alternatif"
    ], 
    true
);

echo linkTag(
    "formulaire-age.php",
    "Lien vers le formulaire",
    []
);

$persons = [
    ["name" => "Albert", "age" => 34],
    ["name" => "Paul", "age" => 25],
    ["name" => "Sonia", "age" => 30],
];

$persons = array_map(function($item){
    $item["age"] += 1;
    return $item;
}, $persons);

uasort($persons, function($a,$b){
    return $b["age"] <=> $a["age"];
});

var_dump($persons);







