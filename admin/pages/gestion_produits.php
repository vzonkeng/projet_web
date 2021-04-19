<h1>gestion produits</h1>

<?php
include('./lib/php/verifier_connection.php');
$prod = new ProduitBD($cnx);
$liste = $prod->getAllProduit();
//var_dump($liste);
$nbr = count($liste);
?>
<table class="table">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Nom</th>
        <th scope="col">Reference</th>
        <th scope="col">Prix</th>
        <th scope="col">Stock</th>
        <th scope="col">Idcategorie</th>
        <th scope="col">Photo</th>
    </tr>
    </thead>
    <tbody>
    <?php
    for ($i = 0; $i < $nbr; $i++) {
        ?>
        <tr>
            <th scope="row">
                <?php print $liste[$i]->idproduit; ?>
            </th>
            <td>
                <span contenteditable="true" name="nomproduit" id="<?php print $liste[$i]->idproduit; ?>">
                    <?php print $liste[$i]->nomproduit; ?>
                </span>
            </td>
            <td>
                <span contenteditable="true" name="reference" id="<?php print $liste[$i]->reference; ?>">
                    <?php print $liste[$i]->reference; ?>
                </span>
            </td>
            <td>
                <span contenteditable="true" name="prix" id="<?php print $liste[$i]->idproduit; ?>">
                    <?php print $liste[$i]->prix; ?>
                </span>
            </td>
            <td>
                <span contenteditable="true" name="stock" id="<?php print $liste[$i]->idproduit; ?>">
                    <?php print $liste[$i]->stock; ?>
                </span>
            </td>
            <td>
                <span contenteditable="true" name="idcategorie" id="<?php print $liste[$i]->idproduit; ?>">
                    <?php print $liste[$i]->idcategorie; ?>
                </span>
            </td>
            <td>
                <span contenteditable="true" name="photo" id="<?php print $liste[$i]->idproduit; ?>">
                    <?php print $liste[$i]->photo; ?>
                </span>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>