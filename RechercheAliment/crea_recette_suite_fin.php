<?php
session_start();
include_once "AccesBD_rechAl.php";

$bd = getBD();

$nomR = $_SESSION['nom_recette'];

$idr1= $bd->query("SELECT * FROM recette_plat WHERE nom = '$nomR'");
$rep = $idr1->fetch();

$idr2 = $rep['Id_Recette'];
$i=0;
while($i<sizeof($_SESSION['Recette'])){
  $id_alim = $_SESSION['Recette'][$i]['id'];
  //echo($id_alim);
  $nb = $_SESSION['Recette'][$i]['nb'];
  $data = $bd->query("SELECT * FROM aliments WHERE alim_code = $id_alim ");
  //echo("INSERT INTO `est_ingredient_de`(`id_recette`, `alim_code`,`quantite`) VALUES ($idr2,$id_alim,$nb)");
  $dataEi = $bd->query("INSERT INTO `est_ingredient_de`(`id_recette`, `alim_code`,`quantite`) VALUES ($idr2,$id_alim)");
  $i+=1;
}
echo('<meta http-equiv="refresh" content="0; URL=crea_recette_suite_fin.php">');
unset($_SESSION['Recette']);

 ?>
