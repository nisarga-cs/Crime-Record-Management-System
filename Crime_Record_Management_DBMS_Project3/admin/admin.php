
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      body{
        /* background-color: #1f5776;; */
        background-color:#0074D9;
        width:100%;
        height:100vh;
        background:linear-gradient(180deg,#0074D9,#7FDBFF);
      }
      h3{
        text-align:center;
        color:#001f3f;
      }
      .card{
        margin-left:5%;
      }
      #card1{
        margin-top: 2%;
        width:25%;
        padding-top: 1rem;
        background-color: rgb(159, 230, 248);
        padding-right: 2rem;
        padding-left: 2rem;
        padding-bottom: 1rem;
        border-radius: 1rem;
      }
      #card2{
        margin-top:2%;
        width:25%;
        padding-top: 1rem;
        background-color: rgb(159, 230, 248);
        padding-right: 2rem;
        padding-left: 2rem;
        padding-bottom: 1rem;
        border-radius: 1rem;
      }
      #card3{
        margin-top: 2%;
        width:25%;
        padding-top: 1rem;
        background-color: rgb(159, 230, 248);
        padding-right: 2rem;
        padding-left: 2rem;
        padding-bottom: 1rem;
        border-radius: 1rem;
        margin-right:4rem;
        
      }
      #class4{
        margin-top:3%;
        width:25%;
        padding-top: 1rem;
        background-color: rgb(159, 230, 248);
        padding-right: 2rem;
        padding-left: 2rem;
        padding-bottom: 1rem;
        border-radius: 1rem;
        margin-left:37.5%;
      }
      p {
        font-size: 16px;
        /* margin-bottom: 1.5rem; */
      }
      h2 {
        margin-top: 3rem;
        text-align: center;
        background-color:#001f3f;

      }
      h3 {
        font-size: 24px;
        font-weight: 2rem;
        padding-bottom: 1rem;
      }
      #head{
        color:white;
        font-size:2rem;
        padding-bottom:4px;
      }
      .a:hover{
        color:#ABD699;
      }
      .card:hover {
        box-shadow: 1.5px 1.5px 1.5px 1.5px #2a86d1;
      }
      .row{
            display:flex;
            justify-content:space-between;
      }
      #btn3{
              margin-top:2rem;
      }
      #log{
        margin-left:89%;
        background:#002244;
        padding-right:1.5rem;
        padding-left:1.5rem;
        text-align:center;
      }

    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <h2 id="head">
      Admin home page
    </h2>
 <a class="btn btn-primary" href="/Project3/logout.php" role="button" id="log">Logout</a>
 <div class="row">
      <div class="card" id="card1">
        <h3>Dashboard</h3>
        <p class="text">
          Analyse crime records, total number of cases filed<br />total number
          of cops
        </p>
        <a class="btn btn-primary" href="../charts/chart_home.php" role="button">View dashboard</a>
      </div>
      <div class="card" id="card2">
        <h3>Crime record</h3>
        <p>Add new crime, delete or update existing crime <br />records</p>
        <a class="btn btn-primary" href="/Project3/admin/operations/crime_record/crime_home.php" role="button">Update</a>
      </div>
      <div class="card" id="card3">
        <h3>User record</h3>
        <p>Add user, delete or update existing user details</p>
        <a class="btn btn-primary" href="./operations/view_users.php" role="button" id="btn3">Update</a>
      </div>
      <div class="card" id="class4">
        <h3>Your Profile</h3>
        <p>Change admin username or password</p>
        <a class="btn btn-primary" href="./admin_profile.php" role="button">Edit</a>
      </div>
    </div>
</body>
</html>
