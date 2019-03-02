<!Doctype HTML>
<html>

<head>
    <meta charset="utf-8">
    <link href="../Outil/bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="Profil.css" rel="stylesheet">
    <title>Profil</title>

</head>

<body>
    <?php
    include('../Outil/Php/AccesBDClient.php');
    
    ?>

    <div class="d-flex flex-column justify-content-center" id="TableProfil">

        <div class="independant"><img class="independant" src="../Image/avatar-1295406_640.png" alt="profil"></div>

        <!-- introduction !-->

        <div class="d-flex flex-fill bg-white justify-content-between" id="intro">
            <div class="col-sm-5">Profil : didier de la compté des pres jolie
                <br> il a 29 ans et il est pas très beau... desolé didier</div>
            <div class="col-sm-4">Ajout de logo
            </div>
            <div class="col-sm-3 d-flex flex-column">
                <div>
                    <strong>Objectif perdre 50 kg
                    </strong>
                </div>
                <div class="d-flex flex-column">
                    <div class="row">
                        <img class="col-md-6 icon" name="ordi" src="../Image/mac-1784459_640.png" alt="mac">
                        <h2 class="col-md-6">
                            Ordi
                        </h2>
                    </div>
                </div>

            </div>
        </div>

        <!--  Intermediare !-->
        <div>
            <div>
                <input type="button" class="btn btn-primary" value="Consultation des mes statistique">
            </div>
        </div>
        <hr>
        <!-- menue  personnaliser des profil !-->

        <div class="independant"><img class="independant" src="../Image/food-304597_640.png"></div>

        <!-- Programation des menue !-->
        <div id="ProgMenue" class="d-flex justify-content-between SousImg">
            <div>Menue perso
            </div>
            <div> Yollo
            </div>
        </div>


    </div>




</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

</html>