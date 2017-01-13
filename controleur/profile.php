<?php
require_once("modele/bdd_class.php");

if(isset($_SESSION['pseudo'])) {

    if(isset($_POST['user_search']))
    {
        $requete_info = "SELECT * FROM membre WHERE pseudo ='".$_POST['user_search']."'";
    }
    else
    {
        $requete_info = "SELECT * FROM membre WHERE pseudo ='".$_SESSION['pseudo']."'";
    }
    $requete_info_membre = $db->query($requete_info);
    $info_membre = $requete_info_membre->fetch();
}

if(isset($_POST['ancien_mdp']) || isset($_POST['new_mdp']) || isset($_POST['confirm_mdp']))
{
    if(md5($_POST['ancien_mdp']) == $info_membre['mdp'])
    {
        if($_POST['new_mdp'] == $_POST['confirm_mdp'] && strlen($_POST['new_mdp']) > 1 && strlen($_POST['confirm_mdp']) > 1)
        {
            $new_mdp = md5(htmlspecialchars($_POST['new_mdp']));
            $requete_modif_mdp = "UPDATE membre SET mdp ='".$new_mdp."' WHERE id ='".$_SESSION['id']."'";
            $db->exec($requete_modif_mdp);
            $maj_prof = "profile mit a jour";
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
    $nom = "/var/www/html/projects/PHP_my_meetic_mvc/vues/avatars/".$_SESSION['id'];
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

require_once("vues/profile.php");
?>