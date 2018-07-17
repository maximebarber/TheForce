<h3>Statistiques</h3>

<?php while($statsCategorie = $statsCategories->fetch()){
 
        $nom = ($statsCategorie['nom_categorie']);
        $count = ($statsCategorie['count']);
        
        $data[] = array($nom=> $count);
 
}; 

?>

 <div class="chart-container" style="position: relative; height:20vh; width:40vw">
    <canvas id="myChart" width="400" height="400"></canvas>
</div>

<script>

var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: 
        
        //BOUCLE SUR LES NOMS DE CHAQUE CATEGORIE PRESENTS DANS LA BDD
        [<?php for($i = 0; $i<count($data); $i++){
            
            echo json_encode(array_keys($data[$i]));
            echo ',';
            
        }
        ?>],
        datasets: [{
            label: 'Nombre de modules par catégorie',
            data: [
                
            //ON BOUCLE SUR LE NOMBRE DE MODULES DANS CHAQUE CATEGORIE
            <?php for($i = 0; $i<count($data); $i++){
            
            echo json_encode(array_values($data[$i]));
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