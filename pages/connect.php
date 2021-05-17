

<?php

if(isset($_POST['submit'])){
    print 'hello';
    extract($_POST,EXTR_OVERWRITE);
    // $ad = new UtilisateurBD($cnx);
    $user = new UtilisateurBD($cnx);
    //$utilisateur = $ad->getUtilisateur($pseudo, $mdp);
    $utilisateur = $user->getUtilisateur($pseudo,$mdp);
    var_dump($utilisateur);
    if($utilisateur) {
        $_SESSION['utilisateur']=1;
        print "Bienvenue ";
        ?>
        <meta http-equiv="refresh": content="0;URL=./index_.php?pages=accueil.php">
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





<div class="card text-center">
    <div class="card-header">
        <img src="./admin/image/user.jpg" alt="logo" style="width:40px;" width="2" height="50">

    </div>
    <div class="card-body">

        <div class="container">
            <form   method="post">
                <div class="col-8">
                    <label for="pseudo" class="form-label">Login</label>
                    <input type="text" class="form-control" id="pseudo" name="pseudo">
                </div>
                <div class="col-8" >
                    <label for="mdp" class="form-label">Password</label>
                    <input type="password" class="form-control" id="mdp" name="mdp">
                </div>
                <!-- <input type="hidden" name="action" id="action">-->


                <button type="submit" class="btn btn-primary" name="submit" id="submit ">Submit</button>
                <a class="nav-link" href="./index_.php?page=inscription.php">Créer un compte ?</a>

            </form>

        </div>
    </div>
    <div class="card-footer text-muted">

    </div>
</div>







