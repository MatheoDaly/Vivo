<?php
session_start();
include_once'AccesBD_rechAl.php';

$bd = getBD();



if(isset($_GET['id_aliment']) && isset($_SESSION['Rec_Plat'])){

  $id = $_GET['id_aliment'];
  $data = $bd -> query("SELECT Energie_Règlement_UE_N°_11692011_kcal100g FROM aliments where alim_grp_code = $id");
  $rep = $data->fetch();
  $kcal = $rep;

  array_push($_SESSION['Rec_Plat'],array('id'=>$id,'nom'=>$_GET['nom_aliment'],'nb'=>$_GET['nbAl'],'kcal'=>$kcal));

}elseif (!isset($_GET['id_aliment'])) {
  $_SESSION['Rec_Plat'] = array(array('id'=>$id,'nom'=>$_GET['nom_aliment'],'nb'=>$_GET['nbAl'],'kcal'=>$kcal));
}

echo('<meta http-equiv="refresh" content="0; URL=Choix_Aliment.php">');
/*elseif(!isset($_GET['aliment']) && isset($_SESSION['Rec_Plat'])){
  array_push($_SESSION['Rec_Plat'],$_GET['aliment']);
  print_r($_SESSION['Rec_Plat']);
}elseif(!isset($_GET['aliment']) && !isset($_SESSION['Rec_Plat'])){
  $_SESSION['Rec_Plat'] = array('début');
}*/


 ?>
