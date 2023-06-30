
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>View</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <style>
      div{
        width:80%;
        margin-left:10%;
        /* margin-bottom:3rem;
        border:2px solid  #111111; */
      }
      table {
        overflow:hidden;
      }
      h3{
        text-align:center;
        background: #111111;
        color:white;
        padding-bottom:6px;
      }
      .add{
        background:#002244;
        margin-top:4px;
        margin-bottom:5px;
        /* text-decoration: none;
        padding:1rem; */
      }
      #add1{
        margin-left:80%;
      }

      .btn:hover{
        background:black;
      }
    </style>
  </head>
  <body>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
      integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
      integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
      crossorigin="anonymous"
    ></script>

    <h3>Handling police information</h3>
    <a  class="btn btn-primary add"href="add\add_user.php" id="add1">Add police</a>  
    <div>
      <table class="table table-striped">
        <thead>
          
          <tr>
            <th scope="col">Police id</th>
            <th scope="col">Name of the police</th>
            <th scope="col">Password</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // $user_id=$_GET['user_id'];
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "crime3";
          
          $conn = new mysqli($servername, $username, $password, $dbname);
          
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }
          $sql = "SELECT user_id, user_name, user_password FROM user";
          $result = $conn->query($sql);
          
          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              $user_id=$row['user_id'];
              echo '<tr>';
              echo '<td>'.$row['user_id'].'</td>';
              echo '<td>'.$row['user_name'].'</td>';
              echo '<td>'.$row['user_password'].'</td>';
              echo "<td><a href='add/edit_user2.php?user_id=$user_id'><button type='button' class='btn btn-primary add'>Edit</button></a></td>";
              echo "<td><a href='add/delete.php?user_id=$user_id'><button type='button' class='btn btn-primary add'>Delete</button></a></td>";        
         }
        } else {
          echo "0 results";
        }
        
        $conn->close();
        ?>
        </tbody>
      </table>
    </div>
  </body>
</html>