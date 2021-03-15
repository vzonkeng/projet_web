
<div class="carousel-item">

</div>
<center><h2> CONTACTEZ-NOUS</h2></center>
<center> <img src="/admin/image/logos1.png" class="figure-img img-fluid rounded" alt="..."></center>

<h3 align="left">INFORMATIONS</h3>

<p align=left>
        <img src="/admin/image/image_loc.png" class="figure-img img-fluid rounded" alt="...">
   1070 chaussee de ninove 592 bruxelle
    <br>
    _________________________________________________
    <br>
    <img src="/admin/image/image_tel.png" class="figure-img img-fluid rounded" alt="...">
     TEL :+32 (0)466/218/153
    <br>
    _________________________________________________
    <br>

    <img src="/admin/image/image_mail.png" class="figure-img img-fluid rounded" alt="...">
    envoyer nous un mail: contact@gzv_montre.be<br>

</p>

<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {font-family: Arial, Helvetica, sans-serif;}
        * {box-sizing: border-box;}

        input[type=text], select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
            resize: vertical;
        }

        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        .container {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }
    </style>
</head>
<body>

<h3>formulaire de contact</h3>

<div class="container">
    <form action="/action_page.php">
        <label for="fname">Prenom</label>
        <input type="text" id="fname" name="firstname" placeholder="Votre prenom..">

        <label for="lname">Nom</label>
        <input type="text" id="lname" name="lastname" placeholder="Votre nom..">

        <label for="country">sujet</label>
        <select id="country" name="country">
            <option value="service client">servive client</option>
            <option value="webmaster">webmaster</option>
        </select>

        <label for="subject">veillez entrer un texte</label>
        <textarea id="subject" name="subject" placeholder="ecrire quelques choses ..." style="height:200px"></textarea>

        <input type="submit" value="Submit">
    </form>
</div>

</body>
</html>

