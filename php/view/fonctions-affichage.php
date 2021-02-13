<?php
function afficherJoueur() 
{
    $tabLigne = lireTable("player", "id ASC");

    // QUAND ON A UN TABLEAU ET ON VEUT TOUS LES ELEMENTS
    // => ON FAIT UNE BOUCLE
    foreach($tabLigne as $ligneAsso)
    {
        extract($ligneAsso);
        
        // ON AFFICHE LE CODE HTML
        echo
        <<<codehtml
        
        <br>
        <ul>
        <p><h3>Joueur $id : </h3> $nickname</p>
        </ul>

        codehtml;
    }
}

function afficherJeu() 
{
    $tabLigne = lireTable("game", "id ASC");

    // QUAND ON A UN TABLEAU ET ON VEUT TOUS LES ELEMENTS
    // => ON FAIT UNE BOUCLE
    foreach($tabLigne as $ligneAsso)
    {
        extract($ligneAsso);
        
        // ON AFFICHE LE CODE HTML
        echo
        <<<codehtml
        
        <br>
        <ul>
        <h3>Jeu $id :</h3> 
        <p>$title</p>
        </ul>

        codehtml;
    }
}

function afficherMatchAvecLien() 
{
    $tabLigne = lireTable("contest", "id ASC");

    foreach($tabLigne as $ligneAsso)
    {
        extract($ligneAsso);
        
        echo
        <<<codehtml
        
        <br>
        <ul>
            <h3><a href="match.php?id=$id">Match $id</a></h3>
        </ul>

        codehtml;
    }
}

function afficherPageMatch ()
{
    // article.php?id=3
    $id = $_GET["id"] ?? 0; // ON RECUPERE id PAR LE PARAMETRE GET

        // SECURITE: ON CONVERTIT EN ENTIER
    $id = intval($id);
    
    $tabLigne = lireLigne("contest", "id", $id);

    foreach($tabLigne as $ligneAsso)
    {
        extract($ligneAsso);

        echo
        <<<codehtml
        
        <article>
            <h3>Match $id</h3>
        </article>

        codehtml;
    }

}
