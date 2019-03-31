<?php
    include_once "AccesBD_rechAl.php";
    session_start();
    $bd = getBD();
    $vegetarien = $bd -> query('SELECT * FROM aliments, groupe, sous_groupe
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
    while($ligne = $vegetarien ->fetch()){
        $add = 'INSERT INTO regime_sans_aliment(id_Aliment, id_Regime) VALUES('.$ligne['alim_code'].', 2)';
        echo $add;
        //$bd -> query($add);
    }
        
?>