<?php
//echo "accueil";
//$liste = new ThemeBD($cnx);
//$liste->getTheme();
?>
<?php
/*
$liste = new ThemeBD($cnx);
$themes = $liste->getTheme();
//$nbr = count($themes);
*/
?>


<?php
$prod = new ProduitBD($cnx);
$liste = $prod->getAllProduit();
//var_dump($liste);
$nbr=count($liste);
?>
&nbsp;&nbsp;
<div class="container">

<form action = "<?php print $_SERVER['PHP_SELF'];?>" method="get">

    &nbsp;&nbsp;

    <select name = "choix_produit" id="choix_produit">
       <option value = "">Choississez</option>
        <?php
        for($i=0 ; $i<$nbr ; $i++){
            ?>
            <option value="<?php print $liste[$i]->idproduit;?>">
                <?php print $liste[$i]->nomproduit;?>
            </option>
            <?php
        }
        ?>
        <input type = "submit" name = "submit_id" value="chercher" id ="submit_id">
    </select>

    <div class="card-group" id="infoProduit">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"></h5>
                <div id="id_produit"></div>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"></h5>
                <div id="image_produit"></div>
            </div>
        </div>
    </div>
</form>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>





    <html>

    <style>
        /* Make the image fully responsive */
        .carousel-inner img {
            width: 100%;
            height: 80%;
        }
    </style>


    <style>
        /* Make the image fully responsive */
        .carousel-inner1 img {
            width: 100%;
            height: 100%;
        }
    </style>

<body>



<div id="demo" class="carousel slide" data-ride="carousel">

    <!-- Indicators -->
    <ul class="carousel-indicators">
        <li data-target="#demo" data-slide-to="0" class="active"></li>
        <li data-target="#demo" data-slide-to="1"></li>
        <li data-target="#demo" data-slide-to="2"></li>
    </ul>

    <!-- The slideshow -->
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="./admin/image/image0.png" alt="Los Angeles">
        </div>
        <div class="carousel-item">
            <img src="./admin/image/image2.png" alt="Chicago">
        </div>
        <div class="carousel-item">
            <img src="./admin/image/image6.png" alt="New York">
        </div>
    </div>

    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>

</div>

    <h2><strong> Montres coup de coeur </strong></h2>

    <br>

    <p>Il faut absolument que nous vous les présentions (on les adore !)


    <MARQUEE scrollamount="15">
        <figure>
        <IMG src="./admin/image/image1'.png">
        <IMG src="./admin/image/image2'.png">
        <IMG src="./admin/image/image3'.png">
        <IMG src="./admin/image/image4'.png">
        </figure>
    </MARQUEE>

    </p>



<?php
$cat = new CategorieBD($cnx);
$liste_cat = $cat->getCategorie();
$nbr_cat = count($liste_cat);
?>

<div class="card-group,container">
    <?php
    for ($i = 0; $i < $nbr_cat; $i++) {
        ?>
        <div class="card">
            <img src="./admin/image/<?php print $liste_cat[$i]->image; ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">
                    <a href="index_.php?page=shop.php&idcategorie=<?php print $liste_cat[$i]->idcategorie; ?>" class="lien">
                      <center><?php print $liste_cat[$i]->nomcategorie; ?></center>
                    </a>



                </h5>
                <p class="card-text">--description de la catégorie--</p>

            </div>
        </div>
        <?php
    }
    ?>
    <!--
    <div class="card">
        <img src="./admin/images/cake3.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Card title <i class="far fa-grin-alt red"></i></h5>
            <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
        </div>
        <div class="card-footer">
            <small class="text-muted">Last updated 3 mins ago</small>
        </div>
    </div>
    <div class="card">
        <img src="./admin/images/patisserie3.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Card title <i class="far fa-grin-alt red"></i></h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional
                content. This card has even longer content than the first to show that equal height action.</p>
        </div>
        <div class="card-footer">
            <small class="text-muted">Last updated 3 mins ago</small>
        </div>
    </div>
    -->
</div>
</div>


</body>
</html>








    <br>
<div id="flip">
    <p><h4>GZV MONTRE, spécialiste de la montre</h4>
</div>
    <div id="panel">
        Montre femme, montre homme, montre automatique bien sûr, mais également montre digitale ou montre pas cher, notre passion des montres est vaste.
        Vous ne trouverez pas chez nous de montre de luxe inaccessibles mais plutôt des montres de qualité proposées à des prix justes et
        Nous portons une attention toute particulière à la fiabilité des montres proposées et sélectionnons avec soin les marques que nous vous présentons.
        Enfin, nous sommes une entreprise Belge basée à Mons, capitale de l’horlogerie, et nous sommes à votre service par email, via notre formulaire de contact
        ou encore par téléphone pour vous accompagner dans votre achat de montre et vous conseiller dans votre choix. Mais nous sommes également présent si vous rencontrez un problème
        avec votre achat et que votre montre nécessite d’être prise en SAV. En bref nous mettons tout en œuvre pour que notre qualité de service soit à la hauteur de notre passion. Vous avez besoin d’une montre ? Vous recherchez un cadeau ?
        Vous aimez les montres et souhaitez juste vous faire plaisir ? GZVMONTRE.BE est fait pour vous.
        Vous avez envie d’en savoir plus ?

<br><br>Découvrez nos pages "Qui sommes nous ?" et "Pourquoi acheter ici ?"</p>
    </div>


    <p><h4>Bests</h4>
Nos clients les adorent... nous ne résistons pas à vous les partager !</p>

<figure class="figure">
    <img src="/admin/image/image14.png" class="figure-img img-fluid rounded" alt="...">
    <figcaption class="figure-caption text-end">best.</figcaption>
</figure>






