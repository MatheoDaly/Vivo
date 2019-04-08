<?php
session_start();
include_once "AccesBD_rechAl.php";

$bd = getBD();

$test=true;
if($test && !isset($_GET['nomRecette']) && !isset($_GET['instructions'])){

$nomR='Oeuf au plat 2';
$instr ='faire chauffer blablabla....';
} else {

$nomR= $_POST['nomRecette'];
$instr = $_POST['instructions'];
}


$q = $bd->query("INSERT INTO `recette_plat`(`nom`, `instructions`,`Id_User_Crea`) VALUES ($nomR,$instr,1)");

//echo "INSERT INTO `recette_plat`(`nom`, `instructions`,`Id_User_Crea`) VALUES ($nomR,$instr,1)";

$idr1= $bd->query("SELECT * FROM recette_plat WHERE nom = '$nomR'");
$rep = $idr1->fetch();
echo($rep);


$idr2 = $rep['Id_Recette'];


$sumKcal = 0;
$sumProt = 0;
$i = 0;
while($i<sizeof($_SESSION['Recette'])){
  $id_alim = $_SESSION['Recette'][$i]['id'];
  echo('aaaaa');
  echo($id_alim);
  $nom = $_SESSION['Recette'][$i]['nom'];
  $nb = $_SESSION['Recette'][$i]['nb'];
  //echo("SELECT * FROM aliments WHERE alim_code = $id_alim");
  $data = $bd->query("SELECT * FROM aliments WHERE alim_code = $id_alim ");
  while($ligne = $data ->fetch()){
    $kcal = (float) $ligne['Energie_Règlement_UE_N°_11692011_kcal100g'];
    $prot = (float) $ligne['Protéines_g100g'];
    $sumKcal += $kcal;
    $sumProt += $prot;
  }
  echo("INSERT INTO `est_ingredient_de`(`id_recette`, `alim_code`) VALUES ($idr2,$id_alim)");
  $dataEi = $bd->query("INSERT INTO `est_ingredient_de`(`id_recette`, `alim_code`) VALUES ($idr2,$id_alim)");
  $i+=1;
}

$fin = $bd->query("UPDATE recette_plat SET kcal= $sumKcal , protéines=$sumProt WHERE Id_Recette=$idr2");



 ?>
