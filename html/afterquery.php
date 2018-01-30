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
print_r($_POST);
  if($_POST["sd"] && $_POST["ed"] && $_POST["so"] && $_POST["eo"]){
    $sd = $_POST["sd"];
    $ed = $_POST["ed"];
    $so = $_POST["so"];
    $eo = $_POST["eo"];

  }
$sql = "SELECT * FROM response WHERE quality >= $so AND quality <= $eo AND STR_TO_DATE(date, \"%m/%d/%y\") >= \"$sd\" AND STR_TO_DATE(date, \"%m/%d/%y\")<= \"$ed\" LIMIT 10 ";
//echo "\$mysqli -> query(\"$sql\")" . $br;
$escape = $mysqli->escape_string($sql);
echo $escape;
echo "Query Result: ".$br;
if ($result = mysqli_query($mysqli, $mysqli->escape_string($sql))) {
    print_r($result);
    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        echo $row['id'] . $br ;
    }
    $result->free();
}else{
  print_r($result);
  echo "Error: Unable to connecct to MySQL.<br/>";
  echo "Debugging errno: " . $mysqli->errno . $br;
  echo "Debugging error: " . $mysqli->error . $br;
  exit;
}
?>


<?php
  $mysqli->close();
?>
