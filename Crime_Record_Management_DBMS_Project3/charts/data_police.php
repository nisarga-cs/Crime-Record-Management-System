<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualisation</title>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
  
    .chartBox{
      width:700px;
      height:600px;
      margin-left:25%;
      margin-top:6rem;
    }
    </style> 
</head>
<body>
<?php 
$con = new mysqli('localhost','root','','crime3');
$query=$con->query("SELECT count(DISTINCT case_id) as Total_case,user_id from cases GROUP BY user_id;
");
foreach($query as $r) {
    $user_id[]=$r['user_id'];
    $no_of_cases[]=$r['Total_case'];
    
}
?>
<div class="chartBox">
  <canvas id="myChart"></canvas>
  </div>
  <script>
const labels = <?php echo json_encode($user_id) ?>;
  const data = {
    labels: labels,
    datasets: [{
      label: 'Number of cases handling',
      data:  <?php echo json_encode($no_of_cases)?>,
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 205, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(201, 203, 207, 0.2)'
      ],
      borderColor: [
        'rgb(255, 99, 132)',
        'rgb(255, 159, 64)',
        'rgb(255, 205, 86)',
        'rgb(75, 192, 192)',
        'rgb(54, 162, 235)',
        'rgb(153, 102, 255)',
        'rgb(201, 203, 207)'
      ],
      borderWidth: 1
    }]
  };

  const config = {
    type: 'bar',
    data: data,
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    },
  };
  var myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>
    
</body>
</html>