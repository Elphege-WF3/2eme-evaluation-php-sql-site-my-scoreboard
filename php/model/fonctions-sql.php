<?php

// ON VA CREER UNE CLASSE
class Model
{
    // PROPRIETES DE CLASSE (static)
    // UNE PROPRIETE EST UNE VARIABLE RANGEE DANS UNE CLASSE
    
    static $dbh = null;

    // METHODES DE CLASSE (static)
    // UNE METHODE EST UNE FONCTION RANGEE DANS UNE CLASSE

}

// ETAPE 1: DEFINITION
function envoyerRequeteSql ($requeteSQL, $tabAsso)
{
    // CONNEXION AVEC LA DATABASE MySQL
    $user       = 'root';
    $password   = '';           // SUR XAMPP
    $hostSQL    = 'localhost';  // 127.0.0.1
    $portSQL    = '3306';
    $database   = 'database';       // LE SEUL A CHANGER EN LOCAL A CHAQUE PROJET
    
    $mysql        = "mysql:host=$hostSQL;port=$portSQL;dbname=$database;charset=utf8";
    
    try {
        // ON VA SEULEMENT GARDER UNE SEULE CONNEXION AVEC MySQL
        // POUR LE MOMENT $dbh EST UNE VARIABLE LOCALE
        // => CREE ET DETRUITE A CHAQUE APPEL DE LA FONCTION
        // => ON VA UTILISER UNE PROPRIETE DE CLASSE
        if (Model::$dbh == null) {
            // ON N'A PAS ENCORE OUVERT DE CONNEXION
            // ON VA CREER UNE CONNEXION
            Model::$dbh = new PDO($mysql, $user, $password);   // CONNEXION ENTRE PHP ET MySQL
            // MAINTENANT QU'ON A UNE CONNEXION Model::$dbh != null
        }

        $sth = Model::$dbh->prepare($requeteSQL);          // ON FOURNIT NOTRE REQUETE SQL PREPAREE (AVEC LES TOKENS)
        $sth->execute($tabAsso);                    // ON EXECUTE NOTRE REQUETE SQL (AVEC LE TABLEAU ASSO ET LES VALEURS

        // POUR LA LECTURE: ON A BESOIN D'ETAPES SUPPLEMENTAIRES
        // QUI VONT CONTINUER A UTILISER $sth 
        // => ON FAIT UN return EN SORTIE
        return $sth;

    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
    }

}

// ON FOURNIT 
// EN PREMIER PARAMETRE LE NOM DE LA TABLE
// EN 2E PARAMETRE LE TABLEAU ASSO AVEC LES COLONNES ET LES VALEURS A AJOUTER
// PROTECTION CONTRE LES INJECTIONS SQL
// => MISE EN QUARANTAINE DES INFOS EXTERIEURES DANS UN TABLEAU ASSOCIATIF
function insererLigne ($table, $tabAsso)
{
    $listeColonne = "";
    $listeToken   = "";
    foreach($tabAsso as $cle => $valeur)
    {
        $listeColonne .= ",$cle";
        $listeToken   .= ",:$cle";
    }
    // astuce, on vire la virgule en trop
    $listeColonne = trim($listeColonne, ",");
    $listeToken   = trim($listeToken, ",");

    $requeteSQL = 
    <<<x
    
    INSERT INTO $table 
    ($listeColonne) 
    VALUES 
    ($listeToken);
    
    x;
        
    // ETAPE 2: APPEL DE LA FONCTION
    $resultat = envoyerRequeteSql($requeteSQL, $tabAsso);
    return $resultat;
}

function lireLigne ($table, $colonne, $valeurFiltre)
{
    $requeteSQL =
    <<<x
    
    SELECT * FROM $table
    WHERE $colonne = '$valeurFiltre'

    x;

    $resultat = envoyerRequeteSql($requeteSQL, []);
    $tabLigne = $resultat->fetchAll(PDO::FETCH_ASSOC);  // ON VA OBTENIR UN TABLEAU DE TABLEAUX ASSOCIATIFS

    return $tabLigne;       // RESULTAT ON RENVOIE LE TABLEAU DE LIGNES SELECTIONNEES

}

function lireTable ($table, $tri)
{
    $requeteSQL =
    <<<x
    SELECT * FROM $table
    ORDER BY $tri

    x;
    $resultat = envoyerRequeteSql($requeteSQL, []);
    $tabLigne = $resultat->fetchAll(PDO::FETCH_ASSOC);  // ON VA OBTENIR UN TABLEAU DE TABLEAUX ASSOCIATIFS
    return $tabLigne;       // RESULTAT ON RENVOIE LE TABLEAU DE LIGNES SELECTIONNEES
}

?>
