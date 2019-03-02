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
        <form id="Table" method="get" action="verification.php" autocomplete="off">
            <div>
                <div>
                    <p>
                        Mail :<input type="email" name="email" value="<?php if(isset($_COOKIE['email']){echo $_COOKIE['email'];})
                            ?>" />
                    </p>
                    <p>
                        Mot de passe :<input type="password" name="mdp" value="<?php if(isset($_COOKIE['mdp']){echo $_COOKIE['mdp'];})
                            ?>" />
                    </p>
                </div>
                <p>
                    <input type="submit" value="Envoyer" />
                </p>
            </div>
        </form>
    </div>
</body>

</html>
