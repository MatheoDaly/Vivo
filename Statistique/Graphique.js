function include(fileName) {
    document.write("<script type='text/javascript' src='" + fileName + "'></script>");
}
include("../Outil/JS/Graphique.js");

//---------------------- Envoie de données-----------------------------------------
var commence = true;
var list = [["concentration", [1, 2, 3, 3]]];
//https://www.digicomp.ch/blognews/2017/07/07/chart-js-une-evaluation-graphique-des-donnees-en-un-tour-de-main-grace-javascript

$(function () {
    var Graphique;
    if (commence) {
        $.post('CalculTaux.php', {
            type: $('select').val()
        }, function (data) {
            if (JSON.parse(data).length == 0) {
                alert("Pas de repas encore effectuer !");
                $(location).attr('href', '../Profil/Profil.php')
            }
            Graphique = AfficheGraph(JSON.parse(data), $("select").val());

        });
        commence = false;
    }
    // Jquery pour graphique
    $('select').on('change', function () {
        //verifie s'il existe et si c'est un nombre
        if ($(this).val() != '' && !(isNaN($(this).val()))) {
            $.post('CalculTaux.php', {
                type: $(this).val()
            }, function (data) {
                alert(data);
                Graphique = AfficheGraph(JSON.parse(data), $("select").val());
            });
        }
    });

});
//############################################################## Partie AfficheGraph ###########################################
