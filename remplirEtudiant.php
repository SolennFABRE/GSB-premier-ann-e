<?php
include 'mesFonctionsGenerales.php'; 
$cnxBDD = connexion();



switch($RandomFG) {
    case '1': 
        $TabloPrenom = file('garcon.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        break; 
    case '2':
        $TabloPrenom = file('fille.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        break; 
    }

	$TabloNomFamille = file('nom.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
	$TabloPrenom = file('garcon.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

	$i = 0;
	while ($i!=10){
		$nom = utf8_encode(trim($TabloNomFamille[rand(0, count($TabloNomFamille) - 1)]));
    	$prenom = utf8_encode(trim($TabloPrenom[rand(0, count($TabloPrenom) - 1)]));   


		$i +=1;
		$sql="INSERT INTO etudiant(nom, prenom) VALUES ('$nom', '$prenom');";
		echo "Sql : ".$sql."<br />";
		$result = $cnxBDD->query($sql)
			or die ("Requete invalide : ".$sql);




	}
// Fermer la connexion MYSQL
$cnxBDD->close();    
 	
	 

?>