<?php
include_once "AccesBD_rechAl.php"; // pas forcément besoin

//Pour menu
//
function ajoutRecPlat($numRecPlat){
  array_push($_SESSION['Menu'],$numRecPlat);
}


// pour recette_plat

//Ajout d'un aliment indépendant d'une recette_plat
function ajoutAlimInd($alim){
  array_push($_SESSION['Rec_Plat'],$alim);
}

//Ajout d'aliments pour une recette
function ajoutAlimRec($numRecette,$alim){
  array_push($_SESSION['Rec_Plat'],array('numRecette'=>$numRecette,'aliment'=>$alim));
}
 ?>
