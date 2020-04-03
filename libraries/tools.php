<?php
/**
 * Transforme un tableau associatif d'attributs en une chaîne de caractère
 */
function getAttributesString(array $attributesList){
    $attributesString = "";

    foreach($attributesList as $key => $val){
        $attributesString .= " $key = \"$val\"";
    }

    return $attributesString;
}

/**
 * @author Sébastien Maloron
 * @param string $tagName : Le nom de la balise
 * @param string $content : Le contenu enfant de la balise
 * @param array $attributesList : Un tableau associatif des attributs de la balise
 * @param bool $autoClosed : La balise est elle auto fermée ?
 * 
 * Retourne une chaîne de caractère qui représente une balise html et son contenu
 */
function htmlTag($tagName, $content, array $attributesList = [], $autoClosed = false){

    $attributesString = getAttributesString($attributesList);

    if($autoClosed){
        return "<$tagName $attributesString >";
    } else {
        return "<$tagName $attributesString >$content</$tagName>";
    }   
}

/**
 * Représente une balise img HTML
 */
function imgTag($source, $alt, $attributesList){
    $attributesList["src"] = $source;
    $attributesList["alt"] = $alt;

    return htmlTag("img", "", $attributesList, true);
}

function linkTag($url, $content, $attributesList){
    $attributesList["href"] = $url;
    return htmlTag("a", $content, $attributesList);
}