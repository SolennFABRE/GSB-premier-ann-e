<?php

function connexion(){
    $host = "localhost";
        $user = "root";
        $password = "Iroise29";
        $dbname = "Nav_Ha_Daou";
        $port ="3306";

        $mysqli = new mysqli($host, $user, $password, $dbname, $port);
        if ($mysqli->connect_error) {
            die( "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error);
            
        }
        
        return $mysqli;

}
       
function erreurSQL() {
    global $cnxBDD;
    
    $err = mysql_errno($link) . ": " . mysql_error($cnxBDD). "\n";
    return $err;
}

function afficheErreur($sql, $erreur) {

	$uneChaine = "ERREUR SQL : ".date("j M Y - G:i:s.u --> ").$sql." : ($erreur) \r\n";

	ecritRequeteSQL($uneChaine);

	return "Erreur SQL de <b>".$_SERVER["SCRIPT_NAME"].
	"</b>.<br />Dans le fichier : ".__FILE__.
	" a la ligne : ".__LINE__.
	"<br />".$erreur.
	"<br /><br /><b>REQUETE SQL : </b>$sql<br />";

}

function ecritRequeteSQL($uneChaine) {
	$handle=fopen("requete.sql","a");
	fwrite($handle,$uneChaine);
	fclose($handle);
}
 // AJOUTER UN VISITEUR A LA BASE DE DONNER \\
function ajouter_visiteur($nom, $prenom, $adresse,$cp,$ville,$dtembauche) {

// ajoute cp / code postale ! et la ville

    //connextion au serveur
    
    // Execution de la requet
    $sql = "INSERT INTO `gsb_frais.visiteur`(nom, prenom, adresse,cp ,ville, dateEmbauche) VALUES ('$nom', '$prenom', '$adresse','$cp','$ville', '$dtembauche')";
    
    
    
}


  function extraireCommune($ligneRandom){
    $ligne=utf8_encode(trim($ligneRandom[rand(0, count($ligneRandom) - 1)]));
    $ligneValeur= explode(';', $ligne);
    $cp=$ligneValeur[2];
    return $cp;

  }
  function extraireVille($ligneRandom){
    $ligne=utf8_encode(trim($ligneRandom[rand(0, count($ligneRandom) - 1)]));
    $ligneValeur= explode(';', $ligne);
    $ville=$ligneValeur[1];
    return $ville;
  }
  

function ajouteffrais($bdd, $visiteur, $mois, $annee, $nbjustificatifs, $montant) {
    $dtemodif = date("Y-m-d");

    $sql = "INSERT INTO `gsb_frais.fichefrais` (idVisiteur, mois, annee, nbJustificatifs, montantValide, dateModif, idEtat) 
            VALUES ('$visiteur', '$mois', '$annee', '$nbjustificatifs', '$montant', '$dtemodif', 'CR');";

    echo "Requête exécutée : $sql\n";

    $result = $bdd->query($sql);

    if ($result) {
        echo "Insertion réussie pour le visiteur $visiteur.\n";
    } else {
        echo "Problème d'insertion pour le visiteur $visiteur : " . $bdd->error . "\n";
    }
}  
  
  
?>


