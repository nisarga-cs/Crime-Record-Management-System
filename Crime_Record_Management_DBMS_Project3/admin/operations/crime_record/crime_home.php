

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
      table {
        margin: 1rem 1rem 1rem 1rem;
        overflow:hidden;
      }
      h3{
        text-align:center;
        background:#001f3f;
        color:white;
        padding-bottom:6px;
      }
      #log{
        margin-left:89%;
        background:#002244;
        padding-right:1.5rem;
        padding-left:1.5rem;
        text-align:center;
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

    <h3>Filed cases</h3>
    <a class="btn btn-primary" href="add_record.php" role="button" id="log">Add new case</a>
    <div>
      <table class="table table-striped">
        <thead>
          
          <tr>
            <th scope="col">Case id</th>
            <th scope="col">Case branch</th>
            <th scope="col">Crime location</th>
            
            <th scope="col">Criminal id</th>
            <th scope="col">Criminal name</th>
            <th scope="col">Victim id</th>
            <th scope="col">Victim name</th>
            <th scope="col">Year</th>
            <th scope="col">Case status</th>
            <th scope="col">View</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
        <?php 
          session_start();
          $conn = mysqli_connect("localhost", "root", "", "crime3");
          $sql="SELECT * FROM cases,victim,criminal where cases.victim_id=victim.victim_id and cases.criminal_id=criminal.criminal_id";
          $result = $conn->query($sql);
          
          if ($result->num_rows > 0) {
            while($res = $result->fetch_assoc()) {
          ?>
          <tr>
            <td><?php echo $res['case_id'];?></td>
            <td><?php echo $res['case_branch'];?></td>
            <td><?php echo $res['location'];?></td>
            
            <td><?php echo $res['criminal_id'];?></td>
            
            <td><?php echo $res['criminal_name'];?></td>
            <td><?php echo $res['victim_id'];?></td>
            <td><?php echo $res['victim_name'];?></td>
            <td><?php echo $res['year'];?></td>
            <td><?php echo $res['case_status'];?></td>
            <?php
             echo "<td><a href='view_full.php?case_id=$res[case_id]&&victim_id=$res[victim_id]&&criminal_id=$res[criminal_id]'><button type='button' class='btn btn-primary add'>View</button></a></td>";
            echo "<td><a href='edit_record.php?case_id=$res[case_id]&&victim_id=$res[victim_id]&&criminal_id=$res[criminal_id]'><button type='button' class='btn btn-primary add'>Edit</button></a></td>";
              echo "<td><a href='delete.php?case_id=$res[case_id]&&victim_id=$res[victim_id]&&criminal_id=$res[criminal_id]'><button type='button' class='btn btn-primary add'>Delete</button></a></td>"; 
        ?>  </tr>
          <?php
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