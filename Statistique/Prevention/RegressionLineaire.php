<?php



include("../../Outil/IsTest.php");
// Variable :

$testStats=false;


    
// Permet de crée un set de donnée a etudier !    

if($testStats){
    include("../../Outil/Php/CreationSet.php");
    setJour($BD, 1, 'P'); //include('../../Actualisation/Actualisation.php');
    }else{
    
include('../../Outil/Php/AccesBD.php');
$BD=getBD();
}

    // Partie statistique : ici moindres carrées de l'évolution de la masse graisseuse
    $q = "SELECT COUNT(DISTINCT Date) AS 'i'
    FROM  statistique 
    INNER JOIN concentration ON concentration.id = statistique.id_Concentration 
    where concentration.Nom='Calorie'  
    AND ID_Profil=".$Profil["ID"]." 
    AND type=2 
    AND DATEDIFF(DATE(NOW()), date)<10";
    //echo $q;
    $req = $BD->query($q);
    $i=$req->fetch();
    if($i['i']<7){
        $req->closeCursor();
        echo "No Check";
    } else {
        $req->closeCursor();
        // revoir la regression linéaire
        $q = "SELECT AVG(TauxCumule*DATEDIFF(date,DATE(NOW()))) AS 'XY-', AVG(DATEDIFF(date, DATE(NOW()))) AS 'X-',AVG(DATEDIFF(date,DATE(NOW()))*DATEDIFF(date, DATE(NOW()))) AS 'X2-', AVG(TauxCumule) AS 'Y-', STD(DATEDIFF(date,DATE(NOW()))) AS 'SigX',STD(TauxCumule) AS 'SigY'  
        FROM  statistique
        INNER JOIN concentration ON concentration.id = statistique.id_Concentration 
        where concentration.Nom='Calorie' 
        AND ID_Profil=".$Profil['ID']."
        AND type=2 
        AND DATEDIFF(date, DATE(NOW())) BETWEEN -10 AND 0";
        //echo $q;
        $req =$BD->query($q); 
        
        while($Regre=$req->fetch()){
            
        $covXY=  $Regre['XY-']-$Regre['X-']*$Regre['Y-'];
        $m= $covXY/($Regre['X2-']-pow($Regre['X-'],2));// probleme ici !
        $b= $Regre['Y-']-($m*$Regre['X-'] );
        $coeff= $covXY/(pow($Regre['SigY'],2)*pow($Regre['SigX'],2));
        
        $m/=9;
        $b=($b-2500)/9;
            
        echo json_encode(array($m, $b,pow($coeff,2)));
        }
    }
    
    // Si son coeff de corealation est trop faible nous pouvons dire que la personne a une alimentation non reguliere et donc qui peut etre mauvaise pour son corps
    
    ?>
