<?php

class ProduitBD extends Produit{
    private $_db;// va recevoir la valeur de $cnx dans les 1st ligne de connexion a la BD  dans l'index
    private $_data=array();
    private $_resulset;
    public function __construct($cnx){//$cnx envoyé depuis la page qui instancie
        $this->_db = $cnx;
    }


   /* public function mise_a_jourProduit(){
        echo 'modification';
    }*/

    public function supprproduit($id){
        try{
            $query = "select supprproduit(:idproduit) as retour";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':idproduit',$id);
            $_resultset->execute();
        }catch(PDOException $e){
            print $e->getMessage();
        }
    }

    public function mise_a_jourProduit($idproduit,$nomproduit,$photo,$prix,$stock,$idcategorie,$reference,$description){
       // print "coucou";
        try{
            $query="update produit set  nomproduit=:nomproduit,photo=:photo,prix=:prix,stock=:stock,description=:description,idcategorie=:idcategorie,reference=:reference where idproduit=:idproduit";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':idproduit', $idproduit);
            $_resultset->bindValue(':nomproduit', $nomproduit);
            $_resultset->bindValue(':photo', $photo);
            $_resultset->bindValue(':prix', $prix);
            $_resultset->bindValue(':stock', $stock);
            $_resultset->bindValue(':idcategorie', $idcategorie);
            $_resultset->bindValue(':reference', $reference);
            $_resultset->bindValue(':description', $description);
            $_resultset->execute();
        }catch(PDOException $e){
            print $e->getMessage();
        }
    }

    public function ajout_produit($nomproduit,$photo,$prix,$stock,$description,$idcategorie,$reference){
       // print "coucou";
        try{
            $query="insert into produit (nomproduit,photo,prix,stock,description,idcategorie,reference) values ";
            $query.="(:nomproduit,:photo,:prix,:stock,:description,:idcategorie,:reference)";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':nomproduit', $nomproduit);
            $_resultset->bindValue(':photo', $photo);
            $_resultset->bindValue(':prix', $prix);
            $_resultset->bindValue(':stock', $stock);
            $_resultset->bindValue(':description', $description);
            $_resultset->bindValue(':idcategorie', $idcategorie);
            $_resultset->bindValue(':reference', $reference);
            $_resultset->execute();
        }catch(PDOException $e){
            print $e->getMessage();
        }
    }





    public function updateProduit($champ,$id,$valeur){
        try{
            //appeler une procédure embarquée
            $query = "update produit set ".$champ."='".$valeur."' where idproduit='".$id."'";
            $resultset = $this->_db->prepare($query); //transformer la requête!
            $resultset->execute();
        }catch(PDOException $e){
            print $e->getMessage();
        }
    }


    public function getProduitByDescription($description){
        try {
            $query = "SELECT * FROM produit WHERE description = :description";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':description',$description);
            $_resultset->execute();
            $data = $_resultset->fetch();

            return $data;
        } catch (PDOException $e) {
            print "Echec de la requête : ".$e->getMessage();
        }
    }

    public function getProduitById2($id_produit){
        try {
            $this->_db->beginTransaction();
            $query = "select * from vue_produits_cat where idproduit = :idproduit";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':idproduit', $id_produit);
            $resultset->execute();
            $data = $resultset->fetch();
            return $data;
//renvoyer un objet nécéssite adaptation dans ajax pour retour json
// donc retourner objet simple, qui sera stocké dans un élément de tableau json


            $this->_db->commit();

        } catch(PDOException $e){
            print "Echec de la requête : ".$e->getMessage();
            $_db->rollback();
        }

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



