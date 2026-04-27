<?php
include 'mesFonctionsGenerales.php'; 
$cnxBDD = connexion();

$TabloNomFamille = file('nom.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$TabloAdress = file('adresse.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    


// début boucle
$i = 0;
while ($i < 100) {
    $RandomFG = rand(1, 2);
    
    switch ($RandomFG) {
        case 1:
            $TabloPrenom = file('garcon.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            break;
        case 2:
            $TabloPrenom = file('fille.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            break;
        }
    $datey = rand(date("Y") - 10, date("Y"));
    $datem = rand(1, 12);
    $dated = rand(1, 28);
    $dtembauche = sprintf("%04d-%02d-%02d", $datey, $datem, $dated);

    $nom = utf8_encode(trim($TabloNomFamille[rand(0, count($TabloNomFamille) - 1)]));
    $prenom = utf8_encode(trim($TabloPrenom[rand(0, count($TabloPrenom) - 1)]));
    $adresse = utf8_encode(trim($TabloAdress[rand(0, count($TabloAdress) - 1)]));

    $ligneRandom=file('ville_cp_fr.csv', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
  
    
    $cp = extraireCommune($ligneRandom);
    $ville = extraireVille($ligneRandom);

    // commande SQL
    $sql = "INSERT INTO `gsb_frais.visiteur`(nom, prenom, adresse,cp ,ville, dateEmbauche) VALUES ('$nom', '$prenom', '$adresse','$cp','$ville', '$dtembauche')";
    
    echo "SQL : $sql <br>";
    
    if($cnxBDD->query($sql) === TRUE) {
      echo "Enregistrement inséré!";
      } else {
        echo "Erreur: ".$cnxBDD->error;
      } 
    
    //or die("Requête invalide : $sql");



    $i++;
}

$cnxBDD->close();
?>