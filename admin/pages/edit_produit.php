<?php include('./lib/php/verifier_connection.php'); ?>

<h2>Editer / ajouter un produit</h2>
<?php
$produit = new ProduitBD($cnx);
if (isset($_GET['editer_ajouter'])) {
    extract($_GET, EXTR_OVERWRITE);
    if ($_GET['action'] == "editer") {
        ?>
        <pre><?php //var_dump($_GET);
        ?></pre><?php
        if (!empty($description) && !empty($nomproduit) && !empty($reference) && !empty($prix) && !empty($stock) && !empty($photo) && !empty($idcategorie)) {
            //3 instructions artificielles (devraient arriver d'un formulaire plus complet) :
            //$photo = 'fl3.png';
            //$idcategorie = 2;
            $produit->mise_a_jourProduit($idproduit,$nomproduit,$photo,$prix,$stock,$idcategorie,$reference,$description);


            print "produit modifier";

        }
    } else if ($_GET['action'] == "inserer") {
        ?>
        <pre><?php //var_dump($_GET);     ?></pre><?php


        if (!empty($description) && !empty($nomproduit) && !empty($reference) && !empty($prix) && !empty($stock) && !empty($photo) && !empty($idcategorie)) {
           // print "ici";
            //3 instructions artificielles (devraient arriver d'un formulaire plus complet) :
            //$photo = 'fl3.png';
            // $idcategorie = 2;
            $retour = $produit->ajout_produit($nomproduit, $photo, $prix, $stock, $description
                ,$idcategorie, $reference);
            print "produit ajouter avec succes !!!";
            //print "retour : " . $retour;
        }
   }

}
?>


<form class="row g-3" method="get" action="<?php print $_SERVER['PHP_SELF']; ?>" id="formEditAjout">
    <div class="col-md-2">
        <label for="description" class="form-label">Description</label>
        <input type="text" class="form-control" id="description" name="description">
    </div>
    <div class="col-md-6">
        <label for="denomination" class="form-label">Dénomination</label>
        <input type="text" class="form-control" id="denomination" name="nomproduit">
    </div>
    <div class="col-md-12">
        <label for="reference" class="form-label">Reference</label>
        <input type="text" class="form-control" id="reference" name="reference">
    </div>
    <div class="col-md-2">
        <label for="prix" class="form-label">Prix</label>
        <input type="text" class="form-control" id="prix" name="prix">
    </div>
    <div class="col-md-2">
        <label for="stock" class="form-label">Stock</label>
        <input type="number" class="form-control" id="stock" name="stock">
    </div>
    <div class="col-md-2">
        <label for="categorie" class="form-label">Categorie</label>
        <input type="number" class="form-control" id="categorie" name="idcategorie">
    </div>
    <div class="col-md-2">
        <label for="photo" class="form-label">photo</label>
        <input type="text" class="form-control" id="photo" name="photo">
    </div>

    <div class="col-12">
        <div class="d-grid grap-3 col-5 mx-auto" role="group">
            <input type="hidden" name="idproduit" id="idproduit">
            <input type="hidden" name="action" id="action">
            <input type="hidden" name="page" value="edit_produit.php">
            <button type="submit" class="btn btn-primary" id="editer_ajouter" name="editer_ajouter">Nouveau ou mettre à
                jour
            </button>
        </div>
    </div>


</form>


<!--<form class="row g-3" action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">

    <div class="col-md-3">
        <label for="description" class="form-label">Description</label>
        <input type="text" class="form-control" id="description" name="description">
    </div>
    <div class="col-md-6">
        <label for="denomination" class="form-label">Dénomination</label>
        <input type="text" class="form-control" id="denomination" name ="denomination">
    </div>
    <div class="col-md-12">
        <label for="reference" class="form-label">Reference</label>
        <input type="text" class="form-control" id="reference" name="reference">
    </div>
    <div class="col-md-2">
        <label for="prix" class="form-label">Prix</label>
        <input type="text" class="form-control" id="prix" name="prix">
    </div>
    <div class="col-md-2">
        <label for="stock" class="form-label">Stock</label>
        <input type="number" class="form-control" id="stock" name="stock">
    </div>
    <div class="col-md-2">
        <label for="categorie" class="form-label">Catégorie</label>
        <input type="number" class="form-control" id="categorie" name="categorie">
    </div>
    <div class="col-md-2">
        <label for="photo" class="form-label">Photo</label>
        <input type="text" class="form-control" id="photo" name="photo">
    </div>
    <div class="col-12">
        <input type ="hidden" id="id_produit" name="id_produit">
        <input type = "hidden" name="page" value="edit_produit.php">
        <button type="submit" class="btn btn-primary" id="editer" name="editer">Mettre à jour</button>
        <button type="submit" class="btn btn-primary" id="inserer" name="inserer">Inserer</button>
    </div>
</form>-->
