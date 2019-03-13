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
    $ListeConcentration = array(array());
    // ne marche pas mais a structuré et non a recommencer !
    $req->query('SELECT AVG(aliments.Energie_Règlement_UE_N°_11692011_kcal100g*historique_aliment.quantite),
AVG(aliments.Protéines_g100g*historique_aliment.quantite), 
AVG(aliments.Glucides_g100g*historique_aliment.quantite),
AVG(aliments.Lipides_g100g*historique_aliment.quantite), 
AVG(aliments.Sucres_g100g*historique_aliment.quantite), AVG(aliments.Cholestérol_mg100g*historique_aliment.quantite), 
AVG(aliments.Alcool_g100g*historique_aliment.quantite) 
FROM historique_aliment 
INNER JOIN aliments ON aliments.alim_code = historique_aliment.ID_ingredient
INNER JOIN profil ON historique_aliment.ID_Profil = profil.id
GROUP BY historique_aliment.Date');
    
    // Suite des fonction : recupere une liste d'aliment et historique aliment pour un profil donnee 
    //-> prepare une liste de liste pour chaque jour, il y a des concentrations donnees,
    // -> Calcul des concentration et integrations dans la liste
}

?>
