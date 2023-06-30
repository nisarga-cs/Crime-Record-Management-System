<?php 
   session_start();

   $conn = mysqli_connect("localhost", "root", "", "crime3");

   if ($conn === false) {
       die("ERROR: Could not connect. "
           . mysqli_connect_error());
   }

   $case_id=$_GET['case_id'];
   $victim_id=$_GET['victim_id'];
   $criminal_id=$_GET['criminal_id'];
   echo $case_id;
   echo $victim_id;
   echo $criminal_id;
   $adminid = $_SESSION['adminid'];
   $sql = "DELETE from cases where case_id='".$case_id."' and victim_id='".$victim_id."' and criminal_id='".$criminal_id."'";
   if (mysqli_query($conn, $sql)) {
       header("Location:crime_home.php");
   } else {
       echo "ERROR: Hush! Sorry $sql. "
           . mysqli_error($conn);
   }
   mysqli_close($conn);
?>