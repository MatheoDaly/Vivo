<?php
session_start();
$test=false;
if($test){
$_SESSION['Rec_Plat']=array(array("id"=>1,"nom"=>"Chips","nb", "nbAli"=>2, "calorie"=>2000));
}


if(isset($_SESSION['Rec_Plat'])){
echo json_encode(graph("kcal", $_SESSION['Rec_Plat'])); 
}

//-------------Fonction qui prends type 


function graph($type, $list){
$stats = array();
$nom = array();

    for($i=0; $i<sizeof($list); $i++){
     array_push($nom, $list[$i]["nom"]);
     array_push($stats, $list[$i][$type]*$list[$i]["nbAl"]);
    }
    
    return $graph=array('calorie',$nom, $stats);
    
}


?>
