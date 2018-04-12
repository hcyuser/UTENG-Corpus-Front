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
  if($_POST["school"] ){

    $school =  $mysqli->escape_string($_POST["school"]);
  }
$sql = "SELECT COUNT(*) FROM professor WHERE school = '$school'";
//echo "\$mysqli -> query(\"$sql\")" . $br;
//$escape = $mysqli->escape_string($sql);
//echo $escape;
//echo "Query Result: ".$br;
if ($result = mysqli_query($mysqli,$sql)) {

    while ($row = $result->fetch_assoc()) {
        $show = $row['COUNT(*)'];

    }

    echo "Query Result:".$br.$show;
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
