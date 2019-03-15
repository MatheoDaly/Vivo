 //---------------------- Envoie de données-----------------------------------------
 var commence = true;
 // Je recupere le nom via la span id #nom
 //https://www.digicomp.ch/blognews/2017/07/07/chart-js-une-evaluation-graphique-des-donnees-en-un-tour-de-main-grace-javascript

 $(function () {
     var Graphique;
     liste = [["glucide", [0, 6, 2]], ["calorie", [0, 4, 2]], ["lipide", [0, 26, 2]]];
     if (commence) {
         $.post('CalculTaux.php', {
             type: $('select').val(),
             id: $('#nom').val()
         }, function (data) {
             // verifie si c'est une liste et de quoi
             Graphique = AfficheGraph(data, $("select").val());

         });
         commence = false;
     }
     // Jquery pour graphique
     $('select').on('change', function () {
         //verifie s'il existe et si c'est un nombre
         if ($('#nom').val() != '' && !(isNaN($('#nom').val()))) {
             $.post('CalculTaux.php', {
                 type: $(this).val(),
                 id: $('#nom').val()
             }, function (data) {
                 // verifie si c'est une liste et de quoi
                 Graphique = AfficheGraph(data, $("select").val());
             });
         }
     });


 });

 // https://easings.net/fr#
 // http://tobiasahlin.com/blog/chartjs-charts-to-get-you-started/
 //------------------------------------------------------------------------------------
 //line


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

 new Chart(document.getElementById("Rond"), {
     type: 'pie',
     data: {
         labels: ["Gras", "Gras", "Gras", "Un peu gras", "Gras"],
         datasets: [{
             label: "En pourcentage (%)",
             backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850"],
             data: [20, 20, 10, 30, 20]
      }]
     },
     options: {
         title: {
             display: true,
             text: 'Mon alimentation'
         }
     }
 });
 //-------------------------Partie teste



 //----------------------------------------
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
 //-----------------------------------------------Fonction de construction du graphique

 function GenereTraitGraph(listeDeListe) {
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
         return ["10", "11", "12", "13", "14", "15"];
     else if (Choix == 4)
         return ["Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin"];
     else if (Choix == 5)
         return ["2017", "2018", "2019"];
 }
