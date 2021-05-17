<?php
include ('../admin/lib/php/pg_connect.php');
include ('../admin/lib/php/classes/Connexion.class.php');
include ('../admin/lib/php/classes/Utilisateur.class.php');
include ('../admin/lib/php/classes/UtilisateurBD.class.php');
$cnx = Connexion::getInstance($dsn,$user,$password);
$pr = array();
$user = new UtilisateurBD($cnx);
$liste = $user->getAllClient();
$nbr = count($liste);
include ('../admin/lib/php/TCPDF/tcpdf.php');
$pdf = new TCPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('times','B',15);
$pdf->SetTextColor(255,0,0);
$pdf->Cell(190,10,'Nos montres',1,1,'C');
$pdf->SetFont('times','',12);
$pdf->SetTextColor(0,0,0);
$x = 20;
$y = 50;
for($i = 0;$i<$nbr; $i++){
    $pdf->WriteHTMLCell(150,30,$x,$y,$liste[$i]->nom,1,1,'','','L');

    $y+=10;
}
$pdf->Output('catalogue.pdf','D');