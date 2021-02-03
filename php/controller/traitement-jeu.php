<?php

// ETAPES
// VERIFIER SI L'IDENTIFIANT DU FORMULAIRE EST ajout-jeu
// FILTRER LES INFOS DU FORMULAIRE ajout-jeu
// VALIDER SI CHAQUE INFO EST CORRECTE
// AJOUTER LA LIGNE DANS LA TABLE SQL

$formIdentifiant = filtrer("formIdentifiant");
if ($formIdentifiant == "ajout-jeu")
{
    // filtrer => SECURITE POUR ENLEVER LE CODE DANGEREUX
    $tabAsso = [
        "title"             => Form::filtrerTexte("title"),
        "min_players"       => Form::filtrerTexte("min_players"), 
        "max_players"       => Form::filtrerTexte("max_players"),     
    ];
    // ASTUCE: ON VA CREER LES VARIABLES A PARTIR DES CLES 
    extract($tabAsso);

    if ( Form::estOK())
    {
        insererLigne("game", $tabAsso);  // SQL VA CREER UN NOUVEL id POUR LA LIGNE

        // message de confirmation
        echo
        <<<x
        Ce jeu a été créé
        x;
    }
    else
    {
        // TENTATIVE DE HACK
        echo "Merci de ne pas hacker mon site";
    }
}

