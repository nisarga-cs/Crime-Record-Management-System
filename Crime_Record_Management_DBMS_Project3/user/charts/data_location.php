<?php 
session_start();
$user_id=$_SESSION['adminid'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
$query=$con->query("SELECT count(DISTINCT case_id) as Total_cases,location from cases where user_id ='".$user_id."' GROUP BY location");
foreach($query as $r) {
    $location[]=$r['location'];
    $no_of_cases[]=$r['Total_cases'];
    
}
?>
<div class="chartBox">
  <canvas id="myChart"></canvas>
  </div>
  <script>
const labels = <?php echo json_encode($location) ?>;
  const data = {
    labels: labels,
    datasets: [{
      label: 'Total cases',
      data:  <?php echo json_encode($no_of_cases)?>,
      backgroundColor: [
        'rgba(54, 162, 235, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(54, 162, 235, 0.2)'
      ],
      borderColor: [
        'rgb(54, 162, 235)',
        'rgb(54, 162, 235)',
        'rgb(54, 162, 235)',
        'rgb(54, 162, 235)',
        'rgb(54, 162, 235)',
        'rgb(54, 162, 235)',
        'rgb(54, 162, 235)'
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