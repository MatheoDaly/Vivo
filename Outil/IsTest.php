<?php

// permet les tests généraux tel que mettre un profil par défaut et premettre ces modification 
$testGene=false;
// Ici permete de génére des statistique pour utiliser 
session_start();

if(isset($_SESSION['profil']) && !$testGene){
    $Profil=$_SESSION['profil'];
} else if($testGene) {
    session_destroy();
    $Profil=array('ID'=>1, 'prenom'=>'Paul', 'mail'=>'Paul@jeMangeTrop.com', 'poids'=>120, 'taille'=>170, 'user'=>'GrosPaul','genre'=>'M', 'mdp'=>'CestPasDeMaFaute', 'photo'=>'NoPic', 'actualisation'=>'20-03-2019','NiveauSportif'=>2);
} else if(isset($Visiteur)) {
    session_destroy();
    $Profil=array('ID'=>1, 'prenom'=>'Paul', 'mail'=>'Paul@jeMangeTrop.com', 'poids'=>120, 'taille'=>170, 'user'=>'GrosPaul','genre'=>'M', 'mdp'=>'CestPasDeMaFaute', 'photo'=>'NoPic', 'actualisation'=>'20-03-2019','NiveauSportif'=>2);
} 

?>
