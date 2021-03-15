<?php

class ThemeBD extends Theme
{

    private $_db; //recevoir la valeur de $cnx lors de la connexion à la bd dans index
    private $_data = array();
    private $_resultset;

    public function __construct($cnx)
    { //$cnx envoyé depuis la page qui instancie
        echo "coucou";
        $this->_db = $cnx;
    }

    public function getTheme(){
        $query = "select * from utilisateur";
        $_resultset = $this->_db->query($query);
        $_data = $_resultset->fetchAll();
        var_dump($_data);
        echo "coucou";
    }

}