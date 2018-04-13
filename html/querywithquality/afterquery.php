<?php
    header('Content-Type: text/plain; charset="utf-8"');
    header('Content-Disposition: inline; filename="result.txt"');
    require_once('common.Utility.php');
    //connect db
    $__db=kwcr2_mapdb("RATING", 'user', 'user');
    if ($__db===0) {
      echo "100, \"connect db failed!\"";
      return;
    }

    $br = "<br/>";

    if($_POST["sd"] && $_POST["ed"] && $_POST["so"] && $_POST["eo"] &&  $_POST["school"] ){
      $sd = trim($_POST["sd"]);
      $ed = trim($_POST["ed"]);
      $so = trim($_POST["so"]);
      $eo = trim($_POST["eo"]);
      $school = trim($_POST["school"]);
    }

    $myfile = fopen("../txtoutput/".$school."-".$so.".txt", "w") or die("Unable to open file!");
    $rs=read_multi_record($__db, "SELECT * FROM response WHERE tid IN (SELECT id FROM professor WHERE quality >= '$so' AND quality <= '$eo' AND school like '$school') AND quality >= '$so' AND quality <= '$eo' AND C_DATE >= '$sd' AND C_DATE <= '$ed' ",array(),array());
    if ($rs === false){
      echo "101, \"".kwcr2_geterrormsg($__db, 1)."\"";
      echo $rs;

    }else {

      foreach ($rs as $r){
        $show = $row['id'].":".$row['tid'].":".$row['quality'].":".$row['content'];
        fwrite($myfile, $show."\r\n");

      }

    }
    fclose($myfile);
    echo "Query Result:".$br;
    echo "<html><a href=\"";
    echo "http://uteng.hcy.idv.tw/txtoutput/".$school."-".$so.".txt";
    echo "\">Download Here</a></html>";
    kwcr2_unmapdb($__db);
?>
