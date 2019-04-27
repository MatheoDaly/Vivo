<?php

//################################ Permet de genere un set de donnée aleatoire


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

if(!isset($Visiteur)){   
    include("../Outil/IsTest.php");
    include('../Outil/Php/AccesBD.php');
    $BD = getBD();
}


if(isset($Profil) || $testGene){

    // met à jout les données statistique, c'est ici que la magie opère !
    
    
############################# fonction menu_Profil -> Historique_Aliment  ###########################################################
##################################
    
    $q= "SELECT est_ingredient_de.quantite AS 'Quant', est_ingredient_de.id_aliment AS 'CodeAli', menu_profil.date AS 'Date', menu_profil.heure 'heure' FROM menu_profil INNER JOIN compose ON compose.id_menu = menu_profil.Id_Menu
INNER JOIN recette_plat ON compose.id_recette = recette_plat.Id_Recette
INNER JOIN est_ingredient_de ON recette_plat.Id_Recette = est_ingredient_de.id_recette
WHERE menu_profil.id_profil=".$Profil["ID"]." and date BETWEEN '".$Profil["actualisation"]."' AND NOW()";
    if($testGene) echo $q."<br>";
    $req= $BD->query($q);
    while($ligne = $req->fetch()){
        $BD->query("INSERT INTO historique_aliment VALUE (".$ligne['heure'].",".$ligne['CodeAli'].",".$ligne['Quant'].", ".$Profil["ID"].",'".$ligne['Date']."' )");
        
    } $req->closeCursor();
    
    
    
############################# fonction Historique_Aliment -> Statistique ###########################################################
    
    
    // Ici génération de deux array et une str pour effectuer automatiquement l'ajout de concentration voulu 
    $req = $BD->query('SELECT * From concentration');
    $AjoutAutoQuery ="";
    $NomConcentration = array('Nom'=>array(),'id'=>array());
    while($ligne = $req->fetch()){
        $AjoutAutoQuery .= "SUM(".$ligne['ChampsAliment']."*historique_aliment.quantite) AS '".$ligne['Nom']."', ";
        array_push($NomConcentration['Nom'], $ligne['Nom']);
        array_push($NomConcentration['id'], $ligne['id']);
    } $req->closeCursor();
    
    
    //################ Ici on integre les donne dans statistiques
    $q="SELECT historique_aliment.Repas AS 'NumeroRepas',
        ".$AjoutAutoQuery."
        historique_aliment.Date AS 'Date'
        FROM historique_aliment 
        INNER JOIN aliments ON aliments.alim_code = historique_aliment.ID_ingredient
        WHERE historique_aliment.ID_Profil = ".$Profil["ID"]."
        AND Date BETWEEN '".$Profil["actualisation"]."' AND NOW()
        GROUP BY historique_aliment.Date, historique_aliment.Repas";
    if($testGene) echo $q;
    $req = $BD->query($q);
    
    while($ligne = $req->fetch())
    {
        // ajout automatiser des concentrations
    for($i=0;$i<sizeof($NomConcentration['Nom']); $i++){   
    //ajoutConcentration ($type, $BD, $Repas, $concentration, $date, $id)
        ajoutConcentration($NomConcentration['id'][$i],$BD,$ligne['NumeroRepas'],$ligne[$NomConcentration['Nom'][$i]], $ligne['Date'],$Profil["ID"]);
    }
    } $req->closeCursor();
    
    
###################################### Ne s'occupe que de SUM pour jour mais Moyenne apresv #######################################
    
    for($i =1; $i<5; $i++){
        if($i==1) { // repas 
            $calcul = "SUM(TauxCumule)";
            $temps="date";
            $distance="DATE(NOW())=date";
        } else if ($i>1){
            $calcul = "AVG(TauxCumule)";
            if ($i==2) {$temps="WEEK(date), MONTH(date), YEAR(date)";$distance=" WEEK(NOW())=WEEK(date) AND YEAR(NOW())=YEAR(date) ";}
            if ($i==3) {$temps="MONTH(date), YEAR(date)";$distance=" MONTH(NOW())=MONTH(date) AND YEAR(NOW())=YEAR(date) ";}
            if ($i==4) {$temps="YEAR(date)";$distance=" YEAR(NOW())=YEAR(date) ";}
        }
    $q="DELETE FROM statistique WHERE ID_Profil = ".$Profil["ID"]." AND type = ".$i." AND ".$distance." GROUP BY ".$temps." , Nom";
        if($testGene) echo $q.'<br>';
    $BD->query($q); 
        
        $q="SELECT id_Concentration AS 'Nom', MAX(date) AS 'date', ".$calcul." AS concentration
    FROM statistique
    WHERE ID_Profil = ".$Profil["ID"]."
    AND type = ".$i." AND ".$distance." GROUP BY ".$temps." , Nom ";
        if($testGene) echo $q.'<br>';
    $req = $BD->query($q);
        
        
        while($ligne = $req->fetch()){
            $q="INSERT INTO statistique VALUES (".($i+1).", null, :Nom, :concentration, :Date, :ID)";
            if($testGene) echo '<br>'.$q.'<br>';
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
    $BD->query("DELETE FROM statistique WHERE type IN(1, 2) AND SUBDATE(DATE(NOW()),INTERVAL 2 MONTH)>date AND ID_Profil = ".$Profil['ID']);
    
    // Six mois apres on supprime les semaines
    $BD->query("DELETE FROM statistique WHERE type = 3 AND SUBDATE(DATE(NOW()), INTERVAL 6 MONTH) > date AND ID_Profil = ".$Profil['ID']);
    
    
    // Suite des fonction : recupere une liste d'aliment et historique aliment pour un profil donnee 
    //-> prepare une liste de liste pour chaque jour, il y a des concentrations donnees,
    // -> Calcul des concentration et integrations dans la liste
    ################# N'actualisera pas pour le prochain retour d'include ! Mise a par ajout de menue !
    
    
    $BD->query("UPDATE profil SET DateActue = CURRENT_TIMESTAMP() WHERE id =".$Profil['ID']);    
    $req=$BD->query("SELECT DateActue FROM profil where id =".$Profil['ID']);
    $ligne = $req->fetch();
    $Profil["actualisation"]=$ligne['DateActue'] ;
    
}


###########################################################################################################################


function ajoutConcentration ($type, $BD, $Repas, $taux, $date, $id){
        // A revoir l'optimisation
        $q = "INSERT INTO statistique VALUES (1, ".$Repas.", ".$type.", ".$taux.", '".$date."', ".$id.")";
        if($testGene) echo $q."<br>";
        $req1 = $BD->query($q);
        $req1->closeCursor();
    }

function ajoutAliment ($type, $BD, $Repas, $concentration, $date, $id){
        // A revoir l'optimisation
        $q = "INSERT INTO statistique VALUES (1, ".$Repas.", '".$type."', ".$concentration.", '".$date."', ".$id.")";
        if($testGene) echo $q."<br>";
        $req1 = $BD->query($q);
    $req1->closeCursor();
    }

?>
