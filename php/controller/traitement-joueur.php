<?php

// ETAPES
// VERIFIER SI L'IDENTIFIANT DU FORMULAIRE EST ajout-joueur
// FILTRER LES INFOS DU FORMULAIRE ajout-joueur
// VALIDER SI CHAQUE INFO EST CORRECTE
// AJOUTER LA LIGNE DANS LA TABLE SQL

$formIdentifiant = filtrer("formIdentifiant");
if ($formIdentifiant == "ajout-joueur")
{
    // filtrer => SECURITE POUR ENLEVER LE CODE DANGEREUX
    $tabAsso = [
        "email"             => Form::filtrerTexte("email"),
        "nickname"       => Form::filtrerTexte("nickname"),    
    ];
    // ASTUCE: ON VA CREER LES VARIABLES A PARTIR DES CLES 
    extract($tabAsso);

    if ( Form::estOK())
    {
        insererLigne("player", $tabAsso);  // SQL VA CREER UN NOUVEL id POUR LA LIGNE

        // message de confirmation
        echo
        <<<x
        Ce joueur a été créé
        x;
    }
    else
    {
        // TENTATIVE DE HACK
        echo "Merci de ne pas hacker mon site";
    }
}

