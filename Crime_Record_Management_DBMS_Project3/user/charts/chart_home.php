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
    div{
        display: flex;
       
        justify-content: space-around;
    }
    h2{
      text-align:center;
        color :#111111;
        margin-top:0;
    }
    </style> 
</head>
<body>
    <h2>Visualize crime records</h2>
    <div>
    <a class="btn btn-primary" href="data_location.php" role="button">Location</a>
    <a class="btn btn-primary" href="case_branch.php" role="button">Case branch</a>
    <a class="btn btn-primary" href="year.php" role="button">Year</a>
    <a class="btn btn-primary" href="case_status.php" role="button">Case status</a>
</div>
    <?php 
$con = new mysqli('localhost','root','','crime3');
$query=$con->query(" SELECT criminal.criminal_name as Criminals,count(cases.case_id)as Total_cases from cases,criminal where cases.criminal_id=criminal.criminal_id and user_id ='".$user_id."' group by(criminal.criminal_id) order by Total_cases DESC
");
foreach($query as $r) {
    $criminal[]=$r['Criminals'];
    $no_of_cases[]=$r['Total_cases'];
    
}
?>
<div class="chartBox">
  <canvas id="myChart"></canvas>
  </div>
  <script>
const labels = <?php echo json_encode($criminal) ?>;
  const data = {
    labels: labels,
    datasets: [{
      label: 'Highest crime',
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