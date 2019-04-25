<?php
include("../../Outil/IsTest.php");

if(isset($_SESSION['profil']) || ($testGene)){
    //$Profil=$_SESSION['profil'];
 
//Pseudo : name="pseudo"  name="prenom"  name="poids" name="taille"
$Modifier = 0;
include("../../Outil/Php/AccesBD.php");
$BD=getBD();

function insertBD ($post, $BD,$champs, $id, $num, $existe){
    // Modifie le profil selon si post est un nombre $num=1 ou charactere -> $num=0
    if($existe!=$post){
        
if ($num==1){
    $q="UPDATE profil SET ".$champs."  = ".$post." WHERE id =".$id;
    //echo $q;
    $BD->query($q);
} else if ($num==0){
    $q="UPDATE profil SET ".$champs."  = '".$post."' WHERE id =".$id;
    //echo $q;
    $BD->query($q);
}
    return 1;
    }
}
if(isset($_POST['pseudo'])){
    $Modifier=insertBD ($_POST['pseudo'], $BD,"utilisateur", $Profil['ID'], 0, $Profil['user']);
if(!$testGene){   
    $_SESSION['profil']['user']=$_POST["pseudo"];
}
}
    
if(isset($_POST['prenom'])){
    
    $Modifier=insertBD ($_POST['prenom'], $BD,"prenom", $Profil['ID'], 0, $Profil['prenom']);
if(!$testGene){   
    $_SESSION['profil']['prenom']=$_POST["prenom"];
}
}
    
if(isset($_POST['poids'])){   
    $Modifier=insertBD ($_POST['poids'], $BD,"poids", $Profil['ID'], 1, $Profil['poids']);
if(!$testGene){
    $_SESSION['profil']['poids']=$_POST["poids"];
}
}
    
if(isset($_POST['taille'])){   
    $Modifier=insertBD ($_POST['taille'], $BD,"taille", $Profil['ID'], 1, $Profil['taille']);
if(!$testGene){   
    $_SESSION['profil']['taille']=$_POST["taille"];
}
}

if(isset($_POST['lvlSport'])){   
    $Modifier=insertBD ($_POST['lvlSport'], $BD,"NiveauSportif", $Profil['ID'], 1, $Profil['NiveauSportif']);
if(!$testGene){   
    $_SESSION['profil']['NiveauSportif']=$_POST["lvlSport"];
}
}

if(isset($_POST['Objectif'])){
    $q="UPDATE objectif_profil SET valeur_type = ".$_POST['Objectif']." WHERE id_Objectif=1 and id_Profil =".$Profil['ID'];
    //echo $q;
    $BD->query($q);
    $Modifier=1;
}

echo $Modifier;
}else{
    echo 'No connecter !';
}
?>
