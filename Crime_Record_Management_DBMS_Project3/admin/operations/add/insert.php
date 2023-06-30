<!DOCTYPE html>
<html>

<head>
	<title>Insert Page page</title>
</head>

<body>
		<?php
		session_start();

		$conn = mysqli_connect("localhost", "root", "", "crime3");

		if ($conn === false) {
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}

		$user_name = $_REQUEST['user_usrname'];
		$user_id = $_REQUEST['userid'];
		$user_pass = $_REQUEST['userpass'];

		$adminid = $_SESSION['adminid'];
		$sql = "INSERT INTO user VALUES ('$user_id',
			'$user_name','$user_pass','$adminid')";

		if (mysqli_query($conn, $sql)) {
			header("Location:../view_users.php");
		} else {
			echo "ERROR: Hush! Sorry $sql. "
				. mysqli_error($conn);
		}
		mysqli_close($conn);
		?>
</body>

</html>