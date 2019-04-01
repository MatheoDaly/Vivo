<?php
session_start();
//include_once'bd.php';



if(isset($_GET['id_aliment']) && isset($_SESSION['Rec_Plat'])){
  array_push($_SESSION['Rec_Plat'],array('id'=>$_GET['id_aliment'],'nom'=>$_GET['nom_aliment'],'nb'=>$_GET['nbAl']));
}elseif (!isset($_GET['id_aliment'])) {
  $_SESSION['Rec_Plat'] = array(array('id'=>$_GET['id_aliment'],'nom'=>$_GET['nom_aliment'],'nb'=>$_GET['nbAl']));
}

echo('<meta http-equiv="refresh" content="0; URL=recherche aliment.php">');
/*elseif(!isset($_GET['aliment']) && isset($_SESSION['Rec_Plat'])){
  array_push($_SESSION['Rec_Plat'],$_GET['aliment']);
  print_r($_SESSION['Rec_Plat']);
}elseif(!isset($_GET['aliment']) && !isset($_SESSION['Rec_Plat'])){
  $_SESSION['Rec_Plat'] = array('début');
}*/
 ?>
