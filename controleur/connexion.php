<?php

error_reporting(E_ALL);
ini_set("display_errors",1);

if (!isset($_SESSION['pseudo']))
{
	require_once("modele/connexion_class.php");

	if(isset($_POST['validerconnexion']))
	{
	    $connect = new Connexion($_POST['pseudo'],$_POST['mdp'], $db,$requete);
	}
	require_once("vues/connexion.php");
}
else
{
	header("Location: Location: index.php?page=profile");
}
?>