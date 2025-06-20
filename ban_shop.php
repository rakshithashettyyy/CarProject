<?php require "../config.php";?>
<!DOCTYPE html>
<html>
   <head>
      
      <?php require "inc/head.php";?>

      <title>Products</title>
   </head>
   <body>
      <?php require "inc/nav.php";?>
      <div class="flex_">
         <?php require "inc/sidebar.php";?>
         <div class="right">
          <div class="padding">
              <h3 class="page-title">Banned Shops</h3>
                  
<br>
<!-- Your HTML and PHP code -->
<!-- Assuming you have your database connection established and session started -->

<!-- Input field for search -->
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." class="form-control">

<!-- Table to display data -->
<table class="table table-striped padding" id="tab">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Locate</th>
            
            <th>Unban Shop</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Retrieve data from the database
       
        $sql = "SELECT * FROM shop where ban='1'"; // Modify the SQL query if needed
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $name = $row['name'];
                $email = $row['email'];
                $phone = $row['phone'];
                $address = $row['address'];
                $pending = $row['pending'];
                $lat = $row['lat'];
                $lon = $row['lon'];

                echo "
                    <tr>
                        <td>" . $id . "</td>
                        <td>" . $name . "</td>
                        <td>" . $email . "</td>
                        <td>" . $phone . "</td>
                        <td>" . $address . "</td>
                        <td>" . $lat . "</td>
                        <td>" . $lon . "</td>
                        <td><a href='https://maps.apple.com/?q={$lat},{$lon}
' target='blank'><button class='btn btn-success'>Map</button></a></td>
                        <th><button class='btn btn-success unban_shop' title='".$id."'>Unban</button></th>
                    </tr>
                ";
            }
        } else {
            echo "<tr><td colspan='9'>0 results</td></tr>";
        }
        ?>
    </tbody>
</table>



<script>
function myFunction() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("tab");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1]; // Get the second column ( Name)
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
</script>

            </div>
         </div>
      </div>
      </div>
   </body>
</html>