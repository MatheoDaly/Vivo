<?php
session_start();

if(!isset($_GET["choix"]))
{
    $_SESSION["Plat_Rec"] = array();
}


if(isset($_GET["choix"])) //quand bouton choix est cliqué
{

    $aa = $_GET; // je stock le tableau get dans une variable
    if ($_SESSION["Plat_Rec"] == null ){
        $_SESSION["Plat_Rec"] = array();
    }
    array_push($_SESSION["Plat_Rec"], $aa); // je push dans session plat rec

print_r($_SESSION["Plat_Rec"] );
}

  echo('<meta http-equiv="refresh" content="0; URL=CreationMenuSuite.php">');
  //check if exist a faire
