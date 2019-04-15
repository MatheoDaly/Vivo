var l = ['Consommation calorie', ["Chips", "French Fries", "Gras bien Gras", "Chien-Chaud"], [1600, 2000, 2000, 4000]];


function include(fileName) {
    document.write("<script type='text/javascript' src='" + fileName + "'></script>");
}
include("../Outil/JS/Graphique.js");

$(document).ready(function () {
    $.get('communicationGraphique.php', function (data) {
        JSON.parse(data);
    });


})
