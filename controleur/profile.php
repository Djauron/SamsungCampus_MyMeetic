<?php
require_once("modele/bdd_class.php");

error_reporting(E_ALL);
ini_set("display_errors",1);

if(isset($_SESSION['pseudo'])) {
    if(isset($_POST['valid_recherche']))
    {
        $id = htmlspecialchars($_POST['valid_recherche']); 
        $info_membre = $requete->RequeteSelectionProfil($id,$db);
    }
    else
    {
        $info_membre = $requete->InfoPerso($db);
    }
}

if(isset($_POST['supprimer_compte']))
{
    $requete->SupprimerCompte($db);
    header('Location: index.php?page=deconnexion');
}

if(isset($_POST['ancien_mdp']) || isset($_POST['new_mdp']) || isset($_POST['confirm_mdp']))
{
    if(md5($_POST['ancien_mdp']) == $info_membre['mdp'])
    {
        if($_POST['new_mdp'] == $_POST['confirm_mdp'] && strlen($_POST['new_mdp']) > 1 && strlen($_POST['confirm_mdp']) > 1)
        {
            $requete->RequeteModifMdp($_POST['new_mdp'], $db);
            header('Location: index.php?page=profile');
        }
        else
        {
            $mdp_not_eq = "le mdp ne correspond pas";
        }
    }
    else
    {
        $mauv_mdp = "mauvais mdp";
    }
}

if(isset($_FILES['avatar']))
{
    $nom = "/var/www/html/projects/PHP_my_meetic/vues/avatars/".$_SESSION['id'];
    $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'],$nom);
}

if(isset($_POST['submit']))
{
    $requete->RequeteModifAvatars($db);
    header("Cache-Control:no-cache");
    header('Location: index.php?page=profile');
}

if(isset($_POST['nom']))
{
    $requete->RequeteModifNom($_POST['nom'], $db);
    header('Location: index.php?page=profile');
}
if(isset($_POST['prenom']))
{
    $requete->RequeteModifPrenom($_POST['prenom'], $db);
    header('Location: index.php?page=profile');
}
if(isset($_POST['date']))
{
    $requete->RequeteModifDate($_POST['date'], $db);
    header('Location: index.php?page=profile');
}
if(isset($_POST['pays']))
{
    $requete->RequeteModifPays($_POST['pays'], $db);
    header('Location: index.php?page=profile');
}
if(isset($_POST['ville']))
{
    $requete->RequeteModifVille($_POST['ville'], $db);
    header('Location: index.php?page=profile');
}
if(isset($_POST['region']))
{
    $requete->RequeteModifRegion($_POST['region'], $db);
    header('Location: index.php?page=profile');
}
if(isset($_POST['departement']))
{
    $requete->RequeteModifRegion($_POST['departement'], $db);
    header('Location: index.php?page=profile');
}
if(isset($_POST['mail']))
{
    $requete->RequeteModifEmail($_POST['mail'], $db);
    header('Location: index.php?page=profile');
}

require_once("vues/profile.php");
?>