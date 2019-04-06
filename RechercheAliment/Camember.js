var l = ['Consommation calorie', ["Chips", "French Fries", "Gras bien Gras", "Chien-Chaud"], [1600, 2000, 2000, 4000]];







//--------------------------------------------Fonction du camember
function sum(lis) {
    var sum = 0;
    for (var i in lis) {
        sum = sum + lis[i];
    }
    return sum;
}

function Newtab(liste) {
    var sum1 = sum(liste["2"]);
    liste.push(new Array(liste["2"].length));
    for (var i in liste) {
        liste["2"][i] = liste["2"][i] / sum1;
        liste["3"][i] = '#' + (Math.random() * 0xFFFFFF << 0).toString(16);

    }
    return liste;
}

afficheCamebert(l);

function afficheCamebert(listeDeListe) {
    // Fonction qui avec une liste de liste  resort un obj json avec des couleurs aleas, et les données associer, et le label de la liste
    liste = Newtab(listeDeListe);
    return new Chart(document.getElementById("Rond"), {
        type: 'pie',
        data: {
            labels: liste[1],
            datasets: [{
                label: "En pourcentage (%)",
                backgroundColor: liste[3],
                data: liste[2]
      }]
        },
        options: {
            title: {
                display: true,
                text: liste[0]
            }
        }
    });
}
