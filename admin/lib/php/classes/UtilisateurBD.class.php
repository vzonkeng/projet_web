<?php

class UtilisateurBD extends Utilisateur
{
    private $_db;// va recevoir la valeur de $cnx dans les 1st ligne de connexion a la BD  dans l'index
    private $_data = array();
    private $_resulset;

    public function __construct($cnx)
    {//$cnx envoyé depuis la page qui instancie
        $this->_db = $cnx;
    }


    /* public function mise_a_jourProduit(){
         echo 'modification';
     }*/

    public function mise_a_jour($idutlisateur, $nom, $prenom, $localite, $pseudo, $mdp, $date_naissance, $reference)
    {
        print "coucou";
        try {
            $query = "update utilisateur set  nom=:nom,prenom=:prenom,localite=:localite,pseudo=:pseudo,mdp=:mdp,date_naissance=:date_naissance,reference=:reference where idutlisateur=:idutlisateur";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':idutlisateur', $idutlisateur);
            $_resultset->bindValue(':nom', $nom);
            $_resultset->bindValue(':prenom', $prenom);
            $_resultset->bindValue(':localite', $localite);
            $_resultset->bindValue(':pseudo', $pseudo);
            $_resultset->bindValue(':mdp', $mdp);
            $_resultset->bindValue(':date_naissance', $date_naissance);
            $_resultset->bindValue(':reference', $reference);
            $_resultset->execute();

        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    public function ajout_utilisateur($nom, $prenom, $localite, $pseudo, $mdp, $date_naissance, $reference)
    {
        print "coucou";
        try {
            $query = "insert into utilisateur (nom,prenom,localite,pseudo,mdp,date_naissance,reference) values";
            $query .= "(:nom,:prenom,:localite,:pseudo,:mdp,:date_naissance,:reference)";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':nom', $nom);
            $_resultset->bindValue(':prenom', $prenom);
            $_resultset->bindValue(':localite', $localite);
            $_resultset->bindValue(':pseudo', $pseudo);
            $_resultset->bindValue(':mdp', $mdp);
            $_resultset->bindValue(':date_naissance', $date_naissance);
            $_resultset->bindValue(':reference', $reference);
            $_resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }


    public function getProduitByDescription($reference)
    {
        try {
            $query = "SELECT * FROM utilisateur WHERE reference= :reference";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':reference', $reference);
            $_resultset->execute();
            $data = $_resultset->fetch();

            return $data;
        } catch (PDOException $e) {
            print "Echec de la requête : " . $e->getMessage();
        }
    }


    public function getUtilisateur($pseudo, $mdp)
    {
        print 'cc';
        try {
            $query = "select is_utilisateur(:pseudo,:mdp) as retour";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':pseudo', $pseudo);
            $_resultset->bindValue(':mdp', $mdp);//car password crypté en md5
            $_resultset->execute();
            //$_data[0] = $_resultset->fetch();
            //var_dump($_data);
            $retour = $_resultset->fetchColumn(0);
            var_dump($retour);
            return $retour;
        } catch (PDOException $e) {
            print "Echec " . $e->getMessage();
        }
    }


    public function getAll()
    {
        $query = "select * from vue_client ";
        $_resultset = $this->_db->prepare($query);
        $_resultset->execute();

        while ($d = $_resultset->fetch()) {
            $_data[] = new Utilisateur($d);
        }
        return $_data;

    }
    public function getAllClient(){
        $query ="select * from vue_client ";
        $_resultset = $this->_db->prepare($query);
        $_resultset->execute();

        while($d = $_resultset->fetch()){
            $_data[] = new Utilisateur($d);
        }
        return $_data;

    }

    public function supprClient($id){
        try{
            $query = "select supprClient(:idutlisateur) as retour";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':idutlisateur',$id);
            $_resultset->execute();
        }catch(PDOException $e){
            print $e->getMessage();
        }
    }






}