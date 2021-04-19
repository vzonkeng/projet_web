
    <h1>
        Connectez-vous à votre compte
    </h1>

    <div id="container">
    <!-- zone de connexion -->

    <form class = "f1" action="verification.php" method="POST">
        <h1>Connexion</h1>

        <label><b>Nom d'utilisateur</b></label>
        <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

        <label><b>Mot de passe</b></label>
        <input type="password" placeholder="Entrer le mot de passe" name="password" required>

        <input type="submit" id='submit' value='LOGIN' name="submit" >


        <li class="nav-item">
            <a href="./index_.php?page=inscription.php" class="lien">Pas de compte?créez-en un</a>

        </li>


        <?php
        if(isset($_GET['erreur'])){
            $err = $_GET['erreur'];
            if($err==1 || $err==2)
                echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
        }
        ?>

    </form>
</div>


