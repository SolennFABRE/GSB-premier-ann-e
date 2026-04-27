<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'mesFonctionsGenerales.php'; 
$cnxbdd = connexion();

$sql = "SELECT id FROM `gsb_frais.visiteur`;";
$idvisiteurs = $cnxbdd->query($sql);


foreach ($rows as $medic) {
    ajouteffrais($cnxbdd, $medic['id'], 01, 021, 5, 1234.56);
    ajouteffrais($cnxbdd, $medic['id'], 01, 022, 4, 124.56);
}

$cnxbdd->close();
?>
