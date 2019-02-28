<!DOCTYPE html>
<html>

<head>
    <title>vivo</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="index.css" type="text/css" media="screen" />
    <?php
    $BD= new PDO('mysql:host=localhost;dbname=vivo;charset=utf8', 'root', 'root');

    $rep= $BD->query('select * from profil');
     while($ligne = $rep->fetch()) {
        if($ligne['utilisateur']==$_GET['utilisateur'] and $ligne['mdp']==$_GET['mdp']){
            echo $ligne['utilisateur'].$_GET['utilisateur'];
            echo '<meta http-equiv="refresh" content="0; url=profil.php"/>';
        }
     }

    ?>
    <meta http-equiv="refresh" content="0; url=connection.php?err=1"/>

</head>

<body>
    <h1>Verification</h1>
</body>

</html>
