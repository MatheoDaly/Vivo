<?php
session_start();
 unset($_SESSION['Recette']);
 echo('<meta http-equiv="refresh" content="0; URL=rechercheAliment.php">');
?>