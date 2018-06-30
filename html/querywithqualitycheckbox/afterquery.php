<?php
$host = "104.199.250.176";
$user = "hcyidvtw";
$password = "hcyidvtw";
$database = "rating";
$mysqli = new mysqli($host, $user, $password, $database);

$br = "<br/>";

/* check connection */
if ($mysqli->connect_errno) {
    echo "Error: Unable to connecct to MySQL.<br/>";
    echo "Debugging errno: " . $mysqli->errno . $br;
    echo "Debugging error: " . $mysqli->error . $br;
    exit;
}

//echo "Success: A proper connection to MySQL was made! The $database database is great." . $br;
//echo "Host information: " . $mysqli->host_info . $br;
?>
<?php
//print_r($_POST);
  if($_POST["sd"] && $_POST["ed"] && $_POST["so"] && $_POST["eo"] &&  $_POST["school"] ){
    $sd = $mysqli->escape_string($_POST["sd"]);
    $ed =  $mysqli->escape_string($_POST["ed"]);
    $so =  $mysqli->escape_string($_POST["so"]);
    $eo =  $mysqli->escape_string($_POST["eo"]);
    $school =  $mysqli->escape_string($_POST["school"]);
  }
$sql = "SELECT * FROM response WHERE tid IN (SELECT id FROM professor WHERE quality >= $so AND quality <= $eo AND school like '$school') AND quality >= $so AND quality <= $eo AND STR_TO_DATE(date, '%m/%d/%Y') >= '$sd' AND STR_TO_DATE(date, '%m/%d/%Y')<= '$ed' ";
//echo "\$mysqli -> query(\"$sql\")" . $br;
//$escape = $mysqli->escape_string($sql);
//echo $escape;
//echo "Query Result: ".$br;
if ($result = mysqli_query($mysqli,$sql)) {
    //print_r($result);
    /* fetch associative array */
    //$randtxt = rand();
    if(file_exists("../txtoutput/".$school."-".$so.".txt")){
        unlink("../txtoutput/".$school."-".$so.".txt");
    }
    $myfile = fopen("../txtoutput/".$school."-".$so.".txt", "w") or die("Unable to open file!");
    while ($row = $result->fetch_assoc()) {
      if(isset($_POST['cb1']) && (1.0<= $row['quality'] && $row['quality']<= 1.9)){
        $show = $row['id'].":".$row['tid'].":".$row['quality'].":  ".$row['content'];
        fwrite($myfile, $show."\r\n");
      }else if(isset($_POST['cb2']) && (2.0<= $row['quality'] && $row['quality']<= 2.9)){
        $show = $row['id'].":".$row['tid'].":".$row['quality'].":  ".$row['content'];
        fwrite($myfile, $show."\r\n");
      }else if(isset($_POST['cb3']) && (3.0<= $row['quality'] && $row['quality']<= 3.9)){
        $show = $row['id'].":".$row['tid'].":".$row['quality'].":  ".$row['content'];
        fwrite($myfile, $show."\r\n");
      }else if(isset($_POST['cb4']) && (4.0<= $row['quality'] && $row['quality']<= 4.9)){
        $show = $row['id'].":".$row['tid'].":".$row['quality'].":  ".$row['content'];
        fwrite($myfile, $show."\r\n");
      }else if(isset($_POST['cb5']) && (5.0<= $row['quality'] &&  $row['quality']<= 5.9)){
        $show = $row['id'].":".$row['tid'].":".$row['quality'].":  ".$row['content'];
        fwrite($myfile, $show."\r\n");
      }

    }
    fclose($myfile);

    echo "Query Result:".$br;
    echo "<html><a href=\"";
    echo "http://uteng.hcy.idv.tw/txtoutput/".$school."-".$so.".txt";
    echo "\">Download Here</a></html>";
    $result->free();
}else{
  //print_r($result);
  echo "Error: Unable to connecct to MySQL.<br/>";
  echo "Debugging errno: " . $mysqli->errno . $br;
  echo "Debugging error: " . $mysqli->error . $br;
  exit;
}
?>


<?php
  $mysqli->close();
?>
