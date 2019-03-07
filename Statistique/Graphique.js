// https://easings.net/fr#

//line
var ctxL = document.getElementById("lineChart").getContext('2d');

var myLineChart = new Chart(ctxL, {
    type: 'line',
    data: {
        labels: ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche"],
        datasets: [{
                label: "Concentration glucose",
                data: [65, 59, 80, 81, 56, 55, 40], // utiliser une fonction get de ajax pour permettre la capture des données
                backgroundColor: [
            'rgba(100, 00, 100, .2)',
          ],
                borderColor: [
            'rgba(200, 00, 200, .7)',
          ],
                borderWidth: 3
        },
            {
                label: "Concentration en sel",
                data: [28, 48, 40, 19, 86, 27, 90],
                backgroundColor: [
            'rgba(0, 100, 100, .2)',
          ],
                borderColor: [
            'rgba(0, 200, 200, .7)',
          ],
                borderWidth: 3
        }
      ]
    },
    options: {
        responsive: true
    }
});
/*
function moyenne() {
    // prends une liste d'ingredient en parametre recupere
    // Recupere des datas issues des consommation habitutuelle
    // des clients




    return moy;
}

function adapt() {
    // s'adapte au client sur le mois semaine jour et s'il est premium ou non
}
*/
//------------------------------------------------------------
var ctx = document.getElementById("Rond").getContext('2d');
var myPieChart = new Chart(ctx, {
    type: 'pie',
    data: {
        datasets: [{
            data: [10, 20, 70]
    }],

        // These labels appear in the legend and in the tooltips when hovering different arcs
        labels: [
        'Red',
        'Yellow',
        'Blue'
    ]
    };,
    options: {
        responsive: true
    }
});
