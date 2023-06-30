<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
  
  include_once('connection.php');
     
  // function test_input($data) {
        
  //     $data = trim($data);
  //     $data = stripslashes($data);
  //     $data = htmlspecialchars($data);
  //     return $data;
  // }
     
  if ($_SERVER["REQUEST_METHOD"]== "POST") {
        
      $userid = test_input($_POST["login_id"]);
      $userpass = test_input($_POST["login_pass"]);
      // $conn = mysqli_connect("localhost", "root", "", "crime3");
      $stmt = $conn->prepare("SELECT * FROM user");
      $stmt->execute();
      $users = $stmt->fetchAll();
      foreach($users as $user) {
          if(($user['user_id'] == $userid) && ($user['user_password'] == $userpass)) {
                  header("Location: ../user/userhome.php");
          }
         } 
         {

          echo "invalid";
      }
    }
    
  ?>
</body>
</html>