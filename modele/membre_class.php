<?php
class Membre 
{
	private $nom;
	private $prenom;
	private $date_naissance;
	private $email;
	private $pseudo;
	private $mdp;
	private $remdp;
	private $sexe;
	private $pays;
	private $region;
	private $departement;
	private $ville;
	protected $bdd;

	public function __construct($nom,$prenom,$date_naissance,$email,$pseudo, $mdp, $remdp, $sexe, $pays, $region, $departement, $ville,$db,$requete,$error="null",$valid="null")
	{
		$this->nom = htmlspecialchars($nom);
		$this->prenom = htmlspecialchars($prenom);
		$this->date_naissance = htmlspecialchars($date_naissance);
		$this->email = htmlspecialchars($email); 
		$this->pseudo = htmlspecialchars($pseudo);
		$this->mdp = md5(htmlspecialchars($mdp));
		$this->remdp = md5(htmlspecialchars($remdp));
		$this->error = $error;
		$this->valid = $valid;
		$this->sexe = htmlspecialchars($sexe);
		$this->pays = htmlspecialchars($pays);
		$this->region = htmlspecialchars($region);
		$this->departement = htmlspecialchars($departement);
		$this->ville = htmlspecialchars($ville);


		if($this->pseudo($db) && $this->mdp() && $this->email() && $this->sexe() && $this->pays() && $this->region() && $this->departement() && $this->ville() && $this->date_n())
		{
			$longueur_key = 8;
			$key = "";
			for($i=1; $i < $longueur_key; $i++)
			{
				$key .= mt_rand(0,15);
			}

			$mail = new email($this->email, $this->pseudo, $key);

			$requete->RequeteInscription($this->nom,$this->prenom,$this->date_naissance,$this->email,$this->pseudo,$this->mdp, $this->sexe, $this->pays, $this->region, $this->departement, $this->ville, $key, $db);
			$this->valid = "Veuillez confirmer votre inscription avec le mail que vous avez recu.";
		}
	}

	public function pseudo($db)
	{
		$longueur = strlen($this->pseudo);
		$pris = $db->query("SELECT * FROM membre WHERE pseudo = '$this->pseudo'");
		$prisLog=$pris->fetchAll();

		if(!empty($this->pseudo))
		{
			if($longueur<= 20 && empty($prisLog))
			{
				return true;
			}
			else
			{
				$this->error = " Votre pseudo comprends plus de 20 caractéres et/ou est déjà pris par un autre membre !";
				return false;
			}
		}
		else
		{
			$this->error = "veuillez remplir tout les champs !";
			return false;
		}
	}
      
    public function mdp()
	{
		if(!empty($this->mdp))
		{
			if($this->mdp == $this->remdp)
			{
				return true;       
			}
			else
			{
				$this->error = "Vos mots de passes sont différent, veuillez les retapez à l'indentique.";
				return false;
			}
		}
		else
		{
			$this->error = "veuillez remplir tout les champs !";
			return false;
		}       
	}

	public function date_n()
	{
		if(!empty($this->date_naissance))
		{
			$age = (time() - strtotime($this->date_naissance)) / 3600 / 24 / 365;
			if(floor($age) >= 18)
			{
				return true;
			}
			else
			{
				$this->error = "Vous devez etre majeur pour vous inscrire ! ";
				return false;
			}
		}
		else
		{
			$this->error = "veuillez remplir tout les champs !";
			return false;
		}
	}
       
    public function email()
    {
    	if(!empty($this->email))
    	{
		    if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $this->email))
		    {
				return true;
		    }
		    else
		    {
		    	$this->error = 'L\'adresse ' . $this->email . ' n\'est pas valide !';
		    	return false;
		    }
		}
		else
		{
			$this->error = "veuillez remplir tout les champs 3!";
			return false;
		}
    }

    public function sexe()
    {
    	if(!empty($this->sexe))
    	{
	    	if($this->sexe == "homme" || $this->sexe == "femme" || $this->sexe == "autre")
	    	{
	    		return true;
	    	}
	    	else
	    	{
	    		$this->error = "Veuillez selectionner un sexe !";
				return false;
	    	}
	    }
	    else
	    {
	    	$this->error = "veuillez remplir tout les champs !";
	    	return false;
	    }
    }

    public function pays()
    {
    	$longueurPays = strlen($this->pays);
    	if(!empty($this->pays))
    	{
	    	if($longueurPays > 2)
	    	{
	    		return true;
	    	}
	    	else
	    	{
	    		$this->error = "Veuillez indiquez un pays !";
	    		return false;
	    	}
	    }
	    else
	    {
	    	$this->error = "veuillez remplir tout les champs !";
	    	return false;
	    }
    }

    public function region()
    {
    	$longueurRegion = strlen($this->region);
    	if(!empty($this->region))
    	{
	    	if($longueurRegion > 2)
	    	{
	    		return true;
	    	}
	    	else
	    	{
	    		$this->error = "Veuillez indiquez une region !";
	    		return false;
	    	}
	    }
	    else
	    {
	    	$this->error = "veuillez remplir tout les champs !";
	    	return false;
	    }
    }

    public function departement()
    {
    	$longueurDepartement = strlen($this->departement);
    	if(!empty($this->departement))
    	{
	    	if($longueurDepartement > 2)
	    	{
	    		return true;
	    	}
	    	else
	    	{
	    		$this->error = "Veuillez indiquez un departement !";
	    		return false;
	    	}
	    }
	    else
	    {
	    	$this->error = "veuillez remplir tout les champs !";
	    	return false;
	    }
    }

    public function ville()
    {
    	$longueurVille = strlen($this->ville);
    	if(!empty($this->ville))
    	{
	    	if($longueurVille > 2)
	    	{
	    		return true;
	    	}
	    	else
	    	{
	    		$this->error = "Veuillez indiquez une ville !";
	    		return false;
	    	}
	    }
	    else
	    {
	    	$this->error = "veuillez remplir tout les champs !";
	    	return false;
	    }
    }
}
?>
