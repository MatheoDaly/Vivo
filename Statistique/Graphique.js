//line
var ctxL = document.getElementById("lineChart").getContext('2d');

var myLineChart = new Chart(ctxL, {
    type: 'line',
    data: {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [{
                label: "Concentration glucose",
                data: [65, 59, 80, 81, 56, 55, 40], // utiliser une fonction get de ajax pour permettre la capture des données
                backgroundColor: [
            'rgba(100, 100, 100, .2)',
          ],
                borderColor: [
            'rgba(200, 200, 200, .7)',
          ],
                borderWidth: 2
        },
            {
                label: "Concentration en sel",
                data: [28, 48, 40, 19, 86, 27, 90],
                backgroundColor: [
            'rgba(0, 137, 132, .2)',
          ],
                borderColor: [
            'rgba(0, 10, 130, .7)',
          ],
                borderWidth: 2
        }
      ]
    },
    options: {
        responsive: true
    }
});
