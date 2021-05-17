
<?php
header('Content-Type: application/json');

/*
 * inclure les fichiers nécessaires à la communication avec la BD car on ne passe par l'index
 * Ce fichier est appelé par fontions*jquery.js
 */
// A partir de admin/lib/php/ajax revenir dans dossier précédent
include ('../pg_connect.php');
include ('../classes/Connexion.class.php');
include ('../classes/Produit.class.php');
include ('../classes/ProduitBD.class.php');
$cnx = Connexion::getInstance($dsn,$user,$password);


$pr = array();
$produit = new ProduitBD($cnx);
//id_produit est un parametre de l'url
//ds js : var parametre = "id_produit="+id;
extract($_GET, EXTR_OVERWRITE);
$pr[] = $produit->supprproduit($id);
//conversion du tableau PHP au format javascript
print json_encode($pr);