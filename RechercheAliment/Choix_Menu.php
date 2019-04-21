<?php
session_start();

include_once "../Outil/PHP/AccesBD.php";
include_once "Fonctions_alim.php";
?>

<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="Style_RechAl.css" type="text/css">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="../Outil/bootstrap-4.3.1-dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="Choix_Menu.js" type="text/javascript"></script>
</head>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <a class="navbar-brand" href="../index.html">Vivo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="../index.html">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Profil/Profil.php">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Statistique/Statistique.php">Statistique</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="../Inscription/inscription.html">Inscription</a>
                </li>
            </ul>
            <span class="navbar-text">
                Pour une bonne santé vivez VIVO !
            </span>
        </div>
    </nav>
</header>

<body>
    <h1 class="text-center">Nos menus au top !</h1>
    <div class="row text-center p-3 mx-auto">
        <?php
    $bd = getBD();
    $top5 = $bd->query("SELECT * FROM menu ORDER BY menu.Popularité LIMIT 5");
    $i = 1;
    while($ligne = $top5 ->fetch()){
        if($i == 1){
            echo '<div class="col-6 col-md-2 bg-primary text-light p-3  rounded">';
        }else if($i ==2){
            echo '<div class="col-6 col-md-2 bg-info text-light p-3 rounded">';
        }else if($i ==3){
            echo '<div class="col-6 col-md-2 bg-light p-3 rounded">';
        }else if($i ==4){
            echo '<div class="col-6 col-md-2 bg-secondary text-light p-3 rounded">';
        }else if($i ==5){
            echo '<div class="col-6 col-md-2 bg-dark text-light p-3 rounded">';
        }
        echo '#'.$i;
        echo('<form method="GET" action="Choix_Aliment.php">');
        echo('<div class="form-group"><label for ="nbMenu">'.$ligne['Nom'].'</label><input type="number" class="form-control" name="nbMenu" placeholder="Combien en voulez-vous ?"></div>');
        echo('<input type="submit" class="btn btn-primary" name="ajout2" value="Choisir"></form></div>');
        $i++;
    }
    $top5 ->CloseCursor(); ?>
    </div>
    <div class="partie_recherche bg-light rounded col-10 mx-auto text-center p-3">
        <form method="get" action="Choix_Menu.php" autocomplete="on" id="optionForm">
            <div class="form-group col-6 mx-auto">
                <input type="text" class="form-control" name="Menu" placeholder="Laissez-vous guider par vos envies !">
            </div>
            <div class="form-check">
                <p>Options de recherche : </p>
                <label class="form-ckeck-label" for="popularite">Popularité : </label>
                <input class="form-check-label" type="radio" name="option" id="popularite" value="Popularité" checked>
                <label class="form-ckeck-label" for="calorie">Calorie (croissant) : </label>
                <input type="radio" name="option" id="calorie" value="Calorie">
            </div>
            <input type="submit" class="btn btn-primary" name="submit" value="Rechercher">
        </form>
    </div>
    <div class="bg-dark text-light col-10 mx-auto rounded p-3 mt-3">
        <h2 class="text-center m-3">Quelque chose vous intéresse ?</h2>

        <form id='EnvoieMenue'>

            <?php if(isset($_GET['submit']) || isset($_GET['Menu'])){
    
     if(empty($_GET['Menu'])){
      echo('<meta http-equiv="refresh" content="0;URL=Choix_Menu.php">');
    }else {
     
         $input=$_GET['Menu'];
      //$input = preg_replace("#[^0-9a-z]#i","",$input);
      $reponse = $bd->query("SELECT * FROM menu WHERE menu.Nom LIKE '%$input%'");
      if ($_GET['option']== "Lipide"){
        $reponse = $bd->query("SELECT * FROM menu WHERE menu.Nom LIKE '%$input%' ORDER BY Lipides_g100g");
      }else if ($_GET['option']== "Calorie") {
        $reponse = $bd->query("SELECT * FROM menu WHERE menu.Nom LIKE '%$input%' ORDER BY Energie_Règlement_UE_N°_11692011_kcal100g");
      }
      $_SESSION['Rec_Plat']=array();
        $i=0;
         
         
      while($result = $reponse->fetch()){?>
            <!--##########################################################!-->
            <div class="row">
                <div class="col-6">
                    <div class="form-group col-10 border bg-primary p-2 rounded">
                        <label for="nbMenu"><?php echo $result['Nom'];?></label>
                        <input type="checkbox" class="form-control" name="Menu<?php echo $i; ?>" value="<?php echo $result["Id_Menu"]; ?>">
                    </div>
                </div>

                <?php if(isset($_SESSION['Rec_Plat'])){ ajoutAlimInd($result['Nom']); }else{  $_SESSION['Rec_Plat']= $result['Nom'];  }  ?>

                <label for="date">Choisissez un jour où le manger !</label>
                <div class="input-group date p-2" data-provide="datepicker">
                    <input type="date" name="date<?php echo $i; ?>" value="" class="form-control"></div>
                <div class="p-2">
                    <label for="nbMenu">Choisissez une heure !</label>
                    <input type="number" class="form-control" name="heure<?php echo $i; ?>" placeholder="Format européen (e.g., 13, 18, 09, 24)" />
                </div>
                <?php $i++; } ?>
                <!--##########################################################!-->


            </div>
            <input type="button" id="ajout3" class="btn btn-primary" value="Choisir">

            <input type="hidden" name="nbtypeMenue" id="nbtypeMenue" value="<?php echo $i; ?>">

            <?php $reponse-> closeCursor(); } } ?>

        </form>
    </div>

</body>

</html>
