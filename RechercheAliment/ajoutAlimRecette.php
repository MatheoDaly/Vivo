<?php
session_start();
//include_once'bd.php';



if(isset($_GET['id_aliment']) && isset($_SESSION['Recette'])){
  array_push($_SESSION['Recette'],array('id'=>$_GET['id_aliment'],'nom'=>$_GET['nom_aliment'],'nb'=>$_GET['nbAlim']));
}elseif (!isset($_GET['id_aliment'])) {
  $_SESSION['Recette'] = array(array('id'=>$_GET['id_aliment'],'nom'=>$_GET['nom_aliment'],'nb'=>$_GET['nbAlim']));
}
echo('<meta http-equiv="refresh" content="0; URL=rechercheAliment.php">');
 ?>
