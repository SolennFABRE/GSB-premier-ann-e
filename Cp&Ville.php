<?php
  
  $ligneRandom=file('ville_cp_fr.csv', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
  
  function extraireCommune(){
    $ligne=utf8_encode(trim($ligneRandom[rand(0, count($ligneRandom) - 1)]));
    $ligneValeur= explode(';', $ligne);
    $cp=$ligneValeur[1];
    $ville=$ligneValeur[2];
  }
?>