<?php

$test=true;
$testStats=true;
session_start();

if(isset($_SESSION['profil'])){
    include("../Actualisation/Actualisation.php");
    $Profil=$_SESSION['profil'];
} else if($test) {
    $Profil=array('ID'=>1, 'prenom'=>'Paul', 'mail'=>'Paul@jeMangeTrop.com', 'poids'=>120, 'taille'=>170, 'user'=>'GrosPaul','genre'=>'M', 'mdp'=>'CestPasDeMaFaute', 'photo'=>'NoPic', 'actualisation'=>'20-03-2019','point'=>0);
}

?>
