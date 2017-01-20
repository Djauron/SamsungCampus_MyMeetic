<?php

Class Requete
{

	public function RequeteInscription($nom, $prenom,$date_naissance,$email,$pseudo,$mdp, $sexe, $pays, $region, $departement, $ville, $key,$db)
	{
		$req="INSERT INTO membre(id, nom, prenom, date_naissance, email, pseudo, mdp, sexe, pays, region, departement, ville, confirmkey) VALUES ('','$nom','$prenom','$date_naissance','$email','$pseudo','$mdp', '$sexe', '$pays', '$region', '$departement', '$ville', '$key')";
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

	public function RequeteModifMdp($new_mdp, $db)
	{
		$this->new_mdp = md5(htmlspecialchars($new_mdp));
        $requete_modif_mdp = "UPDATE membre SET mdp ='".$new_mdp."' WHERE id ='".$_SESSION['id']."'";
        $db->exec($requete_modif_mdp);
	}

	public function RequeteRechercheMembre($recherche_membre, $db)
	{
		$this->recherche_membre = htmlspecialchars($recherche_membre);
		$requete_info = "SELECT * FROM membre WHERE pseudo ='".$_POST['user_search']."'";
	    $requete_info_membre = $db->query($requete_info);
	    return $info_membre = $requete_info_membre->fetch();
	}

	public function InfoPerso($db)
	{
		$requete_info = "SELECT * FROM membre WHERE pseudo ='".$_SESSION['pseudo']."'";
	    $requete_info_membre = $db->query($requete_info);
	    return $info_membre = $requete_info_membre->fetch();
	}

	public function RequeteModifPays($new_pays, $db)
	{
		$this->new_pays = htmlspecialchars($new_pays);
	    $requete_modif_pays ="UPDATE membre SET pays ='".$new_pays."' WHERE id ='".$_SESSION['id']."'";
	    $db->exec($requete_modif_pays);
	}

	public function RequeteModifVille($new_ville, $db)
	{
		$this->new_ville = htmlspecialchars($new_ville);
	    $requete_modif_ville ="UPDATE membre SET ville ='".$new_ville."' WHERE id ='".$_SESSION['id']."'";
	    $db->exec($requete_modif_ville);
	}

	public function RequeteModifRegion($new_region, $db)
	{
		$this->new_region = htmlspecialchars($new_region);
	    $requete_modif_region ="UPDATE membre SET region ='".$new_region."' WHERE id ='".$_SESSION['id']."'";
	    $db->exec($requete_modif_region);
	}

	public function RequeteModifDepartement($new_departement, $db)
	{
		$this->new_departement = htmlspecialchars($new_departement);
	    $requete_modif_departement ="UPDATE membre SET departement ='".$new_departement."' WHERE id ='".$_SESSION['id']."'";
	    $db->exec($requete_modif_departement);
	}

	public function RequeteModifEmail($new_email, $db)
	{
		$this->new_email = htmlspecialchars($new_email);
	    $requete_modif_email ="UPDATE membre SET email ='".$new_email."' WHERE id ='".$_SESSION['id']."'";
	    $db->exec($requete_modif_email);
	}

	public function RequeteRechercheProfil($r_sexe,$r_pays,$r_region,$r_departement,$r_ville,$db)
	{
		$this->r_sexe = htmlspecialchars($r_sexe);
		$this->r_pays = htmlspecialchars($r_pays);
		$this->r_region = htmlspecialchars($r_region);
		$this->r_departement = htmlspecialchars($r_departement);
		$this->r_ville = htmlspecialchars($r_ville);
		$recherche_profil = "SELECT * FROM membre where sexe = '".$r_sexe."'";
		if(!empty($r_pays))
		{
			$recherche_profil .= " AND membre.pays LIKE '%$r_pays%'";
		}
		elseif(!empty($r_region))
		{
			$recherche_profil .= " AND membre.region LIKE '%$r_region%'";
		}
		elseif(!empty($r_departement))
		{
			$recherche_profil .= " AND membre.departement LIKE '%$r_departement%'";
		}
		elseif(!empty($r_ville))
		{
			$recherche_profil .= " AND membre.ville LIKE '%$r_ville%'";
		}
	    $requete_recherche_profil = $db->query($recherche_profil);
	    return $resultat_profil = $requete_recherche_profil->fetchAll();
	}

	public function RequeteSelectionProfil($id,$db)
	{
		$requete = $db->prepare("SELECT * from membre WHERE id = ?");
		$requete->execute(array($id));
		return $requete->fetch();
	}

	public function SupprimerCompte($db)
	{
		$req_ban = "UPDATE membre set active = '1' where id = '".$_SESSION['id']."'";
		$db->exec($req_ban);
	}

	public function requeteVerifKey($pseudo, $key, $db)
	{
		$requser = $db->prepare("SELECT * FROM membre WHERE pseudo = ? AND confirmkey = ?");
		$requser->execute(array($pseudo, $key));
      	return $requser->rowCount();
	}

	public function requeteRecupKey($pseudo, $key, $db)
	{
		$requser = $db->prepare("SELECT * FROM membre WHERE pseudo = ? AND confirmkey = ?");
		$requser->execute(array($pseudo, $key));
      	return $requser->fetch();
	}

	public function requeteConfirmKey($pseudo, $key, $db)
	{
		$requser = $db->prepare("UPDATE membre SET confirme = '1' where pseudo = ?");
		$requser->execute(array($pseudo));
	}
}

$requete = new Requete;
?>