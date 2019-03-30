<?php
session_start();

// Variable :

$test=false;
if(isset($_SESSION['profil'])){
    $Profil=$_SESSION['profil'];
} else {
    $Profil=array('ID'=>1, 'prenom'=>'Paul', 'mail'=>'Paul@jeMangeTrop.com', 'poids'=>120, 'taille'=>170, 'user'=>'GrosPaul','genre'=>'M', 'mdp'=>'CestPasDeMaFaute', 'photo'=>'NoPic', 'actualisation'=>'20-03-2019','point'=>0);
}

    
// Permet de crée un set de donnée a etudier !    

if($test==true){
    include("../../Outil/Php/CreationSet.php");
    setJour($BD, 2, null);
    }else{
    
include('../../Outil/Php/AccesBD.php');
$BD=getBD();
}

    // Partie statistique : ici moindres carrées de l'évolution de la masse graisseuse
    
    $req = $BD->query("SELECT COUNT(DISTINCT Date) AS 'i'
    FROM  statistique 
    where Nom='Calorie' 
    AND ID_Profil=".$Profil["ID"]." 
    AND type=2 
    AND DATEDIFF(DATE(NOW()), date)<10"); 
    $i=$req->fetch();
    if($i['i']<7){
        $req->closeCursor();
        echo "Vous n'avez pas effectuer assez de jours de menue pour avoir une réel prevision de votre poids !";
    } else {
        $req->closeCursor();
        // revoir la regression linéaire
        $req =$BD->query("SELECT AVG(TauxCumule*DATEDIFF(date,DATE(NOW()))) AS 'XY-', AVG(DATEDIFF(date, DATE(NOW()))) AS 'X-',AVG(DATEDIFF(date,DATE(NOW()))*DATEDIFF(date, DATE(NOW()))) AS 'X2-', AVG(TauxCumule) AS 'Y-', STD(DATEDIFF(date,DATE(NOW()))) AS 'SigX',STD(TauxCumule) AS 'SigY'  
        FROM  statistique where Nom='Calorie' 
        AND ID_Profil=".$Profil['ID'] ."
        AND type=2 
        AND DATEDIFF(date, DATE(NOW())) BETWEEN -10 AND 0"); 
        $Regre=$req->fetch();
        
        $covXY=  $Regre['XY-']-$Regre['X-']*$Regre['Y-'];
        $m= $covXY/($Regre['X2-']-pow($Regre['X-'],2));// probleme ici !
        $b= $Regre['Y-']-($m*$Regre['X-'] );
        $coeff= $covXY/(pow($Regre['SigY'],2)*pow($Regre['SigX'],2));
        
        echo "<br/>a=".($m/6)."<br/>b=".(($b-2500)/6)."<br/>coeff r²= ".pow($coeff,2);
        if($m<0){
            echo 'Vous etes en voie pour perdre du poids !';
        } else {
            
        }
    }
    
    // Si son coeff de corealation est trop faible nous pouvons dire que la personne a une alimentation non reguliere et donc qui peut etre mauvaise pour son corps
    
    ?>
