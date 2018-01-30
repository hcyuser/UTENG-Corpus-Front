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
    $sd = $mysqli->escape_string($_POST["sd"]);
    $ed =  $mysqli->escape_string($_POST["ed"]);
    $so =  $mysqli->escape_string($_POST["so"]);
    $eo =  $mysqli->escape_string($_POST["eo"]);

  }
$sql = "SELECT * FROM response WHERE quality >= $so AND quality <= $eo AND STR_TO_DATE(date, '%m/%d/%Y') >= '$sd' AND STR_TO_DATE(date, '%m/%d/%Y')<= '$ed' LIMIT 10 ";
echo "\$mysqli -> query(\"$sql\")" . $br;
//$escape = $mysqli->escape_string($sql);
//echo $escape;
echo "Query Result: ".$br;
if ($result = mysqli_query($mysqli,$sql)) {
    print_r($result);
    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        echo $row['id']+" "+$row['tid']+" "+$row['content']+$br ;
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
