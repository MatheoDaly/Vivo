<?php
// pas besoin de js on utilisera une inclusion du code php via la fonction include !
/*
############################### Minimiser le nombre d'appelle de la page


Type :
1 -> repas -> Somme des concentration
2 -> jour -> Somme des concentration des repas durant le jour
3 -> semaine -> Moyenne des concentration des jours durant la semaines
4 -> mois -> Moyenne des concentration des semaines durant le mois 
5 -> Annee -> Moyenne des concentration des mois durant l'annee

*/
###############################################################################################################################
####### Probleme actuel : Ne pas integre en statistique deux fois les menue !-> Prendre en compte la date de la dernier actualisation !############
###############################################################################################################################

//Aide mémoire : $_SESSION['profil']=array($Profil['id'], $Profil['prenom'], $Profil['email'], $Profil['poids'], $Profil['taille'], $Profil['utilisateur'], $Profil['genre'], $Profil['mdp'], 'NoPic', True);

session_start();
if(isset($_SESSION['profil'])){

    include('../Outil/Php/AccesBD.php');
    $BD = getBD();
    // met à jout les données statistique, c'est ici que la magie opère !
    
############################# fonction Historique_Aliment -> Statistique ###########################################################
    
    $req = $BD->query("SELECT historique_aliment.Repas AS 'NumeroRepas',
        historique_aliment.Date AS 'Date',
        SUM(aliments.Energie_Règlement_UE_N°_11692011_kcal100g*historique_aliment.quantite) AS 'Calorie',
        SUM(aliments.Protéines_g100g*historique_aliment.quantite) AS 'Proteine', 
        SUM(aliments.Glucides_g100g*historique_aliment.quantite) AS 'Glucide',
        SUM(aliments.Lipides_g100g*historique_aliment.quantite) AS 'Lipide', 
        SUM(aliments.Sucres_g100g*historique_aliment.quantite) AS 'Sucre', 
        SUM(aliments.Cholestérol_mg100g*historique_aliment.quantite) AS 'Cholesterol', 
        SUM(aliments.Alcool_g100g*historique_aliment.quantite) AS 'Alcool' 
        FROM historique_aliment 
        INNER JOIN aliments ON aliments.alim_code = historique_aliment.ID_ingredient
        WHERE historique_aliment.ID_Profil = ".$_SESSION['profil']["ID"]."
        AND Date BETWEEN ".$_SESSION['profil']["actualisation"]." AND NOW()
        GROUP BY historique_aliment.Date, historique_aliment.Repas");
    while($ligne = $req->fetch()){
        
        
        // Fait une nouvelle array selon la date et le repas et sommes les repartitons en macro-nutriments
        $req1 = $BD->prepare("INSERT INTO statistique VALUES (1, :NumeroRepas, 'Calorie', :Calorie, :Date, :ID)");
        $req1->execute(array(
        'NumeroRepas'=>$ligne['NumeroRepas'],
        'Date'=>$ligne['Date'],
        'Calorie'=>$ligne['Calorie'],
        'ID'=>$_SESSION['profil'][0]));
        $req1->closeCursor();
        
        $req1 = $BD->prepare("INSERT INTO statistique VALUES (1, :NumeroRepas, 'Alcool', :Alcool, :Date, :ID)");
        $req1->execute(array(
        'NumeroRepas'=>$ligne['NumeroRepas'],
        'Date'=>$ligne['Date'],
        'Alcool'=>$ligne['Alcool'],
        'ID'=>$_SESSION['profil'][0]));
        $req1->closeCursor();
        
        $req1 = $BD->prepare("INSERT INTO statistique VALUES (1, :NumeroRepas, 'Cholesterol', :Cholesterol, :Date, :ID)");
        $req1->execute(array(
        'NumeroRepas'=>$ligne['NumeroRepas'],
        'Date'=>$ligne['Date'],
        'Cholesterol'=>$ligne['Cholesterol'],
        'ID'=>$_SESSION['profil'][0]));
        $req1->closeCursor();
        
        $req1 = $BD->prepare("INSERT INTO statistique VALUES (1, :NumeroRepas, 'Sucre', :Sucre, :Date, :ID)");
        $req1->execute(array(
        'NumeroRepas'=>$ligne['NumeroRepas'],
        'Date'=>$ligne['Date'],
        'Sucre'=>$ligne['Sucre'],
        'ID'=>$_SESSION['profil'][0]));
        $req1->closeCursor();
        
        $req1 = $BD->prepare("INSERT INTO statistique VALUES (1, :NumeroRepas, 'Lipide', :Lipide, :Date, :ID)");
        $req1->execute(array(
        'NumeroRepas'=>$ligne['NumeroRepas'],
        'Date'=>$ligne['Date'],
        'Lipide'=>$ligne['Lipide'],
        'ID'=>$_SESSION['profil'][0]));
        $req1->closeCursor();
        
        $req1 = $BD->prepare("INSERT INTO statistique VALUES (1, :NumeroRepas, 'Glucide', :Glucide, :Date, :ID)");
        $req1->execute(array(
        'NumeroRepas'=>$ligne['NumeroRepas'],
        'Date'=>$ligne['Date'],
        'Glucide'=>$ligne['Glucide'],
        'ID'=>$_SESSION['profil'][0]));
        $req1->closeCursor();
        
        $req1 = $BD->prepare("INSERT INTO statistique VALUES (1, :NumeroRepas, 'Proteine', :Proteine, :Date, :ID)");
        $req1->execute(array(
        'NumeroRepas'=>$ligne['NumeroRepas'],
        'Date'=>$ligne['Date'],
        'Proteine'=>$ligne['Proteine'],
        'ID'=>$_SESSION['profil'][0]));
        $req1->closeCursor();
    }
    $req->closeCursor();

###################################### Ne s'occupe que de SUM pour jour mais Moyenne apresv #######################################
##################################### fonction Statistique repas -> Statistique jours##############################################

    $repas = 1;// pour plus de lisibilité !
    $req = $BD->query("SELECT Nom, date, SUM(TauxCumule) AS concentration
        FROM statistique
        WHERE ID_Profil = ".$_SESSION['profil'][0]."
        AND type = ".$repas."
        GROUP BY date, Nom ");
    while($ligne = $req->fetch()){
        $req1 = $BD->prepare("INSERT INTO statistique VALUES (2, null, :Nom, :concentration, :Date, :ID)");
        $req1->execute(array(
        'Nom'=>$ligne['Nom'],
        'Date'=>$ligne['date'],
        'concentration'=>$ligne['concentration'],
        'ID'=>$_SESSION['profil'][0]));
        $req1->closeCursor();
    }
    $req->closeCursor();
##################################### fonction Statistique jour -> Statistique semaines##############################################
    $jour = 2;// pour plus de lisibilité !
    $req = $BD->query("SELECT Nom, AVG(TauxCumule) AS concentration, MIN(date) AS date
    FROM statistique
    WHERE type=".$jour."
    AND ID_Profil = ".$_SESSION['profil'][0]."
    GROUP BY WEEK(date), MONTH(date), YEAR(date), Nom");

    while($ligne = $req->fetch()){
        $req1 = $BD->prepare("INSERT INTO statistique VALUES (3, null, :Nom, :concentration, :Date, :ID)");
        $req1->execute(array(
        'Nom'=>$ligne['Nom'],
        'Date'=>$ligne['date'],
        'concentration'=>$ligne['concentration'],
        'ID'=>$_SESSION['profil'][0]));
        $req1->closeCursor();
    }
    $req->closeCursor();
##################################### fonction Statistique semaine -> Statistique mois##############################################
    $semaine = 3;// pour plus de lisibilité !
    $req = $BD->query("SELECT Nom, AVG(TauxCumule) AS concentration, MIN(date) AS date
    FROM statistique
    WHERE type=".$semaine."
    AND ID_Profil = ".$_SESSION['profil'][0]."
    GROUP BY MONTH(date), YEAR(date), Nom");

    while($ligne = $req->fetch()){
        $req1 = $BD->prepare("INSERT INTO statistique VALUES (4, null, :Nom, :concentration, :Date, :ID)");
        $req1->execute(array(
        'Nom'=>$ligne['Nom'],
        'Date'=>$ligne['date'],
        'concentration'=>$ligne['concentration'],
        'ID'=>$_SESSION['profil'][0]));
        $req1->closeCursor();
    }
    $req->closeCursor();
##################################### fonction Statistique mois -> Statistique annees##############################################
    $mois = 4;// pour plus de lisibilité !
    $req = $BD->query("SELECT Nom, AVG(TauxCumule) AS concentration, MIN(date) AS date
    FROM statistique
    WHERE type=".$mois."
    AND ID_Profil = ".$_SESSION['profil'][0]."
    GROUP BY YEAR(date), Nom");

    while($ligne = $req->fetch()){
        $req1 = $BD->prepare("INSERT INTO statistique VALUES (5, null, :Nom, :concentration, :Date, :ID)");
        $req1->execute(array(
        'Nom'=>$ligne['Nom'],
        'Date'=>$ligne['date'],
        'concentration'=>$ligne['concentration'],
        'ID'=>$_SESSION['profil'][0]));
        $req1->closeCursor();
    }
    $req->closeCursor();
    ################################################################################################################################



    ########################################### Ici on supprimes les derniere information ###########################################
    // Faire une fonction php pour qu'elle ne s'active qu'en debut de mois + prendre en compte la derniere connexion
    
    // Supprimes les statistiques des deux derniers mois pour les repas et jours
    $BD->query("DELETE FROM statistique WHERE type IN(1, 2) AND (MONTH(SUBDATE(NOW(), INTERVAL 1 MONTH)) < MONTH(date) OR YEAR(SUBDATE(NOW(), INTERVAL 2 MONTH))<YEAR(date)) AND ID_Profil = ".$_SESSION['profil']['ID']);
    
    // Six mois apres on supprime les semaines
    $BD->query("DELETE FROM statistique WHERE type = 3 AND (MONTH(SUBDATE(NOW(), INTERVAL 6 MONTH)) < MONTH(date) OR YEAR(SUBDATE(NOW(), INTERVAL 6 MONTH))<YEAR(date)) AND ID_Profil = ".$_SESSION['profil']['ID']);
    
    
    // Suite des fonction : recupere une liste d'aliment et historique aliment pour un profil donnee 
    //-> prepare une liste de liste pour chaque jour, il y a des concentrations donnees,
    // -> Calcul des concentration et integrations dans la liste
    ################# N'actualisera pas pour le prochain retour d'include ! Mise a par ajout de menue !
    $BD->query("UPDATE profil SET DateActue = CURRENT_TIMESTAMP() WHERE id =".$_SESSION['profil']['ID']);
    $req=$BD->query("SELECT DateActue FROM profil where id =".$_SESSION['profil']['ID'])
    $ligne = $req->fetch();    
    $_SESSION['profil']["actualisation"]=$ligne['DateActue'] ;
}

?>
