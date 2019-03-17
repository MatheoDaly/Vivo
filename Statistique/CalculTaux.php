<?php


## J'ai fini la dynamique du tableau !
// Cela me sert seulement pour teste ma fonction en js
// je veux un format retour tel que echo json_ecode(array(array("Ma concentration", array(Valeur1, Valeur2, Valeur3, etc))))
// Retourne moi bien le meme nombre de donnees pour chaque types !
include('../Outil/Php/AccesBd.php');
$BD = getBD();


if(isset($_POST['type']) & $_POST['type'] == 1){
    $req = $BD->query("SELECT DATE( NOW() ),Nom,NumRepas,sum(TauxCumule) from statistique where ID_Profil=".$_POST['id']." AND type=".$_POST['type']." GROUP by NumRepas,Nom ORDER by Nom, NumRepas");

    $taux=array();
    $valeur=array();
    $molecule=array();
    while ($ligne= $req->fetch()){
        array_push($valeur, $ligne['sum(TauxCumule)']);
        if($ligne['NumRepas']==3){
            array_push($molecule, $ligne['Nom']);
            array_push($molecule, $valeur);
            array_push($taux, $molecule);
            $valeur=array();
            $molecule=array();
        }
    }
    echo json_encode($taux);
    }
else if(isset($_POST['type']) & $_POST['type'] == 2) {
    $time="day";
    $diff="-8";
    //echo json_encode(array(array("Calorie", array(1, 2, 3, 4, 5, 6, 7))));
} 
else if(isset($_POST['type']) & $_POST['type'] == 3) {
    $time="WEEKS";
    $diff="-5";
    //echo json_encode(array(array("Calorie", array(1, 2, 3, 4, 5, 6)),array("Glucide", array(2, 0, 5, 8, 6, 2))));
} 
else if(isset($_POST['type']) & $_POST['type'] == 4) {
    $time="MONTH";
    $diff="-6";
    //echo json_encode(array(array("Calorie", array(1, 2, 3, 4, 5, 6))));
} else if(isset($_POST['type']) & $_POST['type'] == 5) {
    $time="years";
    $diff="-5";
    //echo json_encode(array(array("Calorie", array(1, 2, 3))));
} 

$req = $BD->query("SELECT date,Nom,TauxCumule from statistique where ID_Profil=".$_POST['id']." AND type=".$_POST['type']." and TIMESTAMPDIFF(".$time.",CURRENT_TIMESTAMP,date)>".$diff." and TIMESTAMPDIFF(".$time.",CURRENT_TIMESTAMP,date)<0 ORDER by Nom,date");
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
    echo json_encode($taux);

$rep->closeCursor();
?>
