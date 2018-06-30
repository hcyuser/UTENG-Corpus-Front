<?php
    error_reporting(0);
    if(isset($_GET[pfid])){
          $host = "104.199.250.176";
          $user = "hcyidvtw";
          $password = "hcyidvtw";
          $database = "rating";
          $mysqli = new mysqli($host, $user, $password, $database);
          /* check connection */
          if ($mysqli->connect_errno) {
              echo "Error: Unable to connecct to MySQL.<br/>";
              echo "Debugging errno: " . $mysqli->errno . $br;
              echo "Debugging error: " . $mysqli->error . $br;
              exit;
          }
          $pf =  $mysqli->escape_string($_GET[pfid]);
          $sql = "SELECT firstname,lastname FROM professor WHERE id ='$pf'";
          if ($result = mysqli_query($mysqli,$sql)) {

              while ($row = $result->fetch_assoc()) {
                  $pfArr->first = $row['firstname'];
                  $pfArr->last  = $row['lastname'];

              }

              $result->free();
          }else{

            echo "Error: Unable to connecct to MySQL.<br/>";
            echo "Debugging errno: " . $mysqli->errno . $br;
            echo "Debugging error: " . $mysqli->error . $br;
            exit;
          }

          $pfJSON= json_encode($pfArr);


          echo $pfJSON;

        }else{

        	exit;

        }

?>
