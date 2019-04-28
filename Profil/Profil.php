<?php

$testStats=false;
$Visiteur=true;

include("../Outil/IsTest.php");


if($testStats==true){
        include("../Outil/Php/CreationSet.php");
        setHistorique($BD, 'F');
} else {   
include("../Outil/php/AccesBD.php");
$BD=getBD();
}

if ($testGene || isset($_SESSION['profil']))  include("../Actualisation/Actualisation.php");

if(isset($_POST['change']) && $_POST['change']=='yes'){
 include("ModificationProfil/IntegrationPhoto.php");
}
####################################################################################################################################
############################################# Attention Session -> Array = $Profil !################################################
####################################################################################################################################
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
        <a class="navbar-brand" href="index.php">Vivo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
               <li class="nav-item">
                    <a class="nav-link" href="../index.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Article/Article.php">Nos articles</a>
                </li>
                <?php if(isset($_SESSION['profil']) && !$testGene){ ?>
                <li class="nav-item active">
                    <a class="nav-link active" href="../Profil/Profil.php">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Statistique/Statistique.php">Statistique</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="disconnect" href="../Deconnexion.php">Deconnexion</a>
                </li>
                <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link" href="../Inscription/inscription.php">Inscription</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Connection/connexion.php">Connexion</a>
                </li>
                <?php } ?>
                

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
            <div id="avatar" class="col-3" style="display:block; margin:auto;">
                <img class="independant img-responsive w-100 rounded-circle" src="../Image/PhotoProfil/<?php if ($Profil['photo']=='NoPic'){echo 'avatar.png';} else  {echo $Profil['photo'];}?>" alt="<?php if ($Profil['photo']=='NoPic'){echo $Profil["prenom"];} ?>">

            </div>
        </div>

        <!-- ################ Modification profil ############### !-->
        <?php 
        if(isset($_SESSION['profil']) || ($testGene)){
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
                        <input type="file" class="btn btn-dark" name="photo">
                        <input type="hidden" name="change" value="yes">
                        <input class="btn btn-primary" type="submit">
                    </form>
                    <hr>
                    <form id="VariableProfil">
                        <div class="row">
                            <div class="p-1 col-6 d-flex flex-column">
                                Pseudo :
                                <input type="text" name="pseudo" value="<?php echo $Profil["user"]; ?>">
                                Prenom :
                                <input type="text" name="prenom" value="<?php echo $Profil["prenom"]; ?>">
                            </div>
                            <div class="p-1 col-6 d-flex flex-column">
                                Poids :
                                <input type="number" name="poids" value="<?php echo $Profil["poids"]; ?>">
                                Taille :
                                <input type="number" name="taille" value="<?php echo $Profil["taille"]; ?>">
                            </div>
                            <div class="p-1 col-6 d-flex flex-column">
                                Niveau Sportif : (1, 2, 3)
                                <input type="number" name="lvlSport" value="<?php echo $Profil["poids"]; ?>">
                            </div>
                            <div class="p-1 col-6 d-flex flex-column">
                                Objectif poids :
                                <input type="number" name="Objectif" value="">
                            </div>
                            <input type="button" class="submit btn btn-primary col-12" value="Validez">
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
                    echo "C'est moi, ".$Profil['prenom']." !</br> Mes mesures : ".$Profil["taille"].' cm, et '.$Profil["poids"]." kg ! </br>J'ai un IMC de : ".($Profil["poids"]/(($Profil["taille"]/100)^2));
                    
                    
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

                </div>
            </div>
        </div>
        <form action="../Gout/gout.php">
            <button class="btn btn-primary">Accéder à mes préférences</button>
        </form>

        <!--  Intermediare !-->
        <?php if(isset($_SESSION['profil']) || ($testGene)){ ?>
        <div class="col-12">
            <button class="col-6 btn btn-primary">
                <a class="text-white" href="../Statistique/Statistique.php">
                    Vue sur ma consommation
                </a>
            </button>
            <button class="col-5 btn btn-primary">
                <a class="text-white" href="../RechercheAliment/Choix_Menu.php">
                    Crée son menu ?
                </a>
            </button>
        </div>
        <?php } ?>
    </div>
    <!-- menu  personnaliser des profil !-->

    <div>
        <img class="independant rounded-circle" src="../Image/food-304597_640.png" style="width: 100px;" />
    </div>

    <!-- Programation des menu !-->
    <div id="ProgMenu" class=" rounded row d-flex justify-content-between">
        <div class=" col-10 col-lg-6 bg-dark rounded text-center" style="margin: 50px; padding-top: 25px; padding-bottom: 25px;">
            <h1 class="text-light text-center border border-primary">Menu</h1>
            <img src="../Image/Icon/icons8-calendrier-64.png"/>
            <div style="height: 500px; overflow-y: scroll;">
            <div class="col-10 bg-light mx-auto rounded ">
                <!-- Automatiser la gestion du tableau!-->
                <?php 
                    /* j'execute ma requete, je recupere le nombre de ligne pour ferme le tableau
                    Je ferme et ouvre ma ligne toute les deux cellule -> $i%2 == 0
                    je ferme la div si entre est true !
                    
                    
                    Adapter le fais que des menu pour aujourd'hui ne sont pas obliger
                    */
                    
                    $entre=false;
                    $req = $BD->query("SELECT Date, COUNT(DISTINCT Repas) AS 'NbRepas', DATEDIFF(Date, NOW()) AS 'DiffDate' from historique_aliment where Date>=NOW() AND ID_Profil=".$Profil['ID']." GROUP BY Date LIMIT 3"); // pour savoir quel jour il faut seulement obtenir la différente entre NOW et date
                    $i=0; // moduler le $i pour adapter le moment des menus
                    while($ligne = $req->fetch()){ 
                        if($i==0){ $entre=true; ?>
                <div class="row">
                    <?php } else if ($i%2==0){ ?>
                </div>
                <div class="row">
                    <?php } ?>
                    <div class="col-12 col-lg-6">
                       <div class="p-2 m-2 rounded text-light" style="background-image: linear-gradient(to bottom right, cyan, blue);">
                        <h3 class="text-center">
                            <?php echo $ligne['Date']; ?>

                            <?php $req2 = $BD->query("SELECT DISTINCT Repas from historique_aliment where ID_Profil=".$Profil['ID']." AND Date='".$ligne['Date']."' ORDER BY Repas");?>

                        </h3>
                        </div>
                        <div class="row">
                            <?php while($ligne2= $req2->fetch()){ ?>
                            <div class="col-12 col-lg-6">
                               <div class="border border-primary rounded">
                                <h4 class="text-center">
                                    <?php switch($ligne2['Repas']){
                                            case 9: echo 'Matin'; break;
                                            case 13: echo "Midi"; break;
                                            case 19: echo "Soir"; break;
                                            default: echo "Repas de ".$ligne2['Repas']." heures"; break;} 
                                        ?>
                                </h4>
                                </div>
                                <ul class="liste" style="list-style-image: url('../Image/Icon/icons8-repas-48.png')">
                                    <?php
                                    
                                    $req1=$BD->query("SELECT aliments.alim_nom_fr AS 'Nom', quantite 
                                        FROM historique_aliment
                                        INNER JOIN aliments ON aliments.alim_code = ID_ingredient
                                        WHERE Repas=".($ligne2['Repas'])."
                                        AND Date='".$ligne["Date"]."'
                                        AND ID_Profil=".$Profil['ID']); // requete archi lourd -> integre le nom à la table historique_aliment ?
                                    while($ligne1 = $req1->fetch()){
                                        echo "<li>".$ligne1["Nom"]." : ".$ligne1["quantite"]." x100 grammes</li>";
                                    }
                                    $req1->closeCursor();
                                    ?>
                                </ul>
                            </div>
                            <?php } $req2->closeCursor(); ?>
                        </div>
                    </div>
                    <?php $i++;}    $req->closeCursor(); if ($entre){ ?>
                </div>
                <?php  } else {
                        echo "Vous n'avez aucun menu c'est dommage ! </br> Allez vite vous en faire un, via :<a href='../RechercheAliment/Choix_Menu.php'> Menue</a>";
                    } ?>
                <a href='../RechercheAliment/Choix_Menu.php'></a>

            </div>
        </div>

        </div>
        <?php if($entre){ ?>
        <div class="col-10 col-lg-4 bg-light  rounded" style="margin: 50px; height: 700px; overflow-y: scroll;">
          <div class="text-center">
           <img src="../Image/Icon/icons8-liste-64.png"/>
            </div>
            <h3 class="text-center">Liste de courses</h3>
            <ul style="list-style-image: url('../Image/Icon/icons8-pomme-48.png')">
                <?php 
                $req = $BD->query("SELECT aliments.alim_nom_fr AS 'Nom', SUM(quantite) AS 'Quant'
                                        FROM historique_aliment
                                        INNER JOIN aliments ON aliments.alim_code = ID_ingredient
                                        WHERE Date >= NOW() AND
                                        ID_Profil = ".$Profil['ID']." GROUP BY Nom
                                        ");
                while($ligne = $req->fetch()){
                    echo "<li class = 'm-1'>".$ligne["Nom"]." :".$ligne["Quant"]." x100 grammes</li>";
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
