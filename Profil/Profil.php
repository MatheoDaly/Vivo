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
                    Je ferme et ouvre ma ligne toute les deux cellule -> $i%2 == 0 et si different de la fin
                    je ferme si count == $i !
                    pour compter -> execute; rowCount()
                    
                    Adapter le fais que des menue pour aujourd'hui ne sont pas obliger
                    */
                    $i=0; // moduler le $i pour adapter le moment des menues
                    $fin=10;//-> recupere l'intervale de jour en maintenant et le menue le plus tardif !'
                    while($ligne= $req->fetch()){
                        if($i==0){ ?>
                    <div class="row">
                        <?php } else if ($i%2==0){ ?>
                        <div class="row">
                        </div>
                        <?php } ?>

                        <div class="col-12 col-lg-6">
                            <h3 class="text-center" style="text-decoration:underline;">
                                <?php switch($i){
                            case 0: echo "Aujourd'hui"; break;
                            case 1: echo "Demain"; break;
                            default: echo "Dans ".$i." jours"; break;
                        } ?>
                            </h3>
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <h4 class="text-center" style="text-decoration:underline;">Midi</h4>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <h4 class="text-center" style="text-decoration:underline;">Soir</h4>
                                </div>
                            </div>
                        </div>

                        <?php  if($i==$fin){
                            ?>
                    </div>
                    <?php
                        }
                        i++;
                    }
                    
                    ?>

                </div>

            </div>

            <div class="col-10 col-lg-4 bg-light" style="margin: 25px;">
                <h3 class="text-center">Liste de courses</h3>
            </div>
        </div>


    </div>




</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

</html>
