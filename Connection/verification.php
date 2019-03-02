<?php
// Ici ce fichier des infos du java script formulaire.js
//   Detaille variable post : email/mdp
include('../Outil/Php/AccesBd.php');
if(isset($_POST['email'])
  && isset($_POST['mdp'])){

    $BD = getBD();

    $req = $BD->query("Select * from profil where email='".$_POST['email']."' AND mdp='".$_POST['mdp']."'");


    $Profil= $req->fetch();

    if($Profil!=false){// verifier que son mail n'existe pas

        session_start();
        if ($Profil['url_photo']!=''){
            $_SESSION['profil']=array($Profil['prenom'], $Profil['email'], $Profil['poids'], $Profil['taille'], $Profil['utilisateur'], $Profil['genre'], $Profil['mdp'], $Profil['url_photo']);
        }else {
            $_SESSION['profil']=array($Profil['prenom'], $Profil['email'], $Profil['poids'], $Profil['taille'], $Profil['utilisateur'], $Profil['genre'], $Profil['mdp'], 'NoPic');
        echo 'Connecter';
        }
            setcookie('email', $_POST['email'], time()*(3600*24*24));
            setcookie('mdp', $_POST['mdp'], time()*(3600*24*24));

    } else {

        echo 'Non inscrit';

    }
}



?>
