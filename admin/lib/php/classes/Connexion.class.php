<?php

class Connexion {

    private static $_instance = null;

    public static function getInstance($dsn,$user,$password){

        // :: operateur de resolution de porter maniere d'attendre une variable une methode .. de static
        if(!self::$_instance){
            // si l'instance de cnx n'existe pas encore
            try{
                //on essaye d'ixtencier un objet PDO
                self::$_instance = new PDO($dsn,$user,$password);
                //print " Connecté";
            }catch(PDOException $e){
                print"Echec: ".$e->getMessage();
            }
        }
        return self::$_instance;
    }
}
