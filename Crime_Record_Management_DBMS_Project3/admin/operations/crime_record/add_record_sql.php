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

		$sql3 ="INSERT INTO criminal VALUES('$criminal_id','$criminal_name')";
		$sql2 = "INSERT INTO victim VALUES('$victim_name','$victim_phone','$victim_location','$victim_id')";
		$sql = "INSERT INTO cases VALUES ('$case_id',
			'$criminal_id','$location','$victim_id','$case_branch','$user_id','$admin_id','$year','$case_status')";
		if(mysqli_query($conn, $sql3) && mysqli_query($conn, $sql2) && mysqli_query($conn, $sql)){
			header("Location:./crime_home.php");
		} else{
			echo "ERROR: Hush! Sorry $sql. ";
				// . mysqli_error($conn);
		}
		mysqli_close($conn);
		?>
</body>

</html>