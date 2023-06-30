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
    session_start();
    include_once('connection.php');
       
    function test_input($data) {
          
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
       
    if ($_SERVER["REQUEST_METHOD"]== "POST") {
          
        $adminid = test_input($_POST["login_id"]);
        $_SESSION['adminid']=$adminid;
    
    
        $adminpass = test_input($_POST["login_pass"]);
        
        $stmt = $conn->prepare("SELECT * FROM admin");
        $stmt->execute();
        $admins = $stmt->fetchAll();
        foreach($admins as $admin) {
              
            if(($admin['admin_id'] == $adminid) && 
                ($admin['admin_pass'] == $adminpass)) {
                    header("Location: ../admin/admin.php");
    //Retrieve name from query string and store to a local variable 
            }       
        } 
        include 'validation2.php';
    }

    ?>
</body>
</html>
