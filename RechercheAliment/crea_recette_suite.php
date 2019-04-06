<?php
session_start();
include_once "AccesBD_rechAl.php";

$bd = getBD();


$nomR= $_POST['nomRecette'];
$instr = $_POST['instructions'];

$q = $bd->query("INSERT INTO `recette_plat`(`nom`, `instructions`,`Id_User`) VALUES ($nomR,$instr,1)");

$idr1= $bd->query("SELECT * FROM recette_plat WHERE nom = $nomR ");
$rep = $idr1->fetch();

$idr2 = $rep['Id_Recette'];


$sumKcal = 0;
$sumProt = 0;
$i = 0;
while($i<sizeof($_SESSION['Recette'])){
  $id_alim = $_SESSION['Recette'][$i]['id_aliment'];
  $nom = $_SESSION['Recette'][$i]['nom'];
  $nb = $_SESSION['Recette'][$i]['nb'];
  $data = $bd->query("SELECT * FROM aliments WHERE alim_code = $id_alim ");
  while($ligne = $data ->fetch()){
    $kcal = $ligne['Energie_Règlement_UE_N°_11692011_kcal100g'];
    $prot = $ligne['Protéines_g100g'];
    $sumKcal += $kcal;
    $sumProt += $prot;
  }
  $dataEi = $bd->query("INSERT INTO `est_ingredient_de`(`id_recette`, `alim_code`) VALUES ($idr2,$id_alim)");
}

$fin = $bd->query("UPDATE recette_plat SET kcal= $sumKcal , protéines=$sumProt WHERE Id_Recette=$idr2");



 ?>
