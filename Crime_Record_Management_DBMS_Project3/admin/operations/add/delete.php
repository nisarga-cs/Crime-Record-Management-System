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
        $user_id=$_GET['user_id'];
		$sql = "DELETE from user where user_id=  '".$user_id."'";
		if (mysqli_query($conn, $sql)) {
			header("Location:/Project3/admin/operations/view_users.php");
		} else {
			echo "ERROR: Hush! Sorry $sql. "
				. mysqli_error($conn);
		}
		mysqli_close($conn);
    ?>