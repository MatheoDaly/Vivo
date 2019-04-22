function include(fileName) {
    document.write("<script type='text/javascript' src='" + fileName + "'></script>");
}
include("../Outil/JS/Graphique.js");

//---------------------- Envoie de données-----------------------------------------
var commence = true;
var list = [["concentration", [1, 2, 3, 3]]];
var l = ['Consommation calorie', ["Chips", "French Fries", "Gras bien Gras", "Chien-Chaud"], [1600, 2000, 2000, 4000]];
//https://www.digicomp.ch/blognews/2017/07/07/chart-js-une-evaluation-graphique-des-donnees-en-un-tour-de-main-grace-javascript

$(function () {
    var Graphique;
    if (commence) {
        $.post('CalculTaux.php', {
            type: $('select').val()
        }, function (data) {
            alert(data);
            if (JSON.parse(data).length == 0) {
                alert("Pas de repas encore effectuer !");
                //$(location).attr('href', '../Profil/Profil.php');
            }
            alert((data));
            var Graphique = AfficheGraph(JSON.parse(data), 6);

        });
        $.post('CalculTaux.php', {
            today: 1
        }, function (data) {
            //alert(JSON.parse(data));
            if (JSON.parse(data)[1].length == 0) {
                $("#Ronds").remove();
                $("#1").remove();
            }
            afficheCamebert(JSON.parse(data));
        });
        commence = false;
    }
    // Jquery pour graphique
    $('select').on('change', function () {
        //verifie s'il existe et si c'est un nombre
        $("#lineChart").remove();
        if ($(this).val() != '' && !(isNaN($(this).val()))) {
            $.post('CalculTaux.php', {
                type: $(this).val()
            }, function (data) {
                $('#graphique').html('<canvas id="lineChart"></canvas>');
                alert(data);

                var Graphique = AfficheGraph(JSON.parse(data), 6);
            });
        }
    });

});
//############################################################## Partie AfficheGraph ###########################################
