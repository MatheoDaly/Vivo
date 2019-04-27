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
  $ingr = "INSERT INTO `est_ingredient_de`(`id_recette`, `id_aliment`,`quantite`) VALUES ('".$idr2."','".$id_alim."', '".$nb."')";
  echo $ingr;
  $dataEi = $bd->query($ingr);
  $i+=1;
}
unset($_SESSION['Recette']);
echo('<meta http-equiv="refresh" content="0; URL=CreationMenuSuite.php">');



 ?>
