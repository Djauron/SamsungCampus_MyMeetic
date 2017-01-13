<?php
class bdd
{
    private $bdd = '';
    private $connec_host = '';
    private $connec_dbname = '';
    private $connec_pseudo = '';
    private $connec_mdp = '';

    public function __construct($connec_host = '130.211.101.226', $connec_dbname = 'meetic', $connec_pseudo = 'weblog', $connec_mdp = 'weblog'){
        try {
            $this->bdd = new PDO('mysql:host='.$connec_host.';dbname='.$connec_dbname, $connec_pseudo, $connec_mdp);
            $this->bdd->exec("SET CHARACTER SET utf8");
            $this->bdd->exec("SET NAMES utf8");
        }
        catch(PDOException $e) {
            die('<h3>Erreur !</h3>');
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
