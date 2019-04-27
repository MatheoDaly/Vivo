<?php


include(   "../Outil/IsTest.php");

$testStats=false;
if($testStats){   
include("../Outil/Php/CreationSet.php");
setHistorique($BD, 'P');
} else {   
include('../Outil/Php/AccesBd.php');
$BD = getBD();
}

## J'ai fini la dynamique du tableau !
// Cela me sert seulement pour teste ma fonction en js
// je veux un format retour tel que echo json_ecode(array(array("Ma concentration", array(Valeur1, Valeur2, Valeur3, etc))))
// Retourne moi bien le meme nombre de donnees pour chaque types !



if (isset($_POST['type']) && $_POST['type']<6 && $_POST['type']>0){
    echo json_encode(CalculTaux($Profil['ID'], $BD, $_POST['type']));
}
    if(isset($testGene) && $testGene) echo json_encode(CalculTaux(1, $BD, 4));




// ############################# Passage en fonction de calcul taux pour reutilisation dans d'autre fichier !

function CalculTaux ($id, $BD, $type){
    
    //Probleme avec semaine et années
    if($type == 1){
    // tu recupere l'id via la session ! // la fin a parti de group by et inutile car Actualisation t'as deaj prepare les données !
$q="SELECT concentration.Nom,NumRepas,TauxCumule from statistique INNER JOIN concentration ON concentration.id=statistique.id_Concentration where date=DATE(NOW()) AND ID_Profil=".$id." AND type=".$type." GROUP by NumRepas,Nom ORDER by Nom, NumRepas";
       if(isset($testGene) && $testGene) echo $q;
    $req = $BD->query($q);
    $taux=array();
    array_push($taux, null);
    $valeur=array();
    $molecule=array();
    $heure=array();
    $nom="";
    $entre=true;
    while ($ligne= $req->fetch()){
        array_push($valeur, $ligne['TauxCumule']); // ->n*m
        
        if($entre || $nom==$ligne['Nom']) // -> m
        {
            $nom=$ligne['Nom'];
            $nom1=$ligne['Nom'];
            $entre=false;
            array_push($heure, $ligne['NumRepas']);
        }
        if ($nom1!=$ligne['Nom']){   
            $nom1=$ligne['Nom'];
        array_push($molecule, $ligne['Nom']); // ->N
        array_push($molecule, $valeur);// ->n
        array_push($taux, $molecule); // ->n
        $valeur=array(); // -> n
        $molecule=array(); // -> n
        }
        
    }
    $taux[0]= $heure;
    return $taux;
    }
else if($type == 2) {
    $time="day";
    $diff="-7";
    $lim="7";
    $date="DAY(date)";
    //echo json_encode(array(array("Calorie", array(1, 2, 3, 4, 5, 6, 7)), array(0, 12, 14)));
} 
else if($type == 3) {
    $time="WEEK";
    $diff="-5";
    $lim="5";
    $date="WEEK(date)";
    //echo json_encode(array(array("Calorie", array(1, 2, 3, 4, 5, 6)),array("Glucide", array(2, 0, 5, 8, 6, 2))));
} 
else if($type == 4) {
    $time="MONTH";
    $diff="-6";
    $lim="6";
    $date="MONTH(date)";
    //echo json_encode(array(array("Calorie", array(1, 2, 3, 4, 5, 6))));
} else if($type == 5) {
    $time="year";
    $diff="-3";
    $lim="3";
    $date="YEAR(date)";
    
    //echo json_encode(array(array("Calorie", array(1, 2, 3))));
} 

if($type>1){
    $q= "SELECT DISTINCT ".$date." AS date,concentration.Nom, TauxCumule from statistique INNER JOIN concentration ON concentration.id=statistique.id_Concentration where ID_Profil=".$id." AND type=".$type." and TIMESTAMPDIFF(".$time.",NOW(),date) BETWEEN ".$diff." and 0 GROUP BY date ORDER by Nom,date LIMIT ".$lim;
    if(isset($testGene) && $testGene) echo $q;
    $req = $BD->query($q);
    $taux=array();
    $heure=array();
    array_push($taux, array());
    $i=0;
    $nom="";
    $nom1="";
    $entre=true;
    while ($ligne= $req->fetch()){
        if($nom1!=$ligne['Nom']){
            $i++;
            $nom1=$ligne['Nom'];
            array_push($taux, array());
            array_push($taux[$i], $ligne['Nom']); // ->n
            array_push($taux[$i], array());
        }
            array_push($taux[$i][1] , $ligne['TauxCumule']); // ->n*m        
        if($entre || $nom==$ligne['Nom'])
        {
            $nom=$ligne['Nom'];
            $nom1=$ligne['Nom'];
            $entre=false;
            array_push($heure, $ligne['date']);
        }
        if(isset($testGene) && $testGene) echo '<br>';
        if(isset($testGene) && $testGene) print_r($taux);
        if(isset($testGene) && $testGene) echo '<br>';
        
    }
    $taux[0]= $heure;
    return $taux;
    }
// Ici tu le fais afficher deux fois si je prend le premier en compte or les données que je recois son mauvais !
    return $taux;
$req->closeCursor();
}



if(isset($_POST['today'])){
echo json_encode(camembert("Mes calories aujourd'hui", $BD, $Profil['ID'])); 
} 
//echo json_encode(camembert("calorie", $BD, 1)); 

//-------------Fonction qui prends type 


function camembert($type, $BD, $id){
$stats = array();
$nom = array();

$q="SELECT aliments.alim_nom_fr AS 'Nom',historique_aliment.quantite*aliments.Energie_Règlement_UE_N°_11692011_kcal100g AS 'calorie' FROM `historique_aliment` INNER JOIN aliments ON aliments.alim_code=historique_aliment.ID_ingredient
WHERE historique_aliment.Date = DATE(NOW()) AND historique_aliment.ID_Profil=".$id;
    if(isset($testGene) && $testGene)  echo $q;
$req = $BD->query($q);
    
    while($ligne=$req->fetch()){
        
     array_push($nom, $ligne['Nom'] );
     array_push($stats, $ligne['calorie'] );
    
    }
    
    return $graph=array($type,$nom, $stats);
    
}

?>
