<?php
// on va charger le code des fonctions dans les 3 fichiers
require_once "php/model/fonctions-sql.php";
require_once "php/view/fonctions-affichage.php";
require_once "php/controller/fonctions.php";

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Scoreboard</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <header>
        <nav>
            <?php
// tableau associatif
$a = [
    // "cle"            => "valeur"
    "index.php"         => 'Accueil',
    "ajout-jeu.php"   => 'Ajouter un jeu',
    "ajout-joueur.php" => 'Ajouter un joueur',
    "ajout-match.php" => 'Ajouter un match',
];
foreach($a as $cle => $valeur)
{
    // JE TESTE SI $valeur EST EGAL A $titre
    if ($valeur == $titre) 
    {
        echo 
        <<<html
            <a class="active" href="$cle">$valeur</a>

        html;
    
    }
    else
    {
        echo 
        <<<html
            <a class="" href="$cle">$valeur</a>
    
        html;

    }
}
?>
        </nav>
    </header>
    <main>
        <h1><?php echo $titre ?></h1>