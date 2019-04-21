function include(fileName) {
    document.write("<script type='text/javascript' src='" + fileName + "'></script>");
}
include("../../Outil/JS/Graphique.js");

//var list = [["concentration", [1, 2, 3, 3]]];
$(document).ready(function () {
    $.get('RegressionLineaire.php',
        function (data) {
            if (data != 'No Check')
                alert(data);

            AfficheGraph(
               [["Poids perdu (en gramme)", creaPrev(JSON.parse(data))]], 2);
            $("#poidsJr").text(toString(((3400 - parseFloat(data[1])) / parseFloat(data[0]))));
        });
});

function creaPrev(data) {
    data1 = Array();
    for (var i = 0; i < 7; i++) {
        data1.push(parseFloat(data[0]) * i + parseFloat(data[1]));
    }
    alert(data1);
    return data1;
}
