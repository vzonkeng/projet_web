<h1>gestion produits</h1>

<?php
include('./lib/php/verifier_connection.php');
$user = new UtilisateurBD($cnx);
$liste = $user->getAll();
//var_dump($liste);
$nbr = count($liste);
?>
<table class="table">
    <thead>
    <tr bgcolor="#ffdead">
        <th scope="col">Id</th>
        <th scope="col">Nom</th>
        <th scope="col">Prenom</th>
        <th scope="col">localite</th>
        <th scope="col">pseudo</th>
        <th scope="col">mot de passe</th>
        <th scope="col">Delette</th>


    </tr>
    </thead>
    <tbody>
    <?php
    for ($i = 0; $i < $nbr; $i++) {
        ?>
        <tr  bgcolor="#dda0dd">
            <th  scope="row">
                <?php print $liste[$i]->idutlisateur; ?>
            </th>
            <td >
                <span contenteditable="true" name="nom" id="<?php print $liste[$i]->idutlisateur; ?>">
                    <?php print $liste[$i]->nom; ?>
                </span>
            </td>
            <td>
                <span contenteditable="true" name="prenom" id="<?php print $liste[$i]->idutlisateur; ?>">
                    <?php print $liste[$i]->prenom; ?>
                </span>
            </td>

            <td>
                <span contenteditable="true" name="localite" id="<?php print $liste[$i]->idutlisateur; ?>">
                    <?php print $liste[$i]->localite; ?>
                </span>
            </td>
            <td>
                <span contenteditable="true" name="pseudo" id="<?php print $liste[$i]->pseudo; ?>">
                    <?php print $liste[$i]->pseudo; ?>
                </span>
            </td>
            <td>
                <span contenteditable="true" name="mdp" id="<?php print $liste[$i]->mdp; ?>">
                    <?php print $liste[$i]->mdp; ?>
                </span>
            </td>


            <td> <button class="w-60 btn btn-sm btn-red border border-danger text-red deleteutilisateur bg-warning" id="<?php print $liste[$i]->idutlisateur;?>" type="submit" name="submitSuppr">Delete</button></td>

        </tr>
        <?php
    }
    ?>
    </tbody>
</table>