<?php
if (!isset($_SESSION['admin'])) {
    print "Accés reservé";
    session_destroy();
    ?>
    <meta http-equiv="refresh"; content="2;URL=../index_.php">
    <?php

}