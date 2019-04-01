<?php
session_start();

if(isset($_SESSION['profil'])){
    include("../Actualisation/Actualisation.php");
    $Profil=$_SESSION['profil'];
} else {
    $Profil=array('ID'=>1, 'prenom'=>'Paul', 'mail'=>'Paul@jeMangeTrop.com', 'poids'=>120, 'taille'=>170, 'user'=>'GrosPaul','genre'=>'M', 'mdp'=>'CestPasDeMaFaute', 'photo'=>'NoPic', 'actualisation'=>'20-03-2019','point'=>0);
}

include("../Outil/php/AccesBD.php");
$BD=getBD();

if(isset($_POST['change']) && $_POST['change']=='yes'){
 include("ModificationProfil/IntegrationPhoto.php");
}
####################################################################################################################################
############################################# Attention Session -> Array = $Profil !################################################
?>

<!Doctype HTML>
<html>

<head>
    <meta charset="utf-8">
    <link href="../Outil/bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="Profil.css" rel="stylesheet">
    <title><?php echo $Profil["prenom"]; ?></title>


</head>


<body>
    <!-- ################NavBar############### !-->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="../index.html">Vivo</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.html">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="../Profil/Profil.php">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Statistique/Statistique.php">Statistique</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Inscription/inscription.html">Inscription</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Inscription/inscription.html">Deconnexion</a>
                    </li>

                </ul>
                <span class="navbar-text">
                    Pour une bonne santé vivez VIVO !
                </span>
            </div>
        </nav>
    </header>

    <!-- ################ Entete Photo ############### !-->

    <div class="container justify-content-center rounded" id="TableProfil">
        <div class="row">
            <div id="avatar" class="col-sm-10" style="display:block; margin:auto;">
                <img class="independant w-20 rounded-circle" src="../Image/PhotoProfil/<?php if ($Profil['photo']=='NoPic'){echo 'avatar.png';} else  {echo $Profil['photo'];}?>" alt="<?php if ($Profil['photo']=='NoPic'){echo $Profil["prenom"];} ?>">
            </div>
        </div>

        <!-- ################ Modification profil ############### !-->
        <?php 
        if(isset($_SESSION['profil'])){
        ?>
        <div id="ModificationProfil">
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#ZoneModif" aria-expanded="false" aria-controls="ZoneModif">
                Modifiez mon profil
            </button>
            <div id="ZoneModif" class="collapse">
                <div class="card card-body">
                    <form method="post" id="TelePhoto" action="Profil.php" enctype="multipart/form-data">
                        <label for="photo">
                            <strong>
                                Télécharger une nouvelle photo de profil :
                            </strong>
                        </label>
                        <input type="file" name="photo">
                        <input type="hidden" name="change" value="yes">
                        <input type="submit">
                    </form>
                    <form id="VariableProfil">
                        <div class="row">
                            <div class="col-6 d-flex flex-column">
                                Pseudo :
                                <input type="text" name="pseudo" value="<?php echo $Profil["user"]; ?>">
                                Prenom :
                                <input type="text" name="prenom" value="<?php echo $Profil["prenom"]; ?>">
                            </div>
                            <div class="col-6 d-flex flex-column">
                                Poids :
                                <input type="number" name="poids" value="<?php echo $Profil["poids"]; ?>">
                                Taille :
                                <input type="number" name="taille" value="<?php echo $Profil["taille"]; ?>">
                            </div>
                            <input type="button" class="submit" value="Validez">
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <?php } ?>

        <!-- ################ Bandeau presentation ############### !-->

        <div class="d-flex flex-fill border border-secondary bg-white justify-content-between rounded" id="intro">
            <div class="row">
                <div class="col-12 col-sm-5">
                    <?php 
                    // refaire le vrai calculde l'IMC
                    echo "C'est moi, ".$Profil['prenom']." !</br> Mes mesures : ".$Profil["taille"].' cm, et '.$Profil["poids"]." kg ! </br>J'ai un IMC de : ".($Profil["poids"]/(($Profil["taille"]/100)^2))." </br>  Je possede : ".$Profil["point"]." points";
                    
                    
                    ?>
                </div>
                <div id='logo' class="col-12 col-sm-4">

                    <?php
                    $req=$BD->query("SELECT  regime.Nom AS 'Nom', regime.urlRegime AS 'url' 
                                    FROM regime
                                    INNER JOIN regime_profil ON regime_profil.id_Regime= regime.id
                                    WHERE regime_profil.id_Profil =".$Profil['ID']);
                            while($ligne = $req->fetch()){?>

                    <img src="../Image/Regime/<?php echo $ligne['url']; ?>" alt="<?php echo $ligne['Nom']; ?>">

                    <?php } $req->closeCursor(); ?>
                </div>
                <div class="col-12 col-sm-3 d-flex flex-column">
                    <div>
                        <strong>Objectifs :</strong>
                        <ul> <?php
                            $req=$BD->query("SELECT objectif.type AS 'Type', objectif_profil.valeur_type AS 'Valeur' 
                                            FROM objectif_profil
                                            INNER JOIN objectif ON objectif.id=objectif_profil.id_Objectif
                                            WHERE objectif_profil.id_Profil=".$Profil['ID']);
                            while($ligne = $req->fetch()){
                                echo '<li>'.$ligne['Type'].' '.$ligne['Valeur'].'</li>';
                            }
                            $req->closeCursor();
                            ?>
                        </ul>
                    </div>
                    <div class=" col-12">
                        <?php
                                $objectif_poids=$BD->query("SELECT objectif_profil.valeur_type
                                            FROM objectif_profil
                                            INNER JOIN objectif ON objectif.id=objectif_profil.id_Objectif
                                            WHERE objectif_profil.id_Profil=".$Profil['ID']);
                                $objectif_poids = $objectif_poids ->fetch();
                                $objectif_poids= $objectif_poids[0];
                                if($Profil['poids'] > $objectif_poids && $Profil['genre'] == 'M'){
                                    echo '<img class=" w-50" name="ordi" src="../Image/diet-3556961_640.jpg" alt="mac">';
                                    echo '<h3>Perte de poids</h3>';
                                }else if($Profil['poids'] > $objectif_poids && $Profil['genre'] == 'F'){
                                    echo '<img class=" w-50" name="ordi" src="../Image/diet-3117938_640.jpg" alt="mac">';
                                    echo '<h3>Perte de poids</h3>';
                                }else if ($Profil['poids'] < $objectif_poids){
                                    echo '<img class=" w-50" name="ordi" src="../Image/dumbbell-3160788_640.png" alt="mac">';
                                    echo '<h3>Prise de poids</h3>';
                                }
                            ?>
                    </div>
                    <div class="row">
                        <?php 
                            // ici on introduit le concepte de point !
                            ?>

                    </div>

                </div>
            </div>
        </div>

        <!--  Intermediare !-->
        <div>
            <input type="button" class="btn btn-primary" name="BtnStat" value="Consultation de mes statistiques">
        </div>s
    </div>
    <!-- menu  personnaliser des profil !-->

    <div>
        <img class="independant rounded-circle" src="../Image/food-304597_640.png" style="width: 100px;" />
    </div>

    <!-- Programation des menu !-->
    <div id="ProgMenu" class=" rounded row d-flex justify-content-between">
        <div class=" col-10 col-lg-6 bg-dark rounded" style="margin: 50px; padding-top: 25px; padding-bottom: 25px;">
            <h1 class="text-light text-center border border-warning">Menu</h1>
            <div class="col-10 bg-light mx-auto">
                <!-- Automatiser la gestion du tableau!-->
                <?php 
                    /* j'execute ma requete, je recupere le nombre de ligne pour ferme le tableau
                    Je ferme et ouvre ma ligne toute les deux cellule -> $i%2 == 0
                    je ferme la div si entre est true !
                    
                    
                    Adapter le fais que des menu pour aujourd'hui ne sont pas obliger
                    */
                    
                    $entre=false;
                    $req = $BD->query("SELECT Date, COUNT(DISTINCT Repas) AS 'NbRepas', DATEDIFF(Date, NOW()) AS 'DiffDate' from historique_aliment where Date>=NOW() AND ID_Profil=".$Profil['ID']." GROUP BY Date"); // pour savoir quel jour il faut seulement obtenir la différente entre NOW et date
                    $i=0; // moduler le $i pour adapter le moment des menus
                    while($ligne = $req->fetch()){ 
                        if($i==0){ $entre=true; ?>
                <div class="row">
                    <?php } else if ($i%2==0){ ?>
                </div>
                <div class="row">
                    <?php } ?>
                    <div class="col-12 col-lg-6">
                        <h3 class="text-center" style="text-decoration:underline;">
                            <?php 
                        $req2 = $BD->query("SELECT DISTINCT Repas from historique_aliment where ID_Profil=".$Profil['ID']." AND Date='".$ligne['Date']."'");
                            ?>
                        </h3>
                        <div class="row">
                            <?php while($ligne2= $req2->fetch()){ ?>
                            <div class="col-12 col-lg-6">
                                <h4 class="text-center" style="text-decoration:underline;">
                                    <?php switch($ligne2['Repas']){
                                            case 9: echo 'Matin'; break;
                                            case 13: echo "Midi"; break;
                                            case 19: echo "Soir"; break;
                                            default: echo "Repas de ".$ligne2['Repas']." heures"; break;} 
                                        ?>
                                </h4>
                                <ul class="liste">
                                    <?php
                                    
                                    $req1=$BD->query("SELECT aliments.alim_nom_fr AS 'Nom', quantite 
                                        FROM historique_aliment
                                        INNER JOIN aliments ON aliments.alim_code = ID_ingredient
                                        WHERE Repas=".($ligne2['Repas'])."
                                        AND Date='".$ligne["Date"]."'
                                        AND ID_Profil=".$Profil['ID']); // requete archi lourd -> integre le nom à la table historique_aliment ?
                                    while($ligne1 = $req1->fetch()){
                                        echo "<li>".$ligne1["Nom"]." :".$ligne1["quantite"]." grammes</li>";
                                    }
                                    $req1->closeCursor();
                                    ?>
                                </ul>
                            </div>
                            <?php } $req2->closeCursor(); ?>
                        </div>
                    </div>
                    <?php
                        $i++;
                        }
                    $req->closeCursor();
                    if ($entre){
                        ?> </div>
                <?php           
                    } else {
                        echo "Vous n'avez aucun menu c'est dommage ! </br> Allez vite vous en faire un, via :<a href='#'> Menue</a>";
                    }
                    ?>

            </div>

        </div>
        <?php if($entre){ ?>
        <div class="col-10 col-lg-4 bg-light" style="margin: 25px;">
            <h3 class="text-center">Liste de courses</h3>
            <ul>
                <?php 
                $req = $BD->query("SELECT aliments.alim_nom_fr AS 'Nom', SUM(quantite) AS 'Quant'
                                        FROM historique_aliment
                                        INNER JOIN aliments ON aliments.alim_code = ID_ingredient
                                        WHERE Date >= NOW() AND
                                        ID_Profil = ".$Profil['ID']." GROUP BY Nom
                                        ");
                while($ligne = $req->fetch()){
                    echo "<li>".$ligne["Nom"]." :".$ligne["Quant"]."</li>";
                }
                $req->closeCursor();
                ?>
            </ul>
        </div>
        <?php } ?>
    </div>




    <script src="../Outil/JS/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script src="ModificationProfil/ModificationProfil.js" type="text/javascript"></script>
    <script src="../Outil/bootstrap-4.3.1-dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="MenueProfil/ProfilMenue.js" type="text/javascript"></script>
</body>

</html>
