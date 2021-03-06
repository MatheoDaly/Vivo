 function AfficheGraph(list, type) {
     return new Chart(document.getElementById("lineChart").getContext('2d'), {
         type: 'line',
         data: {
             labels: ListeCalendrier(type, list[0]),
             datasets: GenereTraitGraph(type, list)
         },
         options: {
             responsive: true
         }
     });
 }
 //-----------------------------------------------Fonction de construction du graphique----------------------------------

 function GenereTraitGraph(type, listeDeListe) {
     //Ne veux pas recevoir de tableau mais effectue, un tableau pour les caracter et un pour les nombres
     dataset = Array();
     if (type == 6) {
         var j = 1;
     } else {
         var j = 0;
     }
     for (var i = j; i < listeDeListe.length; i++) {
         dataset.push(TraitGraph(listeDeListe[i][0], listeDeListe[i][1]));

     }
     return dataset;
 }

 function TraitGraph(Label, data) {
     // voir pour genere des couleur alea
     var rd = Math.round(Math.random() * 155);
     var rd1 = Math.round(Math.random() * 155);
     switch (Math.round(Math.random() * 2.49)) {
         case 1:
             st1 = rd.toString() + ',' + rd1.toString() + ', 0';
             st2 = (rd + 100).toString() + ',' + (rd1 + 100).toString() + ', 0';
             break;
         case 2:
             st1 = '0,' + rd.toString() + ',' + rd1.toString();
             st2 = '0,' + (rd + 100).toString() + ',' + (rd1 + 100).toString();
             break;
         case 0:
             st1 = rd.toString() + ',0,' + rd1.toString();
             st2 = (rd + 100).toString() + ',0,' + (rd1 + 100).toString();
             break;

     }

     return {
         label: Label,
         data: data,
         backgroundColor: [
            'rgba(' + st1 + ', .2)',
          ],
         borderColor: [
            'rgba(' + st2 + ', .7)',
          ],
         borderWidth: 3
     };
 }

 function ListeCalendrier(Choix, liste) {
     if (Choix == 1)
         return ["Matin", "Midi", "Soir"];
     else if (Choix == 2)
         return ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche"];
     else if (Choix == 3)
         return ["10", "11", "12", "13", "14"];
     else if (Choix == 4)
         return ["Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin"];
     else if (Choix == 5)
         return ["2015", "2016", "2017", "2018", "2019"];
     else if (Choix == 6)
         return liste;
 }


 //---------------------------------------------Objet Donut ----------------------------------------------------------------




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



 function afficheCamembert(listeDeListe) {
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
