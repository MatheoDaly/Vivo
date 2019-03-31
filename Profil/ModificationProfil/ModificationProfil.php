<?php
session_start();
if(isset($_SESSION['profil'])){
    include("../Actualisation/Actualisation.php");
    $Profil=$_SESSION['profil'];
} else {
    $Profil=array('ID'=>1, 'prenom'=>'Paul', 'mail'=>'Paul@jeMangeTrop.com', 'poids'=>120, 'taille'=>170, 'user'=>'GrosPaul','genre'=>'M', 'mdp'=>'CestPasDeMaFaute', 'photo'=>'NoPic', 'actualisation'=>'20-03-2019','point'=>0);
}
//Pseudo : name="pseudo"  name="prenom"  name="poids" name="taille"
$Modifier = false;
include("../../Outil/Php/AccesBD.php");
$BD=getBD();

function insertBD ($post, $BD,$champs, $id, $num, $existe){
    // Modifie le profil selon si post est un nombre $num=1 ou charactere -> $num=0
    if($existe!=$post){
        
if (isset($post) && $num==1){
    $BD->query("UPDATE profil SET ".$champs."  = ".$post." WHERE id =".$id);
} else if (isset($post) && $num==0){
    $BD->query("UPDATE profil SET ".$champs."  = '".$post."' WHERE id =".$id);
}
    return true;
    }
}

$Modifier=insertBD ($_POST['pseudo'], $BD,"utilisateur", $Profil['ID'], 0, $Profil['user']);
$Modifier=insertBD ($_POST['prenom'], $BD,"prenom", $Profil['ID'], 0, $Profil['prenom']);
$Modifier=insertBD ($_POST['poids'], $BD,"poids", $Profil['ID'], 1, $Profil['poids']);
$Modifier=insertBD ($_POST['taille'], $BD,"taille", $Profil['ID'], 1, $Profil['taille']);

echo $Modifier;
?>
