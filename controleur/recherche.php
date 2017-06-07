<?php
require_once("modele/bdd_class.php");

error_reporting(E_ALL);
ini_set("display_errors",1);

if(isset($_POST['recherche_profil_sexe']))
{
   $resultat_profil = $requete->RequeteRechercheProfil($_POST['recherche_sexe'],$_POST['recherche_pays'],$_POST['recherche_region'],$_POST['recherche_departement'],$_POST['recherche_ville'], $db);
}


if(isset($_POST['user_search']))
{
    $info_membre = $requete->RequeteRechercheMembre($_POST['user_search'], $db);
}


require_once("vues/recherche.php");
?>