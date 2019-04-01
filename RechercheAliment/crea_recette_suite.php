<?php
session_start();
include_once'bd.php';

$bd = getBD();
$i = 0
while($i<sizeof($_SESSION['Recette'])){
  $id_alim = $_SESSION['Recette'][$i]['id_aliment'];
  $data = $bd->query("SELECT * FROM recette_plat WHERE alim_code = $id_alim ");
  while($ligne = $data ->fetch()){
    $kcal = $ligne['Energie_Règlement_UE_N°_11692011_kcal100g'];
    $prot = $ligne['Protéines_g100g'];
  }


}


$data = $bd->query("INSERT INTO `recette_plat`(`Id_Recette`, `nom`, `instructions`, `kcal`, `protéines`) VALUES (3,)");

 ?>
