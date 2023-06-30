<?php
		session_start();
        $servername = "localhost";
            $username = "username";
            $password = "";
            $dbname = "crime3";
		$conn = mysqli_connect("localhost", "root", "", "crime3");

		if ($conn === false) {
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
        $user_id=$_REQUEST['user_id'];
		$user_name = $_REQUEST['user_name'];
		$user_pass = $_REQUEST['user_password'];

		$adminid = $_SESSION['adminid'];
		$sql = "UPDATE user set user_name='".$user_name."' where user_id=  '".$user_id."'";
        $sqlu = "UPDATE user set user_password='".$user_pass."'  where user_id=  '".$user_id."'";
		if (mysqli_query($conn, $sql) && mysqli_query($conn, $sqlu)) {
			header("Location:/Project3/admin/operations/view_users.php");
		} else {
			echo "ERROR: Hush! Sorry $sql. "
				. mysqli_error($conn);
		}
		mysqli_close($conn);
    ?>