<!DOCTYPE html>
<html>

<head>
    <title>Vivo</title>
    <link href="../Outil/bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="../Outil/Style/Style.css" rel="stylesheet">

</head>
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
                    <a class="nav-link" href="../Profil/Profil.php">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Statistique/Statistique.php">Statistique</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="disconnect" href="../Deconnexion.php">Deconnexion</a>
                </li>
                <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link active" href="../Inscription/inscription.php">Inscription</a>
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

<h1 style="text-align:center;">Inscription</h1>

<body>
    <div class="d-flex flex-column rounded bg-dark text-dark" style="margin: 50px; padding-top: 25px; padding-bottom: 100px;">
        <hr>
        <div class="col-10 bg-light mx-auto ">
            <form method="post" action="../Profil/Profil.php">
                <div class="row">
                    <div class="col-10" style="margin: 50px;">
                        <div class="form-group">
                            <label for="utilisateur">
                                Utilisateur :
                            </label><input class="form-control" id="user" type="text" name="utilisateur" placeholder="Jean Denis" />
                        </div>
                        <div class="form-group">
                            <label for="prenom">
                                Prenom :
                            </label>
                            <input class="form-control" id="p" type="text" name="prenom" placeholder="Jean" />
                        </div>
                        <div class="form-group">
                            <label for="email">
                                Email :
                            </label>
                            <input class="form-control" id="m" type="email" name="email" placeholder="monMail@mail.com" />
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p>Choisissez votre sexe</p>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="genre" value="M" id="homme" checked />
                                    <label class="form-check-label" for="homme">Homme </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="genre" value="F" id="femme" />
                                    <label class="form-check-label" for="femme">Femme</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <p>Choisissez votre niveau sportif</p>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="lvlSport" value="1" id="1" />
                                    <label class="form-check-label" for="1">Peu Sportif</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="lvlSport" value="2" id="2" checked />
                                    <label class="form-check-label" for="2">Sportif</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="lvlSport" value="3" id="3" />
                                    <label class="form-check-label" for="3">Très Sportif</label>
                                </div>
                            </div>
                            <div class="form-group">
                            </div>
                            <label for="poids">
                                Poids
                            </label><input class="form-control" id="poids" type="number" name="poids" placeholder="70 kg" />
                        </div>
                        <div class="form-group">
                            <label for="taille">
                                Taille
                            </label><input class="form-control" id="t" type="number" name="taille" placeholder="170 cm" />
                        </div>
                        <div class="form-group">
                            <label for="mdp1">Mot de passe :</label>
                            <input class="form-control" id="mdp1" type="password" name="mdp" aria-describedby="passwordHelpInline" />
                            <small id="passwordHelpInline" class="text-muted">
                                Doit faire au moins 8 caractères
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="mdp2">
                                Mot de passe à confirmer :
                            </label>
                            <input class="form-control" id="mdp2" type="password" name="mdp2" />
                        </div>
                        <input type="button" id="submit" value="Envoyer" class="btn btn-primary" />
                    </div>
                </div>
            </form>
        </div>

        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script type="text/javascript" src="../Outil/bootstrap-4.3.1-dist/js/bootstrap.js"></script>
        <script src="fomulaire.js" type="text/javascript"></script>
    </div>
</body>

</html>
