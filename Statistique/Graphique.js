 //---------------------- Envoie de données-----------------------------------------
 var commence = true;
 var liste = [["concentration", [1, 2, 3, 3]]];
 //https://www.digicomp.ch/blognews/2017/07/07/chart-js-une-evaluation-graphique-des-donnees-en-un-tour-de-main-grace-javascript

 $(function () {
     var Graphique;
     if (commence) {
         $.post('CalculTaux.php', {
             type: $('select').val()
         }, function (data) {
             Graphique = AfficheGraph(JSON.parse(data), $("select").val());

         });
         commence = false;
     }
     // Jquery pour graphique
     $('select').on('change', function () {
         //verifie s'il existe et si c'est un nombre
         if ($(this).val() != '' && !(isNaN($(this).val()))) {
             $.post('CalculTaux.php', {
                 type: $(this).val()
             }, function (data) {
                 Graphique = AfficheGraph(JSON.parse(data), $("select").val());
             });
         }
     });

 });

 //---------------------------------------------Objet Chart----------------------------------------------------------------

 var li = ['Consommation calorie', ["Chips", "casoulet", "frite", "Chien-Chaud"], [1600, 2000, 2000, 40000]];




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

 afficheCamebert(li);

 function afficheCamebert(listeDeListe) {
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




 //############################################################## Partie AfficheGraph ###########################################
 function AfficheGraph(liste, type) {
     return new Chart(document.getElementById("lineChart").getContext('2d'), {
         type: 'line',
         data: {
             labels: ListeCalendrier(type),
             datasets: GenereTraitGraph(liste)
         },
         options: {
             responsive: true
         }
     });
 }
 //-----------------------------------------------Fonction de construction du graphique----------------------------------

 function GenereTraitGraph(listeDeListe) {
     //Ne veux pas recevoir de tableau mais effectue, un tableau pour les caracter et un pour les nombres
     dataset = Array();
     for (var i = 0; i < listeDeListe.length; i++) {
         dataset.push(TraitGraph(listeDeListe[i][0], listeDeListe[i][1]));
     }
     return dataset;
 }

 function TraitGraph(Label, data) {
     // voir pour genere des couleur alea
     return {
         label: Label,
         data: data,
         backgroundColor: [
            'rgba(0, 100, 100, .2)',
          ],
         borderColor: [
            'rgba(0, 200, 200, .7)',
          ],
         borderWidth: 3
     };
 }

 function ListeCalendrier(Choix) {
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
 }
