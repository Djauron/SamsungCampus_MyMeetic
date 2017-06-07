<?php
class bdd
{
    private $bdd = '';
    private $connec_host = '';
    private $connec_dbname = '';
    private $connec_pseudo = '';
    private $connec_mdp = '';

    public function __construct($connec_host = 'localhost', $connec_dbname = 'my_meetic', $connec_pseudo = 'root', $connec_mdp = 'Here Password'){
        try {
            $this->bdd = new PDO('mysql:host='.$connec_host.';dbname='.$connec_dbname, $connec_pseudo, $connec_mdp);
            $this->bdd->exec("SET CHARACTER SET utf8");
            $this->bdd->exec("SET NAMES utf8");
        }
        catch(PDOException $e) {
            die('<h3>Erreur !</h3>'.$e);
        }
    }

    public function connexion()
    {
        return $this->bdd;
    }

}

$DBase = new bdd;
$db = $DBase->connexion();

?>
