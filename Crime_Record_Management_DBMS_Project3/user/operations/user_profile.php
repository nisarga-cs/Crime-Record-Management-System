<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
   
    .form-control {
      margin-bottom: 20px;
    }

    .form {
      font-size: 12px;
      margin-top: 10%;
      display: grid;
      width: 30%;
      margin-left: 35%;
    }

    .btn {
      margin-top: 20px;
      width: 4rem;
      margin-left: 45%;
      margin-bottom: 20px;
      background: #001f3f;
    }

    .btn:hover {
      background-color: black;
      color: white;
      cursor: pointer;
    }

    .form-control {
      border: 1px solid rgba(155, 155, 161, 0.877);
    }

    label {
      font-size: 19px;
      font-weight: 12rem;
    }

    h3{
      background: #111111;
      color: whitesmoke;
      padding: 2px 3px 0 0;
      text-align: center;
    }

    .sub {
      background: #001f3f;
      margin-top: 1rem;
      margin-left: 40%;
      border-radius: 2px;
      color: white;
      border-color: black;
      border-width: 2px;
      width:4rem;
      padding:6px 6px 0 0;
      text-align: center;
    }

    .sub:hover {
      cursor: pointer;
      border-color: black;
    }
  </style>
    </style>
</head>
<body>
    <h3>Viewing your profile</h3>
  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <?php
    session_start();
    $adminid= $_SESSION['adminid'];
    
    $servername = "localhost";
$username = "root";
$password = "";
$dbname = "crime3";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT user_id, user_name, user_password FROM user where user_id='".$adminid."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
$admin_id= $row["user_id"];
$admin_name =$row["user_name"];
$admin_pass=$row["user_password"];
}
} else {
  echo "0 results";
}
$conn->close();
?>
    <div>
    <form class="form" action="operations\add\update_ad_sql.php">
      <label>User id:</label>
      <input class="form-control" type="text" readonly placeholder="Police id" name="admin_id" value="<?php echo htmlspecialchars($admin_id); ?>" />
      <label>User name:</label>
      <input class="form-control" type="text" placeholder="Police name" name="admin_name" value="<?php  echo htmlspecialchars($admin_name); ?>" readonly/>
      <label>User Password:</label>
      <input class="form-control" name="admin_pass" type="text" placeholder="Password" value="<?php  echo htmlspecialchars($admin_pass); ?>" readonly/>
    </form>
  </div>
</html>