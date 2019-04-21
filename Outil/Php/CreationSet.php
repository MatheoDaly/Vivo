<?php 
$test=true;
if($test){
include('AccesBD.php');    
$BD=getBD();
}

//####################################################################################################



function setHistorique($BD, $moment){
    if($moment=="F"){
        $moment='DATE_ADD';
    } else {
        $moment='SUBDATE';
    }
    
    $nbVar=10;
    //$nbVar est entre 1 et 4 variable à ajouté depend de la taille de liste !
$req = $BD->query('SELECT alim_code AS "c" FROM `aliments` LIMIT '.$nbVar);
$liste=array();
    
while($ligne=$req->fetch()){
    array_push($liste, $ligne['c']);
}$req->closeCursor();
    
    for($i=-1;$i<100;$i++){
        $alea=rand(0, $nbVar);
        for($k=$alea;$k<rand($alea, $nbVar) ;$k++){
            $q = "INSERT INTO historique_aliment VALUES (".rand(0, 23).", ".$liste[$k].", ".rand(0, 10).", 1, ".$moment."(NOW(), INTERVAL ".$i." DAY))";
            echo $q;
            echo '</br>';
            $BD->query($q);
            }
        }
    echo "Set historique crée";
    }
//setHistorique($BD, '');

//####################Reseignement liste concentration : $liste=array("Calorie", "Proteine", "Glucide", "Alcool")

function setRepas($BD,$nbVar, $moment){
    if($moment=="F"){
        $moment='DATEADD';
    } else {
        $moment='SUBDATE';
    }
    
    
    //$nbVar est entre 1 et 5 variable à ajouté 
$j=0;
$liste=array(5, 2, 1, 3);
$ListsMoyenneAsso=array(2500, 5, 14, 36, 2);
    for($k=0;$k<$nbVar;$k++){
        
    for($i=0;$i<100;$i++){
            if($i%3 == 0){
                $j++;
            } 
            $BD->query("INSERT INTO statistique VALUES (1, ".(($i%3)+1).", '".$liste[$k]."', ".rand($ListsMoyenneAsso[$k]*0.5 ,$ListsMoyenneAsso[$k]*1.5).", ".$moment."(NOW(), INTERVAL ".$j." DAY), 1)");
            
        }
    }
    echo "Set repas crée";
}
//setRepas($BD, 4, "P");

function setJour($BD,$nbVar, $moment){
    if($moment=="F"){
        $moment='DATEADD';
    } else {
        $moment='SUBDATE';
    }
    
    //$nbVar est entre 1 et 5 variable à ajouté 
$j=0;
$liste=array(5, 2, 1, 3);
$ListsMoyenneAsso=array(2500, 5, 14, 36, 2);
    for($k=0;$k<$nbVar;$k++){
        
    for($i=0;$i<15;$i++){
        $q = "INSERT INTO statistique VALUES (2, null, '".$liste[$k]."', ".rand($ListsMoyenneAsso[$k]*0.8 ,$ListsMoyenneAsso[$k]*1.2).", ".$moment."(NOW(), INTERVAL ".$i." DAY), 5)";
        echo $q;
        echo '<br/>';
            $BD->query($q);
            
        }
    }
    
    echo "Set jours crée";
}
//setJour($BD, 4, 'P');
?>
