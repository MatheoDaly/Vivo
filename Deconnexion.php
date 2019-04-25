<?php session_start(); ?>
<html>

<head>
    <title>Déconnexion</title>

    <meta http-equiv="refresh" content="1; URL=index.html">
</head>

<body>
    Salut <?php echo $_SESSION['profil']['prenom']; ?> Reconnecte toi vite pour une prochaine dégustation !
</body>

</html>

<?php

if (isset($_POST['deco']) && $_POST['deco']==1 ){
    session_destroy();
    
}
?>
