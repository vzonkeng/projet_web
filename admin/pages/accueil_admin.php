<h2>Accueil admin</h2>
<?php
if(isset($_POST['submit'])){
    extract($_POST,EXTR_OVERWRITE);
    $ad = new AdminBD($cnx);
    $admin = $ad->getAdmin($login, $password);
//var_dump($admin);
    if($admin) {
        $_SESSION['admin']=1;
        print "Bienvenue "
            ?>
            //pour le rafraichissement de la page
        <meta http-equiv="refresh": content="0;URL=./index_.php?page=test.php">
<?php
    } else {
        $message = 'Identifiant incorrect';
    }
}
?>
<p class="">
    <?php
    if(isset($message)){
        print $message;
    }
    ?>
</p>
<form  action="<?php print $_SERVER['PHP_SELF'];?>" method="post">
    <div class="mb-3">
        <label for="login" class="form-label">Login</label>
        <input type="login" class="form-control" id="login" name="login">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>

    <?php
    if(isset($_POST['erreur'])){
        $err = $_POST['erreur'];
        if($err==1 || $err==2)
            echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
    }
    ?>
</form>


<!--<center><header class = container <strong> <h2>Adminstration</h2> </strong>  <a class="ad" href="index_.php"></center>
        <img src="./admin/image/logos1.png" alt="logo" style="width:40px;">
    </a></header>




<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <style>
        /* Remove the navbar's default margin-bottom and rounded borders */
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
        }

        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        .row.content {height: 450px}

        /* Set gray background color and 100% height */
        .sidenav {
            padding-top: 20px;
            background-color: #f1f1f1;
            height: 100%;
        }

        /* Set black background color, white text and some padding */
        footer {
            background-color: #555;
            color: white;
            padding: 15px;
        }

        /* On small screens, set height to 'auto' for sidenav and grid */
        @media screen and (max-width: 767px) {
            .sidenav {
                height: auto;
                padding: 15px;
            }
            .row.content {height:auto;}
        }
    </style>
</head>
<body>

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
                <!--<li class="active"><a href="#">Home</a></li>
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
            <p><a href="#">
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

</body>
</html>-->
