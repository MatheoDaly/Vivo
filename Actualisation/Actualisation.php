<?php
// pas bseoin de js on utilisera une inclusion du code php via la fonction include !

//Aide mémoire : $_SESSION['profil']=array($Profil['id'], $Profil['prenom'], $Profil['email'], $Profil['poids'], $Profil['taille'], $Profil['utilisateur'], $Profil['genre'], $Profil['mdp'], 'NoPic');
session_start();
if(isset($_SESSION['profil'])){

    include('../Outil/Php/AccesBD.php');
    $BD = getBD();
    // met à jout les données statistique, c'est ici que la magie opère !
    
    // fonction Historique_Aliment -> Statistique
    
    // fonction Statistique -> Statistique
    //`Repas``ID_ingredient``quantite```Unite_Mesure_Quantite```ID_Profil``Date`
    $Liste = array(array());
    $req->query();
    
    // Suite des fonction -> recupere une liste d'aliment et historique aliment pour un profil donnee 
    //-> prepare une liste de liste pour chaque jour, il y a des concentrations donnees,
    // -> Calcul des concentration et integrations dans la liste
}

?>
