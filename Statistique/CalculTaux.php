<?php

session_start();
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



// ############################# Passage en fonction de calcul taux pour reutilisation dans d'autre fichier !

function CalculTaux ($id, $BD, $type){
    
    //Probleme avec semaine et années
    if($type == 1){
    // tu recupere l'id via la session ! // la fin a parti de group by et inutile car Actualisation t'as deaj prepare les données !
    $req = $BD->query("SELECT DATE( NOW() ),concentration.Nom,NumRepas,sum(TauxCumule) from statistique INNER JOIN concentration ON concentration.id=statistique.id_Concentration where ID_Profil=".$id." AND type=".$type." GROUP by NumRepas,Nom ORDER by Nom, NumRepas");

    $taux=array();
    $valeur=array();
    $molecule=array();
    while ($ligne= $req->fetch()){
        array_push($valeur, $ligne['sum(TauxCumule)']);
        if($ligne['NumRepas']==3){ // bizarre comme if ?
            array_push($molecule, $ligne['Nom']);
            array_push($molecule, $valeur);
            array_push($taux, $molecule);
            $valeur=array();
            $molecule=array();
        }
    }
    return $taux;
    }
else if($type == 2) {
    $time="day";
    $diff="-8";
    //echo json_encode(array(array("Calorie", array(1, 2, 3, 4, 5, 6, 7))));
} 
else if($type == 3) {
    $time="WEEKS";
    $diff="-5";
    //echo json_encode(array(array("Calorie", array(1, 2, 3, 4, 5, 6)),array("Glucide", array(2, 0, 5, 8, 6, 2))));
} 
else if($type == 4) {
    $time="MONTH";
    $diff="-6";
    //echo json_encode(array(array("Calorie", array(1, 2, 3, 4, 5, 6))));
} else if($type == 5) {
    $time="years";
    $diff="-5";
    //echo json_encode(array(array("Calorie", array(1, 2, 3))));
} 

if($type>1){
$req = $BD->query("SELECT date,concentration.Nom,TauxCumule from statistique INNER JOIN concentration ON concentration.id=statistique.id_Concentration where ID_Profil=".$id." AND type=".$type." and TIMESTAMPDIFF(".$time.",CURRENT_TIMESTAMP,date)>".$diff." and TIMESTAMPDIFF(".$time.",CURRENT_TIMESTAMP,date)<0 ORDER by Nom,date");
    $taux=array();
    $valeur=array();
    $molecule=array();
    $nom='';
    while ($ligne= $req->fetch()){
        array_push($valeur, $ligne['TauxCumule']);
        if($nom!=$ligne['Nom']){
            $nom=$ligne['Nom'];
            array_push($molecule, $ligne['Nom']);
            array_push($molecule, $valeur);
            array_push($taux, $molecule);
            $valeur=array();
            $molecule=array();
        }
    }
// Ici tu le fais afficher deux fois si je prend le premier en compte or les données que je recois son mauvais !
    return $taux;
$req->closeCursor();
}
}


if(isset($_SESSION['Rec_Plat'])){
echo json_encode(graph("calorie")); 
}

//-------------Fonction qui prends type 


function graph($type, $BD){
$stats = array();
$nom = array();

$q='';
    echo $q;
$req = $BD->query($q);
    
    while($ligne=$req->fetch()){
        
     array_push($nom, $_SESSION['Rec_Plat'][$i]["nom"]);
     array_push($stats, $_SESSION['Rec_Plat'][$i][$type]*$_SESSION['Rec_Plat'][$i]["nbAli"]);
    
    }
    
    return $graph=array('calorie',$nom, $stats);
    
}

?>
