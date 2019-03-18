<?php
session_start();
if(isset($_SESSION["profil"])){
$id=$_SESSION["profil"]['ID'];
include("../Actualisation/Actualisation.php");
} else {
$id=1;
}
include("../Outil/php/AccesBD.php");
$BD=getBD();
//https://github.com/STAT545-UBC/Discussion/issues/387 ->resoudre pb git !
?>

<!Doctype HTML>
<html>

<head>
    <meta charset="utf-8">
    <link href="../Outil/bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="Profil.css" rel="stylesheet">
    <title>Profil</title>

</head>

<body>


    <div class="d-flex flex-column justify-content-center" id="TableProfil">
        <div class="row justify-content-center">
            <div class="col-sm-10" style="width: 100px;">
                <img class="independant" src="../Image/avatar-1295406_640.png" alt="profil">
            </div>
        </div>



        <!-- introduction !-->

        <div class="d-flex flex-fill bg-white justify-content-between" id="intro">
            <div class="row">
                <div class="col-12 col-sm-5">Profil : didier de la compté des pres jolie
                    <br> il a 29 ans et il est pas très beau... desolé didier
                </div>
                <div class="col-12 col-sm-4">Ajout de logo
                </div>
                <div class="col-12 col-sm-3 d-flex flex-column">
                    <div>
                        <strong>Objectif perdre 50 kg
                        </strong>
                    </div>
                    <div class="row">
                        <div class=" col-xs-12 ">
                            <img class=" w-50" name="ordi" src="../Image/mac-1784459_640.png" alt="mac">
                        </div>
                    </div>
                    <div class="row">
                        <h3 class="col-md-6">
                            Ordi
                        </h3>
                    </div>

                </div>
            </div>
        </div>

        <!--  Intermediare !-->
        <div>
            <input type="button" class="btn btn-primary" value="Consultation des mes statistique">
        </div>
        <hr>
        <!-- menue  personnaliser des profil !-->

        <div class="independant">
            <img class="independant" src="../Image/food-304597_640.png" style="width: 100px;" />
        </div>

        <!-- Programation des menue !-->
        <div id="ProgMenu" class=" row d-flex justify-content-between">
            <div class=" col-10 col-lg-6 bg-dark rounded" style="margin: 50px; padding-top: 25px; padding-bottom: 25px;">
                <h1 class="text-light text-center border border-warning">Menu</h1>
                <div class="col-10 bg-light mx-auto">
                    <!-- Automatiser la gestion du tableau!-->
                    <?php 
                    /* j'execute ma requete, je recupere le nombre de ligne pour ferme le tableau
                    Je ferme et ouvre ma ligne toute les deux cellule -> $i%2 == 0
                    je ferme la div si entre est true !
                    
                    
                    Adapter le fais que des menue pour aujourd'hui ne sont pas obliger
                    */
                    
                    $entre=false;
                    $req = $BD->query("SELECT Date, COUNT(DISTINCT Repas) AS 'NbRepas', DATEDIFF(Date, NOW()) AS 'DiffDate' from historique_aliment where Date>=NOW() AND ID_Profil=".$id." GROUP BY Date"); // pour savoir quel jour il faut seulement obtenir la différente entre NOW et date
                    $i=0; // moduler le $i pour adapter le moment des menues
                    while($ligne = $req->fetch()){ 
                        if($i==0){ $entre=true; ?>
                    <div class="row">
                        <?php } else if ($i%2==0){ ?>
                    </div>
                    <div class="row">
                        <?php } ?>
                        <div class="col-12 col-lg-6">
                            <h3 class="text-center" style="text-decoration:underline;">
                                <?php switch($ligne["DiffDate"]){
                            case 0: echo "Aujourd'hui"; break;
                            case 1: echo "Demain"; break;
                            default: echo "Dans ".$ligne["DiffDate"]." jours"; break;} ?>
                            </h3>
                            <div class="row">
                                <?php for($j=0; $j<$ligne["NbRepas"]; $j++){ ?>
                                <div class="col-12 col-lg-6">
                                    <h4 class="text-center" style="text-decoration:underline;">
                                        <?php switch($j){
                                            case 0: echo "Midi"; break;
                                            case 1: echo "Soir"; break;
                                            default: echo $i." e Repas"; break;} 
                                        ?>
                                    </h4>
                                    <ul class="liste">
                                        <?php
                                    
                                    $req1=$BD->query("SELECT aliments.alim_nom_fr AS 'Nom', quantite 
                                        FROM historique_aliment
                                        INNER JOIN aliments ON aliments.alim_code = ID_ingredient
                                        WHERE Repas=".($j+1)."
                                        AND Date='".$ligne["Date"]."'
                                        AND ID_Profil=".$id); // requete archi lourd -> integre le nom à la table historique_aliment ?
                                    while($ligne1 = $req1->fetch()){
                                        echo "<li>".$ligne1["Nom"]." :".$ligne1["quantite"]."</li>";
                                    }
                                    $req1->closeCursor();
                                    ?>
                                    </ul>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php
                        $i++;
                        }
                    $req->closeCursor();
                    if ($entre){
                        ?> </div>
                    <?php           
                    }
                    ?>

                </div>

            </div>

            <div class="col-10 col-lg-4 bg-light" style="margin: 25px;">
                <h3 class="text-center">Liste de courses</h3>
                <ul>
                    <?php 
                $req = $BD->query("SELECT aliments.alim_nom_fr AS 'Nom', SUM(quantite) AS 'Quant'
                                        FROM historique_aliment
                                        INNER JOIN aliments ON aliments.alim_code = ID_ingredient
                                        WHERE Date >= NOW() AND
                                        ID_Profil = ".$id." GROUP BY Nom
                                        ");
                while($ligne = $req->fetch()){
                    echo "<li>".$ligne["Nom"]." :".$ligne["Quant"]."</li>";
                }
                $req->closeCursor();
                ?>
                </ul>
            </div>
        </div>


    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <?php
    if(isset($_SESSION["profil"])){
        echo'<script>';
        include("ProfilMenue.js");
        echo'</script>';
    }
    ?>
</body>

</html>
