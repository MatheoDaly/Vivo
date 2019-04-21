<?php
session_start();
include_once "AccesBD_rechAl.php";

$bd = getBD();

$test=true;
if($test && !isset($_GET['nomRecette']) && !isset($_GET['instructions'])){

$nomR='Oeuf au plat 2';
$instr ='faire chauffer blablabla....';
} else {

$nomR= $_GET['nomRecette'];
$instr = $_GET['instructions'];
}

$_SESSION['nom_recette'] = $nomR;

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
  //echo($id_alim);
  $data = $bd->query("SELECT * FROM aliments WHERE alim_code = $id_alim ");
  while($ligne = $data->fetch()){
    $kcal = (float) $ligne['Energie_Règlement_UE_N°_11692011_kcal100g'];
    $prot = (float) $ligne['Protéines_g100g'];
    $sumKcal += $kcal;
    $sumProt += $prot;
  }
  $i+=1;
}
//echo("INSERT INTO `recette_plat`(`nom`,`instructions`,`kcal`, `protéines`,`Id_User_Crea`) VALUES ('$nomR','$instr',$sumKcal,$sumProt,1)");
$insert = $bd->exec("INSERT INTO `recette_plat`(`nom`, `instructions`,`kcal`, `protéines`,`Id_User_Crea`) VALUES ('$nomR','$instr',$sumKcal,$sumProt,1)");

echo('<meta http-equiv="refresh" content="0; URL=crea_recette_suite_fin.php">');


 ?>
