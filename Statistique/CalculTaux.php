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
        WHERE historique_aliment.ID_Profil = ".$_SESSION['profil'][0]."
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
?>
