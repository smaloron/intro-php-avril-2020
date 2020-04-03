<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        $person = [
            "nom"       => "Brahé",
            "prénom"    => "Tycho",
            "salaire"   => 56500,
            "fonction"  => "Lead dev"
        ];
    ?>

    <!-- Liste déroulante des attributs d'une personne -->
    <?php
        $keyList = array_keys($person);
        $html = "<select>";
        for($i=0; $i < count($keyList); $i++){
            $html .= "<option>{$keyList[$i]}</option>";
        }
        $html .= "</select>";

        echo $html;
    ?>

    <table>
    
        <?php foreach($person as $key => $val): ?>
            <tr>
                <td><?= $key ?></td>
                <td><?= $val ?></td>
            </tr>
        <?php endforeach ?>

    </table>
</body>
</html>