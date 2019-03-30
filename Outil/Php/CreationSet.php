<?php 
include('AccesBD.php');
$BD=getBD();

function setRepas($BD,$nbVar, $moment){
    if($moment=="F"){
        $moment='DATEADD';
    } else {
        $moment='SUBDATE';
    }
    
    
    //$nbVar est entre 1 et 5 variable à ajouté 
$j=0;
$liste=array("Calorie", "Proteine", "Sel", "Glucide", "Omega3");
$ListsMoyenneAsso=array(2500, 5, 14, 36, 2);
    for($k=0;$k<$nbVar;$k++){
        
    for($i=0;$i<100;$i++){
            if($i%3 == 0){
                $j++;
            } 
            echo $j;
            $BD->query("INSERT INTO statistique VALUES (1, ".(($i%3)+1).", '".$liste[$k]."', ".rand($ListsMoyenneAsso[$k]*0.5 ,$ListsMoyenneAsso[$k]*1.5).", ".$moment."(NOW(), INTERVAL ".$j." DAY), 1)");
            
        }
    }
    echo "Set crée";
}
function setJour($BD,$nbVar, $moment){
    if($moment=="F"){
        $moment='DATEADD';
    } else {
        $moment='SUBDATE';
    }
    
    //$nbVar est entre 1 et 5 variable à ajouté 
$j=0;
$liste=array("Calorie", "Proteine", "Sel", "Glucide", "Omega3");
$ListsMoyenneAsso=array(2500, 5, 14, 36, 2);
    for($k=0;$k<$nbVar;$k++){
        
    for($i=0;$i<15;$i++){
            $BD->query("INSERT INTO statistique VALUES (2, null, '".$liste[$k]."', ".rand($ListsMoyenneAsso[$k]*0.9 ,$ListsMoyenneAsso[$k]*1.1).", ".$moment."(NOW(), INTERVAL ".$i." DAY), 1)");
            
        }
    }
    
    echo "Set crée";
}
setJour($BD, 1, 'P');
?>
