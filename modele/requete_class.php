<?php

Class Requete
{
	public function RequeteInscription($nom, $prenom,$date_naissance,$email,$pseudo,$mdp, $sexe, $pays, $region, $departement, $ville,$db)
	{
		$req="INSERT INTO membre(id, nom, prenom, date_naissance, email, pseudo, mdp, sexe, pays, region, departement, ville) VALUES ('','$nom','$prenom','$date_naissance','$email','$pseudo','$mdp', '$sexe', '$pays', '$region', '$departement', '$ville')";
		$db->exec($req);
	}

	public function RequeteVerifConnexion($pseudo, $mdp, $db)
	{
		$requser = $db->prepare("SELECT * FROM membre WHERE pseudo = ? AND mdp = ?");
		$requser->execute(array($pseudo, $mdp));
      	return $requser->rowCount();
	}

	public function RequeteInfoUser($pseudo, $mdp, $db)
	{
		$requser = $db->prepare("SELECT * FROM membre WHERE pseudo = ? AND mdp = ?");
		$requser->execute(array($pseudo, $mdp));
      	return $requser->fetch();
	}

	public function RequeteModifNom($new_nom, $db)
	{
		$this->new_nom = htmlspecialchars($new_nom);
		$requete_modif_nom ="UPDATE membre SET nom ='".$new_nom."' WHERE id ='".$_SESSION['id']."'";
    	$db->exec($requete_modif_nom);
	}

	public function RequeteModifPrenom($new_prenom, $db)
	{
		$this->new_prenom = htmlspecialchars($new_prenom);
	    $requete_modif_prenom ="UPDATE membre SET prenom ='".$new_prenom."' WHERE id ='".$_SESSION['id']."'";
	    $db->exec($requete_modif_prenom);
	}

	public function RequeteModifDate($new_date, $db)
	{
		$this->new_date = htmlspecialchars($new_date);
    	$requete_modif_date = "UPDATE membre SET date_naissance ='".$new_date."' WHERE id ='".$_SESSION['id']."'";
	    $db->exec($requete_modif_date);
	}

	public function RequeteModifAvatars($db)
	{
		$requette_avatar = "UPDATE membre SET avatar = 'vues/avatars/".$_SESSION['id']."' WHERE id ='".$_SESSION['id']."'";
   		$db->exec($requette_avatar);
	}


}

$requete = new Requete;
?>