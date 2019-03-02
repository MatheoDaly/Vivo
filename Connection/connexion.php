<!DOCTYPE html>
<html>

<head>
    <title>Vivo</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="../Outil/bootstrap-4.3.1-dist/css/bootstrap.css" />
    <link href="../Outil/Style/Style.css" rel="stylesheet" />

</head>

<body>
    <div id="Table" class="d-flex flex-column rounded">
        <h1>Connection</h1>
        <form method="get" action="verification.php" autocomplete="off">
            <div>
                <div>
                    <p>
                        Mail :<input type="email" id="m" name="email" value="<?php if(isset($_COOKIE['email'])){echo $_COOKIE['email'];}
                            ?>" />
                    </p>
                    <p>
                        Mot de passe :<input type="password" id="mdp" name="mdp" value="<?php if(isset($_COOKIE['mdp'])){echo $_COOKIE['mdp'];}
                            ?>" />
                    </p>
                </div>
                <p>
                    <input type="button" id='submit' class="btn btn-primary" value="Envoyer" />
                </p>
            </div>
        </form>
    </div>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="connexion.js" type="text/javascript"></script>
</body>

</html>
