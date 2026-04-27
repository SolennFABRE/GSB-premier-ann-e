<?php
include 'mesFonctionsGenerales.php'; 
$cnxBDD = connexion();

// début boucle
$i = 0;
while ($i < 2) {
    $RandomFG = rand(1, 4);
    
    switch ($RandomFG) {
        case 1:
            $idForfait = "ETP";
            $quantite = rand(1, 20);
            break;
        case 2:
            $idForfait = "KM";
            $quantite = rand(1, 5000);
            break;
        case 3:
            $idForfait = "NUI";
            $quantite = rand(1, 20);
            break;
        case 4:
            $idForfait = "REP";
            $quantite = rand(1, 15);
            break;
    }

    // Exécuter la requête pour obtenir un ID aléatoire
    $result = $cnxBDD->query("SELECT id FROM `gsb_frais.fichefrais` ORDER BY RAND() LIMIT 1");
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $idFicheFrais = $row['id'];

        // commande SQL
        $sql = "INSERT INTO `gsb_frais.lignefraisforfait`(idFicheFrais, idForfait, quantite) VALUES ('$idFicheFrais', '$idForfait', '$quantite');";
        
        echo "SQL : $sql <br>";
        
        if ($cnxBDD->query($sql) === TRUE) {
            echo "Enregistrement inséré!<br>";
        } else {
            echo "Erreur: " . $cnxBDD->error . "<br>";
        }
    } else {
        echo "Aucun ID trouvé.<br>";
    }

    $i++;
}

$cnxBDD->close();
?>