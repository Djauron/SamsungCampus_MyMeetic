<?php

require_once("modele/membre_class.php");
require_once("modele/email_class.php");

error_reporting(E_ALL);
ini_set("display_errors",1);

if(isset($_POST['valid']))
{
	$newMembre=new Membre($_POST['nom'],$_POST['prenom'],$_POST['date_naissance'],$_POST['email'],$_POST['pseudo'],$_POST['mdp'],$_POST['remdp'],$_POST['sexe'],$_POST['pays'],$_POST['region'],$_POST['departement'],$_POST['ville'],$db,$requete);
}

require_once("vues/inscription.php");
?>