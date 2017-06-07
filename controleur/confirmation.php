<?php
error_reporting(E_ALL);
ini_set("display_errors",1);

if(isset($_GET['pseudo'],$_GET['key']) && !empty($_GET['pseudo']) && !empty($_GET['key'])) 
{	
	$userexist = $requete->requeteVerifKey($_GET['pseudo'],$_GET['key'],$db);
	$infouser = $requete->requeteRecupKey($_GET['pseudo'],$_GET['key'],$db);
	if($userexist == 1)
	{
		if($infouser['confirme'] == 0)
		{
			$requete->requeteConfirmKey($_GET['pseudo'],$_GET['key'],$db);
			$affiche = "Votre compte est maintenant Valide ! ";
		} 
		else
		{
			$affiche = "Utilisateur Deja Valide";
		}
	}
	else
	{	
		$affiche = "Utilisateur Inexistant !";
	}

	include_once("vues/confirmation.php");
}


?>