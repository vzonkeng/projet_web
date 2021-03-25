<?php

class ProduitBD extends Produit{
    private $_db;// va recevoir la valeur de $cnx dans les 1st ligne de connexion a la BD  dans l'index
    private $_data=array();
    private $_resulset;
    public function __construct($cnx){//$cnx envoyé depuis la page qui instancie
        $this->_db = $cnx;
    }

    public function getAllProduit(){
        $query ="select * from vue_produits_cat ";
        $_resultset = $this->_db->prepare($query);
        $_resultset->execute();

        while($d = $_resultset->fetch()){
            $_data[] = new Produit($d);
        }
        return $_data;

    }

    public function getProduitsByCat($idcategorie){
        try{
            $query="select * from vue_produits_cat where idcategorie=:idcategorie";
            $_resulset = $this-> _db->prepare($query);
            $_resulset->bindValue(':idcategorie',$idcategorie);
            $_resulset->execute();


            while($d = $_resulset->fetch()){
                $_data[] = new produit($d);
            }
            // var_dump($_data);

            return $_data;
        }catch(PDOException $e){
            print "Echec de la requête ".$e->getMessage();

        }
    }
}



