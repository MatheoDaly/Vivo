<?php
include_once "AccesBD_rechAl.php";
include_once "Fonctions_alim.php";
session_start();


echo('Menu ajouté !');


#Mettre les menus dans la BD dans la table menu
# - Mettre les alim indep dans recette (de menu)
# - Mettre les recettes dans recette de menu
$bd = getBD();
$data = $bd -> query()

 ?>
