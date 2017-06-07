<?php
class Connexion 
{
	private $pseudo;
	private $mdp;
	protected $bdd;

	public function __construct($pseudo,$mdp,$db,$requete,$error="null")
	{
		$this->pseudo = htmlspecialchars($pseudo);
		$this->mdp = md5(htmlspecialchars($mdp));
		$this->error = $error;

		if($this->verif($db,$requete) == true)
		{
			header("Location: index.php?page=profile");
		}
	}

	public function verif($db,$requete)
	{
		$verifco = $requete->RequeteVerifConnexion($this->pseudo , $this->mdp , $db);
      	if(!empty($this->pseudo) && !empty($this->mdp))
      	{
			if ($verifco==1) 
			{
				$userinfo = $requete->RequeteInfoUser($this->pseudo , $this->mdp , $db);
				if($userinfo['confirme'] == 1)
				{
					if($userinfo['active'] == 0)
					{
						$_SESSION['id'] = $userinfo['id'];
						$_SESSION['pseudo'] = $userinfo['pseudo'];
						$_SESSION['email'] = $userinfo['email'];
						$_SESSION['nom'] = $userinfo['nom'];
						$_SESSION['prenom'] = $userinfo['prenom'];
						$_SESSION['avatar'] = $userinfo['avatar'];
						$_SESSION['naissance'] = $userinfo['date_naissance'];
						return true;
					}
					else
					{
						$this->error = "Ce compte n'existe plus !";
						return false;
					}
				}
				else
				{
						$this->error = "Veuillez confirmer votre compte !";
						return false;
				}
	    	}
			else
			{
				$this->error = "Pseudo ou Mot de passe incorrect ! " ;
				return false;
			}
		}
		else
		{
			$this->error = "Un des deux champs est vide !";
		}
	}
}
?>
