function include(fileName) {
    document.write("<script type='text/javascript' src='" + fileName + "'></script>");
}
include("../../Outil/JS/Graphique.js");

//var list = [["concentration", [1, 2, 3, 3]]];
$(document).ready(function () {
    $.get('RegressionLineaire.php',
        function (data) {
            //alert(data);
            if (data != 'No Check') {
                var dt = JSON.parse(data);
                var str = '';
                var diff = (parseInt($("#poidsActuel").text()) - parseInt($("#poidsVoulu").text()));
                //alert(diff);
                if (dt[0] < 0) {
                    str = "perdu";
                } else {
                    str = "gagné";
                }
                AfficheGraph([[1, 2, 3, 4, 5, 6, 7], ["Poids " + str + " (en gramme)", creaPrev(dt)]], 6);
                var jrPoids = (3400 - dt[1]) / dt[0];
                $("#poidsJr").text(encouragement(jrPoids, diff));
            } else {
                $('#graphique').remove();
                alert("Vous n'etes pas assez actif sur vivo pour avoir une tendance de votre poids");
            }
        });

});


function creaPrev(data) {
    data1 = Array();
    for (var i = 0; i < 7; i++) {
        data1.push(parseFloat(data[0]) * i + parseFloat(data[1]));
    }
    //alert(data1);
    return data1;
}

function encouragement(nb, diff) {
    if (nb * diff < 0.0) { // Ici on verifie qu'il suit ces principe et donc que s'il perd, il va pour perdre donc deux coeff egaux qu'ils soient négatif ou positif, leur multiplication est positive
        return "Allez cherche de la motivation par vos proche, la vie n'est jamais un combat seul ! Ayez confiance en vous !";
    } else if (nb > 0.0 && nb < 30.0) {
        return "Bientôt une quête accompli, soyez fière d'être proche de la fin ! Il vous reste moins d'un mois, si vous continuez comme ça !";
    } else {
        return "Agile de corps et d'esprit, vous vivez parfaitement Vivo, continuer ainsi avec nous, nous croyons en vous !";
    }

}
