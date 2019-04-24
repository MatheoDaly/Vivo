var l = ['Consommation calorie', ["Chips", "French Fries", "Gras bien Gras", "Chien-Chaud"], [1600, 2000, 2000, 4000]];


function include(fileName) {
    document.write("<script type='text/javascript' src='" + fileName + "'></script>");
}
include("../Outil/JS/Graphique.js");

$(document).ready(function () {
    $.post('communicationGraphique.php', {
        today: 1
    }, function (data) {
        //alert(JSON.parse(data));
        if (JSON.parse(data)[1].length == 0) {
            $("#graph").remove();
        }
        afficheCamembert(JSON.parse(data));
    });
    commence = false;
});
