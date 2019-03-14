<?php

// j'ai fais ça pour actualisation mais elle ne sert à rien pour celle ci du coups prends cette requet juan elle te sera plus utile
/*
$req->query("SELECT AVG(aliments.Energie_Règlement_UE_N°_11692011_kcal100g*historique_aliment.quantite) AS 'Calorie',
        AVG(aliments.Protéines_g100g*historique_aliment.quantite) AS 'Proteine', 
        AVG(aliments.Glucides_g100g*historique_aliment.quantite) AS 'Glucide',
        AVG(aliments.Lipides_g100g*historique_aliment.quantite) AS 'Lipide', 
        AVG(aliments.Sucres_g100g*historique_aliment.quantite) AS 'Sucre', 
        AVG(aliments.Cholestérol_mg100g*historique_aliment.quantite) AS 'Cholesterol', 
        AVG(aliments.Alcool_g100g*historique_aliment.quantite) AS 'Alcool' 
        FROM historique_aliment 
        INNER JOIN aliments ON aliments.alim_code = historique_aliment.ID_ingredient
        WHERE historique_aliment.ID_Profil = 1
        GROUP BY historique_aliment.Date");
*/




/*
// Cela me sert seulement pour teste ma fonction en js
if(isset($_POST['type']) & $_POST['type'] == 1){
    echo json_encode(array(1, 2, 3, 4, 5, 6, 7));
    }
else if(isset($_POST['type']) & $_POST['type'] == 2) {
    echo json_encode(array(3, 6, 8, 4, 5, 6, 7));
}
*/
include('../Outil/Php/AccesBD.php');
    $BD = getBD();

    $repas = 1;// pour plus de lisibilité !
    $req = $BD->query("SELECT Nom, date, SUM(TauxCumule) AS concentration
        FROM statistique
        WHERE ID_Profil = 1
        AND type = ".$repas."
        GROUP BY date, Nom ");
    while($ligne = $req->fetch()){
        $req1 = $BD->prepare("INSERT INTO statistique VALUES (2, null, :Nom, :concentration, :Date, :ID)");
        $req1->execute(array(
        'Nom'=>$ligne['Nom'],
        'Date'=>$ligne['date'],
        'concentration'=>$ligne['concentration'],
        'ID'=>1));
        $req1->closeCursor();
    }
    $req->closeCursor();
##################################### fonction Statistique jour -> Statistique semaines##############################################
    $jour = 2;// pour plus de lisibilité !
    $req = $BD->query("SELECT Nom, AVG(TauxCumule) AS concentration, MIN(date) AS date
    FROM statistique
    WHERE type=".$jour."
    AND ID_Profil = 1
    GROUP BY WEEK(date), MONTH(date), YEAR(date), Nom");

    while($ligne = $req->fetch()){
        $req1 = $BD->prepare("INSERT INTO statistique VALUES (3, null, :Nom, :concentration, :Date, :ID)");
        $req1->execute(array(
        'Nom'=>$ligne['Nom'],
        'Date'=>$ligne['date'],
        'concentration'=>$ligne['concentration'],
        'ID'=>1));
        $req1->closeCursor();
    }
    $req->closeCursor();
##################################### fonction Statistique semaine -> Statistique mois##############################################
    $semaine = 3;// pour plus de lisibilité !
    $req = $BD->query("SELECT Nom, AVG(TauxCumule) AS concentration, MIN(date) AS date
    FROM statistique
    WHERE type=".$semaine."
    AND ID_Profil = 1
    GROUP BY MONTH(date), YEAR(date), Nom");

    while($ligne = $req->fetch()){
        $req1 = $BD->prepare("INSERT INTO statistique VALUES (4, null, :Nom, :concentration, :Date, :ID)");
        $req1->execute(array(
        'Nom'=>$ligne['Nom'],
        'Date'=>$ligne['date'],
        'concentration'=>$ligne['concentration'],
        'ID'=>1));
        $req1->closeCursor();
    }
    $req->closeCursor();
##################################### fonction Statistique mois -> Statistique annees##############################################
    $mois = 4;// pour plus de lisibilité !
    $req = $BD->query("SELECT Nom, AVG(TauxCumule) AS concentration, MIN(date) AS date
    FROM statistique
    WHERE type=".$mois."
    AND ID_Profil = 1
    GROUP BY YEAR(date), Nom");

    while($ligne = $req->fetch()){
        $req1 = $BD->prepare("INSERT INTO statistique VALUES (5, null, :Nom, :concentration, :Date, :ID)");
        $req1->execute(array(
        'Nom'=>$ligne['Nom'],
        'Date'=>$ligne['date'],
        'concentration'=>$ligne['concentration'],
        'ID'=>1));
        $req1->closeCursor();
    }
    $req->closeCursor();
?>
