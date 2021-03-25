
<?php
$prod = new ProduitBD($cnx);
if(isset($_GET['idcategorie'])){
    $liste= $prod->getProduitsByCat($_GET['idcategorie']);

}
else{


    $liste = $prod->getAllProduit();

}
$nbr = count($liste);
//var_dump($liste);
?>


<div class="album py-5 bg-light">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php
            for ($i = 0; $i < $nbr; $i++) {
                ?>
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="./admin/image/<?php print $liste[$i]->photo;?>" alt="image"/>

                        <div class="card-body">
                            <p class="card-text">
                                <?php
                                print $liste[$i]->reference.'<br>';
                                print $liste[$i]->nomproduit.'<br>';
                                print $liste[$i]->prix.' €'.'<br>';


                                ?>
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <i class=" btn-group"></i>
                                    <button type="buton" class="btn btn-outline-secondary">Commander</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>
