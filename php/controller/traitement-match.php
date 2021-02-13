<?php
// ETAPES
// VERIFIER SI L'IDENTIFIANT DU FORMULAIRE EST ajout-match
// FILTRER LES INFOS DU FORMULAIRE ajout-match
// VALIDER SI CHAQUE INFO EST CORRECTE
// AJOUTER LA LIGNE DANS LA TABLE SQL

$formIdentifiant = filtrer("formIdentifiant");
if ($formIdentifiant == "ajout-match")
{
    // filtrer => SECURITE POUR ENLEVER LE CODE DANGEREUX
    $tabAsso = [
        "game_id"             => Form::filtrerTexte("game_id"),  
    ];
    // ASTUCE: ON VA CREER LES VARIABLES A PARTIR DES CLES 
    extract($tabAsso);

    if ( Form::estOK())
    {
        insererLigne("contest", $tabAsso);  // SQL VA CREER UN NOUVEL id POUR LA LIGNE

        // message de confirmation
        echo
        <<<x
        Ce match a été créé
        x;
    }
    else
    {
        // TENTATIVE DE HACK
        echo "Merci de ne pas hacker mon site";
    }
}

