function include(fileName) {
    document.write("<script type='text/javascript' src='" + fileName + "'></script>");
}
include("../../Outil/JS/Graphique.js");

$(document).ready(function () {
    $.get('RegressionLineaire.php',
        function (data) {
            if (data != 'No Check')
                alert(data);

        });
    Graphique = AfficheGraph(JSON.parse(data), $("select").val());
});
