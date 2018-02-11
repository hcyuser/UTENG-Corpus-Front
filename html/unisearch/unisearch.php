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
  if($_POST["sd"] && $_POST["ed"] && $_POST["sq"] && $_POST["eq"] && $_POST["school"]){
    $sd = $mysqli->escape_string($_POST["sd"]);
    $ed =  $mysqli->escape_string($_POST["ed"]);
    $sq =  $mysqli->escape_string($_POST["sq"]);
    $eq =  $mysqli->escape_string($_POST["eq"]);
    $school =  $mysqli->escape_string($_POST["school"]);
  }
$sql = "SELECT id FROM professor WHERE quality >= $sq AND quality <= $eq AND school like '$school' LIMIT 10";
//echo "\$mysqli -> query(\"$sql\")" . $br;
//$escape = $mysqli->escape_string($sql);
//echo $escape;
echo "Query Result: ".$br;
if ($result = mysqli_query($mysqli,$sql)) {
    //print_r($result);
    /* fetch associative array */

    $x1=0;
    while ($row = $result->fetch_assoc()) {
        $tid[$x1] = $row['id'];
        $x1++;
    }
    $result->free();
}else{
  //print_r($result);
  echo "Error: Unable to connecct to MySQL.<br/>";
  echo "Debugging errno: " . $mysqli->errno . $br;
  echo "Debugging error: " . $mysqli->error . $br;
  exit;
}

$arrlength = count($tid);
$randtxt = rand();
$myfile = fopen("../txtoutput/".$randtxt.".txt", "w") or die("Unable to open file!");
for($x = 0; $x < $arrlength; $x++){
    $sql2 = "SELECT * FROM response WHERE tid = $tid[$x] LIMIT 1";
    if ($result2 = mysqli_query($mysqli,$sql2)) {
      while ($row2 = $result2->fetch_assoc()) {
          $show = $row2['id'].":".$row2['tid'].":".$row2['content'];
          fwrite($myfile, $show."\r\n");
          echo $show.$br;
      }
      $result2->free();
    }else{
      //print_r($result);
      echo "Error: Unable to connecct to MySQL.<br/>";
      echo "Debugging errno: " . $mysqli->errno . $br;
      echo "Debugging error: " . $mysqli->error . $br;
      exit;
  }
}



fclose($myfile);
echo "http://uteng.hcy.idv.tw/txtoutput/".$randtxt.".txt";


?>


<?php
  $mysqli->close();
?>
