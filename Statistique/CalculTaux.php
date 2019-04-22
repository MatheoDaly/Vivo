<?php

session_start();

$testStats=false;
if($testStats){   
include("../Outil/Php/CreationSet.php");
setHistorique($BD, 'P');
}

if(isset($_SESSION["profil"])){
$id=$_SESSION["profil"]['ID'];
} else {
$id=1;
}
## J'ai fini la dynamique du tableau !
// Cela me sert seulement pour teste ma fonction en js
// je veux un format retour tel que echo json_ecode(array(array("Ma concentration", array(Valeur1, Valeur2, Valeur3, etc))))
// Retourne moi bien le meme nombre de donnees pour chaque types !
include('../Outil/Php/AccesBd.php');
$BD = getBD();



if (isset($_POST['type']) && $_POST['type']<6 && $_POST['type']>0){
    echo json_encode(CalculTaux($id, $BD, $_POST['type']));
}
    echo json_encode(CalculTaux(1, $BD, 1));




// ############################# Passage en fonction de calcul taux pour reutilisation dans d'autre fichier !

function CalculTaux ($id, $BD, $type){
    
    //Probleme avec semaine et années
    if($type == 1){
    // tu recupere l'id via la session ! // la fin a parti de group by et inutile car Actualisation t'as deaj prepare les données !
$q="SELECT concentration.Nom,NumRepas,TauxCumule from statistique INNER JOIN concentration ON concentration.id=statistique.id_Concentration where date=DATE(NOW()) AND ID_Profil=".$id." AND type=".$type." GROUP by NumRepas,Nom ORDER by Nom, NumRepas";
        echo $q;
    $req = $BD->query($q);
    $taux=array();
    $valeur=array();
    $molecule=array();
    $heure=array();
    $nom="";
    $entre=true;
    while ($ligne= $req->fetch()){
        array_push($valeur, $ligne['TauxCumule']);
        array_push($molecule, $ligne['Nom']);
        array_push($molecule, $valeur);
        array_push($taux, $molecule);
        if($entre || $nom==$ligne['Nom'])
        {
            $nom=$ligne['Nom'];
            $entre=false;
            array_push($heure, $ligne['NumRepas']);
        }
            $valeur=array();
        $molecule=array();
        
    }
    array_push($taux, $heure);
    return $taux;
    }
else if($type == 2) {
    $time="day";
    $diff="-7";
    $lim="7";
    //echo json_encode(array(array("Calorie", array(1, 2, 3, 4, 5, 6, 7))));
} 
else if($type == 3) {
    $time="WEEK";
    $diff="-5";
    $lim="5";
    //echo json_encode(array(array("Calorie", array(1, 2, 3, 4, 5, 6)),array("Glucide", array(2, 0, 5, 8, 6, 2))));
} 
else if($type == 4) {
    $time="MONTH";
    $diff="-6";
    $lim="6";
    //echo json_encode(array(array("Calorie", array(1, 2, 3, 4, 5, 6))));
} else if($type == 5) {
    $time="year";
    $diff="-3";
    $lim="3";
    
    //echo json_encode(array(array("Calorie", array(1, 2, 3))));
} 

if($type>1){
    $q= "SELECT date,concentration.Nom,TauxCumule from statistique INNER JOIN concentration ON concentration.id=statistique.id_Concentration where ID_Profil=".$id." AND type=".$type." and TIMESTAMPDIFF(".$time.",NOW(),date) BETWEEN ".$diff." and 0 ORDER by Nom,date LIMIT ".$lim;
    echo $q;
$req = $BD->query($q);
    $taux=array();
    $valeur=array();
    $Concentration=array();
    $nom='';
    $frist=true;
    while ($ligne= $req->fetch()){
        array_push($valeur, $ligne['TauxCumule']);
        //if ($frist){
        //    $frist=false;
        //    $nom=$ligne['Nom'];
       // }  else 
        if($nom!=$ligne['Nom']){
            $nom=$ligne['Nom'];
            array_push($Concentration, $ligne['Nom']);
            array_push($Concentration, $valeur);
            array_push($taux, $Concentration);
            $valeur=array();
            $Concentration=array();
        } 
        //print_r($valeur);
        print_r($Concentration);
    }
// Ici tu le fais afficher deux fois si je prend le premier en compte or les données que je recois son mauvais !
    return $taux;
$req->closeCursor();
}
}


if(isset($_POST['today'])){
echo json_encode(camembert("calorie", $BD, $id)); 
} 
//echo json_encode(camembert("calorie", $BD, 1)); 

//-------------Fonction qui prends type 


function camembert($type, $BD, $id){
$stats = array();
$nom = array();

$q="SELECT aliments.alim_nom_fr AS 'Nom',historique_aliment.quantite*aliments.Energie_Règlement_UE_N°_11692011_kcal100g AS 'calorie' FROM `historique_aliment` INNER JOIN aliments ON aliments.alim_code=historique_aliment.ID_ingredient
WHERE historique_aliment.Date = DATE(NOW()) AND historique_aliment.ID_Profil=".$id;
    //echo $q;
$req = $BD->query($q);
    
    while($ligne=$req->fetch()){
        
     array_push($nom, $ligne['Nom'] );
     array_push($stats, $ligne['calorie'] );
    
    }
    
    return $graph=array('calorie',$nom, $stats);
    
}

?>
