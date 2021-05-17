
<h2>Editer / ajouter utilisateur</h2>
<?php
$utilisateur = new UtilisateurBD($cnx);
if (isset($_GET['editer_ajouter'])) {
    print 'cou';
    extract($_GET, EXTR_OVERWRITE);
    if ($_GET['action'] == "editer") {
        print 'coucou';
        ?>

        <pre><?php //var_dump($_GET);
        ?></pre><?php
       if (!empty($reference) && !empty($nom) && !empty($prenom) && !empty($localite) && !empty($pseudo) && !empty($mdp)&& !empty($date_naissance)) {
            //3 instructions artificielles (devraient arriver d'un formulaire plus complet) :
            //$photo = 'fl3.png';
            //$idcategorie = 2;
            $utilisateur->mise_a_jour($idutlisateur,$nom,$prenom,$localite,$pseudo,$mdp,$date_naissance,$reference);

            print "mise a jour effectué avec success!!!";

        }
    } else if ($_GET['action'] == "inserer") {
        print 'coucou'
        ?>
        <pre><?php //var_dump($_GET);     ?></pre><?php


        if (!empty($reference) && !empty($nom) && !empty($prenom) && !empty($localite) && !empty($pseudo) && !empty($mdp)&& !empty($date_naissance) ) {
            print "ici";
            //3 instructions artificielles (devraient arriver d'un formulaire plus complet) :
            //$photo = 'fl3.png';
            // $idcategorie = 2;
            $retour = $utilisateur->ajout_utilisateur($nom,$prenom,$localite,$pseudo,$mdp,$date_naissance,$reference);
            print "ajouter avec success!!!";
            print "retour : " . $retour;
        }
    }

}
?>


<br>




<div class="card text-center">
    <div class="card-header">
        <img src="./admin/image/user.jpg" alt="logo" style="width:40px;" width="2" height="50">

    </div>
    <div class="card-body">
        <form class="row g-3" method="get" action="<?php print $_SERVER['PHP_SELF']; ?>" id="formEditAjout">
            <div class="col-md-2">
                <label for="reference" class="form-label">Reference</label>
                <input type="text" class="form-control" id="reference" name="reference">
            </div>
            <div class="col-md-5">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom">
            </div>
            <div class="col-md-5">
                <label for="prenom" class="form-label">Prenom</label>
                <input type="text" class="form-control" id="prenom" name="prenom">
            </div>
            <div class="col-md-6">
                <label for="localite" class="form-label">Localite</label>
                <input type="text" class="form-control" id="localite" name="localite">
            </div>
            <div class="col-md-6">
                <label for="pseudo" class="form-label">Username</label>
                <input type="text" class="form-control" id="pseudo" name="pseudo">
            </div>
            <div class="col-md-6">
                <label for="mdp" class="form-label">Password</label>
                <input type="password" class="form-control" id="mdp" name="mdp">
            </div>
            <div class="form-group , col-lg-6">
                <label class="control-label" for="date_naissance">Date de naissance</label>
                <input class="form-control" id="date_naissance" name="date_naissance" placeholder="JJ/MM/YYYY"
                       type="date"/>
            </div>

            <div class="col-12">
                <div class="d-grid grap-3 col-5 mx-auto" role="group">
                    <input type="hidden" name="idutlisateur" id="idutlisateur">
                    <input type="hidden" name="action" id="action">
                    <input type="hidden" name="page" value="inscription.php">
                    <button type="submit" class="btn btn-primary" id="editer_ajouter" name="editer_ajouter">Creer un compte

                    </button>
                </div>
            </div>


        </form>

    </div>
    <div class="card-footer text-muted">

    </div>
</div>


