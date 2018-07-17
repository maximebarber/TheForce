<h3>Statistiques</h3>

<?php

//RECUPERATION DES DONNES A UTILISER POUR LES STATS 'NB MODULES PAR CATEGORIE'
while($statsCategorie = $statsCategories->fetch()){

        $nom = ($statsCategorie['nom_categorie']);
        $count = ($statsCategorie['count']);

        $dataCat[] = array($nom=> $count);

};

//RECUPERATION DES DONNES A UTILISER POUR LES STATS 'NB H/F'
while($statsSexe = $statsSexes->fetch()){

        $nom = ($statsSexe['sexe']);
        $count = ($statsSexe['count']);

        $dataSexe[] = array($nom=> $count);

};

?>

<div class="charts">

<!--AFFICHAGE DU CHART NB MODULES PAR CATEGORIE-->
 <div class="chart-container" style="position: relative; height:20vh; width:40vw">
    <canvas id="myChartCat" width="400" height="400"></canvas>
</div>

<!-- AFFICHAGE DU CHART NB H/F -->
 <div class="chart-container" style="position: relative; height:20vh; width:40vw">
    <canvas id="myChartSexe" width="400" height="400"></canvas>
</div>

</div>

<script>

//AFFICHAGE STATS CATEGORIES
var ctxCat = document.getElementById("myChartCat").getContext('2d');
var myChartCat = new Chart(ctxCat, {
    type: 'pie',
    data: {
        labels:

        //BOUCLE SUR LES NOMS DE CHAQUE CATEGORIE PRESENTS DANS LA BDD
        [<?php for($i = 0; $i<count($dataCat); $i++){
          echo json_encode(array_keys($dataCat[$i]));

            echo ',';

        }
        ?>],
        datasets: [{
            label: 'Nombre de modules par catégorie',
            data: [

            //ON BOUCLE SUR LE NOMBRE DE MODULES DANS CHAQUE CATEGORIE
            <?php for($i = 0; $i<count($dataCat); $i++){

            echo json_encode(array_values($dataCat[$i]));
            echo ',';

            }
            ?>
            ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});

//AFFICHAGE STATS H/F
var ctxSexe = document.getElementById("myChartSexe").getContext('2d');
var myChartSexe = new Chart(ctxSexe, {
    type: 'pie',
    data: {
        labels:

        //BOUCLE SUR LES NOMS DE CHAQUE CATEGORIE PRESENTS DANS LA BDD
        [<?php for($i = 0; $i<count($dataSexe); $i++){
          echo json_encode(array_keys($dataSexe[$i]));

            echo ',';

        }
        ?>],
        datasets: [{
            label: 'Nombre de modules par catégorie',
            data: [

            //ON BOUCLE SUR LE NOMBRE DE MODULES DANS CHAQUE CATEGORIE
            <?php for($i = 0; $i<count($dataSexe); $i++){

            echo json_encode(array_values($dataSexe[$i]));
            echo ',';

            }
            ?>
            ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>
