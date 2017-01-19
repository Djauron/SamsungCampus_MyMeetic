<?php
session_start();

require_once("modele/bdd_class.php");
require_once("modele/requete_class.php");

if(!isset($_GET['page']))
{
	include("controleur/inscription.php");
}
elseif(!empty($_GET['page']) && is_file("controleur/".$_GET['page'].".php"))
{
	include("controleur/".$_GET['page'].".php");
}
else
{
	include("vues/denied_access.php");
}
?>