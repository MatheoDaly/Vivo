<?php
include_once "AccesBDbis.php"; // pas forcément besoin

//Pour menu
//
/*function ajoutRecPlat($numRecPlat){
  array_push($_SESSION['Menu'],array('numMenu'=>$numRecPlat));
}*/


// pour recette_plat

//Ajout d'un aliment indépendant d'une recette_plat
function ajoutAlimInd($numPlat,$alim){
  array_push($_SESSION['Rec_Plat'],array('numPlat'=>$numPlat,'aliment'=>$alim));
}

//Ajout d'aliments pour une recette
function ajoutAlimRec($numRecette,$alim){
  array_push($_SESSION['Rec_Plat'],array('numRecette'=>$numRecette,'aliment'=>$alim));
}
 ?>
