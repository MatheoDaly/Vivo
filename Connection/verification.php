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
        // Le true en fin d'array permet de savoir si le profil est a actualiser pour la BD, ainsi permet d'actualiser au moment de chaque connexion !
        if ($Profil['url_photo']!=''){
            $_SESSION['profil']=array('ID'=>$Profil['id'], 'prenom'=>$Profil['prenom'], 'mail'=>$Profil['email'], 'poids'=>$Profil['poids'], 'taille'=>$Profil['taille'], 'user'=>$Profil['utilisateur'], 'genre'=>$Profil['genre'], 'mdp'=>$Profil['mdp'], 'photo'=>$Profil['url_photo'], 'actualisation'=>$Profil['DateActue'],'NiveauSportif'=>$Profil['NiveauSportif']);
        }else {
            $_SESSION['profil']=array('ID'=>$Profil['id'], 'prenom'=>$Profil['prenom'], 'mail'=>$Profil['email'], 'poids'=>$Profil['poids'], 'taille'=>$Profil['taille'], 'user'=>$Profil['utilisateur'],'genre'=>$Profil['genre'], 'mdp'=>$Profil['mdp'], 'photo'=>'NoPic', 'actualisation'=>$Profil['DateActue'],'NiveauSportif'=>$Profil['NiveauSportif']);
        }
            setcookie('mdp', $_POST['mdp'], time()*(3600*24*24));
        
        echo 'Connecter';

    } else {

        echo 'Non inscrit';

    }
            setcookie('email', $_POST['email'], time()*(3600*24*24));
}



?>
