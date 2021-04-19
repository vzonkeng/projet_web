<?php //traitement du formulaire
if(isset($_GET['ajouter']))
{
    if($_GET['first_name']=="" OR $_GET['last_name"']=="" OR $_GET['localite']=="" OR
        $_GET['code_postal']=="" OR $_GET['numero_rue']=="" OR $_GET['your_username']=="" OR $_GET['password']==""  ){
        $erreur="remplir tous les champs svp !!!!";
    }
    else{
        $query="insert into utlisateur(nom,prenom,localite,code,numrue,username,password)
       values('".$_GET['first_name']."','".$_GET['last_name"']."','".$_GET['localite']."','".$_GET['code_postal']."',".$_GET['numero_rue'].",'".$_GET['your_username']."','".$_GET['password']."')";
        //print $query;

        if(sendData($query,$cnx))
            print "Votre Ajout est enregistrée";
        else
            print "problème rencontré!!!!!  ";
    }
}
?>

<?php if(isset($erreur)) print "<span class=\"rouge\">".$erreur."</span>"; ?>
<h1>
    Création d'un compte
</h1>

<div id="container">

    <div class="page-content">
        <div class="form-v4-content">
            <div class="form-left">
                <h2>INFOMATION</h2>
                <p class="text-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua. Et molestie ac feugiat sed. Diam volutpat commodo.</p>
                <p class="text-2"><span>Eu ultrices:</span> Vos informations sont confidentielles et sécursé</p>
                <div class="form-left-last">
                    <input type="submit" name="account" class="account" value="Have An Account">
                </div>
            </div>
            <form class="form-detail" action="<?php print $_SERVER['PHP_SELF']; ?>" method="get" id="myform">
                <h2>REGISTER FORM</h2>
                <div class="form-group">
                    <div class="form-row form-row-1">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" id="first_name" class="input-text">
                    </div>
                    <div class="form-row form-row-1">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" id="last_name" class="input-text">
                    </div>
                    <div class="form-row form-row-1">
                        <label for="localite">Localite</label>
                        <input type="text" name="localite" id="localite" class="input-text">
                    </div>
                    <div class="form-row form-row-1">
                        <label for="code_postal">Code postal</label>
                        <input type="text" name="code_postal" id="code_postal" class="input-text">
                    </div>
                    <div class="form-row form-row-1">
                        <label for="numero_rue"> Numero Rue</label>
                        <input type="text" name="numero_rue" id="numero_rue" class="input-text">
                    </div>
                </div>
                <div class="form-row">
                    <label for="your_username">Your Username<br>
                        <p style='color:red'>le symbole @ est obligatoire </p></label>
                    <input type="text" name="your_username" id="your_username" class="input-text" required
                           pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
                </div>
                <div class="form-group">
                    <div class="form-row form-row-1 ">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="input-text" required>
                    </div>

                    <div class="form-row form-row-1">
                        <label for="  <br> comfirm-password">Comfirm Password</label>
                        <input type="password" name="comfirm_password" id="comfirm_password" class="input-text"
                               required>
                    </div>
                </div>
                <div class="form-checkbox">
                    <label class="container"><p>I agree to the <a href="#" class="text">Terms and Conditions</a></p>
                        <input type="checkbox" name="checkbox">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="form-row-last">
                    <input type="submit" name="register" class="register" value="Register">
                </div>
            </form>
        </div>
    </div>
</div>

