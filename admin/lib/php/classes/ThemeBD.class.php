<?php

class ThemeBD extends Theme
{

    private $_db; //recevoir la valeur de $cnx lors de la connexion à la bd dans index
    private $_data = array();
    private $_resultset;

    public function __construct($cnx)
    { //$cnx envoyé depuis la page qui instancie

        $this->_db = $cnx;
    }

    public function getTheme(){
        $query = "select * from bp_theme";
        $_resultset = $this->_db->prepare($query);
        $_resultset->execute();
        //chauqe ligne qui se trouve dans le resultset va se mettre dans le $d
        while($d =$_resultset->fetch()) {
            $_data[] = new theme($d);
        }
        // $_resultset = $this->_db->query($query);
        // $_data = $_resultset->fetchAll();
        //var_dump($_data);
        return $_data;

    }

}