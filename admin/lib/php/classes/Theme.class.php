<?php

class Theme {

    private $_attributs = array();

    public function __construct(array $data) {// $data est recu de themeBD
        $this->hydrate($data);
    }

    public function hydrate(array $data){// recu du constructeur
        foreach($data as $champ => $valeur) {//chaque champs est cree et associé a sa valeur
            $this->$champ = $valeur;
        }
    }

    public function __get($champ) {
        if(isset($this->_attributs[$champ])){
            return $this->_attributs[$champ];
        }
    }

    public function __set($champ , $valeur) {
        $this->_attributs[$champ] = $valeur;
    }
}
