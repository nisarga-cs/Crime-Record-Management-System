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
    h3 {
      color: black;
    }

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

    /* .btn {
      margin-top: 20px;
      width: 4rem;
      margin-left: 45%;
      margin-bottom: 20px;
      background: #001f3f;
    } */

    /* .btn:hover {
      background-color: black;
      color: white;
      cursor: pointer;
    } */

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

    /* .sub {
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
    } */

    .sub:hover {
      cursor: pointer;
    }
    #log{
        background:#002244;
        padding-right:1.5rem;
        padding-left:1.5rem;
        text-align:center;
        margin-top: 14px;
        width: 40%;
        margin-left: 34%;
        margin-bottom: 20px;

      }
      h6{
        text-align:center;
      }
  </style>
</head>
<body>
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

$sql = "SELECT admin_id, admin_name, admin_pass FROM admin where admin_id='".$adminid."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
$admin_id= $row["admin_id"];
$admin_name =$row["admin_name"];
$admin_pass=$row["admin_pass"];
}
} else {
  echo "0 results";
}
$conn->close();
?>
<!-- <div class="container">
<form>
  <div class="form-group row">
    <label for="inputPassword1" class="col-sm-2 col-form-label" >Admin id</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  placeholder="Admin id" value="" readonly>
    </div>
    <label for="" class="col-sm-2 col-form-label">Admin name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  placeholder="Admin name" value="" >
    </div>
  </div>
  <div class="form-group row">
  <label for="" class="col-sm-2 col-form-label">Admin password</label>
  <div class="col-sm-10">
      <input type="text" class="form-control"  placeholder="Admin password" value="?>">
    </div>
</div>
  </div>
</body>
<input class="btn btn-primary" type="reset" id="log"value="Save changes">
</form> -->
   
    <div>
    <form class="form" action="operations\add\update_ad_sql.php">
      <label>Admin id:</label>
      <input class="form-control" type="text" readonly placeholder="Police id" name="admin_id" value="<?php echo htmlspecialchars($admin_id); ?>" />
      <label>Admin name:</label>
      <input class="form-control" type="text" placeholder="Police name" name="admin_name" value="<?php  echo htmlspecialchars($admin_name); ?>" />
      <label>Admin Password:</label>
      <input class="form-control" name="admin_pass" type="text" placeholder="Password" value="<?php  echo htmlspecialchars($admin_pass); ?>" />
      <!-- <input class="sub" id="log" type="submit" value="Save changes" /> -->
      <button type="submit" class="btn btn-primary" id="log">Save changes</button>
    </form>
    <h6>Caution: You will be redirected to login page on changing your details<h6>
  </div>
</html>