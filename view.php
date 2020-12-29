
      <?php
         
         $servername = "localhost";
         $username = "root";
         $password = "";
         $dbname="covid19db";

         // Create connection
         $conn = mysqli_connect($servername, $username, $password, $dbname);
         // Check connection
         if (!$conn) {
         die("Connection failed: " . mysqli_connect_error());
         }
      
         
         $sql = "SELECT id, age, sex,temperature, assess_date, score, result FROM users";
         $result = mysqli_query($conn, $sql);
         
        
          
          //show data in table
          mysqli_close($conn);
               
      ?>



      <!--html Code here--->
      <!DOCTYPE html>
      <html lang="en">
      <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>View Table</title>
        <style>
          td{
            padding: 5px;
          }
        </style>
      </head>
      <body>
            <table width=0 border=1 style="border-collapse: collapse;text-align: center">
              <tr>
                  <td>Sl No.</td>
                  <td>Age </td>
                  <td>Sex</td>
                  <td>Temperature </td>
                  <td>Assessment Date</td>
                  <td>Assessment Score </td>
                  <td>COVID-19 Result</td>
                  
              </tr>
              <?php  
              if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>";
                  echo "<td>".$row['id']."</td>";
                  echo "<td>".$row['age']."</td>";
                  echo "<td>".$row['sex']."</td>";
                  echo "<td>".$row['temperature']."</td>";
                  echo "<td>".$row['assess_date']."</td>";
                  echo "<td>".$row['score']."</td>";
                  echo "<td>".$row['result']."</td>";
                 
                  echo "</tr>";



                }
              } else {
                echo "0 results";
              }
              
              
              
              
              
              ?>
             
            
            </table>

      </body>
      </html>
