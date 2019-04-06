<?php
session_start();
$test=true;
if($test){
$_SESSION['Rec_Plat']=array(array("id"=>1,"nom"=>"Chips","nb", "nbAli"=>2, "calorie"=>2000));
}


if(isset($_SESSION['Rec_Plat'])){
echo print_r(graph("calorie")); 
}

//-------------Fonction qui prends type 
function graph($type){
$stats = array();
$nom = array();
    for($i=0; $i<sizeof($_SESSION['Rec_Plat']); $i++){
     array_push($nom, $_SESSION['Rec_Plat'][$i]["nom"]);
     array_push($stats, $_SESSION['Rec_Plat'][$i][$type]*$_SESSION['Rec_Plat'][$i]["nbAli"]);
 }
    return $graph=array('calorie',$nom, $stats);
    
}
?>
