<?php
if (!isset($_SESSION['utilisateur'])) {
    print "Accés reservé";
    session_destroy();
    ?>
    <meta http-equiv="refresh": content="";URL=../index_.php">
    <?php

}