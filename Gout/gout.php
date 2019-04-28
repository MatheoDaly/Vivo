<?php
//manque change id=1 avec id=$_SESSION['profil']['id']
include("../Outil/php/AccesBD.php");
//include_once "Fonctions_alim.php";
include("../Outil/IsTest.php");

$BD=getBD();
if(isset($_GET['submit'])){
    //Ajouter
    if($_GET['submit']=="Ajouter"){
        $i=0;
        $j=0;
        while($i<count($_GET)-2) {
            $fin=false;
            while(!$fin){
                if(isset($_GET[$j])){
                    $req=$BD->query("INSERT INTO regime_profil (`id_Profil`, `id_Regime`) VALUES (".$Profil['ID'].", '".$_GET[$j]."')");
                    $fin=true;
                }
                $j+=1;
            }
            $req->closeCursor();
            $i+=1;
        }
    }elseif($_GET['submit']=="pref"){
        $i=0;
        $j=0;
        while($i<count($_GET)-2) {
            $fin=false;
            while(!$fin){
                if(isset($_GET[$j])){
                    $pref=0;
                    $req=$BD->query("INSERT INTO preference (`id_Profil`, `id_Aliment`, pref) VALUES (".$Profil['ID'].", '".$_GET[$j]."', ".$pref.")");
                    $fin=true;
                }
                $j+=1;
            }
            $req->closeCursor();
            $i+=1;
        }
    }
    elseif($_GET['submit']=="deteste"){
        $i=0;
        $j=0;
        while($i<count($_GET)-2) {
            $fin=false;
            while(!$fin){
                if(isset($_GET[$j])){
                    $pref=1;
                    $req=$BD->query("INSERT INTO preference (`id_Profil`, `id_Aliment`, pref) VALUES (".$Profil['ID'].", '".$_GET[$j]."', ".$pref.")");
                    $fin=true;
                }
                $j+=1;
            }
            $req->closeCursor();
            $i+=1;
        }
    }
    //Eliminer
    elseif($_GET['submit']=="Eliminer"){
        //Regime
        if($_GET['type']==1){
            $i=0;
            $j=0;
            while($i<count($_GET)-2) {
                $fin=false;
                while(!$fin){
                    if(isset($_GET[$j])){
                        $req=$BD->query("DELETE FROM regime_profil WHERE id_Profil=".$Profil['ID']." and id_Regime=".$_GET[$j]);
                        $fin=true;
                    }
                    $j+=1;
                }
                $req->closeCursor();
                $i+=1;
            }
        }
        //aliment
        else{$i=0;
            $j=0;
            while($i<count($_GET)-2) {
                $fin=false;
                while(!$fin){
                    if(isset($_GET[$j])){
                        $pref=$_GET['type']-2;
                        $req=$BD->query("DELETE FROM preference WHERE id_Profil=".$Profil['ID']." and id_Aliment=".$_GET[$j]." and pref=".$pref."");
                        $fin=true;
                    }
                    $j+=1;
                }
                $i+=1;
            }
        }
    }
    //calendrier
    else{
        $i=0;
        $j=0;
        while($i<count($_GET)-4) {
            $fin=false;
            while(!$fin){
                if(isset($_GET[$j])){
                    $req=$BD->query("INSERT INTO regime_profil (`id_Profil`, `id_Regime`,'start','end') VALUES (".$Profil['ID'].", '".$_GET[$j]."', '".$_GET['start']."', '".$_GET['end']."')");
                    $fin=true;
                }
                $j+=1;
            }
            $req->closeCursor();
            $i+=1;
        }
    }
}
?>

<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="gout.css" type="text/css">
    <title>Vivo</title>
    <link rel="icon" type="image/png" href="../Image/Icon/icons8-aliments-sains-96.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>
<header>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="../index.php">Vivo</a>
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
                <li class="nav-item">
                    <a class="nav-link" href="../Profil/Profil.php">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Statistique/Statistique.php">Statistique</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="disconnect" href="../Deconnexion.php">Deconnexion</a>
                </li>
<<<<<<< HEAD
                <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link active" href="../Inscription/inscription.php">Inscription</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Connection/connexion.php">Connexion</a>
                </li>
                <?php } ?>

=======
                
>>>>>>> refs/remotes/origin/master

            </ul>
            <span class="navbar-text">
                Pour une bonne santé vivez VIVO !
            </span>
        </div>
    </nav>
</header>

<body>
    <div class="container">
        <div class="row">
            <div class="col-10 col-lg-5 m-3 mx-auto text-light rounded text-center p-5" style="background-color: rgba(0, 0, 0, 0.6);">
                <div>
                    <img src="../Image/Icon/icons8-ingr%C3%A9dients-96.png">
                    <h1>Mes régimes</h1>

                    <form method="get" action="Gout.php">
                        <?php $req=$BD->query("SELECT * FROM regime WHERE id in (SELECT id_Regime FROM regime_profil WHERE id_profil=1)");
                    $i=0;
                    while($ligne = $req->fetch()){
                        echo '<p><input type="checkbox" name="'.$i.'" value="'.$ligne['id'].'"> '.$ligne['Nom'].'</p>'."\n";
                        $i+=1;
                    }
                    $req->closeCursor();
                    ?>
                        <input type="hidden" name="type" value="1">
                        <input type="submit" class="btn btn-primary" name="submit" value="Eliminer">
                    </form>

                </div>
                <div>
                    <img src="../Image/Icon/icons8-lol-100.png">
                    <h1>Aliment Préférés</h1>

                    <form method="get" action="Gout.php">
                        <?php $req=$BD->query("SELECT alim_code,alim_nom_fr FROM aliments WHERE alim_code in (SELECT id_Aliment FROM preferance WHERE id_Profil=1 and pref=0)");
                    $i=0;
                    while($ligne = $req->fetch()){
                        echo '<p><input type="checkbox" name="'.$i.'" value="'.$ligne['alim_code'].'"> '.$ligne['alim_nom_fr'].'</p>'."\n";
                        $i+=1;
                        }
                    $req->closeCursor();
                    ?>
                        <input type="hidden" name="type" value="2">
                        <input type="submit" class="btn btn-primary" name="submit" value="Eliminer">
                    </form>

                </div>
                <div>
                    <img src="../Image/Icon/icons8-en-col%C3%A8re-100.png">
                    <h1>Aliment detestés</h1>

                    <form method="get" action="Gout.php">
                        <?php $req=$BD->query("SELECT alim_code,alim_nom_fr FROM aliments WHERE alim_code in (SELECT id_Aliment FROM preferance WHERE id_Profil=".$Profil['ID']." and pref=1)");
                    $i=0;
                    while($ligne = $req->fetch()){
                                echo '<p><input type="checkbox" name="'.$i.'" value="'.$ligne['alim_code'].'"> '.$ligne['alim_nom_fr'].'</p>'."\n";
                        $i+=1;
                            }
                    $req->closeCursor();
                    ?>
                        <input type="hidden" name="type" value="3">
                        <input type="submit" class="btn btn-primary" name="submit" value="Eliminer">
                    </form>

                </div>
            </div>
            <div class="col-10 col-lg-6 mx-auto text-light rounded m-3 p-5" style="background-color: rgba(0, 0, 0, 0.6);">
                <div>
                    <h1>Régimes disponibles</h1>
                    <form method="get" action="Gout.php">
                        <?php $req=$BD->query("SELECT * FROM regime WHERE id NOT in (SELECT id_Regime FROM regime_profil WHERE id_profil=".$Profil['ID'].")");
                    $i=0;
                    while($ligne = $req->fetch()){
                                echo '<p><input type="checkbox" name="'.$i.'" value="'.$ligne['id'].'"> '.$ligne['Nom'].'</p>'."\n";
                        $i+=1;
                            }
                    $req->closeCursor();
                    ?>
                        <input type="hidden" name="type" value="1">
                        <input type="submit" class="btn btn-primary" name="submit" value="Ajouter">
                    </form>
                </div>
                <div>
                    <h1>Aliments disponibles</h1>
                    <div class="partie_recherche">
                        <form class="form-group col-6" method="get" action="Gout.php" autocomplete="off" id="optionForm">
                            <br />
                            <input type="text" class="form-control" name="Alim">
                            <input type="submit" class="btn btn-primary" name="submit" value="Rechercher">
                        </form>
                        <?php
                      if(isset($_GET['Alim'])){
                        if(empty($_GET['Alim'])){
                          echo('<meta http-equiv="refresh" content="0;URL=Gout.php">');
                        }else {
                            ?>
                        <form method="get" action="Gout.php">
                            <?php
                              $input=$_GET['Alim'];
                              //$input = preg_replace("#[^0-9a-z]#i","",$input);
                              $reponse = $BD->query("SELECT * FROM aliments WHERE alim_nom_fr LIKE '%$input%' and alim_grp_code!=1 limit 5");
                              $i=0;
                              while($result = $reponse->fetch()){
                                echo '<p><input type="checkbox" name="'.$i.'" value="'.$result['alim_code'].'"> '.$result['alim_nom_fr'].'</p>'."\n";
                                 $i+=1;
                              }
                              $reponse-> closeCursor();
                            ?>
                            <input type="hidden" name="type" value="2">
                            <input type="submit" class="btn btn-primary" name="submit" value="pref">
                            <input type="submit" class="btn btn-primary" name="submit" value="deteste">
                        </form>
                        <?php
                            }
                          }
                            ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
