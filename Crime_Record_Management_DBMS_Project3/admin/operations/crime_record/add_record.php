<?php
session_start();
$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "crime3";
   $conn = new mysqli($servername, $username, $password, $dbname);
   $sql="SELECT user_id,user_name FROM user";
   $result = $conn->query($sql);

?>
<!DOCTYPE html>
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
        width: 15%;
        margin-left: 45%;
        margin-bottom: 20px;
      }
    </style>
  </head>
  <body>
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
    <h3>Add new crime</h3>
    <div>
      <form class="form" action="add_record_sql.php">
        <label>Case id:</label>
        <input class="form-control" type="text" placeholder="Case id" name="case_id" required/>
        <label>Case branch:</label>
        <select
          name="selectoption"
          class="form-control"
          id="exampleFormControlSelect1" required
        >
        <option value="">Select</option>
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
        <option value="">Select</option>
        <?php 
         while($row=$result->fetch_assoc()){
          ?>
          <option value="<?php echo $row['user_id'];?>"><?php echo $row['user_id'];?></option>
       <?php
         }
         ?>
         </select>
        <label>Criminal id:</label>
        <input class="form-control" type="text" placeholder="Criminal id" name="criminal_id" required/>
        <label>Criminal name:</label>
        <input class="form-control" type="text" placeholder="Criminal name" name="criminal_name" required/>
        <label>Location at which crime took place:</label>

        <input class="form-control" type="text" placeholder="Location" name="location" required/>
        <label>Year at which crime took place:</label>
        <input class="form-control" type="text" placeholder="Year" name="year" pattern="[0-9]{4}" required/>

        <label>Victim id:</label>
        <input class="form-control" type="text" placeholder="Victim id" name="victim_id"required/>
        <label>Victim name:</label>
        <input
          class="form-control"
          type="text"
          placeholder="Name of the victim" name="victim_name" required
        />
        <label>Victim phone number:</label>
        <input class="form-control" type="tel" placeholder="Enter 10 dight phone number" name="victim_phone" pattern="[789][0-9]{9}" required/>
        <label>Location of victim:</label>
        <input class="form-control" type="text" placeholder="Location" name="victim_location" required/>

        <label>Case status:</label>
        <select
          name="selectoption2"
          class="form-control"
          id="exampleFormControlSelect1" required
        >
          <option value="">Select</option>
          <option value="Ongoing">Ongoing</option>
          <option value="Not started">Not started</option>
          <option value="Closed">Closed</option>
        </select>
        <button type="submit" class="btn btn-primary" id="log">Submit</button>
      </form>
    </div>
  </body>
</html>