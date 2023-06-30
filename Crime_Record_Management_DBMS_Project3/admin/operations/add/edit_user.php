<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        h3 {
            text-align: center;
            background: #001f3f;
            color: white;
        }

        .sub {
            background: #001f3f;
            margin-top: 1rem;
            margin-left: 45%;
            border-radius: 2px;
            color: white;
            border-color: black;
            border-width: 2px;
            margin-bottom: 4rem;
        }

        /* .sub:hover{
        cursor:pointer;
        border-color:black;
        border-width:3px;
      } */
        .class1 {
            margin-top: 3rem;
        }

        .id {
            position: absolute;
            top: 30%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 50%;
        }

        #alert-width {
            width: 35%;
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, 50%);

        }

        .user_id {
            margin-left: 6px;
            ;
            width: 50%;
            text-align: left;
        }

        .val {
            margin-top: 4px;
        }

        #id1 {
            margin-left: 20%;
        }

        .id3 {
            position: absolute;
            margin-top: 20%;
            margin-left: 60%;
            transform: translate(-70%, -70%);
            width: 50%;
            color: black;
        }

        .label {
            margin-top: 6px;
        }
    </style>
</head>

<body>
    <h3>Form to edit user</h3>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <?php
    session_start();

    $conn = mysqli_connect("localhost", "root", "", "crime3");

    if ($conn === false) {
        die("ERROR: Could not connect. "
            . mysqli_connect_error());
    }
    ?>

    <div class="id">
        <form method='POST'>

            <label for="fname" id="id1">Police id:</label>
            <input type="text" class="user_id" name="user_id" placeholder='Enter the police id to edit respective records' required><br>
            <input class="sub" type="submit" value="Fetch record" />
            <?php
            if (isset($_REQUEST['user_id'])) {
                $user_id = $_REQUEST['user_id'];
                $sql = "SELECT  user_id,user_name,user_password FROM user where user_id='" . $user_id . "'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {

                    // output data of each row
                    while ($row = $result->fetch_assoc()) {

            ?>
                        <div class="id3">
                            <form method="POST" action="">
                                <label class="label" for="name">Police name:</label><br>
                                <input class="user_id val" type="text" id="name" value="
 <?php echo $row['user_name'] ?>" readonly>
                                <br>
                                <label class="label" for="id">Police id:</label><br>
                                <input class="user_id val" type="text" id="pass" name="user_id" value="
 <?php echo $row["user_id"]; ?>">
                                <br>

                                <label class="label" for="pass">Authentication password:</label><br>
                                <input class="user_id val" type="text" id="lname" value="
 <?php echo $row["user_password"]; ?>">
                                <br>
                                <input class="sub" type="submit" value="Save changes" name="button">
                            </form>
                        </div>
        </form>
    </div>
    </div>
<?php
                    }
                } else {
?>
<div class="alert alert-danger alert-dismissible" id="alert-width">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Invalid police id!</strong>
</div>

<?php
                }
            }
            if (isset($_POST['button'])) {
                if ($conn === false) {
                    die("ERROR: Could not connect. "
                        . mysqli_connect_error());
                }
                $user_id = $_REQUEST['user_id'];
                $sql = "delete from user where user_id='$user_id'";

                if (mysqli_query($conn, $sql)) { ?>

    <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Changes saved successfully</strong>
    </div>
<?php
                } else {
                    echo "ERROR: Hush! Sorry $sql. "
                        . mysqli_error($conn);
                }
                mysqli_close($conn);
            }
?>
</body>

</html>
</body>

</html>