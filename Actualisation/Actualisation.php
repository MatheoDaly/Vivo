<?php

//################################ Permet de genere un set de donnée aleatoire
$test=false;


// pas besoin de js on utilisera une inclusion du code php via la fonction include !
/*


############################### Minimiser le nombre d'appelle de la page En attente de racordement !
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

//Aide mémoire : $Profil=array($Profil['id'], $Profil['prenom'], $Profil['email'], $Profil['poids'], $Profil['taille'], $Profil['utilisateur'], $Profil['genre'], $Profil['mdp'], 'NoPic', True);

if($test==true){
    
session_start();
if(isset($Profil)){
    include("../Actualisation/Actualisation.php");
    $Profil=$Profil;
} else {
    $Profil=array('ID'=>1, 'prenom'=>'Paul', 'mail'=>'Paul@jeMangeTrop.com', 'poids'=>120, 'taille'=>170, 'user'=>'GrosPaul','genre'=>'M', 'mdp'=>'CestPasDeMaFaute', 'photo'=>'NoPic', 'actualisation'=>'20-03-2019','point'=>0);
}
}

function ajoutConcentration ($type, $BD, $Repas, $concentration, $date, $id){
        // A revoir l'optimisation
        $q = "INSERT INTO statistique VALUES (1, ".$Repas.", '".$type."', ".$concentration.", '".$date."', ".$id.")";
        $req1 = $BD->query($q);
        $req1->closeCursor();
    }

if(isset($Profil)){

    include('../Outil/Php/AccesBD.php');
    $BD = getBD();
    // met à jout les données statistique, c'est ici que la magie opère !
    
    
############################# fonction Historique_Aliment -> Statistique ###########################################################
##################################
    
    
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
        WHERE historique_aliment.ID_Profil = ".$Profil["ID"]."
        AND Date BETWEEN ".$Profil["actualisation"]." AND NOW()
        GROUP BY historique_aliment.Date, historique_aliment.Repas");
    
    
    while($ligne = $req->fetch())
    {
        // obliger d'ajout les variables car cela ne s'affecte pas ! Donc c'est juste.
    ajoutConcentration('Proteine', $BD, $ligne['NumeroRepas'] ,$ligne['Proteine'],$ligne['Date'],$Profil["ID"]);
        
    ajoutConcentration('Glucide', $BD, $ligne['NumeroRepas'] ,$ligne['Glucide'],$ligne['Date'], $Profil["ID"]);
    
    ajoutConcentration('Alcool', $BD, $ligne['NumeroRepas'] ,$ligne['Alcool'],$ligne['Date'], $Profil["ID"]);
        
    ajoutConcentration('Calorie', $BD, $ligne['NumeroRepas'] ,$ligne['Calorie'],$ligne['Date'], $Profil["ID"]);
    }
    $req->closeCursor();
    
    
###################################### Ne s'occupe que de SUM pour jour mais Moyenne apresv #######################################
    
    for($i =1; $i<5; $i++){
        if($i==1) { // repas 
            $calcul = "SUM(TauxCumule)";
            $temps="date";
        } else if ($i>1){
            $calcul = "AVG(TauxCumule)";
            if ($i==2) $temps="WEEK(date), MONTH(date), YEAR(date)";
            if ($i==3) $temps="MONTH(date), YEAR(date)";
            if ($i==4) $temps="YEAR(date)";
        }
        $q="SELECT Nom, date, ".$calcul." AS concentration
    FROM statistique
    WHERE ID_Profil = ".$Profil["ID"]."
    AND type = ".$i." GROUP BY ".$temps." , Nom ";
    $req = $BD->query($q);
        
        while($ligne = $req->fetch()){
            $q="INSERT INTO statistique VALUES (".($i+1).", null, :Nom, :concentration, :Date, :ID)";
            $req1 = $BD->prepare($q);
            $req1->execute(array(
            'Nom'=>$ligne['Nom'],
            'Date'=>$ligne['date'],
            'concentration'=>$ligne['concentration'],
            'ID'=>$Profil['ID']));
            $req1->closeCursor();
        }
    $req->closeCursor();
    }

    ########################################### Ici on supprimes les derniere information ###########################################
    // Faire une fonction php pour qu'elle ne s'active qu'en debut de mois + prendre en compte la derniere connexion
    
    // Supprimes les statistiques des deux derniers mois pour les repas et jours
    $BD->query("DELETE FROM statistique WHERE type IN(1, 2) AND (MONTH(SUBDATE(NOW(), INTERVAL 1 MONTH)) < MONTH(date) OR YEAR(SUBDATE(NOW(), INTERVAL 2 MONTH))<YEAR(date)) AND ID_Profil = ".$Profil['ID']);
    
    // Six mois apres on supprime les semaines
    $BD->query("DELETE FROM statistique WHERE type = 3 AND (MONTH(SUBDATE(NOW(), INTERVAL 6 MONTH)) < MONTH(date) OR YEAR(SUBDATE(NOW(), INTERVAL 6 MONTH))<YEAR(date)) AND ID_Profil = ".$Profil['ID']);
    
    
    // Suite des fonction : recupere une liste d'aliment et historique aliment pour un profil donnee 
    //-> prepare une liste de liste pour chaque jour, il y a des concentrations donnees,
    // -> Calcul des concentration et integrations dans la liste
    ################# N'actualisera pas pour le prochain retour d'include ! Mise a par ajout de menue !
    
    
    $BD->query("UPDATE profil SET DateActue = CURRENT_TIMESTAMP() WHERE id =".$Profil['ID']);    
    $req=$BD->query("SELECT DateActue FROM profil where id =".$Profil['ID']);
    $ligne = $req->fetch();
    $Profil["actualisation"]=$ligne['DateActue'] ;
    
}

?>
