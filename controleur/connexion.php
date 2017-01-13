<?php

require_once("modele/connexion_class.php");

if(isset($_POST['validerconnexion']))
{
    $connect = new Connexion($_POST['pseudo'],$_POST['mdp'], $db,$requete);
}
require_once("vues/connexion.php");
?>