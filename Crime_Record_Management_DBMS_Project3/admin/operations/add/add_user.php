<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Add user</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet" />
  <style>
    .class1 {
      margin-left: 30%;
      width: 40%;
      /* border:3px solid  #111111; */
    }

    h3 {
      text-align: center;
      background: #001f3f;
      color: white;
      padding-bottom: 6px;
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

    .class1 {
      margin-top: 3rem;
    }
  </style>
</head>

<body>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <h3>Form to add user</h3>
  <form action="insert.php" method="POST">
    <div class="class1">
      <div class="form">
        <label>Name of the police:</label>
        <input class="form-control" type="text" name="user_usrname" placeholder="Enter police name" required />
        <label>Police id:</label>
        <input class="form-control" type="text" name="userid" placeholder="Enter police id" required />
        <label>Password:</label>
        <input class="form-control" type="text" name="userpass" placeholder="Enter password" required />
      </div>
      <input class="sub" type="submit" value="Submit" />
  </form>
  </div>
</body>

</html>