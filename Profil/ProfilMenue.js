/*
Fonctionnalité nécessaire:

- Presentation des menues pour chaque jours
- Liste de course a etablir
- Bulle de recette proposer sur la journée
-

En php :

- Generateur d'image icon progress (ou a faire en php)
- Generateur d'image regime (ou a faire en php)

*/

$(function () {
    $('input[name=BtnStat]').click(function () {
        $(location).attr('href', '../Statistique/Statistique.php');
    });


});
