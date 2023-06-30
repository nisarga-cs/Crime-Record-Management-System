<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Edit police details</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet" />
  <style>
    h3 {
      color: black;
    }

    .form-control {
      margin-bottom: 20px;
    }

    .form {
      font-size: 12px;
      margin-top: 3rem;
      display: grid;
      width: 30%;
      margin-left: 25%;
    }

    .btn {
      margin-top: 20px;
      width: 6rem;
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

    h3 {
      background: #111111;
      color: whitesmoke;
      font-size: 2.3rem;
      padding: 2px 3px 0 0;
      text-align: center;
    }

    .sub {
      background: #001f3f;
      margin-top: 1rem;
      margin-left: 45%;
      border-radius: 2px;
      color: white;
      border-color: black;
      border-width: 2px;
    }

    .sub:hover {
      cursor: pointer;
      border-color: black;
      border-width: 3px;
    }
  </style>
</head>

<body>
  <?php
  $user_id = $_GET['user_id'];
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "crime3";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " .
      $conn->connect_error);
  }
  $sql = "SELECT user_name, user_password FROM user
    where user_id='" . $user_id . "'";
  $result = $conn->query($sql);
  $row =
    $result->fetch_assoc();
  $user_name = $row['user_name'];
  $user_password = $row['user_password']; ?>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <h3>Edit police details</h3>
  <div>
    <form class="form" action="update.php">
      <label>Police id:</label>
      <input class="form-control" type="text" readonly placeholder="Police id" name="user_id" value="<?php echo $user_id; ?>" />
      <label>Police name:</label>
      <input class="form-control" type="text" placeholder="Police name" name="user_name" value="<?php echo $user_name; ?>" />
      <label>Password:</label>
      <input class="form-control" name="user_password" type="text" placeholder="Password" value="<?php echo $user_password; ?>" />
      <input class="sub" type="submit" value="Submit" />
    </form>
  </div>

</body>

</html>