<?php
session_start();
//include_once'bd.php';



if(isset($_GET['aliment']) && isset($_SESSION['Rec_Plat'])){
  array_push($_SESSION['Rec_Plat'],$_GET['aliment']);
}elseif (!isset($_GET['aliment'])) {
  echo('pas déf');
}

echo('<meta http-equiv="refresh" content="0; URL=Choix_Aliment.php">');
/*elseif(!isset($_GET['aliment']) && isset($_SESSION['Rec_Plat'])){
  array_push($_SESSION['Rec_Plat'],$_GET['aliment']);
  print_r($_SESSION['Rec_Plat']);
}elseif(!isset($_GET['aliment']) && !isset($_SESSION['Rec_Plat'])){
  $_SESSION['Rec_Plat'] = array('début');
}*/
 ?>
