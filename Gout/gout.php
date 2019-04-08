<?php
//manque change id=1 avec id=$_SESSION['profil']['id']
include("../Outil/php/AccesBD.php");
//include_once "Fonctions_alim.php";
session_start();
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
                    $req=$BD->query("INSERT INTO regime_profil (`id_Profil`, `id_Regime`) VALUES ('1', '".$_GET[$j]."')");
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
                        $req=$BD->query("DELETE FROM regime_profil WHERE id_Profil=1 and id_Regime=".$_GET[$j]);
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
                        $req=$BD->query("DELETE FROM regime_profil WHERE id_Profil=1 and id_Aliment=".$_GET[$j]." and pref=".$pref.")");
                        $fin=true;
                    }
                    $j+=1;
                }
                $req->closeCursor();
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
                    $req=$BD->query("INSERT INTO regime_profil (`id_Profil`, `id_Regime`,'start','end') VALUES ('1', '".$_GET[$j]."', '".$_GET['start']."', '".$_GET['end']."')");
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
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
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
    <div class="container">
        <div class="row">
            <div class="col-10 col-lg-6 bg-dark mx-auto text-light rounded">
                <div>
                    <h1>Mes regimes</h1>

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
                    <h1>Aliment Préférét</h1>

                    <form method="get" action="Gout.php">
                    <?php $req=$BD->query("SELECT alim_code,alim_nom_fr FROM aliments WHERE alim_code in (SELECT id_Aliment FROM preferance WHERE id_Profil=1 and pref=1)");
                    $i=0;
                    while($ligne = $req->fetch()){
                        echo '<p><input type="checkbox" name="'.$i.'" value="'.$ligne['id'].'"> '.$ligne['Nom'].'</p>'."\n";
                        $i+=1;
                        }
                    $req->closeCursor();
                    ?>
                    <input type="hidden" name="type" value="3">
                    <input type="submit" class="btn btn-primary" name="submit" value="Eliminer">
                    </form>

                </div>
                <div>
                    <h1>Aliment detesté</h1>

                    <form method="get" action="Gout.php">
                    <?php $req=$BD->query("SELECT alim_code,alim_nom_fr FROM aliments WHERE alim_code in (SELECT id_Aliment FROM preferance WHERE id_Profil=1 and pref=0)");
                    $i=0;
                    while($ligne = $req->fetch()){
                                echo '<p><input type="checkbox" name="'.$i.'" value="'.$ligne['id'].'"> '.$ligne['Nom'].'</p>'."\n";
                        $i+=1;
                            }
                    $req->closeCursor();
                    ?>
                    <input type="hidden" name="type" value="2">
                    <input type="submit" class="btn btn-primary" name="submit" value="Eliminer">
                    </form>

                </div>
            </div>
            <div class="col-10 col-lg-6 bg-dark mx-auto text-light rounded"    >
                <div>
                    <h1>Regime disponible</h1>
                    <form method="get" action="Gout.php">
                    <?php $req=$BD->query("SELECT * FROM regime WHERE id NOT in (SELECT id_Regime FROM regime_profil WHERE id_profil=1)");
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
                    <h1>Aliment disponible</h1>
                    <div class="partie_recherche">
                    <form method="get" action="Gout.php" autocomplete="off" id="optionForm">
                      <br/>
                      <input type="text" name="Alim">
                      <input type="submit" name="submit" value="Rechercher">
                    </form>
                    <?php
                      if(isset($_GET['submit']=="Rechercher") || isset($_GET['Alim'])){
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
                            <input type="hidden" name="type" value="1">
                            <input type="submit" class="btn btn-primary" name="submit" value="Ajouter">
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
