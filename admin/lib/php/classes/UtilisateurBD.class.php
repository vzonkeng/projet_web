<?php

class UtilisateurBD extends Utilisateur {
    private $_db; //recevoir la valeur de $cnx lors de la connexion à la BD dans index
    private $_data = array();
    private $_resultset;
    public function __construct($cnx){ //$cnx envoyé depuis la page qui instancie
        $this->_db = $cnx;
    }
    public function getUtlisateur($username, $password){
        try {
            $query = "select is_utlisateur(:username,:password) as retour";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':username', $username);
            $_resultset->bindValue(':password', md5($password));//car password crypté en md5
            $_resultset->execute();
            //$_data[0] = $_resultset->fetch();
            //var_dump($_data);
            $retour = $_resultset->fetchColumn(0);
            return $retour;
        }catch(PDOException $e){
            print "Echec ".$e->getMessage();
        }
    }




}