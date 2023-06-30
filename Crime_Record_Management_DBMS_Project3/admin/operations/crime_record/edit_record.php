
<?php
session_start();
$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "crime3";
   $conn = new mysqli($servername, $username, $password, $dbname);
   $sql="SELECT user_id,user_name FROM user";
   $result = $conn->query($sql);
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Update Crime</title>
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap"
      rel="stylesheet"
    />
    <style>
      h3 {
        text-align:center;
        background:#001f3f;
        color:white;
        padding-bottom:6px;

      }

      .form-control {
        margin-bottom: 20px;
      }
      .form {
        margin-top: 3rem;
        display: grid;
        width: 50%;
        margin-left: 25%;
      }
      /* .btn {
        margin-top: 20px;
        width: 15%;
        margin-left: 45%;
        margin-bottom: 20px;
      } */
      /* .btn:hover {
        background-color: rgb(49, 235, 49);
        color: black;
      } */
      .form-control {
        border: 1px solid rgba(155, 155, 161, 0.877);
      }
      label {
        /* font-size: px; */
        font-weight: 12rem;
      }
      #log{
        background:#002244;
        padding-right:1.5rem;
        padding-left:1.5rem;
        text-align:center;
        margin-top: 14px;
        width: 20.6%;
        margin-left: 45%;
        margin-bottom: 20px;

      }
    </style>
  </head>
  <body>
    <?php

    $case_id=$_GET['case_id'];
    $victim_id=$_GET['victim_id'];
    $criminal_id=$_GET['criminal_id'];
    // echo $case_id;
    // echo $criminal_id;
    // echo $victim_id;

    $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "crime3";
  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " .
      $conn->connect_error);
  }
  $sql ="select * from cases,criminal,victim where cases.criminal_id=criminal.criminal_id and cases.victim_id=victim.victim_id and cases.case_id='".$case_id."' and cases.criminal_id='".$criminal_id."' and cases.victim_id='".$victim_id."'";
  
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $case_branch=$row['case_branch'];
  $criminal_name=$row['criminal_name'];
  $user_id=$row['user_id'];
  $victim_name=$row['victim_name'];
  $victim_phone=$row['victim_phone'];
  $victim_location=$row['victim_location'];
  $case_status=$row['case_status'];
  $year=$row['year'];
  $location=$row['location'];
  $year=$row['year'];
    ?>
    <script
      src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"
    ></script>
    <h3>Edit crime record</h3>
    <div>
      <form class="form" action="edit_sql.php">
        <label>Case id:</label>
        <input class="form-control" type="text" placeholder="Case id" name="case_id"  value="<?php echo $case_id; ?>" readonly required/>
        <label>Case branch:</label>
        <select
          name="selectoption"
          class="form-control"
          id="exampleFormControlSelect1"  required
        > <option value="<?php echo $row['case_branch'];?>"><?php echo $case_branch; ?></option>
          <option value="Theft">Theft</option>
          <option value="Murder">Murder</option>
          <option value="Cyber crime">Cyber crime</option>
          <option value="Harassment">Harassment</option>
        </select>
        <label>Police handling case:</label>
        <select
          name="user_id"
          class="form-control"
          id="exampleFormControlSelect1" required
        >
        <option value="<?php echo $row['user_id'];?>"><?php echo $user_id; ?></option>
        <?php 
         while($row=$result->fetch_assoc()){
          ?>
          <option value="<?php echo $row['user_id'];?>"><?php echo $row['user_id'];?></option>
       <?php
         }
         ?>
        </select>
        <label>Criminal id:</label>
        <input class="form-control" type="text" placeholder="Criminal id" name="criminal_id" value="<?php echo $criminal_id; ?>" readonly required/>
        <label>Criminal name:</label>
        <input class="form-control" type="text" placeholder="Criminal name" name="criminal_name" value="<?php echo $criminal_name; ?>" required/>
        <label>Location at which crime took place:</label>

        <input class="form-control" type="text" placeholder="Location" name="location" value="<?php echo $location; ?>" required/>
        <label>Year at which crime took place:</label>
        <input class="form-control" type="text" placeholder="Year" name="year" value="<?php echo $year; ?>"/>

        <label>Victim id:</label>
        <input class="form-control" type="text" placeholder="Victim id" name="victim_id" value="<?php echo $victim_id; ?>" readonly required/>
        <label>Victim name:</label>
        <input
          class="form-control"
          type="text"
          placeholder="Name of the victim" name="victim_name" value="<?php echo $victim_name; ?>"
          required/>
        <label>Victim phone number:</label>
        <input class="form-control" type="tel" value="<?php echo $victim_phone; ?>" placeholder="Enter 10 dight phone number" name="victim_phone" pattern="[789][0-9]{9}" required/>
        <label>Location of victim:</label>
        <input class="form-control" type="text" value="<?php echo $victim_location; ?>" placeholder="Location" name="victim_location" required/>

        <label>Case status:</label>
        <select
          name="selectoption2"
          class="form-control"
          id="exampleFormControlSelect1"
          value="<?php echo $case_status; ?>"  required
        >
          <option value="Ongoing">Ongoing</option>
          <option value="Not started">Not started</option>
          <option value="Closed">Closed</option>
        </select>
        <button type="submit" class="btn btn-primary" id="log">Save changes</button>
      </form>
    </div>
  </body>
</html>