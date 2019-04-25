var l = ['Consommation calorie', ["Chips", "French Fries", "Gras bien Gras", "Chien-Chaud"], [1600, 2000, 2000, 4000]];


function include(fileName) {
    document.write("<script type='text/javascript' src='" + fileName + "'></script>");
}
include("../Outil/JS/Graphique.js");

$(document).ready(function () {
    $.post('communicationGraphique.php', {
        today: 1
    }, function (data) {
        if (data[0] != "[" || data[(data.length - 1)] != "]") {
            $("#graph").remove();
        } else {
            var dt = JSON.parse(data);
            if (dt[1][0] != null) afficheCamembert(dt);
            else
                $("#graph").remove();
        }
    });
});
