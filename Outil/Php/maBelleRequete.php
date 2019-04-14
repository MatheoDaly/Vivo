<?php
    include_once "AccesBD_rechAl.php";
    session_start();
    $bd = getBD();
    /*$vegan = $bd -> query('SELECT * FROM aliments, groupe, sous_groupe
                                WHERE groupe.alim_grp_code != 1
                                AND groupe.alim_grp_code != 4
                                AND groupe.alim_grp_code != 5
                                AND groupe.alim_grp_code != 11
                                AND sous_groupe.alim_grp_code != 904
                                AND sous_groupe.alim_grp_code != 901
                                AND sous_groupe.alim_grp_code != 801
                                AND sous_groupe.alim_grp_code != 302
                                AND sous_groupe.alim_grp_code != 303
                                AND sous_groupe.alim_grp_code != 304
                                AND aliments.alim_nom_fr NOT LIKE "Sauce teriyaki, préemballée"
                                AND aliments.alim_nom_fr NOT LIKE "Sauce au poivre, condimentaire, froide, préemballé..."
                                AND aliments.alim_nom_fr NOT LIKE "Sauce rouille, préemballée"
                                AND aliments.alim_nom_fr NOT LIKE "Sauce kebab, préemballée"
                                AND aliments.alim_nom_fr NOT LIKE "Sauce crudités ou Sauce salade, allégée en matière..."
                                AND aliments.alim_nom_fr NOT LIKE "Sauce burger, préemballée"
                                AND aliments.alim_nom_fr NOT LIKE "Sauce Nuoc Mâm ou Sauce au poisson, préemballée"
                                AND aliments.alim_nom_fr NOT LIKE "Sauce crudités ou Sauce salade, préemballée"
                                AND aliments.alim_nom_fr NOT LIKE "Sauce aïoli, préemballée"
                                AND aliments.alim_nom_fr NOT LIKE "Sauce américaine, préemballée"
                                AND aliments.alim_nom_fr NOT LIKE "Sauce au yaourt"
                                AND aliments.alim_nom_fr NOT LIKE "Sauce bourguignonne, préemballée"
                                AND aliments.alim_nom_fr NOT LIKE "Harissa (sauce condimentaire)"
                                AND aliments.alim_nom_fr NOT LIKE "Mayonnaise à teneur réduite en matière grasse ou M..."
                                AND aliments.alim_nom_fr NOT LIKE "Mayonnaise (70% MG min.)"
                                AND aliments.alim_nom_fr NOT LIKE "Sauce tartare, préemballée"
                                AND groupe.alim_grp_code = aliments.alim_grp_code
                                AND sous_groupe.alim_grp_code = aliments.alim_ssgrp_code');
    while($ligne = $vegan ->fetch()){
        $add = 'INSERT INTO regime_sans_aliment(id_Aliment, id_Regime) VALUES('.$ligne['alim_code'].', 2)';
        echo $add;
        //$bd -> query($add);
    }
    $vegan ->closeCursor();*/

/*$sans_porc = $bd -> query('SELECT * FROM aliments, groupe, sous_groupe
                                WHERE aliments.alim_nom_fr NOT LIKE "% porc"
                                AND aliments.alim_nom_fr NOT LIKE "porc %"
                                AND aliments.alim_grp_code != 1
                                AND sous_groupe.alim_grp_code != 403
                                AND groupe.alim_grp_code = aliments.alim_grp_code
                                AND sous_groupe.alim_grp_code = aliments.alim_ssgrp_code');
    while($ligne = $sans_porc ->fetch()){
        $add = 'INSERT INTO regime_sans_aliment(id_Aliment, id_Regime) VALUES('.$ligne['alim_code'].', 4)';
        echo $add;
        $bd -> query($add);
    }
$sans_porc ->  closeCursor();*/
/*$glucide = $bd -> query('SELECT * FROM `aliments` WHERE aliments.Glucides_g100g > 40');
    while($ligne = $glucide ->fetch()){
        $add = 'INSERT INTO est_riche_en(id_aliment, id_nutriment) VALUES('.$ligne['alim_code'].', 1)';
        echo $add;
        $bd -> query($add);
    }
$glucide ->  closeCursor();*/
        
/*$lipide = $bd -> query('SELECT * FROM `aliments` WHERE aliments.Lipides_g100g > 15');
    while($ligne = $lipide ->fetch()){
        $add = 'INSERT INTO est_riche_en(id_aliment, id_nutriment) VALUES('.$ligne['alim_code'].', 2)';
        echo $add;
        $bd -> query($add);
    }
$lipide ->  closeCursor();*/

$proteine = $bd -> query('SELECT * FROM `aliments` WHERE aliments.Protéines_g100g > 20');
    while($ligne = $proteine ->fetch()){
        $add = 'INSERT INTO est_riche_en(id_aliment, id_nutriment) VALUES('.$ligne['alim_code'].', 3)';
        echo $add;
        //$bd -> query($add);
    }
$proteine ->  closeCursor();
?>