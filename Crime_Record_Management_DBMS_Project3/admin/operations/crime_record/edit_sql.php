<!DOCTYPE html>
<html>

<head>
	<title>Inserting case record</title>
</head>

<body>
		<?php
        session_start();

		$conn = mysqli_connect("localhost", "root", "", "crime3");

		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
        $admin_id= $_SESSION['adminid'];
		$case_id = $_REQUEST['case_id'];
		$case_branch = $_REQUEST['selectoption'];
		$year = $_REQUEST['year'];
        $location = $_REQUEST['location'];
        $criminal_id = $_REQUEST['criminal_id'];
        $criminal_name = $_REQUEST['criminal_name'];
        $victim_id = $_REQUEST['victim_id'];
        $victim_name = $_REQUEST['victim_name'];
        $victim_location = $_REQUEST['victim_location'];
        $victim_phone = $_REQUEST['victim_phone'];
        $user_id=$_REQUEST['user_id'];

        $case_status = $_REQUEST['selectoption2'];
       
        $adminid= $_SESSION['adminid'];
		$sql= "UPDATE victim SET victim_name='".$victim_name."',victim_location='".$victim_location."',victim_phone='".$victim_phone."' WHERE victim_id='".$victim_id."'";
		$sql2= "UPDATE criminal SET criminal_name='".$criminal_name."' where criminal_id='".$criminal_id."'";
        $sql3="UPDATE cases SET case_branch='".$case_branch."',user_id='".$user_id."',location='".$location."',year='".$year."' where case_id='".$case_id."'";
		if(mysqli_query($conn, $sql) && mysqli_query($conn, $sql2) && mysqli_query($conn, $sql3)){
			header("Location:./crime_home.php");
		} else{
			echo "ERROR: Hush! Sorry $sql. "
				. mysqli_error($conn);
		}
		mysqli_close($conn);
		?>
</body>

</html>