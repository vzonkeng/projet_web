
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <!-- Brand/logo -->
    <a class="navbar-brand " href="index_.php">

        <img src="./admin/image/logos1.png" alt="logo" style="width:40px;">

    </a>

    <!-- Links -->
    <div class="container">
    <ul class="navbar-nav">

        <li class="nav-item">
            <a href="./index_.php?page=shop.php" class="btn btn-primary">Tous nos produits</a>

        </li>

        <li class="nav-item">
            <a class="nav-link" href="./index_.php?page=panier.php">panier</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="https://www.gouvernement.fr/info-coronavirus">Infos-covid</a>
        </li>

        <div class = "btn-group">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="./pages/a_propos.php">A propos </a>
                </li>

            </ul>


        </div>


        <?php
        if(!isset($_SESSION['utilisateur'])){
            ?>

        <li class="nav-item ">
            <a class="nav-link" href="./admin/index_.php"> ADMIN</a>
        </li>


        <a class="navbar-brand" a href="./index_.php?page=connect.php" >
            <img src="./admin/image/logosconec.png" alt="logo" style="width:40px;">
        </a>
        <?php
        }
        ?>

        <li class="nav-item">
            <?php
            if(isset($_SESSION['utilisateur'])){
                ?>

            <a class="nav-link" href="admin/index_.php?page=disconnect.php"> deconnexion</a>
             <?php
            }
           ?>


        </li>

    </ul>
    </div>




</nav>


<!--<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
     Brand/logo remmetre en commentaire si bessoin
    <a class="navbar-brand" href="#">
        <img src="./admin/image/tempsnip.png" alt="logo" style="width:40px;">
    </a>

    <div class="btn-group">

        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
            Homme
        </button>

        <div class="dropdown-menu">

            <button type="button" class="btn btn-outline-primary">MONTRE SOPRT</button>
            <a class="nav-link" href="#"></a>
            <button type="button" class="btn btn-outline-secondary">MONTRE LUXE</button>
            <a class="nav-link" href="#"></a>

        </div>

    </div>

    <div class="btn-group">
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
           FEMME
        </button>
        <div class="dropdown-menu">

            <button type="button" class="btn btn-outline-primary">MONTRE SOPRT</button>
            <a class="nav-link" href="#"></a>
            <button type="button" class="btn btn-outline-secondary">MONTRE LUXE</button>
            <a class="nav-link" href="#"></a>

        </div>
    </div>




<button type="button" class="btn btn-outline-success">MARQUES</button>
    <a class="nav-link" href="#"></a>
<button type="button" class="btn btn-outline-info">ACCESSOIRE</button>
    <a class="nav-link" href="#"></a>


    <div class = "btn-group">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#section1">A propos </a>
            </li>

        </ul>
    </div>

</nav>

-->








