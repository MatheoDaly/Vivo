<?php
// Ici ce fichier des infos du java script formulaire.js

//   Detaille variable post : prenom/utilisateur/email/genre/poids/taille/mdp/mdp2
include('../Outil/Php/AccesBd.php');
if(isset($_POST['prenom'])&& isset($_POST['taille'])&& isset($_POST['poids'])&& isset($_POST['genre'])&& isset($_POST['email'])&&
  isset($_POST['utilisateur'])
  && isset($_POST['mdp'])){


    $BD = getBD();
    $req = $BD->query("Select email from profil where email='".$_POST['email']."'");
    
    if(($req->fetch())==false){// verifier que son mail n'existe pas
        $req->closeCursor();
        // --------------------------------------Une couille se passe à ce niveau--------------------------------------------------------------------------------
        $rep = $BD->prepare('INSERT INTO profil (prenom, utilisateur, email, genre, poids, taille, mdp, url_photo) VALUES(:prenom, :utilisateur, :email, :genre, :poids, :taille, :mdp, "")');

        $rep->execute(array(
        'prenom' => $_POST['prenom'],
        'utilisateur' => $_POST['utilisateur'],
        'email' => $_POST['email'],
        'genre' => $_POST['genre'],
        'poids' => $_POST['poids'],
        'taille' => $_POST['taille'],
        'mdp' => $_POST['mdp']
        ));
        $rep->closeCursor();
                // ----------------------------------------------------------------------------------------------------------------------
        echo 'Inscrit';

    } else {

        echo 'Existe';
        
    }
}



?>
