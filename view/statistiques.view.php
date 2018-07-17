<h2>A venir très prochainement été 2023.</h2>

<?php while($statsCategorie = $statsCategories->fetch()){
 
        $nom = ($statsCategorie['nom_categorie']);
        $count = ($statsCategorie['count']);
        
        $data[] = array($nom=> $count);
 
}; 

print json_encode(array_values($data[0]));
echo '<br>';
$lol = json_encode($data);
print $lol;

/*$data = array();
foreach ($statsCategories as $statsCategorie){
    $data[] = $statsCategorie;
}

print json_encode($data);*/

?>

 <div class="chart-container" style="position: relative; height:20vh; width:40vw">
    <canvas id="myChart" width="400" height="400"></canvas>
</div>

<script>
    
/*$(document).ready(function(){
    $.ajax({
        url: "http://sites.elannet.info/stasta/maxime/TheForce/index.php?action=statistiques",
        method: "GET",
        succes: function(lol){
            console.log(lol);
        },
        error: function(lol){
            console.log(lol);
        }
    });
});*/

var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
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