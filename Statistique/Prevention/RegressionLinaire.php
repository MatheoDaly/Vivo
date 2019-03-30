<?php
include('../../Outil/Php/AccesBD.php');
session_start();

// Variable :

$test=false;
if(isset($_SESSION['profil'])){
    $Profil=$_SESSION['profil'];
} else {
    $Profil=array('ID'=>1, 'prenom'=>'Paul', 'mail'=>'Paul@jeMangeTrop.com', 'poids'=>120, 'taille'=>170, 'user'=>'GrosPaul','genre'=>'M', 'mdp'=>'CestPasDeMaFaute', 'photo'=>'NoPic', 'actualisation'=>'20-03-2019','point'=>0);
}
$BD=getBD();

    
// Permet de crée un set de donnée a etudier !    

if($test==true){
            $j=0;
        for($i=0;$i<100;$i++){
            if($i%3 == 0){
                $j++;
            } 
            echo $j;
            $BD->query("INSERT INTO statistique VALUES (1, ".(($i%3)+1).", 'Calorie', ".rand(2000,3000).", SUBDATE(NOW(), INTERVAL ".$j." DAY), 1)");
            
        }
    }

    // Partie statistique : ici moindres carrées de l'évolution de la masse graisseuse
    
    $req = $BD->query("SELECT COUNT(DISTINCT Date) AS 'i'
    FROM  statistique 
    where Nom='Calorie' 
    AND ID_Profil=".$Profil["ID"]." 
    AND type=1 
    AND DATEDIFF(DATE(NOW()), date)<15"); 
    $i=$req->fetch();
    if($i['i']<13){
        $req->closeCursor();
        echo "Vous n'avez pas effectuer assez de jours de menue pour avoir une réel prevision de votre poids !";
    } else {
        $req->closeCursor();
        // revoir la regression linéaire
        $req =$BD->query("SELECT AVG(TauxCumule*DATEDIFF(DATE(NOW()), date)) AS 'XY-', AVG(DATEDIFF(date, DATE(NOW()))) AS 'X-',AVG(DATEDIFF(date, DATE(NOW()))*DATEDIFF(date, DATE(NOW()))) AS 'X2-', AVG(TauxCumule) AS 'Y-', STD(DATEDIFF(DATE(NOW()), date)) AS 'SigX',STD(TauxCumule) AS 'SigY'  
        FROM  statistique where Nom='Calorie' 
        AND ID_Profil=".$Profil['ID'] ." 
        AND type=1 
        AND DATEDIFF(DATE(NOW()), date)<15"); 
        $Regre=$req->fetch();
        $covXY=  $Regre['XY-']-$Regre['X-']*$Regre['Y-'];
        $m= $covXY/($Regre['X2-']-pow($Regre['X-'],2));
        $b= $Regre['Y-']-$m*$Regre['X-'];
        $coeff= $covXY/($Regre['SigY']*$Regre['SigX']);
        echo $m." ".$b." ".pow($coeff, 2);
        
    }
    
    // Si son coeff de corealation est trop faible nous pouvons dire que la personne a une alimentation non reguliere et donc qui peut etre mauvaise pour son corps
    
    ?>
