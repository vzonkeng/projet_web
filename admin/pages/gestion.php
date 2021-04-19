<?php
//admin/pages/produit.php
include ('./lib/php/verifier_connection.php');
if(isset($_SESSION['admin'])) {
    print "<br/>Bienvenue dans la gestion des produits";


}
?>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index_.php">Logo</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Projects</a></li>--
                <li><a href="#">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Deconnnexion</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav">
            <p><a href="#">
                    <img src="./admin/image/ajout.png" alt="logo" style="width:40px;">
                    <br> Ajouter un produit
</a></p>
            <p><a href="#">
                    <img src="./admin/image/ajout.png" alt="logo" style="width:40px;">
                    <br> Modifier un produit
</a></p>
            <p><a href="#">
                    <img src="./admin/image/ajout.png" alt="logo" style="width:40px;">
                    <br> supprimer un produit
</a></p>
            <p><a href="./index_.php?page=test.php">
                    <img src="./admin/image/ajout.png" alt="logo" style="width:40px;">
                    <br> Lister les produits
</a></p>
            <p><a href="#">
                    <img src="./admin/image/ajout.png" alt="logo" style="width:40px;">
                    <br> Lister les client
</a></p>
        </div>
        <div class="col-sm-8 text-left,container">
            <h1>Bienvenue</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <hr>
            <h3>Test</h3>
            <p>Lorem ipsum...</p>
        </div>
        <div class="col-sm-2 sidenav">
            <div class="well">
                <p>ADS</p>
            </div>
            <div class="well">
                <p>ADS</p>
            </div>
        </div>
    </div>
</div>

<footer class="container-fluid text-center">
    <p>Footer Text</p>
</footer>