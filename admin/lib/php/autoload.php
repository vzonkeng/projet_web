<?php
//page automatique de chargement des classes

//fonction qui charges les fichier classe
function autoload($nom_classe)
{
    //on prend le nom de la classe et on inclu
    if (file_exists('./lib/php/classes/' . $nom_classe . '.class.php')) {
        require './lib/php/classes/' . $nom_classe . '.class.php';
    } else {
        if (file_exists('./admin/lib/php/classes/' . $nom_classe . '.class.php')) {
            require './admin/lib/php/classes/' . $nom_classe . '.class.php';
            //print './admin/lib/php/classes/' . $nom_classe . '.class.php';
        }
    }
}

spl_autoload_register('autoload');
// fonction predefinie qui appelle la fonction d'autoload lors d'une rencontre du mot new
